<?php
$pagina = basename(__FILE__);
$title = "Lorber - Boekenlijst";
include '../inc.php';
include '../templ.php';;

$Boeken = mysqli_query($conl, "SELECT * FROM boeken");
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
<h1>Welkom klsbvhriehrikhreihriuehiehiuthuiheguit<?php echo htmlentities($_SESSION['username']);
    ?>!</h1>
<h1>Boekenlijst</h1>


<?php
//echo " Boekenlijst";
//echo "<table border='2'>
//<tr>
//<th>id</th>
// <th>Boekennaam</th>
// <th>Boekeninfo</th>
// <th>Schrijver</th>
// <th width='250px'>Plaatje</th>
// </tr>
//</table>";

WHILE ($boek = mysqli_fetch_array($Boeken)) {
    if (!empty($boek["boekpic"])) {
      $bkpc = "<img src='../../img/lorber/boeken/" . $boek["boekpic"] . "'  class='small' alt='" . $boek["boekpic"] . "'><br><br>";
    } else {
      $bkpc = "<img src='../../img/lorber/lorber small.jpg' class='small' alt='placeholder'><br><br>";
    }
    echo '<hr><br><article class="itembk"> <ul class="booklist">
                            <li>' .$bkpc .  '</li></ul>';
                        
//***** nu de andere text kant
    echo ' <div class="bkinfo"><b>Naam boek: </b>' . $boek["boekennaam"] . '<br><b> Schrijver: </b>' . $boek["schrijver"] . '<br><b> ISBN-13: </b>' . $boek["ISBN"] .'<br><br><b> Info over het boek: </b><br>' . $boek["boekeninfo"] . '</div>' ;
    echo '</article>';
//
//     if (!empty($boek["boekpic"])) {
//        echo "<img src='../../img/lorber/boeken/" . $boek["boekpic"] . "'  class='small' alt='" . $boek["boekpic"] . "'><br><br>";
//    } else {
//        echo "<img src='../../img/lorber/lorber small.jpg' class='small' alt='placeholder'><br><br>";
//    }
//    
    
    
    
    
//    if (isset($boek["boekpic"])) {
//        echo "<img src='../../img/lorber/boeken/" . $boek["boekpic"] . "'  class='small' alt='" . $boek["boekpic"] . "'><br><br>";
//    } else {
//        echo "<img src='../../img/lorber/Lorber zit.jpg' class='small' alt='placeholder'><br><br>";
//    }
}



include '../templend.php';
?>
<!--
<td><img src="'"../../img/lorber/boeken/" . $boek["boekpic"] . "'  class='small' alt='" . $boek["boekpic"] . "'>"'</td> 