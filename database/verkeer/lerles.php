

<?php
echo "Dit is een testomgeving"."<br />";

include("../connect.php");
include 'tempv.html';
?>

<h2 style="text-align:center"> Leskaart </h2>

<?php
echo $_POST["typ"];
echo "<br />";
echo "<br />";
echo "De lesinstruc id is: ". $_POST["idin"]; 
/*
$check = mysql_query("INSERT INTO LeerInstruc(Leerling_idLeerling, Instructeur_idInstructeur, Datum, Tijd, Betaald)
					VALUES ('".$_POST["leerg"]."','".$_POST["instruct"]."','".$_POST["ld"]."','".$_POST["lt"]."','".$_POST["bt"]."')");
					
					
IF ($check)
{
	echo "Les toegevoegd!" . "<br />";
}
ELSE
{
	echo "Ai! Sorry... Foutmelding:" . mysql_error();
}
*/

?>

<form action="leerles.php" method="POST">
ID nieuwe les: <input type="number" name = "idles" VALUE="<?php echo $_POST["idin"] ?>"/> <br />
<?php

$leson = mysqli_query($con2, "SELECT * FROM Lesonderdelen WHERE TypeLes_idTypeLes ='".$_POST["typ"]."'");
					
echo '<select name="leso">';
while($rix = mysqli_fetch_array($leson))
{
	echo '<option value="'.$rix['idLesonderdelen'].'">Lesonderdeel:'.$rix['LesonderdeelNaam'] . '</option>'.'<br />';
	echo "<br />";
	echo "<br />";
}
echo'</select>';

$legen = mysqli_query($con2, "SELECT * FROM Legenda2");
					
echo '<select name="leg">';
while($riq = mysqli_fetch_array($legen))
{
	echo '<option value="'.$riq['idLegenda2'].'">Legenda:'.$riq['Legendanaam'] . '</option>'.'<br />';
	echo "<br />";
	echo "<br />";
}
echo'</select>';

/*
SELECTEER Type Les
SELECTEER Lesonderdeel
SELECTEER Legenda

EXPORT LEERLES
-> POST NAAR LEERLES.PHP*/
?>

 <br />
 <input type="submit" value= "Voeg Lesonderdeel toe"/>
</form>

<?php

    include 'tempvend.php';
        ?>>