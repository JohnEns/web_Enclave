<?php
$pagina = basename(__FILE__);

function __autoload($class) {
    include_once $class . ".php";
}

$controller = new NewsController();
$newsi = $controller->start();
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
        <h1>Opdracht 21 - Aanmelden	voor	nieuwsbrief</h1>
        <h2>Opgave</h2>   
        <p></p>
        <ol>
            <li>a) Maak	een	pagina	met	een	formulier	waarmee	je	je	kunt	
                aanmelden	voor	een	nieuwsbrief.	De	velden	e-mail,	naam	en	
                woonplaats	zijn	verplicht.	Zie	onderstaande	afbeelding.<br>
            <img src="../img/opmaak/opdr21.jpg" class="medium" alt="opdracht 21" /></li>
            <li>b) Maak	de	php code	waarmee	je	de	ingevoerde	gegevens	en	de	
                huidige	datum	gescheiden	door	komma’s	opslaat	in	het	bestand	
                nieuwbrief.txt. Bijvoorbeeld:
                test@test.bn,Jan,Elburg,2014-10-29,test2@test.bn,Piet,Didam,2014-10-
                29test3@test.bn,Karel,Borken,2014-10-29,</li>
        </ol>
        <h2>Uitwerking</h2>
            <form method="post">
            <table>
                <caption><h2>Aanmelden Nieuwsbrief</h2></caption>
                <tr><th></th><th></th></tr>
                <tr><td>E-mail: </td><td><input type='text' name='email'></td></tr>
                <tr><td>Gebruikersnaam: </td><td><input type='text' name='userName'></td></tr>
                <tr><td>Woonplaats: </td><td><input type='text' name='woonplaats'></td></tr>
                <tr><td>Druk op die knop: </td><td><input type='submit' value='Aanmelden'></td></tr>
            </table>
        </form>

        <?php
        $newsi->WriteHtml();

        include 'tempfend.php';

        