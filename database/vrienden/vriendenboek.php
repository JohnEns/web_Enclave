<?php
$pagina = basename(__FILE__);
$title = "Enclave - Vriendenboek";

include '../tempd.html';
include("../connect.php");
?>
<h3> Overzichtstabel Vriendenboek </h3>

<?php
//        $vrienden = mysql_query("SELECT vrienden.id AS id, 
//                                        vrienden.voornaam AS vn, 
//					vrienden.achternaam AS an, 
//                                        vrienden.beschrijving AS bs,
//                                            FROM vrienden");

$query = "SELECT * FROM vrienden";

// SQL runnen:
$result = mysqli_query($conn, $query) or die("query fout " . mysqli_error($conn));

echo "<table border='1'>
    <tr>
<th>Voornaam</th>
<th>Achternaam</th>
<th>Beschrijving</th>
<th>Bewerk</th>
<th>Verwijder</th>
<th>Bekijk Projecten</th>
</tr>";

while ($record = mysqli_fetch_array($result)) {
    $voornaam = $record['voornaam'];
    $achternaam = $record['achternaam'];
    $bs = $record['beschrijving'];

    echo "<tr><td>" . $voornaam . "</td><td>" .
    $achternaam . "</td><td>" .
    $bs . "</td></tr>";
}
echo "</table> <br>";


$auquery = "SELECT * FROM automerken";

// SQL runnen:
$auresult = mysqli_query($conn, $auquery) or die("query fout " . mysqli_error($conn));

echo "<table border='1'>
    <tr>
<th>Voornaam</th>
<th>Achternaam</th>
<th>Beschrijving</th>
<th>Bewerk</th>
<th>Verwijder</th>
<th>Bekijk Projecten</th>
</tr>";

while ($aurecord = mysqli_fetch_array($auresult)) {
    $merk = $aurecord['merk'];
    $type = $aurecord['type'];
    $info = $aurecord['info'];

    echo "<tr><td>" . $merk . "</td><td>" .
    $type . "</td><td>" .
    $info . "</td></tr>";
}
echo "</table>";
//
//  $query = "SELECT * FROM vrienden";
//
//// SQL runnen:
//$result=mysqli_query($query, $con1) or die("query fout " . mysqli_error($con1) );
//
//echo "<table border='1'>
//    <tr>
//<th>Voornaam</th>
//<th>Achternaam</th>
//<th>Beschrijving</th>
//<th>Bewerk</th>
//<th>Verwijder</th>
//<th>Bekijk Projecten</th>
//</tr>";
//
//while( $record=mysqli_fetch_array($result) ) {
//  	$voornaam=$record['voornaam'];
//	$achternaam=$record['achternaam'];
//        $bs= $record['beschrijving'];
//        
//	echo "<tr><td>" . $voornaam ."</td><td>" . 
//                  $achternaam ."</td><td>" . 
//                  $bs ."</td></tr>";	
//}
//echo "</table> <br>";  
//
//
//$auquery = "SELECT * FROM automerken";
//
//// SQL runnen:
//$auresult=mysqli_query($con1, $auquery) or die("query fout " . mysqli_error($con1) );
//
//echo "<table border='1'>
//    <tr>
//<th>Voornaam</th>
//<th>Achternaam</th>
//<th>Beschrijving</th>
//<th>Bewerk</th>
//<th>Verwijder</th>
//<th>Bekijk Projecten</th>
//</tr>";
//
//while( $aurecord=mysqli_fetch_array($auresult) ) {
//  	$merk=$aurecord['merk'];
//	$type=$aurecord['type'];
//        $info= $aurecord['info'];
//        
//	echo "<tr><td>" . $merk ."</td><td>" . 
//                  $type ."</td><td>" . 
//                  $info ."</td></tr>";	
//}
//echo "</table>"; 
?>

<h2><a href="../index.php">Terug naar database-index </a></h2>

<?php
include '../tempdend.php';
?>


