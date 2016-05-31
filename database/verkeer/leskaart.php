

<?php
echo "Dit is een testomgeving"."<br />";

include("../connect.php");
include 'tempv.html';
?>

<h2 style="text-align:center"> Leskaart </h2>


<h3 style="text-align:center"> Kies Instructeur!! </h3>


<form action="lesk.php" method="POST">

<?php
$instruc = mysqli_query($con2, "SELECT * FROM Instructeur");
					
echo'<select name="instruct">';
while($rij = mysqli_fetch_array($instruc))
{
	echo '<option value="'.$rij['idInstructeur'].'">Instructeur:'.$rij['Voornaam'] . ' '.$rij['Achternaam'].'</option>'.'<br />';
	echo "<br />";
	echo "<br />";
}
echo'</select>';
echo "<br />";

$leerl = mysqli_query($con2, "SELECT * FROM Leerling");
					
echo '<select name="leerg">';
while($llg = mysqli_fetch_array($leerl))
{
	echo '<option value="'.$llg['idLeerling'].'">Leerling:'.$llg['Voornaam'] . ' '.$llg['Achternaam'].'</option>'.'<br />';
	echo "<br />";
	echo "<br />";
}
echo'</select>';
echo "<br />";
echo "<br />";
?>
Lesdatum(YYYY-MM-DD): <input type="date" name = "ld"> <br /> 
Lestijd(UU:MM:SS): <input type="time" name = "lt"> <br /> 
<br />
  Betaald?  <br />
  <input type="checkbox" name="bt" value="1"> Ja <br /> 
  <input type="checkbox" name="bt" value="0"> Nee <br />   <br />
<br />
 <br />
 <input type="submit" value= "Voeg les toe"/>
</form>

<?php

    include 'tempvend.php';
        ?>