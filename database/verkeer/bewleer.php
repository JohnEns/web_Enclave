

<?php
echo "Dit is een testomgeving"."<br />";

include("../connect.php");
include 'tempv.html';
?>
<h2 style="text-align:center"> Leerling Bewerking </h2>
<?php

ECHO  $_POST['id'];

$controle = ("UPDATE 'Leerling' SET 'Voornaam'='".$_POST['vn']."',
									'Achternaam' = '".$_POST['an']."',
							
									�Adres� ='".$_POST['ad']."',
									  �Postcode�='".$_POST['pc']."',
									  �Woonplaats�='".$_POST['wp']."', 
									  �Geboortedatum� ='".$_POST['gd']."',
									  �Geboorteplaats�='".$_POST['gp']."',
									  �TelefoonnummerVast� ='".$_POST['tv']."',
									  �TelefoonnummerMobiel� ='".$_POST['tm']."',
									  �Emailadres� ='".$_POST['em']."',
									  �Inschrijfdatum� ='".$_POST['in']."',
									  �AantalLessen� ='".$_POST['ls']."',
									  �Mentor_idMentor� ='".$_POST['mijnkeuze']."',
									  �TheorieNr� ='".$_POST['tn']."',
									  �AfgifteTheorie� ='".$_POST['at']."',
									  �Ogentest� ='".$_POST['oog']."',
									  �EigVerklaring� ='".$_POST['ev']."',
									  �ZelfRef� ='".$_POST['zr']."',
									  �ExtraInfo�='".$_POST['ei']."',
									  `Actief`='".$_POST['ac']."'
									WHERE Leerling.idLeerling = '".$_POST['id']."' ");

IF ($controle)
{
	echo "Leerling bewerkt!"."<br />";
}
ELSE
{
	echo "Oeps.... Fout: ". mysql_error();
}
$leerling = mysql_query ("SELECT * FROM Leerling WHERE Leerling.idLeerling = '".$_POST['id']."'");
?>

<h3>Personalia</h3>

<?php
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
 
 WHILE ($leer = mysql_fetch_array($leerling))
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
?>

<h3>Inschrijfinfo</h3>

<?php
$leerles = mysqli_query ($con2, "SELECT * FROM Leerling WHERE Leerling.idLeerling = '".$_POST['id']."'");
$mentos = mysqli_query($con2, "SELECT * FROM Mentor WHERE idMentor = '".$_POST['mijnkeuze']."'");
$mini = mysqli_fetch_array($mentos);
$oog = $leer['Ogentest'];
$ei = $leer['EigVerklaring'];
$zr = $leer['ZelfRef'];

IF ($oog == "z")
{
	$oog = "zonder bril";
}

IF ($oog == "m")
{
	$oog = "met bril";
}
IF ($oog == "c")
{
	$oog = "met contactlenzen";
}
IF ($oog == "o")
{
	$oog = "onvoldoende";
}
IF ($zr == '1')
{
	$ze = "Ja";
}
ELSE
{
	$ze = "Nee";
}
IF ($ei == '1')
{
	$ev = "Ja";
}
ELSE
{
	$ev = "Nee";
}
echo "<table border='2'>
<tr>
<th>id</th>
 <th>Voornaam</th>
 <th>Achternaam</th>
 <th>Inschrijfdatum</th>
  <th>AantalLessen</th>
  <th>Mentor</th>
  <th>Mentor</th>
  <th>TheorieNr</th>
  <th>AfgifteTheorie</th> 
  <th>Ogentest</th>
  <th>EigVerklarin</th> 
  <th>ZelfRef</th>
  <th>ExtraInfo</th>
 
 </tr>";
 
 WHILE ($leer = mysqli_fetch_array($leerles))
{	
echo '<tr><td>'.$leer['idLeerling'].'</td>

  <td>'.$leer["Voornaam"].'</td> 
  <td>'.$leer["Achternaam"].'</td>
     <td>'.$leer["Inschrijfdatum"].'</td> 
    <td>'.$leer["AantalLessen"].'</td> 
    <td>'.$mini["Voornaam"].'</td> 
	<td>'.$mini["Achternaam"].'</td> 
    <td>'.$leer["TheorieNr"].'</td> 
    <td>'.$leer["AfgifteTheorie"].'</td> 
    <td>'.$oog.'</td> 
    <td>'.$ev.'</td>  
    <td>'.$ze.'</td> 
    <td>'.$leer["ExtraInfo"].'</td>  
  ' ;
} 
		
echo "</table>";


?>


    include 'tempvend.php';
        ?>
