<?php
$pagina = basename(__FILE__);

/**
 * Starten van de sessie
 */
session_start();
$_SESSION['datetime'] =date("d-m-Y, H:i", time());

/**
 * Instellen van het cookie. Deze is slechts 1 uur actief.
 * Dit cookie van opdracht 18 handhaven we gewoon.
 */
$cookie_name = "user";
$cookie_value = "count";
setcookie($cookie_name, $cookie_value, time() + (360), "/");

pageLoad();

/**
 * Teller genaamd cookie['count'] activeren en bijhouden.
 */
function pageLoad() {
    global $teller;
    if (!isset($_COOKIE['count'])) {
        $teller = "Welkom op deze pagina. Je bent hier voor het eerst (volgens ons koekie).";
        $cookie = 1;
        setcookie("count", $cookie);
        $_SESSION["counter"] = $cookie;
    } else {
        $cookie = ++$_COOKIE['count'];
        setcookie("count", $cookie);
        $_SESSION["counter"] = $cookie;
        $teller = "<div id='fruitreeks'><h2><marquee>Je bent hier al " . $_SESSION["counter"] . " keer geweest. Wordt toch lid!<br></marquee></h2></div>";
        
    }
    return $teller;
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
        <h1>Opdracht 19 - Session</h1>
        <h2>Opgave</h2>   
        <ol>
            <li>a) Voer	opdracht	18 nog	een	keer	uit,	maar	nu	met	een	sessie	
                variabele.	</li>
            <li>b) Hou	ook	bij	wanneer	de	laatste	aanroep	van	de	pagina	was	(DD
                MM-JJJJ).	Toon	deze	informatie	bij	het	bezoeken	van	een	pagina.</li>
        </ol>
        <h2>Uitwerking</h2>
        <?php


        echo $teller;

        echo "<br>Inhoud van onze sessie: <br>";
        print_r($_SESSION);

           echo "<br>Deze sessie is actief sinds: ";
           echo $_SESSION['datetime'] . "<br>";
           
        
        
        include 'tempfend.php';

        