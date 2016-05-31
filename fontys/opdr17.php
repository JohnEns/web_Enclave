<?php
$pagina = basename(__FILE__);

$controller = new LoginController();
$view = $controller->start();

function __autoload($class) {
    include_once $class . ".php";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description"
              content="Game Gaming Gear" />
        <meta name="keywords"
              content="gaming, game, opinion, pc, console, playstation, xbox" />
        <title>Enclave Gaming</title>
        <link href="../css/styles.css" type="text/css" rel="stylesheet" />

    </head>
    <body>
        <?php
        include 'tempf.html';
        ?>
        <h1>Opdracht 17 - Inlogformulier</h1>
        <h2>Opgave</h2>   
        <ol>
            <li>a) Maak	een	inlogformulier	waarmee	je	kunt	inloggen	op	een	
                website.		Verzin	voor	de	controle	minimaal	twee	of	meerdere	
                gebruikersnamen	en	wachtwoorden	die	toegestaan	zijn.
            </li>
            <li>b) Zorg	dat	het	formulier	en	het	resultaat	in	één	php	script	staan.
                Geef	een	passende	melding	als	het	inloggen	gelukt	of	mislukt	is.</li>
        </ol>
        <h2>Uitwerking</h2>

        <form method="post">
            <table>
                <tr><th></th><th></th></tr>
                <tr><td>Gebruikersnaam: </td><td><input type='text' name='userName'></td></tr>
                <tr><td>Wachtwoord: </td><td><input type='password' name='password'></td></tr>
                <tr><td>Druk op die knop: </td><td><input type='submit' value='Submit'></td></tr>
            </table>
        </form>

        <?php
        $view->WriteHtml();

        include 'tempfend.php';
        ?>


