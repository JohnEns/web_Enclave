<?php
$pagina = basename(__FILE__);
$title = "Lorber - Toevoegen Tekst";
include '../inc.php';
include '../templ.php';

?>

<?php
if (login_check($mysqli) == true) {
   $tst = rlck($mysqli);
   
           switch ($tst) {
            case 1:
                header("refresh:2;url=dagtekst.php");
                break;

            case 2:
                include '../templsy.php';
             break;

            default :
               header("refresh:2;url=dagtekst.php");
        }?>

<h2 style="text-align:center"> Toevoegen Tekst </h2>

<p>Welcome <?php echo htmlentities($_SESSION['username']); ?>!</p>

<h3 style="text-align:center"> Kies boek </h3>



<form action="toevoegen.php" method="POST">

<?php
$boek = mysqli_query($conl, "SELECT * FROM boeken");
					
echo'<select name="mijnkeuze">';
while($rij = mysqli_fetch_array($boek))
{
	echo '<option value="'.$rij['idboeken'].'">' . $rij['boekennaam']       . '</option>'.'<br />';
//        echo '<option value="'.$rij['idMentor'].'">Mentor:'.$rij['Voornaam'] . ' '.$rij['Achternaam'].'</option>'.'<br />';    
	echo "<br />";
	echo "<br />";
}
echo'</select>';
?>
<br />
<br />
<table  class="book">
    <tr><td class="rr">De tekst begint in Hoofdstuk:</td><td class='ll'> <input type="number" name = "hv"> <br /></td></tr>
  <tr><td>De tekst begint in vers: </td><td><input type="number" name = "vb"> <br /></td></tr>
  <tr><td>De tekst eindigt in Hoofdstuk:</td><td> <input type="number" name = "ht"> <br /></td></tr>
 <tr><td> De tekst eindigt in vers: </td><td><input type="number" name = "ve"> <br /></td></tr>
 <tr><td>De tekst: </td><td ><textarea  name = "tk" rows="5" cols="40"> </textarea><br /> </td></tr>
</table>
  <br />
 <input type="submit" value= "Voeg tekst toe"/>
</form>







<?php
} else {
    ?> <article class="itemprt"> <?php
    echo 'Je bent niet bevoegd om deze pagina te kunnen zien. Hiervoor moet je ingelogd zijn.';
}
    include '../templends.php';
        ?>