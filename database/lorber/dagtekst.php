<?php
$pagina = basename(__FILE__);
$title = "Lorber - Dagtekst";
 include '../inc.php';
include '../templ.php';
include '../lorber.php';


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
        
        $randomizer = new Lorber();
        echo $randomizer->RandomID();

        
        ?>
</article>
<?php
include '../templend.php';
?>


