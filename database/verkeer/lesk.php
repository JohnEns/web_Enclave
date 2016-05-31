

<?php
echo "Dit is een testomgeving"."<br />";

include("../connect.php");
include 'tempv.html';
?>

<h2 style="text-align:center"> Leskaart </h2>


<?php
echo $_POST["leerg"];
echo "<br />";
echo $_POST["instruct"];
echo "<br />";
echo $_POST["ld"];
echo "<br />";
echo $_POST["lt"];
echo "<br />";
echo $_POST["bt"];
echo "<br />";




$check = mysqli_query($con2, "INSERT INTO LeerInstruc(Leerling_idLeerling, Instructeur_idInstructeur, Datum, Tijd, Betaald)
					VALUES ('".$_POST["leerg"]."','".$_POST["instruct"]."','".$_POST["ld"]."','".$_POST["lt"]."','".$_POST["bt"]."')");
					
					
IF ($check)
{
	echo "Les toegevoegd!" . "<br />";
	$idgrab = $con2->insert_id;
}
ELSE
{
	echo "Ai! Sorry... Foutmelding:" . mysqli_error();
}

echo "id les is :" . "$idgrab" . "<br />";
?>

<form action="lerles.php" method="POST">
ID nieuwe les: <input type="number" name = "idin" VALUE="<?php echo $idgrab ?>"/> <br />
<?php
$type = mysqli_query($con2, "SELECT * FROM TypeLes");
 
/*					
echo "<select name=\"typ\" onchange=\"window.location='lesk.php?typeles='+this.value\">";
*/
echo '<select name="typ">';

while($rij = mysqli_fetch_array($type))
{
	echo '<option value="'.$rij['idTypeLes'].'">Type Les:'.$rij['TypeNaam'] . '</option>'.'<br />';
	echo "<br />";
	echo "<br />";
}
echo'</select>';
/*
$leson = mysql_query("SELECT * FROM Lesonderdelen WHERE TypeLes_idTypeLes ='".$_GET["typeles"]."'");
					
echo '<select name="leso">';
while($rix = mysql_fetch_array($leson))
{
	echo '<option value="'.$rix['idLesonderdelen'].'">Lesonderdeel:'.$rix['LesonderdeelNaam'] . '</option>'.'<br />';
	echo "<br />";
	echo "<br />";
}
echo'</select>';
*/

/*
SELECTEER Type Les
SELECTEER Lesonderdeel
SELECTEER Legenda

EXPORT LEERLES
-> POST NAAR LEERLES.PHP*/
?>
 <br />
 <input type="submit" value= "Voeg Type les toe"/>
</form>

<?php

    include 'tempvend.php';
        ?>