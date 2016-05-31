<?php
$pagina = basename(__FILE__);
$title = "Lorber - Tekst Verwijderen";
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

<h2 style="text-align:center"> Tekst Verwijderen </h2>

<p>Welcome <?php echo htmlentities($_SESSION['username']); ?>!</p>

<h3>Personalia</h3>

<?php
$ShowText = new Lorber;
echo $ShowText->GetText($_GET['id']);

?>
<form action="dell.php" method="POST">
    <input type="hidden" name = "id" VALUE="<?php echo $_GET['id'] ?>"/> 
<h1 style="text-align:center;">Weet u zeker dat u deze tekst wilt verwijderen?</h1><br />
  <input type="checkbox" name="del" value="0"> Ja <br /> 
  <input type="checkbox" name="del" value="1"> Nee <br />   <br /> 
   <br />
 <input type="submit" value= "Verwijder tekst"/>
</form>

<?php
} else {
    ?> <article class="itemprt"> <?php
    echo 'Je bent niet bevoegd om deze pagina te kunnen zien. Hiervoor moet je ingelogd zijn.';
}
    include '../templends.php';
        ?>