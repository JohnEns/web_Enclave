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
        <p>

        <h1>Opdracht 1 - Hoi</h1>
        <h2>Opgave</h2>
        <p>Maak een Hello World pagina die “Hello World!” toont op het scherm.</p><br/>
        <h2>Uitwerking</h2>
        <?php
        echo "Hello World<br>";
        echo "<br>";
        ?><h1>Opdracht 2 - Lerdorf</h1>
        <h2>Opgave</h2>
        <p>Zet	de	volgende 2	regels:<b>	Rasmus	Lerdorf is	de	maker	van	"PHP".	Hij	
                ontwikkelde	deze	"server-side	scripttaal"	in	1994.</b> in	de	variabele	
            “makerPHP”.	Maak	gebruik	van	PHP	string	functies	strlen() en
            strtoupper().</p><p>
        <ol>
            <li>  a) Toon	de	2	regels op	het	beeld.</li>
            <li>b) Laat	zien	uit	hoeveel	karakters	de	regels bestaat.</li>
            <li>c) Toon de	regels in	hoofdletters.</li>
        </ol>

        <h2>Uitwerking</h2>  


        <?php
        $makerPHP = "Rasmus Lerdorf is de maker van \"PHP\". Hij ontwikkelde deze \"server-side	scripttaal\" in 1994.<br>";

        echo $makerPHP . "<br>";
        echo "aantal tekens in deze zin: " . strlen($makerPHP) . "<br>";
        echo "In hoofdletters wordt het: " . strtoupper($makerPHP) . "<br>";
        echo "<br>";
        ?><h1>Opdracht 3 - Temperatuur</h1>
        <h2>Opgave</h2>
        <p>Maak	de variabele met	de	naam	"temperatuur" aan	en	zorg	dat	met	een
            if elseif …	else statement de volgende boodschappen worden	getoond in
            de	browser:</p>
            <ol>
                <li>a. Als de temperatuur lager is dan 0 graden, dan	wordt de boodschap
                    "Het vriest!" getoond;</li>  
                <li>b. Als de temperatuur lager is dan -273.15 graden	, dan	wordt de
                    boodschap "Dat kan niet!" getoond;</li>
                <li>c. Als de temperatuur tussen de 0 en de 15 graden	is, dan	wordt de
                    boodschap "Beetje	koud!" getoond;</li>
                <li>d. Als	de	temperatuur	boven	de	15	en	onder	de	30	graden	is, wordt
                    de boodschap "Prima	weer!" getoond;</li>
                <li>e. Als de temperatuur 30 graden of	hoger	is,	dan	wordt de boodschap
"Heet!" getoond.</li>
            </ol>
        <h2>Uitwerking</h2>
      <?php
        $temperatuur = 4;

        if ($temperatuur <= 0) {
            echo " Het vriest!";
        } else if ($temperatuur < -273.15) {
            echo"Dat kan niet";
        } else if ($temperatuur < 15 and $temperatuur > 0) {
            echo"Beetje koud";
        } else if ($temperatuur > 15) {
            echo"Prima weer!";
        } else if ($temperatuur > 30) {
            echo"Heet!";
        }

        echo "<br>";

        echo "<br>";
        ?><h1>Opdracht 4 - De maanden</h1>
        <h2>Opgave</h2>
        <p>Maak	gebruik	van	een	switch	statement	om	op	basis	van	het	
maandnummer	de	maand te	tonen.	Dus	1 = januari,	2	=	februari,	3 =	
maart	etc. Vergeet	niet	om	een	default	te	definiëren	bij	een	switch	
statement.</p><br/>
        <h2>Uitwerking</h2>
    <?php
        $maandnummer = "3";

        switch ($maandnummer) {
            case "1":
                echo "januari";
                break;
            case "2":
                echo "februari";
                break;
            case "3":
                echo "maart";
                break;
            case "4":
                echo "april";
                break;
            case "5":
                echo "mei";
                break;
            case "6":
                echo "juni";
                break;
            case "7":
                echo "juli";
                break;
            case "8":
                echo "augustus";
                break;
            case "9":
                echo "september";
                break;
            case "10":
                echo "oktober";
                break;
            case "11":
                echo "november";
                break;
            case "12":
                echo "december";
                break;
            default:
                echo "je maand kan niet worden bepaald.";
        } echo "<br>";

        echo "<br>";

        include 'tempfend.php';
        ?>
