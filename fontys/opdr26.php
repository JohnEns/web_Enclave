<?php
$pagina = basename(__FILE__);
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
        <h1>Opdracht - </h1>
        <h2>Opgave</h2>   
        <p></p>
        <ol>
            <li>Maak een bestand persoon.php en declareer hierin de klasse Persoon met:
- properties: voornaam, achternaam, woonplaats- 
                constructor: __construct($v=null,$a=null,$w=null)- functie: toonNaam() toont voor- en achternaam</li>
            <li>Maak een php-script wie.php waarin:- de class-file persoon.php wordt ingevoegd met require_once("persoon.php"); 
- $persoon1 en $persoon2 worden geïnstantieerd.- Echo de namen van de personen naar het scherm.</li>
        </ol>
        <h2>Uitwerking</h2>
        <?php
        include 'tempfend.php';

        