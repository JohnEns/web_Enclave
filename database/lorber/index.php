<?php
$pagina = basename(__FILE__);
$title = "Lorber - Database";
include '../inc.php';
include '../templ.php';

//$rolo = rols($mysqli) ;
//
//             echo '<br>dit is rolp -' . $rolp . '<- <br>'; 
//            switch ($rolo) {
//                case 1:
//                    include '../templsc.php';
//                    break;
//
//                case 2:
//                    include '../templsy.php';
//                  
//                    break;
//
//                default :
//                    header("refresh:2;url=dagtekst.php");
//            }

//if (login_check($mysqli) == true) {
//    echo 'naam ->' . htmlentities($_SESSION['username']);
//    echo 'id ->' . htmlentities($_SESSION['user_id']);
//
//    $ids = htmlentities($_SESSION['user_id']);
//    echo 'dit is ids ->' . $ids . '<-';
//    $rollenspeler = mysqli_query($mysqli, "SELECT roles.members AS roles FROM members WHERE id.members = $ids");
//
//    while ($rollenspel = mysqli_fetch_array($rollenspeler)) {
//        $rollenspel['roles'] = $rolo;
//        echo 'dit is rolo -' . $rolo . '<-';
//
   
//    }
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
               header("url=dagtekst.php");
                die();
        }?>

    <h1>Welkom <?php echo htmlentities($_SESSION['username']);
    ?>!</h1>
    <article class="itemprt">
        <!--<h2>Welkom</h2>-->
        <p>Van harte welkom! Hier vindt u dagteksten, geselecteerd uit de werken van Jakob Lorber.
            Wij hopen binnenkort ook een app uit te brengen.<br>

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
                }
            }
//  echo "</table>";     

            echo '<br><h3><a href="dagtekst.php">Hier de Dagtekst</a></h3><br>';

            if ($zoek = $conl->query("SELECT tekst.idtekst FROM tekst")) {
                $row_cnt = $zoek->num_rows;
                printf("Er zijn %d rijen in de tabel", $row_cnt);
            }


            $conl->close();
            ?>
            <!--<h2><a href = "verkeer/verkeer.php">Link naar verkeer-database </a></h2> -->
    </article>
    <?php
} else {
    ?> <article class="itemprt"> <?php
    echo 'Je bent niet bevoegd om deze pagina te kunnen zien. Hiervoor moet je ingelogd zijn.';
}


include '../templend.php';
?>


