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
        <h1>Opdracht 8 - Uitdaging</h1>
        <h2>Opgave</h2>
        <p>Maak	een	associatieve	array	met	de	naam	prijs aan en	gebruik	als	index	
            de	productnaam.	Vul	deze	array	met	prijzen	voor	een	vijftal	producten.	
        </p>
        <ol>
            <li>a) Toon	de	inhoud	van	de	array	met	een	foreach-lus.</li>
            <li>b) Bereken	het	totaalbedrag door	alle	prijzen	bij	elkaar	op	te	tellen.	</li>
            <li>c) Voeg	nog	een	product	toe	aan	de	array.</li>
            <li>d) Sorteer	de	array	van	laagste	prijs	naar	hoogste	prijs.</li>
        </ol>
        <h2>Uitwerking</h2>
        <?php
        $uit['Mobo'] = 325;
        $uit['Graka'] = 435.33;
        $uit['Kast'] = 169.5;
        $uit['Proc'] = 389.99;
        $uit['RAM'] = 125;
        $uit['SSD'] = 155.26;

        foreach ($uit as $x => $x_value) {
            echo "Product = " . $x . ", Prijs = " . $x_value;
            echo "<br>";
        }
        echo "<br>";
        echo "We gaan een stapje verder. <br>";
        $totaal = 0;
        foreach ($uit as $x => $x_value) {
            $totaal = $totaal + $x_value;
            echo "Totale prijs is $totaal";
            echo "<br>";
        }
        echo "<br>";

        $uit['PSX'] = 112;
        asort($uit);
        echo "Gesorteerd en aangevuld<br>";
        foreach ($uit as $x => $x_value) {
            echo "Product = " . $x . ", Prijs = " . $x_value;
            echo "<br>";
        }
        echo "<br>";
        include 'tempfend.php';
