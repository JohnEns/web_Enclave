

<?php
echo "Dit is een testomgeving"."<br />";

include("../connect.php");
include 'tempv.html';
?>

<h2 style="text-align:center"> Leerlingen </h2>
<?php


$leerling = mysqli_query($con2, "SELECT Leerling.idLeerling AS id, 
								Leerling.Voornaam AS vn, 
								Leerling.Achternaam AS an, 
								Mentor.Voornaam AS ment, 
								Mentor.Achternaam AS mena 
								FROM Leerling,Mentor
								WHERE Leerling.Mentor_idMentor = Mentor.idMentor AND Leerling.Actief = '0'");

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

while($leerl = mysql_fetch_array($leerling))
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

  include 'tempvend.php';
        ?>