<?php
$pagina = basename(__FILE__);
$title = "Lorber - Database";
include '../inc.php';
include '../templ.php';

//function randomvers() {
//    $offset_result = $conl->query("SELECT FLOOR(RAND() * COUNT(*)) AS `offset` FROM tekst");
//    $offset_row = mysqli_fetch_object($offset_result);
//    $offset = $offset_row->offset;
//    $result = mysqli_query($conl, "SELECT * FROM tekst LIMIT $offset, 1 ");
//    return $result;
//}

$idSQL = mysqli_query($conl, "SELECT tekst.idtekst AS id FROM tekst");
while($idCollectie = mysqli_fetch_array($idSQL)) {
  $savedArray[] = $idCollectie [0];
}        

$luck = $savedArray[array_rand($savedArray)];

?>

<article class="itemprt">
    <h2>Dagtekst</h2>
    <p>Van harte welkom! Hier vindt u dagteksten, geselecteerd uit de werken van Jakob Lorber.
        Wij hopen binnenkort ook een app uit te brengen.<br>


        <?php
        echo "Het gekozen vers is " . $luck;

//        $query = "SELECT * FROM tekst";
        $tekst = mysqli_query($conl, "SELECT    tekst.tekst AS tk, 
                                                
						tekst.Hstukvan AS hv, 
						tekst.Hstuktot AS ht,
                                                tekst.versbegin AS vb,
                                                tekst.verseind AS ve,
                                                boeken.boekennaam AS bk,
                                                boeken.schrijver AS sv,
                                                boeken.boekpic AS pc
                                                
                                                FROM tekst,boeken
						WHERE tekst.idtekst = $luck AND tekst.idboeken = boeken.idboeken");

//        $keuze = $conl->query($tekst);

        while ($select = mysqli_fetch_array($tekst)) {
            if ($select["hv"] = $select["ht"]) {
                echo '<hr><br>Uit het boek ' . $select["bk"] . ', hoofdstuk ' . $select["hv"] . ' vers ' . $select["vb"] . ' tot ' . $select["ve"] . ':<br>';
                echo '<br>' . $select["tk"] . '<br>';
            } else {
                echo '<hr><br>Uit het boek ' . $select["bk"] . ', hoofdstuk ' . $select["hv"] . ' vers ' . $select["vb"] . ' tot hoofdstuk ' . $select["ht"] . ' vers ' . $select["ve"] . ':<br>';
                echo '<br>' . $select["tk"] . '<br>';
            }
            if (!empty($select["pc"])) {
            echo "<img src='../../img/lorber/boeken/" . $select["pc"] . "'  class='small' alt='" . $select["pc"] . "'>";}
             else {
            echo "<img src='../../img/lorber/lorber small.jpg' class='small' alt='placeholder'><br><br>";}
        }
//  WHILE ($boek = mysqli_fetch_array($Boeken)) {
//    echo '<hr><br>Naam boek ' . $boek["boekennaam"] . ', schrijver ' . $boek["schrijver"] . ' ISBN-13 ' . $boek["ISBN"] ;
//
//     if (!empty($boek["boekpic"])) {
//        echo "<img src='../../img/lorber/boeken/" . $boek["boekpic"] . "'  class='small' alt='" . $boek["boekpic"] . "'><br><br>";
//    } else {
//        echo "<img src='../../img/lorber/lorber small.jpg' class='small' alt='placeholder'><br><br>";
//    }
    

        $conl->close();
        ?>
        <!--<h2><a href = "verkeer/verkeer.php">Link naar verkeer-database </a></h2> -->
</article>
<?php
include 'templend.php';
?>


