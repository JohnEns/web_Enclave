

<?php
echo "Dit is een testomgeving"."<br />";

include("../connect.php");
include 'tempv.html';
?>

<h2 style="text-align:center"> Overzicht Les </h2>


<?php
/*
OPTIE: 	-TERUG LESK
		-OVERZICHT LESKAART DATUM
		-TERUG OVERZICHT
EXPORT LEERLES
-> POST NAAR LEERLES.PHP 
*/
?>

<h3 style="text-align:center"> OVERZICHT LESKAART </h3>

<?php
echo "<table border='2'>
<tr>
<th>Leerling</th><th>Naam</th><th>Instructeur</th><th>Naam</th><th>Datum</th><th>Tijd</th><th>Betaald?</th></tr>";

echo '<tr>
  <td>'.$_POST['aa'].'</td>
    <td>'.$_POST['ab'].'</td>
    <td>'.$_POST['ac'].'</td>
    <td>'.$_POST['ad'].'</td>
    <td>'.$_POST['ae'].'</td>
    <td>'.$_POST['af'].'</td>
    <td>'.$_POST['ag'].'</td>';
  
  echo "</table>";

$lessr = mysqli_query($con2, "SELECT LeerLes.Lesonderdelen_idLesonderdelen as lid,
								LeerLes.Legenda2_idLegenda2 as leeg
						FROM LeerLes
						WHERE LeerLes.LeerInstruc_idLeerInstruc = '". $_POST['id']."'");
echo "<table border='2'>
<tr>  
<th>Type Les</th><th>Lesonderdeel</th><th>Legenda</th></tr>";
while($less = mysqli_fetch_array($lessr))
  {
  $ond = $less['lid'];
  $lgd = $less['leeg'];
  
  
$lesond = mysqli_query($con2, "SELECT LesonderdeelNaam as lnm, TypeLes_idTypeLes as tyt FROM Lesonderdelen WHERE Lesonderdelen.idLesonderdelen = '".$ond."' ");
$legenda = mysqli_query($con2, "SELECT Legendanaam as nmo FROM Legenda2 WHERE Legenda2.idLegenda2 = '".$lgd."' ");
  


while ($le = mysqli_fetch_array($lesond))	
{
 while ($la = mysqli_fetch_array($legenda))	
 {
echo '<tr>
  <td>'.$le['tyt'].'</td>
    <td>'.$le['lnm'].'</td>
    <td>'.$la['nmo'].'</td>';
}
}
}
  echo "</table>";

  ?>
 
</form>
<!--
<h2>Nog een lesonderdeel toevoegen? </h2>


<form action="xtrales.php" method="POST">
ID lesinstruc: <input type="number" name = "idin" VALUE="<?php echo $_POST["idles"] ?>"/> <br />
-->
<?php
/*
$type = mysql_query("SELECT * FROM TypeLes");

echo '<select name="typ">';

while($rij = mysql_fetch_array($type))
{
	echo '<option value="'.$rij['idTypeLes'].'">Type Les:'.$rij['TypeNaam'] . '</option>'.'<br />';
	echo "<br />";
	echo "<br />";
}
echo'</select>';
*/
?>
<!--
 <br />
 <input type="submit" value= "Voeg Type les toe"/>
</form>


-->

<h2>Nog een lesonderdeel toevoegen? </h2>


<form action="xtrales.php" method="POST">
ID lesinstruc: <input type="number" name = "idin" VALUE="<?php echo $_POST['id'] ?>"/> <br />

<?php
$type = mysqli_query($con2, "SELECT * FROM TypeLes");

echo '<select name="type">';

while($rij = mysqli_fetch_array($type))
{
	echo '<option value="'.$rij['idTypeLes'].'">Type Les:'.$rij['TypeNaam'] . '</option>'.'<br />';
	echo "<br />";
	echo "<br />";
}
echo'</select>';

?>
 <br />
 <input type="submit" value= "Voeg Type les toe"/>
</form>

<?php

    include 'tempvend.php';
     