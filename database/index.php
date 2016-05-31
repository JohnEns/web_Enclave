<?php
$pagina = basename(__FILE__);
$title = "Enclave - Databases";

include 'tempd.html';
include("connect.php");
?>
<h3> Overzichtstabel </h3>

<?php
//
//        $vrienden = mysql_query("SELECT vrienden.id AS id, 
//                                        vrienden.voornaam AS vn, 
//					vrienden.achternaam AS an, 
//                                        vrienden.beschrijving AS bs,
//                                            FROM vrienden");
//        
//$testt ="SELECT * FROM vrienden";
//$result = mysql_query($testt);
//$num=mysql_numrows($result);
//$i=0;
//while ($i < $num) {
//    $vn=  mysql_result($result,$i,"voornaam");
//    $an=  mysql_result($result,$i,"achternaam");
//    $bs=  mysql_result($result,$i,"beschrijving");
//    
//    echo $vn . " " . $an ;
//    echo "<br>" . $bs . "<br>";
//    $i++;
//    echo "<br>";
//
//}
//    while ($i < $num) {
//    $vn=  mysql_result($result,$i,"voornaam");
//    $an=  mysql_result($result,$i,"achternaam");
//    $bs=  mysql_result($result,$i,"beschrijving");    
//    
//            echo "<tr><td>$vn</td> 
//
// <td>$an</td>  
// <td>$bs</td>";
//
// $i++;
//
//}
?>
<article class="itemprt">
    <h2><a href="vrienden/vriendenboek.php">Link naar vriendenboek-database </a></h2>
    <h2><a href="verkeer/verkeer.php">Link naar verkeer-database </a></h2>
    <h2><a href="lorber/index.php">Link naar Jakob Lorber-database </a></h2>
</article>
<?php
include 'tempdend.php';
?>


