<?php
$pagina = basename(__FILE__);
$title = "Lorber - Tekst Verwijderen";
include '../inc.php';
include '../templ.php';
?>

<?php
if (login_check($mysqli) == true) {
   $tst = rlck($mysqli);
   
           switch ($tst) {
            case 1:
                header("refresh:1;url=dagtekst.php");
                break;

            case 2:
                include '../templsy.php';
             break;

            default :
               header("refresh:1;url=dagtekst.php");
        }?>

<h2 style="text-align:center"> Tekst Verwijderen </h2>

<p>Welcome <?php echo htmlentities($_SESSION['username']); ?>!</p>
<?php    
echo "Te verwijderen id is: " . $_POST['id'] . "<br />";
echo "delete waarde is: " . $_POST['del'] . "<br />";

if ($_POST['del']<1){ 

$verw = ("DELETE FROM tekst WHERE tekst.idtekst = '" . $_POST['id']  . "' ");
IF (mysqli_query($conl, $verw)) {
    echo "Tekst verwijderd!" . "<br />";
} ELSE {
    echo "Oeps.... Fout: " . mysqli_error();
}
} else {
    echo 'De tekst is niet verwijderd';
}

?>
<h2 style="text-align:center"> Overgebleven tekst</h2>

<?php
        $tekst = mysqli_query($conl, "SELECT    tekst.tekst AS tk, 
                                                tekst.idtekst AS id, 
						tekst.Hstukvan AS hv, 
						tekst.Hstuktot AS ht,
                                                tekst.versbegin AS vb,
                                                tekst.verseind AS ve,
                                                boeken.boekennaam AS bk,
                                                boeken.schrijver AS sv
                                                
                                                FROM tekst,boeken
						WHERE tekst.idboeken = boeken.idboeken");

//        $keuze = $conl->query($tekst);


        while ($select = mysqli_fetch_array($tekst)) {
            echo '<hr><br>(id ' . $select["id"] . ')Uit het boek ' . $select["bk"] . ', hoofdstuk ' . $select["hv"] .
            ' vers ' . $select["vb"] . ' tot ' . $select["ve"] . ': <a href ="toeteksttag.php?id=' . $select["id"] . '">-Bewerk- </a>' . '<a href ="deltekst.php?id=' . $select["id"] . '"> -Verwijder- </a>';
            echo '<br>' . $select["tk"] . '<br>';

            echo 'dit is de id nu    ' . $select['id'];
            echo '<br>dit zijn de tags <br>';
            $tagused = mysqli_query($conl, "SELECT teksttag.idtags FROM teksttag WHERE teksttag.idtekst = '" . $select['id'] . "' ");
            while ($taglink = mysqli_fetch_array($tagused)) {
//    echo 'dit zijn de tags ' . $taglink["idtags"];
                $tagnames = mysqli_query($conl, "SELECT tags.tag FROM tags WHERE tags.idtags = '" . $taglink['idtags'] . "' ");
                if ($tagnaam = mysqli_fetch_array($tagnames)) {
                    echo '<b>-' . $tagnaam["tag"] . ' </b>';
                } else {
//    if (strlen($tagnaam["tag"])<3) {

                    echo 'Er zijn nog geen tags gelinkt';
                }
            }}
} else {
    ?> <article class="itemprt"> <?php
    echo 'Je bent niet bevoegd om deze pagina te kunnen zien. Hiervoor moet je ingelogd zijn.';
}
    include '../templends.php';
        