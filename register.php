<?php
$title = "Enclave - Inschrijfformulier";

include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
include 'temp.php';
?>
<html>
    <!-- Registration form to be output if the POST variables are not
    set or if the registration script caused an error. -->
    <h1>Inschrijfformulier Enclave</h1>
    <?php
    if (!empty($error_msg)) {
        echo $error_msg;
    }
    ?>
    <h2>Eisen aan de inschrijving</h2>
    <ul style="margin-left:20px; list-style-image: url(img/opmaak/pluspunt.png);">
        <li>Gebruikersnamen mogen alleen getallen, kleine en hoofdletters en liggende streepjes (_) bevatten</li>
        <li>E-mailadressen moeten een valide vorm hebben <i>(bijvoorbeeld: Jan@test.nl)</i></li>
        <li>Je wachtwoord moet ten minste 6 tekens bevatten</li>
        <li>In je wachtwoord moet het volgende zitten:
            <ul style="list-style-type: circle;">
                <li>Ten minste één hoofdletter (A..Z)</li>
                <li>Ten minste één kleine letter (a..z)</li>
                <li>Ten minste één getal (0..9)</li>
            </ul>
        </li>
        <li>Je wachtwoord en de Bevestiging ervan moeten exact overeenkomen</li>
    </ul>
    <table>
        <form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" method="post" name="registration_form">

            <tr><td></td><td></td></tr>  
            <tr><td><div style="float:right;">Gebruikersnaam:</div></td><td><input type='text' name='username' id='username' /><br></td></tr>  
            <tr><td><div style="float:right;">E-mailadres:</div></td><td><input type="text" name="email" id="email" /><br></td></tr>  
            <tr><td><div style="float:right;">Wachtwoord: </div></td><td><input type="password" name="password" id="password"/><br></td></tr>  
            <tr><td><div style="float:right;">Herhaal je Wachtwoord: </div></td><td><input type="password" name="confirmpwd" id="confirmpwd" /><br></td></tr>  
    </table>
    
    <input type="button" value="Register" 
           onclick="return regformhash(this.form,
                           this.form.username,
                           this.form.email,
                           this.form.password,
                           this.form.confirmpwd);" /> 

</form>

<h4>Keer terug naar de <a href="inlog.php">Inlogpagina</a>.</h4>
</body>
</html>

<?php
include 'tempend.php';
?>
