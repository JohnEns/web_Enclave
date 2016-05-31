<?php
$pagina = basename(__FILE__);
$title = "Lorber - Toevoegen Boek";
include '../inc.php';
?><script src="../../ckeditor/ckeditor.js"></script><?php
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
               header("refresh:1;url=dagtekst.php");
        }?>

<h2> Toevoegen Boek met CMS</h2>

<p>Welkom <?php echo htmlentities($_SESSION['username']); ?>!<br></p>



<form action="toevboekcms.php" method="POST" enctype="multipart/form-data">

      <textarea name="toeboeked" id="toeboeked" rows="10" cols="80">
                Hier komt mijn CKEditor-test.
            </textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'toeboeked' );
            </script>
<!--    <br />
    <br />
    <table >
        <tr><td>Boekennaam: </td><td><input type="text" name = "bn"> <br /></td></tr>
        <tr><td>Naam plaatje*: </td><td><input type="text" name = "pc"> <br /></td></tr>
        <tr><td> Info over het boek: </td><td><input type="text" name = "in"> <br /></td></tr>
        <tr><td> ISBN-13: </td><td><input type="text" name = "is"> <br /></td></tr>
        <tr><td> ISBN-10 (indien nodig): </td><td><input type="text" name = "ib"> <br /></td></tr>
        <tr><td>Schrijver: </td><td><input type="text" name = "sv" VALUE="Jakob Lorber"> <br /></td></tr>
        <tr><td>Verschijndatum: </td><td> <input type="date" name = "dt"> <br /></td></tr>	
        
        Selecteer het plaatje dat je wilt koppelen aan dit boek:
            <input type="file" name="bkpic" id="bkpic">
            <input type="submit" value="Upload plaatje" name="submit">
        
        
    </table>
    <br />
    <input type="submit" value= "Voeg boek toe"  name="submit"/>-->
</form>

  

<?php
} else {
    ?> <article class="itemprt"> <?php
    echo 'Je bent niet bevoegd om deze pagina te kunnen zien. Hiervoor moet je ingelogd zijn.';
}

include '../templends.php';
?>
