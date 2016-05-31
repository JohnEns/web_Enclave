<?php

/**
 * Helper tool for building valid SQL statements.
 */
class SqlBuilder {

    /**
     * @var integer Constant value indicating the SQL query type (SELECT etc).
     */
    private $type;

    /**
     * @var string Main table name to use in the query. Leave empty for system
     * values like @@AUTOCOMMIT
     */
    private $table;
    private $orderBy = array();
    private $limit;
    private $limitoffset;
    private $groupby = array();
    private $having = array();
    private $directhaving;
    private $where = array();
    private $directwhere;
    private $updateonduplicate;
    private $columns = array();
    private $values = array();
    private $joins = array();

    /**
     * @var boolean If set to true, all values will be an question mark for use
     * in prepared statements.
     */
    private $prepared_statement = false;

    // Query mode:

    /**
     * Select mode.
     */
    const SELECT = 0;

    /**
     * Update mode.
     */
    const UPDATE = 1;

    /**
     * Insert mode.
     */
    const INSERT = 2;

    /**
     * Delete mode.
     */
    const DELETE = 3;

    // Join types:

    /**
     * Use INNER JOIN
     */
    const INNER = 'INNER JOIN';

    /**
     * Use LEFT JOIN
     */
    const LEFT = 'LEFT JOIN';

    /**
     * Use LEFT OUTER JOIN
     */
    const OUTER = 'LEFT OUTER JOIN';

    /**
     * Use RIGHT OUTER JOIN
     */
    const R_OUTER = 'RIGHT OUTER JOIN';

    /**
     * Use CROSS JOIN
     */
    const CROSS = 'CROSS JOIN';

    /**
     * Use STRAIGHT_JOIN
     */
    const STRAIGHT = 'STRAIGHT_JOIN';

    /**
     * Use JOIN
     */
    const JOIN = 'JOIN';

    /**
     * Member overload magic method __get implementation.
     * @param string Member name.
     * @return mixed Property value or null if the property is not found.
     */
    public function __get($name) {
        switch ($name) {
            case 'type':
                return $this->type;
            case 'table':
                return $this->table;
            case 'updateonduplicate':
                return $this->updateonduplicate;
            case 'directwhere':
                return $this->directwhere;
        }
    }

    /**
     * Member overload magic method __set implementation.
     * @param string Member name.
     * @param mixed Member value.
     */
    public function __set($name, $value) {
        switch ($name) {
            case 'type':
                if (is_int($value) && $value > 0 && $value < 5) {
                    $this->type = $value;
                }

                return;
            case 'table':
                if (strlen($value) > 0) {
                    $this->table = $value;
                }

                return;
            case 'updateonduplicate':
                $this->updateonduplicate = ($value === true ? true : false);
                return;
            case 'directwhere':
                $this->directwhere = $value;
                return;
        }
    }

    /**
     * Constructor
     * @param string $table Table name [optional]
     * @param boolean $preparedstatement When set to true, all values will be
     * a question mark for use in prepared statements. Optional. Defaults to false.
     * @return void
     */
    public function __construct($table = '', $preparedstatement = false) {
        $this->table = $table;
        $this->prepared_statement = $preparedstatement;
    }

    /**
     * Appends values for building a SELECT statement
     * @param string A comma seperated string of columns in the SELECT statement
     * @param string The expression for the WHERE clause [optional]
     * @param string The value for the WHERE expression [optional]
     * @return void
     */
    public function select($columns, $whereexpr = null, $wherevalue = null) {
        $this->columns[] = $columns;
        $this->where($whereexpr, $wherevalue);
        $this->type = self::SELECT;
    }

    /**
     * Adds a JOIN clause to the SELECT statement.
     * @param string $table The name of the table to join.
     * @param string $joinType Optional. The join type. Must be a constant defined
     * in this class. Defaults to an INNER JOIN.
     * @param string $expr Optional. The expression to add to the join.
     * @param string $exprvalue Optional. The value in the expression.
     * @param boolean $noescape Optional. Don't escape the expression value.
     * Defaults to false.
     */
    public function addJoin($table, $joinType = SqlBuilder::INNER, $expr = null, $exprvalue = null, $noescape = true) {
        global $db;
        if ($this->type === self::SELECT && strlen($table) > 0 && $this->isConstantValue($joinType)) {
            $this->joins[] = array('table' => $table, 'joinType' => $joinType, 'expr' => $expr, 'exprValue' => $noescape === true ? $exprvalue : $db->formatValue($exprvalue));
        }
    }

