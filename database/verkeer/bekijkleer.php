

<?php
echo "Dit is een testomgeving"."<br />";

include("../connect.php");
include 'tempv.html';
?>
<h2 style="text-align:center"> Leerlingen Overzicht </h2>
<?php
$leerling = mysqli_query ($con2, "SELECT * FROM Leerling WHERE Leerling.Actief = '1' ");
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
$leerles = mysqli_query ($con2, "SELECT * FROM Leerling WHERE Leerling.Actief =  '1' ");
echo "<table border='2'>
<tr>
<th>id</th>
 <th>Voornaam</th>
 <th>Achternaam</th>
 <th>Inschrijfdatum</th>
  <th>AantalLessen</th>
  <th>Mentor_idMentor</th>
  <th>TheorieNr</th>
  <th>AfgifteTheorie</th> 
  <th>Ogentest</th>
  <th>EigVerklarin</th> 
  <th>ZelfRef</th>
  <th>ExtraInfo</th>
 
 </tr>";
 
 WHILE ($leer = mysql_fetch_array($leerles))
{	
echo '<tr><td>'.$leer['idLeerling'].'</td>

  <td>'.$leer["Voornaam"].'</td> 
  <td>'.$leer["Achternaam"].'</td>
     <td>'.$leer["Inschrijfdatum"].'</td> 
    <td>'.$leer["AantalLessen"].'</td> 
    <td>'.$leer["Mentor_idMentor"].'</td> 
    <td>'.$leer["TheorieNr"].'</td> 
    <td>'.$leer["AfgifteTheorie"].'</td> 
    <td>'.$leer["Ogentest"].'</td> 
    <td>'.$leer["EigVerklaring"].'</td>  
    <td>'.$leer["ZelfRef"].'</td> 
    <td>'.$leer["ExtraInfo"].'</td>  
 
 
 
 ' ;
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

