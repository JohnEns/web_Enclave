<?php

include_once 'db_connect.php';
include_once 'functions.php';
//include_once '../temp.php';

sec_session_start(); // Our custom secure way of starting a PHP session.


require_once('recaptchalib.php');
$privatekey = "6LeRhxUTAAAAAPr0SwVaQSVyJKkOwlxfi_IS-msk";

$resp = recaptcha_check_answer($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);
//$resp = null;
if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
    die("De reCAPTCHA is niet goed ingevuld. Probeer het opnieuw alsjelieft." .
            "(reCAPTCHA zegt er zelf over: " . $resp->error . ")");
} else {
    // Your code here to handle a successful verification

    if (isset($_POST['email'], $_POST['p'])) {
        $email = $_POST['email'];
        $password = $_POST['p']; // The hashed password.

        if (login($email, $password, $mysqli) == true) {
            // Login success 
            header('Location: ../font.php');
        } else {
            // Login failed 
            header('Location: ../register.php?error=1');
        }
    } else {
        // The correct POST variables were not sent to this page. 
        echo 'Foutieve doorverwijzing. Heb je daadwerkelijk je e-mail en wachtwoord ingevuld?';
    }
}
?>
