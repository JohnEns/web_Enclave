<?php
$pagina = basename(__FILE__);
$title = "Lorber - Tag-lijst";
include '../inc.php';
include '../templ.php';

$tags = mysqli_query ($conl, "SELECT * FROM tags");
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
        }?>
<h1>Tag-lijst</h1>

<?php
echo "<table border='1'>
    <tr><th>id Tag</th>
<th>Tagnaam</th></tr>";
 
 WHILE ($tag = mysqli_fetch_array($tags))
{	
echo '<tr><td>' . $tag["idtags"] . '</td><td>' . $tag["tag"] . '</td></tr>';
           }
echo '</table>';

} else {
    ?> <article class="itemprt"> <?php
    echo 'Je bent niet bevoegd om deze pagina te kunnen zien. Hiervoor moet je ingelogd zijn.';
}
    include '../templend.php';
        ?>
<!--
<td><img src="'"../../img/lorber/boeken/" . $boek["boekpic"] . "'  class='small' alt='" . $boek["boekpic"] . "'>"'</td> 