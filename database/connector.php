<?php
include_once 'conn-config.php';   // As functions.php is not included
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);

if ($mysqli->connect_errno) {       
  printf("Connector-file failed: %s\n", $mysqli->connect_error);
exit();
}