    /**
     * Short hand for a left join call to addJoin.
     * @param string $table The name of the table to join.
     * @param string $expr Optional. The expression to add to the join.
     * @param string $exprvalue Optional. The value in the expression.
     * @param boolean $noescape Optional. Don't escape the expression value.     */
    public function leftJoin($table, $expr = null, $exprvalue = null, $noescape = true) {
        $this->addJoin($table, self::LEFT, $expr, $exprvalue, $noescape);
    }

    /**
     * Short hand for a left join call to addJoin.
     * @param string $table The name of the table to join.
     * @param string $expr Optional. The expression to add to the join.
     * @param string $exprvalue Optional. The value in the expression.
     * @param boolean $noescape Optional. Don't escape the expression value.     */
    public function innerJoin($table, $expr = null, $exprvalue = null, $noescape = true) {
        $this->addJoin($table, self::INNER, $expr, $exprvalue, $noescape);
    }

    /**
     * Short hand for a left join call to addJoin.
     * @param string $table The name of the table to join.
     * @param string $expr Optional. The expression to add to the join.
     * @param string $exprvalue Optional. The value in the expression.
     * @param boolean $noescape Optional. Don't escape the expression value.     */
    public function join($table, $expr = null, $exprvalue = null, $noescape = true) {
        $this->addJoin($table, self::JOIN, $expr, $exprvalue, $noescape);
    }

    /**
     * Appends values for building an INSERT statement. May be called multiple
     * times to add more columns and values.
     * @param string Column name
     * @param mixed Column value. Optional. Defaults to NULL.
     * @param boolean Optional. Set this value to true if you don't want values
     * to be escaped. Defaults to false.
     * @return void
     */
    public function insert($column, $value = null, $noescape = false) {
        $this->addValue($column, $value, $noescape);
        $this->type = self::INSERT;
    }

    /**
     * Appends values for building an UPDATE statement. May be called multiple
     * times to add more columns and values.
     * @param string $column Column name
     * @param mixed $value Column value. Optional. Defaults to NULL.
     * @param boolean $noescape Set this value to true to prevent automatic
     * value escaping. Optional. Defaults to false.
     * @return void
     */
    public function update($column, $value = null, $noescape = false) {
        $this->addValue($column, $value, $noescape);
        $this->type = self::UPDATE;
    }

    /**
     * Appends an expression for the WHERE clause for building a DELETE statement.
     * @param string Expression for the WHERE clause. Optional.
     * @param string Expression value. Optional.
     * @param boolean Set to True to have the expression preluded with an OR
     * statement, false for AND. Defaults to false. [optional]
     * @return void
     */
    public function delete($whereexpr = null, $whereval = null, $or = false) {
        if (strlen($whereexpr) > 0) {
            $this->where($whereexpr, $whereval, $or);
        }

        $this->type = self::DELETE;
    }

    /**
     * Appends the columns for an ORDER BY statement. Optionally a number for
     * LIMIT can be supplied.
     * @param string A comma seperated list of columns for the ORDER BY statement.
     * @param integer Number for the LIMIT predicate which indicates the maximum
     * number of rows in the result query. Define -1 to get all rows when
     * specifying an offset.[optional].
     * @param integer Offset number for the limit clause which defines from
     * which row on to retrieve records. [optional].
     * @return void
     */
    public function orderBy($columns, $limit = 0, $limitoffset = 0) {
        $this->orderBy[] = $columns;

        if ($limit > 0) {
            $this->limit = $limit;
        } elseif ($limit === -1) {
            $this->limit = 999999999999;
        }

        if ($limitoffset > 0) {
            $this->limitoffset = $limitoffset;
        }
    }

    /**
     * Appends columns for a GROUP BY statement. Optionally an expression for
     * HAVING can be supplied.
     * @param string A comma seperated list of columns for the GROUP BY statement.
     * @param string Expression for HAVING. [optional]
     * @return
     */
    public function groupBy($columns, $havingexpr = null, $havingval = null) {
        $this->groupby[] = $columns;
        $this->having($havingexpr, $havingval);
    }

