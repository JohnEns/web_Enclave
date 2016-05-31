<?php
//echo "<br><br>";
//$conn = mysql_connect("localhost","root","secret");
//mysql_connect("localhost","root","secret");
//mysql_select_db("vriendenboek");

//if (mysqli_errno($conn)){
//  	echo "verbinding mislukt: " . mysqli_connect_error()};


//
$servername = "localhost";
$username = "root";
$password = "secret";
$dbase = "vriendenboek";
$verkeer = "verkeersschool";
$lorber = "lorber";

$dbkeus = 'ir';

//if ($dbkeus = 'at'){
//$servername = "athena01.fhict.local";
//$username = "dbi249513";
//$password = "XqyGtoHg4V";
//$lorber = "dbi249513";
//}
//else {
//$servername = "localhost";
//$username = "i249513_admin";
//$password = "secret";
//$lorber = "i249513_db";
//}

//// Create connection
//$conn = new mysqli($servername, $username, $password);
//
//// Check connection
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}
//echo "Connected successfully";
//mysql_select_db("vriendenboek");


//Deze werkt. Maar dan alleen met db V-boek
//$conn = mysqli_connect($servername, $username, $password, $dbase) 
//or die("Verbinding mislukt: ". mysqli_connect_error());

//mysql_select_db("vriendenboek");
//echo "Verbinden met database vriendenboek is gelukt!<br>";
//
//$con2 = mysqli_connect($servername, $username, $password, $verkeer) 
//or die("Verbinding mislukt: ". mysqli_connect_error());
//
////mysql_select_db("verkeersschool");
//echo "Verbinden met database verkeersschool is gelukt!<br>";

$conl = mysqli_connect($servername, $username, $password, $lorber) 
or die("Verbinding mislukt: ". mysqli_connect_error());

//mysql_select_db("Lorber");
//echo "Verbinden met database Lorber is gelukt!<br>";


//Dit is voor afzonderlijke db's
//$conn = mysqli_connect($servername, $username, $password) 
//or die("Verbinding mislukt: ". mysqli_connect_error());
//
//
//echo "Verbinden met database is gelukt!";
//
//$con1 = mysql_connect($servername, $username, $password); 
//$con2 = mysql_connect($servername, $username, $password, true); 
//
//mysql_select_db('vriendenboek', $con1);
//mysql_select_db('verkeersschool', $con2);



?> 


