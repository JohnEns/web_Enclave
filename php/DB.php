<?php
/* 
 * MySQLite: A MySQL to SQLite database converter. Convenience class for database interaction.
 * Author: Tristan Goedendorp
 * This software is provided under the MIT license.
 * Copyright (C) 2013 Tristan Goedendorp
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

/**
 * Convenience class for database interaction.
 */
class DB extends mysqli
{
	protected $appdb;
	protected $server;
	protected $username;
	protected $password;
	protected $lasterror;
	protected $timeout;

	/**
	 * @param string The name or IP address of the database server to connect to.
	 * @param string Username.
	 * @param string Password.
	 * @param string Default database to select. [optional]
	 * @param boolean Enable auto commit on database transactions. [optional]
	 * @param integer Connection time out in seconds. [optional]
	 */
	public function __construct($server, $username, $password, $db = "", $autoCommit = false, $timeout = 900)
	{
		parent::init();

		$this->server = $server;
		$this->username = $username;
		$this->password = $password;
		$this->appdb = $db;

		// Do other stuff if connection is established
		if ($this->timeout > 0)
			parent::options(MYSQLI_OPT_CONNECT_TIMEOUT, $timeout);

		if ($autoCommit == true)
			parent::options(MYSQLI_INIT_COMMAND, sprintf("SET AUTOCOMMIT = %d", $autoCommit ? 1 : 0));

		if (!parent::real_connect($server, $username, $password, $db))
		{
			// @todo: More elegant solution for error handling
			die("can't connect to database.");
		}

		// Make sure all results are set and sent back as UTF8.
		parent::query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8';");
	}

	/**
	 * Prepares and/or executes a given SQL statement. Use this if the same query
	 * is used multiple times so the db engine can cache an execution plan
	 * for it to speed up execution.
	 * @param String $sql SQL statement to prepare and execute.
	 * @param Array $params Optional. Array of parameter values to bind.
	 * @param Boolean $enableTransaction Set to True to enable transaction mode.
	 * Defaults to true.
	 * @return mixed Query result. Defaults to null.
	 */
	public function exec($sql, $params = null, $enableTransaction = true)
	{
		$res = null; // var to contain the result set.
		$this->lasterror = null; // reset last error.
		// Prepare statement or not
		$prep = count($params) > 0;

		if ($prep)
		{
			// Prepare query
			$pstatement = parent::prepare($sql);

			// Bind parameters
			for ($count = 0; $count < count($params); $count++) {
				$pstatement->bind_param($count, $params[$count]);
			}

			// Execute query
			$pstatement->execute();
		} else
		{
			$res = parent::query($sql, MYSQLI_STORE_RESULT);
		}

		// Check for errors and commit/rollback if needed.
		if ($this->checkForErrors($sql))
		{
			if ($enableTransaction == true)
				parent::rollback();
		}
		else
		{
			if ($enableTransaction == true && !$this->isAutoCommitSet())
				parent::commit();

			if ($prep)
			{
				// Bind result
				$pstatement->bind_result($res);
				$pstatement->fetch();
			}
		}

		// Close statement
		if ($prep)
			$pstatement->close();

		// Return result
		return $res;
	}

	/**
	 * Calls a given callback function with each row found in a given query.
	 * @return void
	 * @param string The SQL query statement to execute.
	 * @param string The name of the callback function to call. An Array for
	 * each row is passed as the first parameter value.
	 */
	public function walkRows($sql, $callbackFunc)
	{
		$val = $this->exec($sql, null, false);
		while ($row = $val->fetch_array(MYSQLI_BOTH)) {
			call_user_func($callbackFunc, $row);
		}
	}

	/**
	 * @return Array An array of the first row in the result set.
	 * @param string SQL query to execute.
	 */
	public function getRow($sql)
	{
		$val = $this->exec($sql, null, false);
		if ($val && $val->num_rows > 0)
		{
			return $val->fetch_array(MYSQLI_BOTH);
		} else
		{
			return null;
		}
	}

	/**
	 * Executes a given query and returns the value from the first column in the
	 * first row of the result set.
	 * @return object The first value from the result set.
	 * @param string SQL query to execute.
	 */
	public function getValue($sql)
	{
		$val = $this->getRow($sql);
		if (count($val) > 0)
		{
			return $val[0];
		} else
		{
			return "";
		}
	}

	/**
	 * Short hand function to escape strings for use in a SQL statement.
	 * @return string An escaped string.
	 * @param string The string to escape for use in a SQL statement.
	 */
	public function esc($str)
	{
		return $this->real_escape_string($str);
	}

	/**
	 * @return string Date format string as used in the database.
	 */
	public static function dateFormat()
	{
		return "Y/m/d";
	}

	/**
	 * @return string Date and time format string as used in the database.
	 */
	public static function dateTimeFormat()
	{
		return "Y/m/d H:i:s";
	}

	/**
	 * @return boolean True if auto commit is enabled, false otherwise.
	 */
	public function isAutoCommitSet()
	{
		$val = $this->getValue("SELECT @@autocommit");
		if ($val == 1)
		{
			return true;
		} else
		{
			return false;
		}
	}

	/**
	 * Checks if database errors occurred.
	 * @return boolean True if an error occurred, false otherwise.
	 */
	private function checkForErrors($sql = "")
	{
		if ($this->errno || $this->connect_errno > 0)
		{
			$this->lasterror = array("errno" => $this->errno,
				"error" => $this->error,
				"query" => $sql,
				"connerrno" => $this->connect_errno);
			return true;
		}
		return false;
	}

	/**
	 * Formats and escapes a given value for use in a SQL statement.
	 * @param mixed $value Value to format for a SQL statement.
	 * @return mixed Formatted value.
	 */
	public function formatValue($value)
	{
		if (!isset($value))
			return "NULL";

		if (is_bool($value))
			return $value === true ? 1 : 0;

		if (is_int($value) || is_double($value))
			return $value;

		if ($value instanceof DateTime)
			return "'" . $value->format(DB::dateTimeFormat()) . "'";

		return sprintf("'%s'", $this->esc($value));
	}

	/**
	 * Returns an array of information about the last database error that occurred.
	 * This value is reset everytime a new query is performed.
	 * @return array|null Null if no error occurred, an array with error information otherwise.
	 */
	public function getLastError()
	{
		return $this->lasterror;
	}

}

?>