    /**
     * Appends an expression for a WHERE clause.
     * @param string $expression Expression for the WHERE clause.
     * @param string $exprvalue Expression value.
     * @param boolean $or Use OR. Optional. Defaults to false (e.g. AND).
     * @param boolean $noescape Don't escape values. Optional. Defaults to false.
     * @return void
     */
    public function where($expression, $exprvalue, $or = false, $noescape = false) {
        if (strlen($expression) > 0) {
            global $db;
            $val = $exprvalue;

            if ($this->prepared_statement === true) {
                $val = '?';
            } else {
                $val = $noescape === true ? $exprvalue : $db->formatValue($exprvalue);
            }

            $this->where[] = array($expression, $val, $or);
        }
    }

    /**
     * Appends an expression for an HAVING clause. Only works with GROUP BY.
     * @param string Expression for the HAVING clause.
     * @param mixed Expression value. NB: This value will be escaped. Set
     * noescape to true to prevent this.
     * @param boolean $or Use OR. Optional. Default to false (e.g. AND).
     * @param boolean $noescape Don't escape values. Optional. Defaults to false.
     * @return void
     */
    public function having($expression, $exprvalue, $or = false, $noescape = false) {
        if (strlen($expression) > 0) {
            global $db;
            if ($this->prepared_statement === true) {
                $val = '?';
            } else {
                $val = $noescape === true ? $exprvalue : $db->formatValue($exprvalue);
            }

            $this->having[] = array($expression, $val, $or);
        }
    }

    /**
     * Adds a column/value pair in a dictionary. Formats the values depending on
     * the data type.
     * @param string Column name.
     * @param mixed Column value. [optional]
     * @param boolean Optional. Set this value to true to prevent value escaping.
     * Defaults to false.
     * @return void
     */
    private function addValue($column, $value = null, $noescape = false) {
        global $db;
        $this->columns[] = '`' . $column . '`';
        $this->values[] = ($this->prepared_statement === true ? '?' : ($noescape === true ? $value : $db->formatValue($value)));
    }

    /**
     * Defines a basic template for the SQL statement to build.
     * @return string A basic SQL statement template.
     */
    private function getTemplate() {
        switch ($this->type) {
            case self::SELECT:
                return (strlen($this->table) > 0 ? 'SELECT %s FROM %s' : 'SELECT %s');
            case self::UPDATE:
                return 'UPDATE %s SET %s';
            case self::INSERT:
                return 'INSERT INTO %s (%s) VALUES(%s)';
            case self::DELETE:
                return 'DELETE FROM %s';
        }
    }

    /**
     * Magic function which calls the real toString method if ommitted.
     * @return string Result of toString() method.
     */
    public function __toString() {
        return $this->toString();
    }

