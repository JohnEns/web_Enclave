<?php
$pagina = basename(__FILE__);
$title = "Lorber - Tekst edit";
include '../inc.php';
include '../templ.php';
include '../lorber.php';
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
<h2 style="text-align:center"> Tekst aanpassen, veranderen en tags verbinden </h2>
<!--<p>
    doorgegeven waarde is <?php// echo $_GET['id']; ?> zie je iets??<br>
</p>-->
<!--<h3 style="text-align:center"> Kies boek </h3>-->

<p>Welcome <?php echo htmlentities($_SESSION['username']); ?>!</p>

<?php
$ShowText = new Lorber();
echo $ShowText->GetText($_GET['id']);

?>

<form action="tttverwerk.php" method="POST">

<?php
echo '    <table ><tr><th>Tag 1</th><th>Tag 2</th><th>Tag 3</th><th>Tag 4</th></tr>';
echo '<tr><td>';
$tags1 = mysqli_query($conl, "SELECT * FROM tags ORDER BY tag ASC");

echo'<select name="mijnkeuze1">';

echo '<option value="">Geen tag geselecteerd</option>' . '<br />';
while ($rij = mysqli_fetch_array($tags1)) {
    $value = $rij['idtags'];
    echo "<option value=\"$value\">" . $rij['tag'] . "</option>";
    echo "<br />";
    echo "<br />";
}
echo'</select>';
echo '</td><td>';

$tags2 = mysqli_query($conl, "SELECT * FROM tags ORDER BY tag ASC");

echo'<select name="mijnkeuze2">';

echo '<option value="">Geen tag geselecteerd</option>' . '<br />';
while ($rij = mysqli_fetch_array($tags2)) {
    $value = $rij['idtags'];
    echo "<option value=\"$value\">" . $rij['tag'] . "</option>";
    echo "<br />";
    echo "<br />";
}
echo'</select>';
echo '</td><td>';

$tags3 = mysqli_query($conl, "SELECT * FROM tags ORDER BY tag ASC");

echo'<select name="mijnkeuze3">';

echo '<option value="">Geen tag geselecteerd</option>' . '<br />';
while ($rij = mysqli_fetch_array($tags3)) {
    $value = $rij['idtags'];
    echo "<option value=\"$value\">" . $rij['tag'] . "</option>";
    echo "<br />";
    echo "<br />";
}
echo'</select>';
echo '</td><td>';

$tags4 = mysqli_query($conl, "SELECT * FROM tags ORDER BY tag ASC");

echo'<select name="mijnkeuze4">';

echo '<option value="">Geen tag geselecteerd</option>' . '<br />';
while ($rij = mysqli_fetch_array($tags4)) {
    $value = $rij['idtags'];
    echo "<option value=\"$value\">" . $rij['tag'] . "</option>";
    echo "<br />";
    echo "<br />";
}
echo'</select>';
echo '</td></tr></table>';

$slcttekst = mysqli_query($conl, "SELECT      tekst.idtekst AS id,
                                                tekst.idboeken AS tb,
                                                tekst.tekst AS tk, 
                                                tekst.Hstukvan AS hv, 
						tekst.Hstuktot AS ht,
                                                tekst.versbegin AS vb,
                                                tekst.verseind AS ve,
                                                boeken.idboeken AS bi,
                                                boeken.boekennaam AS bk,
                                                boeken.schrijver AS sv,
                                                boeken.boekpic AS pc
                                                
                                                FROM tekst,boeken
						WHERE tekst.idtekst = '" . $_GET['id'] . "' AND tekst.idboeken = boeken.idboeken");
$table = mysqli_fetch_array($slcttekst);
?>
    <br />
    <br />
    <table>
        <input type="hidden" name = "id" VALUE="<?php echo $table["id"] ?>"/> 
        <tr><td>De tekst begint in Hoofdstuk:</td><td> <input type="number" name = "hv" value="<?php echo $table["hv"] ?>"> <br /></td></tr>
        <tr><td>De tekst begint in vers: </td><td><input type="number" name = "vb"value="<?php echo $table["vb"] ?>"> <br /></td></tr>
        <tr><td>De tekst eindigt in Hoofdstuk:</td><td> <input type="number" name = "ht"value="<?php echo $table["ht"] ?>"> <br /></td></tr>
        <tr><td> De tekst eindigt in vers: </td><td><input type="number" name = "ve"value="<?php echo $table["ve"] ?>"> <br /></td></tr>
        <tr><td>De tekst: </td><td ><input type="text" name = "tk"value="<?php echo $table["tk"] ?>"> <br /> </td></tr>
    </table>
    <br />
    <table>
        <h3>Voeg tags toe (Vermijd dubbele invoer ajb)</h3> 
        <h4>Bestaande tags</h4>

<?php
$tags = mysqli_query($conl, "SELECT tag FROM tags ORDER BY tag ASC");
WHILE ($tag = mysqli_fetch_array($tags)) {
    echo ' ' . $tag["tag"] . ' ';
}
echo '<br><tr><td>Nieuwe tag</td><td ><input type="text" name = "ntag1"></td><td>Meteen linken aan de tekst?</td><td><input type="checkbox" name="link1" value=1></td></tr> ';
echo '<td>Nieuwe tag</td><td ><input type="text" name = "ntag2"></td><td>Meteen linken aan de tekst?</td><td><input type="checkbox" name="link2" value=1></td></tr>';
echo '<td>Nieuwe tag</td><td ><input type="text" name = "ntag3"></td><td>Meteen linken aan de tekst?</td><td><input type="checkbox" name="link3" value=1></td></tr>';
echo '<td>Nieuwe tag</td><td ><input type="text" name = "ntag4"></td><td>Meteen linken aan de tekst?</td><td><input type="checkbox" name="link4" value=1></td></tr>';
echo '</tr></table>';
?>      

        <input type="submit" value= "Verander de tekst"/>
</form>

<?php
} else {
    ?> <article class="itemprt"> <?php
    echo 'Je bent niet bevoegd om deze pagina te kunnen zien. Hiervoor moet je ingelogd zijn.';
}
    include '../templends.php';
        ?>