

<?php
echo "Dit is een testomgeving"."<br />";

include("../connect.php");
include 'tempv.html';

$leerling = mysqli_query($con2, "SELECT * FROM Leerling WHERE idLeerling = '".$_GET['id']."'");

?>

<h2 style="text-align:center"> Leerling Verwijderen </h2>


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
?>

<h3>Inschrijfinfo</h3>

<?php

$leerles = mysqli_query ($con2, "SELECT * FROM Leerling WHERE idLeerling = '".$_GET['id']."'");

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
	$zr = "Ja";
}
ELSE
{
	$ei = "Nee";
}
IF ($ei == '1')
{
	$ei = "Ja";
}
ELSE
{
	$ei = "Nee";
}
echo "<table border='2'>
<tr>
<th>id</th>
 <th>Voornaam</th>
 <th>Achternaam</th>
 <th>Inschrijfdatum</th>
  <th>AantalLessen</th>
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
    <td>'.$leer["TheorieNr"].'</td> 
    <td>'.$leer["AfgifteTheorie"].'</td> 
    <td>'.$oog.'</td> 
    <td>'.$ei.'</td>  
    <td>'.$zr.'</td> 
    <td>'.$leer["ExtraInfo"].'</td>  
  ' ;
} 
		
echo "</table>";
?>




<form action="dell.php" method="POST">
<h1 style="text-align:center;">Weet u zeker dat u deze leerling wilt verwijderen?</h1><br />
  <input type="checkbox" name="del" value="0"> Ja <br /> 
  <input type="checkbox" name="del" value="1"> Nee <br />   <br /> 
   <br />
 <input type="submit" value= "Verwijder leerling"/>
</form>

<?php

    include 'tempvend.php';
        ?>