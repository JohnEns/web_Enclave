<?php
$pagina = basename(__FILE__);
$title = "Lorber - Zoeken";
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
<h2 style="text-align:center">Zoeken naar een tekst ahv tags</h2>
<p>
    
</p>
<!--<h3 style="text-align:center"> Kies boek </h3>-->


<form action="zoekverwerk.php" method="POST">

    <?php
    echo '    <table ><tr><th>Zoekterm 1</th><th>Zoekterm 2</th></tr>';
    echo '<tr><td>';
    $tags1 = mysqli_query($conl, "SELECT * FROM tags ORDER BY tag ASC");

    echo'<select name="zoek1">';
    
        echo '<option value="">Geen tag geselecteerd</option>' . '<br />';
        while ($rij = mysqli_fetch_array($tags1)) {
            $value = $rij['idtags'];
            echo "<option value=\"$value\">" . $rij['tag']."</option>";
        echo "<br />";
        echo "<br />";
    }
    echo'</select>';
    echo '</td><td>';
    
    $tags2 = mysqli_query($conl, "SELECT * FROM tags ORDER BY tag ASC");

    echo'<select name="zoek2">';
    
        echo '<option value="">Geen tag geselecteerd</option>' . '<br />';
        while ($rij = mysqli_fetch_array($tags2)) {
            $value = $rij['idtags'];
            echo "<option value=\"$value\">" . $rij['tag']."</option>";
        echo "<br />";
        echo "<br />";
    }
    echo'</select>';
  
    echo '</td></tr></table>';
   
  ?>      
    
    <input type="submit" value= "Zoek de tekst(en)"/>
</form>







<?php
} else {
    ?> <article class="itemprt"> <?php
    echo 'Je bent niet bevoegd om deze pagina te kunnen zien. Hiervoor moet je ingelogd zijn.';
}
include '../templend.php';
?>