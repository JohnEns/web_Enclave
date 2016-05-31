<?php
include_once 'psl-config.php';   // As functions.php is not included
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);

if ($mysqli->connect_errno) {       
  printf("Connect failed: %s\n", $mysqli->connect_error);
exit();
}

//$conp = mysqli_connect($servername, $username, $password, $lorber) 
//or die("Verbinding mislukt: ". mysqli_connect_error());
//
////mysql_select_db("Lorber");
//echo "Verbinden met database Login is gelukt!<br>";