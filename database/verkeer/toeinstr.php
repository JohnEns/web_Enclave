<?php
echo "Dit is een testomgeving"."<br />";

include("../connect.php");
include 'tempv.html';
?>

<h2 style="text-align:center"> Toevoegen Instructeur </h2>


<form action="toevins.php" method="POST">

<br />
<br />
  Voornaam: <input type="text" name = "vn"> <br />
  Achternaam: <input type="text" name = "an"> <br />
 Actief? <br />
 <input type="checkbox" name="ac" value="1"> Ja <br /> 
 <input type="checkbox" name="ac" value="0"> Nee <br />  
  <br />
 <input type="submit" value= "Voeg instructeur toe"/>
</form>


<?php

    include 'tempvend.php';