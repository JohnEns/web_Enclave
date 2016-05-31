<?php
$pagina = basename(__FILE__);
$title = "Lorber - Dagtekst";
 include '../inc.php';
include '../templ.php';
include '../lorber.php';
//
//$idSQL = mysqli_query($conl, "SELECT tekst.idtekst AS id FROM tekst");
//while($idCollectie = mysqli_fetch_array($idSQL)) {
//  $savedArray[] = $idCollectie [0];
//}        
//
//$luck = $savedArray[array_rand($savedArray)];
?> 
<?php
if (login_check($mysqli) == true) {
   $tst = rlck($mysqli);
           switch ($tst) {
            case 1:
                include '../templsc.php';
                break;

            case 2:
                include '../templsy.php';
             break;

            default :
               break;
        }
}
    ?>

<article class="itemprt">
    <h1>Welkom <?php echo htmlentities($_SESSION['username']);
    ?>!</h1>
    
    <h2>Dagtekst</h2>
    
    <p>Van harte welkom! Hier vindt u dagteksten, geselecteerd uit de werken van Jakob Lorber.
        Wij hopen binnenkort ook een app uit te brengen.<br>


        <?php
        
//
////        $query = "SELECT * FROM tekst";
//        $tekst = mysqli_query($conl, "SELECT    tekst.tekst AS tk, 
//                                                
//						tekst.Hstukvan AS hv, 
//						tekst.Hstuktot AS ht,
//                                                tekst.versbegin AS vb,
//                                                tekst.verseind AS ve,
//                                                boeken.boekennaam AS bk,
//                                                boeken.schrijver AS sv,
//                                                boeken.boekpic AS pc                                                
//                                                FROM tekst
//                                                INNER JOIN boeken ON tekst.idtekst = $luck AND tekst.idboeken = boeken.idboeken");
//
////        $keuze = $conl->query($tekst);
//
//        while ($select = mysqli_fetch_array($tekst)) {
////            $teksthtml = htmlentities($select["tk"]);
////            $printtekst = htmlentities($select["tk"], ENT_SUBSTITUTE, 'UTF-8');
//            $printtekst = htmlentities(utf8_decode($select["tk"]));
//            
//            if ($select["hv"] == $select["ht"]) {
//                echo '<hr><br>Uit het boek ' . $select["bk"] . ', hoofdstuk ' . $select["hv"] . ' vers ' . $select["vb"] . ' tot ' . $select["ve"] . ':<br>';
//                echo '<br>' . $printtekst . '<br>';
//            } else {
//                echo '<hr><br>Uit het boek ' . $select["bk"] . ', hoofdstuk ' . $select["hv"] . ' vers ' . $select["vb"] . ' tot hoofdstuk ' . $select["ht"] . ' vers ' . $select["ve"] . ':<br>';
//                echo '<br>' . $printtekst . '<br>';
//            }
//            if (!empty($select["pc"])) {
//                echo "<img src='../../img/lorber/boeken/" . $select["pc"] . "'  class='small' alt='" . $select["pc"] . "'>";
//            } else {
//                echo "<img src='../../img/lorber/lorber small.jpg' class='small' alt='placeholder'><br><br>";
//            }
//        }
//        
//        $tekstplemp = new Lorber;
//        $tekstplemp->GenerateText();
//        echo "<br>testerdetest" .$tekstpl . "....dat is die test brada...<br>";
        
//        $randomizer = new Lorber;
//        $randomizer->testert(3);
        
//        echo "<br>testerdetest: " .  $randomizer->RandomID(). "....dat is die RANDOM test brada...<br>";
//        echo $randomizer->RandomID();
        $proeftekst = new Lorber;
        echo "<br> hier komt de proef: <br>";
//        echo $proeftekst->GetText(5);
        
        ?>
</article>
<?php
include '../templend.php';
?>


