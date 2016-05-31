

<?php
echo "Dit is een testomgeving"."<br />";

include("../connect.php");
include 'tempv.html';
?>

<h2 style="text-align:center"> Toevoegen Mentor </h2>
<?php

$check = mysqli_query($con2, "INSERT INTO Mentor(`Voornaam`, `Achternaam`, `Actief`)
			VALUES ('".$_POST["vn"]."','".$_POST["an"]."','".$_POST["ac"]."')");

/*
INSERT INTO `verkeersschool`.`mentor` (
`idMentor` ,
`Voornaam` ,
`Achternaam` ,
`Actief`
)
VALUES (
NULL , 'XXXX', 'Geen Keuze', '1'
*/

IF ($check)
{
	echo "Mentor toegevoegd!" . "<br />";
}
ELSE
{
	echo "Ai! Sorry... Foutmelding:" . mysql_error();
}

$Mentor = mysqli_query ($con2, "SELECT * FROM Mentor");
?>

<h1>Personalia</h1>

<?php
echo " Personalia";
echo "<table border='2'>
<tr>
<th>id</th>
 <th>Voornaam</th>
 <th>Achternaam</th>
 <th>Actief</th> 
 </tr>";
 
 WHILE ($ler = mysql_fetch_array($Mentor))
{	
echo '<tr><td>'.$ler['idMentor'].'</td>

  <td>'.$ler["Voornaam"].'</td> 
  <td>'.$ler["Achternaam"].'</td>
  <td>'.$ler["Actief"].'</td>  ' ;
} 
		
echo "</table>";

    include 'tempvend.php';
        ?>