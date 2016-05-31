

<?php
echo "Dit is een testomgeving"."<br />";

include("../connect.php");
include 'tempv.html';
?>

<h2 style="text-align:center"> Leskaart </h2>


<?php
$chck = mysqli_query($con2, "INSERT INTO LeerLes(Legenda2_idLegenda2, LeerInstruc_idLeerInstruc, Lesonderdelen_idLesonderdelen)
					VALUES ('".$_POST["leg"]."','".$_POST["idles"]."','".$_POST["leso"]."')");
					
					
IF ($chck)
{
	echo "Les toegevoegd!" . "<br />";
	$idll = $con2->insert_id;
}
ELSE
{
	echo "Ai! Sorry... Foutmelding:" . mysql_error();
}

echo "id leerles is :" . $idll . "<br />";
/*
IMPORT POST LESK
UPDATE LEERLES

OPTIE: 	-TERUG LESK
		-OVERZICHT LESKAART DATUM
		-TERUG OVERZICHT
EXPORT LEERLES
-> POST NAAR LEERLES.PHP 
*/
?>

<h3 style="text-align:center"> OVERZICHT LESKAART </h3>


<form action="over.php" method="POST">
<?php
$lesser = mysqli_query($con2, "SELECT LeerInstruc.Leerling_idLeerling as ll, LeerInstruc.Instructeur_idInstructeur as inst, 
								LeerInstruc.Datum as dat, LeerInstruc.Tijd as td, LeerInstruc.Betaald as bbt
						FROM LeerInstruc, LeerLes
						WHERE LeerInstruc.idLeerInstruc = LeerLes.LeerInstruc_idLeerInstruc	AND LeerLes.LeerInstruc_idLeerInstruc = '". $_POST['idles']."'");


while($score = mysqli_fetch_array($lesser))
{
$ll = $score['ll'];
$inst = $score['inst'];
$dat = $score['dat'];
$td =$score['td'];
$bbt = $score['bbt'];

//echo'-->>'.$score['bbt'].'<<--';
		IF ($score['bbt'] == 0)
		{
			$bet = "Nee";
		}ELSE {
			$bet = "Ja";
		}
$lerrr = mysqli_query($con2, "SELECT Leerling.Voornaam as lvn, Leerling.Achternaam as lan FROM Leerling WHERE Leerling.idLeerling = '".$ll."'"); 
while($lerr = mysqli_fetch_array($lerrr))
{
$llvn = $lerr['lvn'];
$llan = $lerr['lan'];
}

$inss =  mysqli_query($con2, "SELECT Instructeur.Voornaam as ivn, Instructeur.Achternaam as ian FROM Instructeur WHERE Instructeur.idInstructeur = '".$inst."'"); 
while($ins = mysqli_fetch_array($inss))
{
$invn = $ins['ivn'];
$inan = $ins['ian'];

echo "Betaald: " . $bet;
echo "Betaald-oud: " . $score['bbt'];
/*
echo "<table border='2'>
<tr>
<th>Leerling</th><th>Naam</th><th>Instructeur</th><th>Naam</th><th>Datum</th><th>Tijd</th><th>Betaald?</th><th>Type Les</th><th>Lesonderdeel</th><th>Legenda</th></tr>";

$lessr = mysql_query("SELECT LeerInstruc.Leerling_idLeerling as ll, LeerInstruc.Instructeur_idInstructeur as inst, 
								LeerInstruc.Datum as dat, LeerInstruc.Tijd as td, LeerInstruc.Betaald as bbt, LeerLes.Lesonderdelen_idLesonderdelen as lid,
								LeerLes.Legenda2_idLegenda2 as leeg
						FROM LeerInstruc, LeerLes
						WHERE LeerInstruc.idLeerInstruc = LeerLes.LeerInstruc_idLeerInstruc	AND LeerLes.LeerInstruc_idLeerInstruc = '". $_POST['idles']."'");

while($less = mysql_fetch_array($lessr))
  {
  
$lesond = mysql_query("SELECT LesonderdeelNaam as lnm, TypeLes_idTypeLes as tyt FROM Lesonderdelen WHERE Lesonderdelen.idLesonderdelen = '".$less['lid']."' ");

$legio = mysql_query("SELECT Legendanaam as nm FROM Legenda2 WHERE Legenda2.idLegenda2 = '".$less['leeg']."'");


while ($le = mysql_fetch_array($legio))	
{
while ($lo = mysql_fetch_array($lesond))	
{
$typon = mysql_query("SELECT TypeNaam as tii FROM TypeLes WHERE TypeLes.idTypeLes = '".$lo['tyt']."'");
while ($ty = mysql_fetch_array($typon))	
{

$tty = $ty['tii'];
$llo = $lo['lnm'];
echo " ";
$lle = $le['nm'];
/*
echo '<tr>
  <td>'.$llvn.'</td> 
  <td>'.$llan.'</td>
  <td>'.$invn.'</td> 
  <td>'.$inan.'</td>
  <td>'.$dat.'</td>
  <td>'.$td.'</td> 
  <td>'.$bet.'</td> 
  <td>'.$ty['TypeNaam'].'</td>  
  <td>'.$lo['lnm'].'</td>  
  <td>'.$le['nm'].'</td>' ;
  */
}
}

  echo "<br />";
?>
 Voornaam Leerling: <input type="text" name = "aa" VALUE="<?php echo $llvn ?>"/> <br />
 Achternaam Leerling: <input type="text" name = "ab" VALUE="<?php echo $llan ?>"/> <br />
 Voornaam Instructeur: <input type="text" name = "ac" VALUE="<?php echo $invn ?>"/> <br />
 Achternaam Instructeur: <input type="text" name = "ad" VALUE="<?php echo $inan ?>"/> <br />
 Datum: <input type="date" name = "ae" VALUE="<?php echo $dat ?>"/> <br />
 Tijd: <input type="time" name = "af" VALUE="<?php echo $td ?>"/> <br />
 Betaald?: <input type="text" name = "ag" VALUE="<?php echo $bet ?>"/> <br />
 Instruc ID: <input type="number" name = "id" VALUE="<?php echo $_POST['idles'] ?>"/> <br />
 
 <!--
 Type les: <input type="text" name = "ah" VALUE="<?php echo $tty ?>"/> <br />
 Les: <input type="text" name = "ai" VALUE="<?php echo $llo ?>"/> <br />
 Legenda: <input type="text" name = "aj" VALUE="<?php echo $lle ?>"/> <br />
 -->
  <input type="submit" value= "Naar Overzicht"/>
</form>
<h2><a href="http://localhost/verkeer/over.php">Overzicht in Tabel</a> </h2>
<h2>Nog een lesonderdeel toevoegen? </h2>


<form action="xtrales.php" method="POST">
ID lesinstruc: <input type="number" name = "idin" VALUE="<?php echo $_POST["idles"] ?>"/> <br />

<?php
$type = mysqli_query($con2, "SELECT * FROM TypeLes");

echo '<select name="typ">';

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
        ?>