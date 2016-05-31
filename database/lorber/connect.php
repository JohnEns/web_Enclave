<?php

$servername = "localhost";
$username = "root";
$password = "secret";
$dbase = "vriendenboek";
$verkeer = "verkeersschool";
$lorber = "lorber";

$conl = mysqli_connect($servername, $username, $password, $lorber) 
or die("Verbinding mislukt: ". mysqli_connect_error());

//mysql_select_db("Lorber");
echo "Verbinden met database Lorber is gelukt!<br>";

?>



