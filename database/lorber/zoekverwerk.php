<?php
$pagina = basename(__FILE__);
$title = "Lorber - Gezocht";
include '../inc.php';
include '../templ.php';

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
               header("refresh:2;url=dagtekst.php");
        }

    ?>

    <h1>Welkom <?php echo htmlentities($_SESSION['username']);
    ?>!</h1>
<h2 style="text-align:center"> Zoekresultaten </h2>
<?php
echo 'zoekterm 1: ' . $_POST['zoek1'];
echo '<br>zoekterm 2: ' . $_POST['zoek2'];


IF ($_POST["zoek1"] == 0) {
    echo '<br> Geen zoekterm ingegeven op tag 1';
} else {
    $zoektag1 = mysqli_query($conl, "SELECT tags.tag FROM tags WHERE tags.idtags = '" . $_POST['zoek1'] . "' ");
    while ($zktag1 = mysqli_fetch_array($zoektag1)) {
        $zoekterm1 = $zktag1['tag'];
//        echo '<br><br>Zoekterm 1 is <b>' . $zoekterm1 . '</b><br>';

        $zoekcol1 = mysqli_query($conl, "SELECT * FROM teksttag WHERE teksttag.idtags = '" . $_POST['zoek1'] . "' ");
        while ($zoeker1 = mysqli_fetch_array($zoekcol1)) {
//            echo '<br>dit is de idtekst: ' . $zoeker1['idtekst'];
            IF ($_POST["zoek2"] == 0) {
                $answer1 = mysqli_query($conl, "SELECT      tekst.idtekst AS id,
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
						WHERE tekst.idtekst = '" . $zoeker1['idtekst'] . "' AND tekst.idboeken = boeken.idboeken");

                while ($answ1 = mysqli_fetch_array($answer1)) {
                    echo '<hr><br>(id ' . $answ1["id"] . ')Uit het boek ' . $answ1["bk"] . ', hoofdstuk ' . $answ1["hv"] . ' vers ' . $answ1["vb"] . ' tot ' . $answ1["ve"] . ': <a href ="toeteksttag.php?id=' . $answ1["id"] . '">-Bewerk-</a><br>';
                    echo '<br>' . $answ1["tk"] . '<br>';
                    echo 'dit is de id nu    ' . $answ1['id'];
                    echo '<br>dit zijn de tags <br>';
                    $tagused = mysqli_query($conl, "SELECT teksttag.idtags FROM teksttag WHERE teksttag.idtekst = '" . $answ1['id'] . "' ");
                    while ($taglink = mysqli_fetch_array($tagused)) {
                        $tagnames = mysqli_query($conl, "SELECT tags.tag FROM tags WHERE tags.idtags = '" . $taglink['idtags'] . "' ");
                        if ($tagnaam = mysqli_fetch_array($tagnames)) {
                            echo '<b>-' . $tagnaam["tag"] . ' </b>';
                        } else {

                            echo 'Er zijn nog geen tags gelinkt';
                        }
                    }
                }
            } else {
                $zoektag2 = mysqli_query($conl, "SELECT tags.tag FROM tags WHERE tags.idtags = '" . $_POST['zoek2'] . "' ");
                if ($zktag2 = mysqli_fetch_array($zoektag2)) {
                    $zoekterm2 = $zktag2['tag'];
                    
                }

                $zoekcol2 = mysqli_query($conl, "SELECT * FROM teksttag WHERE teksttag.idtags = '" . $_POST['zoek2'] . "' ");
                while ($zoeker2 = mysqli_fetch_array($zoekcol2)) {
//                        echo '<br>dit is de idtekst2: ' . $zoeker2['idtekst'];

                    $answer2 = mysqli_query($conl, "SELECT tekst.idtekst AS id,
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
						WHERE tekst.idtekst = '" . $zoeker1['idtekst'] . "' AND tekst.idtekst = '" . $zoeker2['idtekst'] . "' AND tekst.idboeken = boeken.idboeken");

                    if ($answ2 = mysqli_fetch_array($answer2)) {
                        echo '<hr><br>(id ' . $answ2["id"] . ')Uit het boek ' . $answ2["bk"] . ', hoofdstuk ' . $answ2["hv"] . ' vers ' . $answ2["vb"] . ' tot ' . $answ2["ve"] . ': <a href ="toeteksttag.php?id=' . $answ2["id"] . '">-Bewerk-</a><br>';
                        echo '<br>' . $answ2["tk"] . '<br>';
                        echo 'dit is de id nu    ' . $answ2['id'];
                        echo '<br>dit zijn de tags <br>';
                        $tagused = mysqli_query($conl, "SELECT teksttag.idtags FROM teksttag WHERE teksttag.idtekst = '" . $answ2['id'] . "' ");
                        while ($taglink = mysqli_fetch_array($tagused)) {
                            $tagnames = mysqli_query($conl, "SELECT tags.tag FROM tags WHERE tags.idtags = '" . $taglink['idtags'] . "' ");
                            if ($tagnaam = mysqli_fetch_array($tagnames)) {
                                echo '<b>-' . $tagnaam["tag"] . ' </b>';
                            } else {

                                echo 'Er zijn nog geen tags gelinkt';
                            }
                        } 
                        
                    } 
                } 
//                else { echo 'Er zijn geen teksten gelinkt met zowel tag ' . $zoekterm1 . ' alsook tag ' . $zoekterm2 . '. <br>';}
            } 
        } echo '<br><br>Zoekterm 1 is <b>' . $zoekterm1 . '</b> en Zoekterm 2 is <b>' . $zoekterm2 . '</b><br>';
    }
}

//
//IF ($contrtag1)
//{
//	echo "Tag 1 is toegevoegd!"."<br />";
//}
//ELSE
//{
//	echo "Oeps.... Fout bij Tag 1: ". mysqli_error();
//} }
//
//IF ($_POST["zoek2"]==0){
//      echo '<br> Geen tag gekoppeld op tag 2';
//} else {
//  
//$contrtag2 = mysqli_query($conl, "INSERT INTO teksttag(`idtekst`, `idtags`)
//			VALUES ('".$_POST["id"]."','".$_POST["mijnkeuze2"]."')");
//
//IF ($contrtag2)
//{
//	echo "Tag 2 is toegevoegd!"."<br />";
//}
//ELSE
//{
//	echo "Oeps.... Fout bij Tag 2: ". mysqli_error();
//}}
//
//IF ($_POST["mijnkeuze3"]==0){
//    echo '<br> Geen tag gekoppeld op tag 3';
//} else {
//    
//$contrtag3 = mysqli_query($conl, "INSERT INTO teksttag(`idtekst`, `idtags`)
//			VALUES ('".$_POST["id"]."','".$_POST["mijnkeuze3"]."')");
//
//IF ($contrtag3)
//{
//	echo "Tag 3 is toegevoegd!"."<br />";
//}
//ELSE
//{
//	echo "Oeps.... Fout bij Tag 3: ". mysqli_error();
//}}
//
//IF ($_POST["mijnkeuze4"]==0){
//    echo '<br> Geen tag gekoppeld op tag 4';
//} else {
//    $contrtag4 = mysqli_query($conl, "INSERT INTO teksttag(`idtekst`, `idtags`)
//			VALUES ('".$_POST["id"]."','".$_POST["mijnkeuze4"]."')");
//IF ($contrtag4)
//{
//	echo "Tag 4 is toegevoegd!"."<br />";
//}
//ELSE
//{
//	echo "Oeps.... Fout bij Tag 4: ". mysqli_error();
//}}
//
//echo '<br>p1 ' . $_POST["ntag1"];
//echo 'p2 ' . $_POST["ntag2"];
//echo 'p3 ' . $_POST["ntag3"];
//echo 'p4 ' . $_POST["ntag4"];
//
////if($_POST["ntag1"]) :
////  $mycheck = !isset($_POST["ntag1"]) ? 0 : $_POST["ntag1"];
////  echo '<br>dit is mijn check :'.$mycheck;
////endif;
//
//$mycheck1 = $_POST["ntag1"] ?: 0;
//  echo '<br>dit is mijn check 1:'.$mycheck1;
//IF ($mycheck1===0)
//    {
//    echo '<br> Geen nieuwe tag toegevoegd op tag 1';
//} else {
//$addtag1 = mysqli_query($conl, "INSERT INTO tags(`tag`)
//			VALUES ('".$_POST["ntag1"]."')");
//
//IF ($addtag1)
//{
//	echo "<br>Nieuwe tag 1 is toegevoegd!"."<br />";
//}
//ELSE
//{
//	echo "<br>Oeps.... Fout bij Nieuwe tag 1: ". mysqli_error();
//}}
//
//$mycheck2 = $_POST["ntag2"] ?: 0;
//  echo '<br>dit is mijn check 2:'.$mycheck2;
//IF ($mycheck2===0){
//    echo '<br> Geen nieuwe tag toegevoegd op tag 2';
//} else {
//    $addtag2 = mysqli_query($conl, "INSERT INTO tags(`tag`)
//			VALUES ('".$_POST["ntag2"]."')");
//
//IF ($addtag2)
//{
//	echo "<br>Nieuwe tag 2 is toegevoegd!"."<br />";
//}
//ELSE
//{
//	echo "<br>Oeps.... Fout bij Nieuwe tag 2: ". mysqli_error();
//}}
//
//$mycheck3 = $_POST["ntag3"] ?: 0;
//  echo '<br>dit is mijn check 3:'.$mycheck3;
//IF ($mycheck3===0){
//    echo '<br> Geen nieuwe tag toegevoegd op tag 3';
//} else {
//$addtag3 = mysqli_query($conl, "INSERT INTO tags(`tag`)
//VALUES ('".$_POST["ntag3"]."')");
//
//IF ($addtag3)
//{
//	echo "<br>Nieuwe tag 3 is toegevoegd!"."<br />";
//}
//ELSE
//{
//	echo "<br>Oeps.... Fout bij Nieuwe tag 3: ". mysqli_error();
//}}
//
//$mycheck4 = $_POST["ntag4"] ?: 0;
//  echo '<br>dit is mijn check 4:'.$mycheck4;
//IF ($mycheck4===0){
//    echo '<br> Geen nieuwe tag toegevoegd op tag 4';
//} else {
//$addtag4 = mysqli_query($conl, "INSERT INTO tags(`tag`)
//			VALUES ('".$_POST["ntag4"]."')");
//
//IF ($addtag4)
//{
//	echo "<br>Nieuwe tag 4 is toegevoegd!"."<br />";
//}
//ELSE
//{
//	echo "<br>Oeps.... Fout bij Nieuwe tag 4: ". mysqli_error();
//}}
//
//$answ1tekst = mysqli_query($conl, "SELECT      tekst.idtekst AS id,
//                                                tekst.idboeken AS tb,
//                                                tekst.tekst AS tk, 
//                                                tekst.Hstukvan AS hv, 
//						tekst.Hstuktot AS ht,
//                                                tekst.versbegin AS vb,
//                                                tekst.verseind AS ve,
//                                                boeken.idboeken AS bi,
//                                                boeken.boekennaam AS bk,
//                                                boeken.schrijver AS sv,
//                                                boeken.boekpic AS pc
//                                                
//                                                FROM tekst,boeken
//						WHERE tekst.idtekst = '" . $_POST['id'] . "' AND tekst.idboeken = boeken.idboeken");
//
//if (!$selecttekst) {
//    printf("Error: %s\n", mysqli_error($conl));
//    exit();
//}
//
//while ($select = mysqli_fetch_array($selecttekst)) {
//    if ($select["hv"] = $select["ht"]) {
//        echo '<hr><br>Uit het boek ' . $select["bk"] . ', hoofdstuk ' . $select["hv"] . ' vers ' . $select["vb"] . ' tot ' . $select["ve"] . ':<br>';
//        echo '<br>' . $select["tk"] . '<br>';
//        $idnu = $select['id'];
//    } else {
//        echo '<hr><br>Uit het boek ' . $select["bk"] . ', hoofdstuk ' . $select["hv"] . ' vers ' . $select["vb"] . ' tot hoofdstuk ' . $select["ht"] . ' vers ' . $select["ve"] . ':<br>';
//        echo '<br>' . $select["tk"] . '<br>';
//        $idnu = $select['id'];
//    }
//
//    echo 'dit is de id nu    '. $select['id'] ;
//echo '<br>dit zijn de tags <br>';
//$tagused = mysqli_query($conl, "SELECT teksttag.idtags FROM teksttag WHERE teksttag.idtekst = '" . $select['id'] . "' ");
//while ($taglink = mysqli_fetch_array($tagused)) {
////    echo 'dit zijn de tags ' . $taglink["idtags"];
//    $tagnames = mysqli_query($conl, "SELECT tags.tag FROM tags WHERE tags.idtags = '" . $taglink['idtags'] . "' ");
//    if ($tagnaam = mysqli_fetch_array($tagnames)) {
//    echo '<b>-' . $tagnaam["tag"] . ' </b>';
//    } else {
////    if (strlen($tagnaam["tag"])<3) {
//      
//        echo 'Er zijn niet meer tags gelinkt';
//    }}}
//        
?>

<?php
} else {
    ?> <article class="itemprt"> <?php
    echo 'Je bent niet bevoegd om deze pagina te kunnen zien. Hiervoor moet je ingelogd zijn.';
}
include '../templend.php';
