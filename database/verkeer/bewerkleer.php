

<?php
echo "Dit is een testomgeving"."<br />";

include("../connect.php");
include 'tempv.html';

$leergegevens = mysqli_query($con2, "SELECT * FROM Leerling WHERE idLeerling = '".$_GET['id']."'");

$leer = mysqli_fetch_array($leergegevens);

$mentos = mysqli_query($con2, "SELECT * FROM Mentor WHERE idMentor = '".$leer['Mentor_idMentor']."'");
$mini = mysql_fetch_array($mentos);

$oog = $leer['Ogentest'];
$ei = $leer['EigVerklaring'];
$zr = $leer['ZelfRef'];
$ac = $leer['Actief'];

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
IF ($ac == '1')
{
	$ac = "Ja";
}
ELSE
{
	$ac = "Nee";
}
?>

<h2 style="text-align:center"> Leerling Bewerken </h2>

<form action = "bewleer.php" method = "POST">
		
  Leerling ID: <input type="number" name = "id" VALUE="<?php echo $leer['idLeerling'] ?>"/> <br />
 Voornaam: <input type="text" name = "vn" VALUE="<?php echo $leer['Voornaam'] ?>"/> <br />
  Achternaam: <input type="text" name = "an" VALUE="<?php echo $leer['Achternaam'] ?>"/> <br />
  Adres: <input type="text" name = "ad" VALUE="<?php echo $leer['Adres'] ?>"/> <br />
  Postcode: <input type="text" name = "pc" VALUE="<?php echo $leer['Postcode'] ?>"/> <br />
  Woonplaats: <input type="text" name = "wp" VALUE="<?php echo $leer['Woonplaats'] ?>"/> <br /> 
  Geboortedatum(YYYY-MM-DD): <input type="date" name = "gd" VALUE="<?php echo $leer['Geboortedatum'] ?>"/> <br /> 
  Geboorteplaats: <input type="text" name = "gp" VALUE="<?php echo $leer['Geboorteplaats'] ?>"/> <br />
  Telefoonnummer Vast: <input type="tel" name = "tv" VALUE="<?php echo $leer['TelefoonnummerVast'] ?>"/> <br />
  Telefoonnummer Mobiel: <input type="tel" name = "tm" VALUE="<?php echo $leer['TelefoonnummerMobiel'] ?>"/> <br />
  Emailadres: <input type="email" name = "em" VALUE="<?php echo $leer['Emailadres'] ?>"/> <br />
  Inschrijfdatum(YYYY-MM-DD): <input type="date" name = "in" VALUE="<?php echo $leer['Inschrijfdatum'] ?>"/> <br /> 
  Aantal Lessen: <input type="number" name = "ls" VALUE="<?php echo $leer['AantalLessen'] ?>"/> <br />
  <br />
  MENTOR ALTIJD SELECTEREN!! <br />
  HUIDIGE MENTOR IS: <?php echo $mini['Voornaam'] . ' '.$mini['Achternaam'] ?> <br />
<?php
$mentor = mysqli_query($con2, "SELECT * FROM Mentor");
					
echo'<select name="mijnkeuze">';
while($rij = mysql_fetch_array($mentor))
{
	echo '<option value="'.$rij['idMentor'].'">Mentor:'.$rij['Voornaam'] . ' '.$rij['Achternaam'].'</option>'.'<br />';
}
echo'</select>';

?>
 <br />
MENTOR ALTIJD SELECTEREN!! <br />
  <br />
  Theorie Nr: <input type="text" name = "tn" VALUE="<?php echo $leer['TheorieNr'] ?>"/> <br />
  Afgiftedatum Theorie(YYYY-MM-DD): <input type="date" name = "at" VALUE="<?php echo $leer['AfgifteTheorie'] ?>"/> <br />
  Ogentest<br />
  NU INGEVULD: <?php echo $oog ?> <br />
  <input type="checkbox" name="oog" value="z"> zonder bril <br />
  <input type="checkbox" name="oog" value="m"> met bril <br />
  <input type="checkbox" name="oog" value="c"> contactlenzen <br />
  <input type="checkbox" name="oog" value="o"> onvoldoende <br />
  <br />
  Eigen Verklaring gelezen?  <br />
  NU INGEVULD: <?php echo $ei ?> <br />
  <input type="checkbox" name="ev" value="1"> Ja <br /> 
  <input type="checkbox" name="ev" value="0"> Nee <br />   <br /> 
 Zelfreflectieformulier ingeleverd?  <br />
 NU INGEVULD: <?php echo $zr ?> <br />
  <input type="checkbox" name="zr" value="1"> Ja <br /> 
  <input type="checkbox" name="zr" value="0"> Nee <br /> 
  Extra Info: <input type="text" name = "ei" VALUE="<?php echo $leer['ExtraInfo'] ?>"/> <br /> 
  <br />
  Actief? <br />
NU INGEVULD: <?php echo $ac ?> <br /> 
 <input type="checkbox" name="ac" value="1"> Ja <br /> 
  <input type="checkbox" name="ac" value="0"> Nee <br />  
 <input type="submit" value= "Leerling Bewerken"/>

 <?php
  include 'tempvend.php';
        ?>