
<?php
echo "Dit is een testomgeving"."<br />";

include("../connect.php");
include 'tempv.html';
?>
<h2 style="text-align:center"> Toevoegen </h2>

<h3 style="text-align:center"> Kies Mentor!! </h3>


<form action="toevoegen.php" method="POST">

<?php
$mentor = mysqli_query($con2, "SELECT * FROM Mentor");
					
echo'<select name="mijnkeuze">';
while($rij = mysqli_fetch_array($mentor))
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






<?php

    include 'tempvend.php';
        ?>