    /**
     * Builds the final SQL statement.
     * @return string SQL statement.
     */
    public function toString() {
        if ($this->type !== self::SELECT && strlen($this->table) == 0) {
            return '';
        }

        $sql = $this->getTemplate();
        $joinexpr = '';
        $columns = '';
        $values = '';
        $setstr = '';
        $set[] = '';

        // Column list for SELECT and INSERT
        if ($this->type === self::SELECT || $this->type === self::INSERT) {
            if (count($this->columns) > 0) {
                $columns = implode(',', $this->columns);
            }
        }

        // Generate table joins
        if ($this->type === self::SELECT && count($this->joins) > 0) {
            foreach ($this->joins as $join) {
                $tmpjoin = sprintf(' %s %s', $join['joinType'], $join['table']);
                if (strlen($join['expr']) > 0) {
                    $tmpjoin .= sprintf(' ON %s %s', $join['expr'], $join['exprValue']);
                }
                $joinexpr .= $tmpjoin;
            }
            if (strlen($joinexpr) > 0) {
                $sql .= $joinexpr;
            }
        }

        // Value list for INSERT
        if ($this->type === self::INSERT) {
            if (count($this->values) > 0) {
                $values = implode(',', $this->values);
            }
        }

        // SET column/value clauses for UPDATE
        $set = array();
        if ($this->type === self::UPDATE || ($this->type === self::INSERT && $this->updateonduplicate === true)) {
            $colcount = count($this->columns);
            for ($x = 0; $x < $colcount; ++$x) {
                $set[] = $this->columns[$x] . '=' . $this->values[$x];
            }
            $setstr = implode(',', $set);
        }

        // WHERE clause
        if ($this->type !== self::INSERT && (strlen($this->directwhere) > 0 || count($this->where) > 0)) {
            $where = '';
            if (strlen($this->directwhere) === 0) {
                $wherecount = count($this->where);
                for ($x = 0; $x < $wherecount; ++$x) {
                    $where .= ( $x > 0 ? ($this->where[$x][2] === true ? ' OR ' : ' AND ') : '') . $this->where[$x][0] . $this->where[$x][1];
                }
            } else {
                $where = $this->directwhere;
            }

            $sql .= ' WHERE ' . $where;
        }

        // GROUP BY .. HAVING
        if (count($this->groupby) > 0) {
            $sql .= ' GROUP BY ' . implode(',', $this->groupby);

            $having = '';
            if (strlen($this->directhaving) == 0) {
                $havingcount = count($this->having);
                for ($x = 0; $x < $havingcount; ++$x) {
                    $having .= ( $x > 0 ? ($this->having[$x][2] === true ? ' OR ' : ' AND ') : '') . $this->having[$x][0] . $this->having[$x][1];
                }
            } else {
                $having = $this->directhaving;
            }

            if (strlen($having) > 0) {
                $sql .= ' HAVING ' . $having;
            }
        } elseif ($this->type !== self::INSERT && count($this->orderBy) > 0) {
            // ORDER BY and LIMIT clauses
            $sql .= ' ORDER BY ' . implode(',', $this->orderBy);
            if ($this->limit > 0) {
                $limit = $this->limitoffset > 0 ? $this->limitoffset . ',' . $this->limit : $this->limit;
                $sql .= ' LIMIT ' . $limit;
            }
        }

        // Construct final result:
        switch ($this->type) {
            case self::SELECT:
                if (strlen($this->table) > 0) {
                    $sql = sprintf($sql, $columns, $this->table);
                } else {
                    $sql = sprintf($sql, $columns);
                }
                break;
            case self::INSERT:
                $sql = sprintf($sql, $this->table, $columns, $values);
                if ($this->updateonduplicate === true) {
                    $sql .= ' ON DUPLICATE KEY UPDATE ' . $setstr;
                }
                break;
            case self::UPDATE:
                $sql = sprintf($sql, $this->table, $setstr);
                break;
            case self::DELETE:
                $sql = sprintf($sql, $this->table);
        }
        return $sql;
    }

    /**
     * Checks if a given value is defined as a constant in this class.
     * @param mixed $valueToCheck The value to check if its defined as a constant.
     */
    private function isConstantValue($valueToCheck) {
        $reflection = new ReflectionClass('SqlBuilder');
        $constants = $reflection->getConstants();
        foreach ($constants as $key => $val) {
            if ($val === $valueToCheck) {
                return true;
            }
        }
        return false;
    }

    /**
     * Indicates whether a prepared statement is used instead of a normal
     * query. If true is passed, all expression values will be replaced
     * by a question mark.
     * @param boolean $value
     * @return void
     */
    public function usingPreparedStatement($value = false) {
        $this->prepared_statement = $value === true ? true : false;
    }

    /**
     * Clears all information in the class. All previous data passed will
     * be erased.
     */
    public function clearAll() {
        $this->table = null;
        $this->limit = null;
        $this->limitoffset = null;
        $this->directhaving = null;
        $this->directwhere = null;
        $this->updateonduplicate = null;
        $this->prepared_statement = false;
        $this->orderBy = array();
        $this->groupby = array();
        $this->having = array();
        $this->where = array();
        $this->columns = array();
        $this->values = array();
        $this->joins = array();
    }

    /**
     * Allows certain parts of the query to be cleared. This is handy if you
     * only need to change the ORDER BY clause for instance.
     * @param string $query_part Optional. Defaults to 'all'. This may be any of 
     * the following values: all, orderBy, where, groupBy, having, select, joins. 
     */
    public function clear($query_part = 'all') {
        switch ($query_part) {
            case 'all': // Entire query
                $this->clearAll();
                break;
            case 'orderBy':
                $this->orderBy = array();
                break;
            case 'where':
                $this->where = array();
                $this->directwhere = null;
                break;
            case 'groupBy':
                $this->groupby = array();
                break;
            case 'having':
                $this->having = array();
                $this->directhaving = null;
                break;
            case 'select': // Columns in SELECT statement
                $this->columns = array();
                break;
            case 'insert': // Columns + values
            case 'update':
                $this->columns = array();
                $this->values = array();
                break;
            case 'joins':
                $this->joins = array();
                break;
        }
    }

}
