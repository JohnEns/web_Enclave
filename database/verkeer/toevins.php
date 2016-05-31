

<?php
echo "Dit is een testomgeving" . "<br />";

include("../connect.php");
include 'tempv.html';
?>
<h2 style="text-align:center"> Toevoegen Instructeur </h2>
<?php
/*
  $check = mysql_query("INSERT INTO Leerling(`Voornaam`, `Achternaam`, `Adres`,`ZelfRef`)
  VALUES ('".$_POST["vn"]."','".$_POST["an"]."','".$_POST["ad"]."','".$zr."')");
 */
$check = mysqli_query($con2, "INSERT INTO Instructeur(`Voornaam`, `Achternaam`, `Actief`)
			VALUES ('" . $_POST["vn"] . "','" . $_POST["an"] . "','" . $_POST["ac"] . "')");


IF ($check) {
    echo "Instructeur toegevoegd!" . "<br />";
} ELSE {
    echo "Ai! Sorry... Foutmelding:" . mysql_error();
}

$Instructeur = mysqli_query($con2, "SELECT * FROM Instructeur");
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

WHILE ($ler = mysqli_fetch_array($Instructeur)) {
    echo '<tr><td>' . $ler['idInstructeur'] . '</td>

  <td>' . $ler["Voornaam"] . '</td> 
  <td>' . $ler["Achternaam"] . '</td>
  <td>' . $ler["Actief"] . '</td>  ';
}

echo "</table>";

include 'tempvend.php';
?>
