

<?php
echo "Dit is een testomgeving"."<br />";

include("../connect.php");
include 'tempv.html';
?>
<h2 style="text-align:center"> Toevoegen Leerling </h2>
<?php


$zr = $_POST['zr'];

if(empty($_POST['zr']))
{
	$zr = '0';
}

echo'-->'.$zr;
echo'-->'.$_POST["mijnkeuze"];
/*
$check = mysql_query("INSERT INTO Leerling(`Voornaam`, `Achternaam`, `Adres`,`ZelfRef`)
			VALUES ('".$_POST["vn"]."','".$_POST["an"]."','".$_POST["ad"]."','".$zr."')");
			*/
$check = mysqli_query($con2, "INSERT INTO Leerling(`Voornaam`, `Achternaam`, `Adres`, `Postcode`, `Woonplaats`, `Geboortedatum`, `Geboorteplaats`, 
								`TelefoonnummerVast`, `TelefoonnummerMobiel`, `Emailadres`, `Inschrijfdatum`, `AantalLessen`,  
								`Mentor_idMentor`, `TheorieNr`, `AfgifteTheorie`, `Ogentest`, `EigVerklaring`, `ZelfRef`, `ExtraInfo`)
			VALUES ('".$_POST["vn"]."','".$_POST["an"]."','".$_POST["ad"]."','".$_POST["pc"]."','".$_POST["wp"]."','".$_POST["gd"]."','".$_POST["gp"]."',
					'".$_POST["tv"]."','".$_POST["tm"]."','".$_POST["em"]."','".$_POST["in"]."','".$_POST["ls"]."','".$_POST["mijnkeuze"]."','".$_POST["tn"]."','".$_POST["at"]."',
					'".$_POST["oog"]."','".$_POST["ev"]."','".$zr."','".$_POST["ei"]."')");



IF ($check)
{
	echo "Leerling toegevoegd!" . "<br />";
}
ELSE
{
	echo "Ai! Sorry... Foutmelding:" . mysql_error();
}

$leerling = mysqli_query ($con2, "SELECT * FROM Leerling");
?>

<h1>Personalia</h1>

<?php
echo " Personalia";
echo "<table border='2'>
<tr>
<th>id</th>
 <th>Voornaam</th>
 <th>Achternaam</th>
 <th>Adres</th>
 <th>Postcode</th>
 <th>Woonplaats</th>
  <th>Geboortedatum</th>
 <th>Geboorteplaats</th>
 <th>Telefoon Vast</th> 
 <th>Telefoon Mobiel</th> 
 <th>Emailadres</th>
 
 </tr>";
 
 WHILE ($leer = mysqli_fetch_array($leerling))
{	
echo '<tr><td>'.$leer['idLeerling'].'</td>

  <td>'.$leer["Voornaam"].'</td> 
  <td>'.$leer["Achternaam"].'</td>
  <td>'.$leer["Adres"].'</td> 
  <td>'.$leer["Postcode"].'</td>
  <td>'.$leer["Woonplaats"].'</td>
  <td>'.$leer["Geboortedatum"].'</td> 
  <td>'.$leer["Geboorteplaats"].'</td> 
  <td>'.$leer["TelefoonnummerVast"].'</td>  
  <td>'.$leer["TelefoonnummerMobiel"].'</td>
  <td>'.$leer["Emailadres"].'</td>' ;
} 
		
echo "</table>";

/*
     
    <td>'.$leer["Inschrijfdatum"].'</td> 
    <td>'.$leer["AantalLessen"].'</td> 
    <td>'.$leer["Mentor_idMentor"].'</td> 
    <td>'.$leer["TheorieNr"].'</td> 
    <td>'.$leer["AfgifteTheorie"].'</td> 
    <td>'.$leer["Ogentest"].'</td> 
    <td>'.$leer["EigVerklaring"].'</td>  
    <td>'.$leer["ZelfRef"].'</td> 
    <td>'.$leer["ExtraInfo"].'</td>  
 
 
 
 
  <th>Inschrijfdatum</th>
  <th>AantalLessen</th>
  <th>Mentor_idMentor</th>
  <th>TheorieNr</th>
  <th>AfgifteTheorie</th> 
  <th>Ogentest</th>
  <th>EigVerklarin</th> 
  <th>ZelfRef</th>
  <th>ExtraInfo</th>
*/

/*

WHILE ($leer = mysql_fetch_array($leerling))
{	
		echo

}
*/

    include 'tempvend.php';
        ?>
