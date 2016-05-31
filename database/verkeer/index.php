



<?php
echo "Dit is een testomgeving"."<br />";

include("../connect.php");
include 'tempv.html';
?>
<h2> Leerlingen </h2>
<?php
//  $query = "SELECT * FROM leerling";
//
//// SQL runnen:
//$result=mysqli_query($con2, $query) or die("query fout " . mysqli_error($con2) );
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
//  	$voornaam=$record['Voornaam'];
//	$achternaam=$record['Achternaam'];
//        $bs= $record['Adres'];
//        
//	echo "<tr><td>" . $voornaam ."</td><td>" . 
//                  $achternaam ."</td><td>" . 
//                  $bs ."</td></tr>";	
//}
//echo "</table> <br>"; 

$leerling = mysqli_query($con2, "SELECT Leerling.idLeerling AS id, 
								Leerling.Voornaam AS vn, 
								Leerling.Achternaam AS an, 
								Mentor.Voornaam AS ment, 
								Mentor.Achternaam AS mena 
								FROM Leerling,Mentor
								WHERE Leerling.Mentor_idMentor = Mentor.idMentor AND `Leerling`.`Actief` = '1'");

echo "<table border='2'>
<tr>
<th>ID</th>
<th>Voornaam</th>
<th>Achternaam</th>
<th>Mentor</th>
<th>Mentor</th>
<th>Bewerk</th>
<th>Verwijder</th>
</tr>";

while($leerl = mysqli_fetch_array($leerling))
  {
  echo '<tr><td>' . $leerl['id'] . '</td> 
 <td>' . $leerl["vn"] . '</td>' . '  
 <td>' . $leerl["an"] . ' </td> ' . '
  <td>' . $leerl["ment"] . ' </td>' . '
  <td>' . $leerl["mena"] . ' </td>' . '
  <td><a href ="bewerkleer.php?id='.$leerl["id"].'">Bewerk</a></td>' . '
  <td><a href ="delleer.php?id='.$leerl["id"].'">Verwijder</a></td>';
  /*
  <td><a href ="bewerkleer.php?id='.$leerl["id"].'">Bewerk</a></td>' . '
  <td><a href ="delleer.php?id='.$leerl["id"].'">Verwijder</a></td>' . ';
  */
  
  
  }
  echo "</table>";
  
/*

  */
?>
 <h2><a href="http://localhost/verkeer/verwleer.php">Verwijderde leerlingen</a> </h2>
<h2> Instructeur </h2>
<?php
$instruc = mysqli_query($con2, "SELECT * FROM Instructeur WHERE `Actief`= '1'");

echo "<table border = '2'>
<tr><th><b>ID</th></b>
<th><b>Voornaam</th></b>
<th><b>Achternaam</th></b>
</tr>";

WHILE ($inst = mysqli_fetch_array($instruc))
{
echo '<tr><td>'.$inst["idInstructeur"].'</td>
<td>'.$inst["Voornaam"].'</td>
<td>'.$inst["Achternaam"].' </td></tr>';
}
  echo "</table>";

?>

<!--
<h2 style="text-align:center"> Toevoegen </h2>

<h3 style="text-align:center"> Kies Mentor!! </h3>


<form action="toevoegen.php" method="POST">

-->
<?php
/*
$mentor = mysql_query("SELECT * FROM Mentor");
					
echo'<select name="mijnkeuze">';
while($rij = mysql_fetch_array($mentor))
{
	echo '<option value="'.$rij['idMentor'].'">Mentor:'.$rij['Voornaam'] . ' '.$rij['Achternaam'].'</option>'.'<br />';
	echo "<br />";
	echo "<br />";
}
echo'</select>';
?>
<br />
<br />
  Voornaam: <input type="text" name = "vn"> <br />
  Achternaam: <input type="text" name = "an"> <br />
  Adres: <input type="text" name = "ad"> <br />
  Postcode: <input type="text" name = "pc"> <br />
  Woonplaats: <input type="text" name = "wp"> <br /> 
  Geboortedatum(YYYY-MM-DD): <input type="date" name = "gd"> <br /> 
  Geboorteplaats: <input type="text" name = "gp"> <br />
  Telefoonnummer Vast: <input type="tel" name = "tv"> <br />
  Telefoonnummer Mobiel: <input type="tel" name = "tm"> <br />
  Emailadres: <input type="email" name = "em"> <br />
  Inschrijfdatum(YYYY-MM-DD): <input type="date" name = "in"> <br /> 
  Aantal Lessen: <input type="number" name = "ls"> <br />
  Theorie Nr: <input type="text" name = "tn"> <br />
  Afgiftedatum Theorie(YYYY-MM-DD): <input type="date" name = "at"> <br />
  Ogentest<br />
  <input type="checkbox" name="oog" value="z"> zonder bril <br />
  <input type="checkbox" name="oog" value="m"> met bril <br />
  <input type="checkbox" name="oog" value="c"> contactlenzen <br />
  <input type="checkbox" name="oog" value="o"> onvoldoende <br />
  <br />
  Eigen Verklaring gelezen?  <br />
  <input type="checkbox" name="ev" value="1"> Ja <br /> 
  <input type="checkbox" name="ev" value="0"> Nee <br />   <br /> 
 Zelfreflectieformulier ingeleverd?  <br />
  <input type="checkbox" name="zr" value="1"> Ja <br /> 
  <input type="checkbox" name="zr" value="0"> Nee <br /> 
  Extra Info: <input type="text" name = "ei"> <br /> 
  <br />
 <input type="submit" value= "Voeg leerling toe"/>
</form>
*/

/*
$klunten = mysql_query("SELECT Klant.idKlant AS id, 
								Klant.Contactpersoon_Voornaam AS vn, 
								Klant.Klantnaam AS kln, 
								Klant.Contactpersoon_Achternaam AS an,
								Klant.Woonplaats AS wp
								FROM Klant");
					
								
echo "<table border='2'>
<tr>
<th>Klant ID</th>
<th>Klantnaam</th>
<th>Voornaam</th>
<th>Achternaam</th>
<th>Woonplaats</th>
<th>Bewerk</th>
<th>Verwijder</th>
<th>Bekijk Projecten</th>
</tr>";

while($klunt = mysql_fetch_array($klunten))
 {
  echo '<tr><td>' . $klunt['id'] . '</td> 
 <td>' . $klunt['kln'] . '</td>' . '  
 <td>' . $klunt["vn"] . ' </td> ' . '
<td>' . $klunt["an"] . ' </td> ' . '
<td>' . $klunt["wp"] . ' </td> ' . '
 <td><a href ="update.php?id='.$klunt['id'].'">Bewerk</a></td>' . '
  <td><a href ="verwijder.php?id='.$klunt['id'].'">Verwijder</a></td>' . '
  <td><a href ="bekijk.php?id='.$klunt['id'].'">Bekijk projecten</a></td>'; 

  }
  
 
echo "</table>";
?>

<h2 style="text-align:center"> Voeg een nieuwe klant toe: </h2>
<!--html form -->

<form action="toevoegen.php" method="POST">
	Klantnaam:        <input type="text"  name="kln"> <br />
	Voornaam Contact:  <input type="text" name="kvn"> <br />
	Achternaam Contact:<input type="text" name="kan"> <br />
	Woonplaats:       <input type="text" name="wp"> <br />
	<input type="submit" value="Voeg klant toe" name="sub"/>
</form>

<h2 style="text-align:center"> Voeg een nieuw project toe: </h2>
<h3 style="text-align:center"><b><a href="http://localhost/caterrcgo/project.php">Klik HIER!!</a></b></h3><br>

<?php




/*

 echo "<br />";
 echo date("Y/m/d") . "<br />";
 echo date("d/m/Y") . "<br />";
 
 
 
 $file=fopen("texttest.txt","r") or exit("Unable to open file!");
 while(!feof($file))
  {
  echo fgets($file). "<br />";
  }
fclose($file);

echo "<br />";
echo "<br />";


$file=fopen("texttesss.txt","r") or exit("Unable to open file!");
while (!feof($file))
  {
  echo fgetc($file);
  }
fclose($file);

echo "<br />";
echo "<br />";
*/
 ?>

 <?php
 /*
 $projecten = mysql_query("SELECT * FROM Project WHERE project.Klant_idKlant IS NULL");
 
 echo "<table border='2'>
<tr>
<th>Project ID</th>
<th>Projectnaam</th>
<th>Startdatum</th>
<th>Einddatum</th>
<th>Budget</th>
</tr>";
 
 while($project= mysql_fetch_array($projecten))
 {
	echo '<tr><td>' .$project['idProject'] . '</td>
	<td>' . $project['Projectnaam']. '</td>
	<td> ' . $project['Startdatum']. '</td>
	<td> ' . $project['Einddatum']. '</td>
	<td> ' . $project['Budget']. '</td></br>';
 
 
 
 
 }

echo "</table>";
 echo "<br />";
  echo "<br />";
*/

        include 'tempvend.php';
        ?>
