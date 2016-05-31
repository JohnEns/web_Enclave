<?php
$pagina = basename(__FILE__);
$title = "Enclave - Inloggen";

include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

include 'temp.php';

sec_session_start();

if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'uit';
}


?>
<article class="item">
<?php
if (isset($_GET['error'])) {
    echo '<p class="error">Er gaat iets fout met inloggen!</p>';
}
?> 
<form action="includes/process_login.php" method="post" name="login_form">   
    <table>
    <h2>Inlogformulier</h2><br>
   
    
    E-mailadres: <input type="text" name="email" />
    Wachtwoord: <input type="password" name="password" id="password"/>
    
    <!--<div class="g-recaptcha" data-sitekey="6LeRhxUTAAAAAOHBqklme4y8G_-ddTRysf0fEueR"></div>-->
            
             <script type="text/javascript" src="https://www.google.com/recaptcha/api/challenge?k=6LeRhxUTAAAAAOHBqklme4y8G_-ddTRysf0fEueR"
        <script src='https://www.google.com/recaptcha/api.js?hl=nl'></script>
            <noscript>
        <iframe src="https://www.google.com/recaptcha/api/noscript?k=6LeRhxUTAAAAAOHBqklme4y8G_-ddTRysf0fEueR"
                height="300" width="500" frameborder="0"></iframe><br>
        </noscript>
         <?php
            require_once('includes/recaptchalib.php');
            $publickey = "6LeRhxUTAAAAAOHBqklme4y8G_-ddTRysf0fEueR"; 
            echo recaptcha_get_html($publickey);

            ?>
    <input type="button" value="Login" 
           onclick="formhash(this.form, this.form.password);" /> 
    </table>
</form>

<?php
if (login_check($mysqli) == true) {
    echo '<p>Je bent ' . $logged . 'gelogd als ' . htmlentities($_SESSION['username']) . '.</p>';

    echo '<p>Wil je inloggen als een andere gebruiker? <a href="includes/logout.php">Uitloggen</a>.</p>';
} else {
    echo '<p>Momenteel ' . $logged . 'gelogd.</p>';
    echo "<p>Als je nog geen Enclave-lid bent, <a href='register.php'>schrijf je in</a></p>";
}
?>      
</article>
<?php
include 'tempend.php';
?>
