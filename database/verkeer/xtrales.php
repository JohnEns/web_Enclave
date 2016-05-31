

<?php
echo "Dit is een testomgeving"."<br />";

include("../connect.php");
include 'tempv.html';
?>

<h2 style="text-align:center"> Leskaart </h2>

<?php
echo $_POST["type"];
echo "<br />";
echo "<br />";
echo "De lesinstruc id is: ". $_POST["idin"]; 
?>

<form action="leerles.php" method="POST">
ID nieuwe les: <input type="number" name = "idles" VALUE="<?php echo $_POST["idin"] ?>"/> <br />
<?php

$leson = mysqli_query($con2, "SELECT * FROM Lesonderdelen WHERE TypeLes_idTypeLes ='".$_POST["type"]."'");
					
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

?>

 <br />
 <input type="submit" value= "Voeg Lesonderdeel toe"/>
</form>

<?php

    include 'tempvend.php';
        ?>