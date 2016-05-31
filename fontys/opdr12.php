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
        <h1>Opdracht 12 - Random plaatjes</h1>
     <h2>Opgave</h2>   
        <p>Schrijf	een	functie	die	gegevens	van	een	random	plaatje teruggeeft.
            Deze	functie	retourneert	een	array	met	de	naam	van	het	plaatje (srcattribuut),	de	alt-attribuut en	de	naam	van	de	bijbehorende link. De	
            functie	maakt	gebruik	van	de	PHP	functie	mt_rand().
            Maak	een	pagina	die gebruik	maakt	van	jouw	eigengemaakte	functie	en	
            iedere	keer	als	deze wordt	geladen,	een	ander	plaatje	toont. Als	je	op een	plaatje	klikt,	dan wordt de	bijbehorende	link	geopend (voor	meer	
            informatie	over	het	plaatje).</p>
        <h2>Uitwerking</h2>
        <?php

        /** map met plaatjes
         * Dit proces moet makkelijker toegewezen kunnen worden, met '../img/' als beginpunt
         * en een variabele als de mapnaam
         */
        function picmap($map) {
            $reeks = "../img/" . $map;
            return $reeks;
        }

        $locatieplaatjes = 'test';


        //  echo picmap($locatieplaatjes) . "<br/>";



        /** Deze functie kan korter, want het afvangen van de . en .. is overbodig, zolang er vanaf nummer 2 wordt gezocht.
         * 
         */
        $plaatjesdump = scandir(picmap($locatieplaatjes));
        /** Het bepalen van het aantal plaatjes in de map.
         * 
         */
        $aantalpics = count($plaatjesdump);
        $aantal = $aantalpics - 2;

        $functievang = mt_rand(2, $aantalpics);
        echo "<br/>aantal plaatjes in de map: " . $aantal . "<br/>";
        echo "<br/>Plaatje nummer: " . $functievang . "<br/>";
        $plaatje = $plaatjesdump[$functievang];

        echo"
        <h2>" . $plaatje . "</h2>";
        echo"<img src='" . picmap($locatieplaatjes) . "/" . $plaatje . "' class='medium' alt='" . $plaatje . "'><br/>";

        include 'tempfend.php';

        