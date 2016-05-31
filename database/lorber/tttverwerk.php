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
                header("refresh:1;url=dagtekst.php");
                break;

            case 2:
                include '../templsy.php';
             break;

            default :
               header("refresh:1;url=dagtekst.php");
        }?>
<h2 style="text-align:center"> Tekst Bewerking </h2>

    <p>Welcome <?php echo htmlentities($_SESSION['username']); ?>!</p>



    <?php
    echo $_POST['id'];
    $tekstc = htmlentities($_POST["tk"], ENT_QUOTES);

    $controle = ("UPDATE 'tekst' SET 'Hstukvan'='" . $_POST['hv'] . "',
                                    'versbegin' = '" . $_POST['vb'] . "',
                                    'Hstuktot' ='" . $_POST['ht'] . "',
                                    'verseind'='" . $_POST['ve'] . "',
                                    'tekst'='" . $tekstc . "', 
					WHERE tekst.idtekst = '" . $_POST['id'] . "' ");

    IF ($controle) {
        echo "<br>Tekst bewerkt!" . "<br />";
    } ELSE {
        echo "Oeps.... Fout: " . mysqli_error();
    }

    $TagLinker = new Lorber();
    echo $TagLinker->LinkTag($_POST['id'], $_POST["mijnkeuze1"], 1);
    echo $TagLinker->LinkTag($_POST['id'], $_POST["mijnkeuze2"], 2);
    echo $TagLinker->LinkTag($_POST['id'], $_POST["mijnkeuze3"], 3);
    echo $TagLinker->LinkTag($_POST['id'], $_POST["mijnkeuze4"], 4);


    echo '<br>p1 ' . $_POST["ntag1"];
    echo 'p2 ' . $_POST["ntag2"];
    echo 'p3 ' . $_POST["ntag3"];
    echo 'p4 ' . $_POST["ntag4"];

//if($_POST["ntag1"]) :
//  $mycheck = !isset($_POST["ntag1"]) ? 0 : $_POST["ntag1"];
//  echo '<br>dit is mijn check :'.$mycheck;
//endif;
    $ToevTag = new Lorber();
    
    echo $ToevTag->AddTag($_POST['id'], $_POST["ntag1"], 1, $_POST["link1"]);
    echo $ToevTag->AddTag($_POST['id'], $_POST["ntag2"], 2, $_POST["link2"]);
    echo $ToevTag->AddTag($_POST['id'], $_POST["ntag3"], 3, $_POST["link3"]);
    echo $ToevTag->AddTag($_POST['id'], $_POST["ntag4"], 4, $_POST["link4"]);

//    echo $ToevTag->AdTag($_POST["ntag1"], 1);
//    $check1 = isset($_POST['link1']) ? $_POST['link1'] : '0';
//    echo 'dit is check 1: ' .$check1;
//    if ($_POST["link1"]== 1){ echo $ToevTag->LinkTag($_POST['id'], $_POST["ntag1"], 1);} else {echo 'Niets gelinkt aan de tekst <br>';}
//    
//    echo $ToevTag->AdTag($_POST["ntag2"], 2);
//    $check1 = isset($_POST['link2']) ? $_POST['link2'] : '0';
//    echo 'dit is check 1: ' .$check1;
//    if ($_POST["link2"]== 1){ echo $ToevTag->LinkTag($_POST['id'], $_POST["ntag2"], 2);} else {echo 'Niets gelinkt aan de tekst <br>';}
//    
//    echo $ToevTag->AdTag($_POST["ntag3"], 3);
//    $check1 = isset($_POST['link3']) ? $_POST['link3'] : '0';
//    echo 'dit is check 1: ' .$check1;
//    if ($_POST["link3"]== 1){ echo $ToevTag->LinkTag($_POST['id'], $_POST["ntag3"], 3);} else {echo 'Niets gelinkt aan de tekst <br>';}
//    
//    echo $ToevTag->AdTag($_POST["ntag4"], 4);
//    $check1 = isset($_POST['link4']) ? $_POST['link4'] : '0';
//    echo 'dit is check 1: ' .$check1;
//    if ($_POST["link4"]== 1){ echo $ToevTag->LinkTag($_POST['id'], $_POST["ntag4"], 4);} else {echo 'Niets gelinkt aan de tekst <br>';}
    
//
//    $mycheck1 = $_POST["ntag1"] ? : 0;
//    echo '<br>dit is mijn check 1:' . $mycheck1;
//    IF ($mycheck1 === 0) {
//        echo '<br> Geen nieuwe tag toegevoegd op tag 1';
//    } else {
//        $addtag1 = mysqli_query($conl, "INSERT INTO tags(`tag`)
//			VALUES ('" . $_POST["ntag1"] . "')");
//
//        IF ($addtag1) {
//            echo "<br>Nieuwe tag 1 is toegevoegd!" . "<br />";
//        } ELSE {
//            echo "<br>Oeps.... Fout bij Nieuwe tag 1: " . mysqli_error();
//        }
//    }
//
//    $mycheck2 = $_POST["ntag2"] ? : 0;
//    echo '<br>dit is mijn check 2:' . $mycheck2;
//    IF ($mycheck2 === 0) {
//        echo '<br> Geen nieuwe tag toegevoegd op tag 2';
//    } else {
//        $addtag2 = mysqli_query($conl, "INSERT INTO tags(`tag`)
//			VALUES ('" . $_POST["ntag2"] . "')");
//
//        IF ($addtag2) {
//            echo "<br>Nieuwe tag 2 is toegevoegd!" . "<br />";
//        } ELSE {
//            echo "<br>Oeps.... Fout bij Nieuwe tag 2: " . mysqli_error();
//        }
//    }
//
//    $mycheck3 = $_POST["ntag3"] ? : 0;
//    echo '<br>dit is mijn check 3:' . $mycheck3;
//    IF ($mycheck3 === 0) {
//        echo '<br> Geen nieuwe tag toegevoegd op tag 3';
//    } else {
//        $addtag3 = mysqli_query($conl, "INSERT INTO tags(`tag`)
//VALUES ('" . $_POST["ntag3"] . "')");
//
//        IF ($addtag3) {
//            echo "<br>Nieuwe tag 3 is toegevoegd!" . "<br />";
//        } ELSE {
//            echo "<br>Oeps.... Fout bij Nieuwe tag 3: " . mysqli_error();
//        }
//    }
//
//    $mycheck4 = $_POST["ntag4"] ? : 0;
//    echo '<br>dit is mijn check 4:' . $mycheck4;
//    IF ($mycheck4 === 0) {
//        echo '<br> Geen nieuwe tag toegevoegd op tag 4';
//    } else {
//        $addtag4 = mysqli_query($conl, "INSERT INTO tags(`tag`)
//			VALUES ('" . $_POST["ntag4"] . "')");
//
//        IF ($addtag4) {
//            echo "<br>Nieuwe tag 4 is toegevoegd!" . "<br />";
//        } ELSE {
//            echo "<br>Oeps.... Fout bij Nieuwe tag 4: " . mysqli_error();
//        }
//    }

 $ShowText = new Lorber;
echo $ShowText->GetText($_POST['id']);

} else {
    ?> <article class="itemprt"> <?php
    echo 'Je bent niet bevoegd om deze pagina te kunnen zien. Hiervoor moet je ingelogd zijn.';
}
    include '../templends.php';
        ?>