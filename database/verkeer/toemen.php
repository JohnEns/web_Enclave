<?php
echo "Dit is een testomgeving"."<br />";

include("../connect.php");
include 'tempv.html';
?>
<h2 style="text-align:center"> Toevoegen Mentor </h2>


<form action="toevmen.php" method="POST">

<br />
<br />
  Voornaam: <input type="text" name = "vn"> <br />
  Achternaam: <input type="text" name = "an"> <br />
 Actief? <br />
 <input type="checkbox" name="ac" value="1"> Ja <br /> 
 <input type="checkbox" name="ac" value="0"> Nee <br />  
  <br />
 <input type="submit" value= "Voeg Mentor toe"/>
</form>

<?php
    include 'tempvend.php';
        ?>
