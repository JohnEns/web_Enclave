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

        <h1>Opdracht 6 - Tafel van 3</h1>
        <h2>Opgave</h2>
        <p>Maak	een	while-lus	die	er	voor	zorgt	dat je	de	tafel	van	3 print	op	het	
            scherm	tot	en met	de	25	*	3.	Het	resultaat ziet	er	dan	als	volgt	uit:</p>
        <ul>
            <li>0	x	3	=	0</li>
            <li>1	x	3	=	3</li>
            <li>2	x	3	=	6</li>
            <li>etc.</li>
        </ul>
        <h2>Uitwerking</h2>
        <?php
        $zoup = 0;

        while ($zoup <= 25) {
            echo "De multiplier is: $zoup <br>";
            echo "$zoup x 3 = ";
            echo $zoup * 3;
            echo "<br>";
            $zoup++;
            echo "<br>";
        }
        ?><h1>Opdracht 7 - Week Array</h1>
        <h2>Opgave</h2>
        <p>Maak	een	geïndexeerde array	dagen aan	en	vul	deze	met	alle	dagen	van	
            de	week.	Bijvoorbeeld	bij	index	0	staat	zondag,	bij	index	1	maandag,	etc.
            Maak	een	variabele	dagnummer aan	en	schrijf	het	array-element	met	de	
            index	dagnummer	naar	het	scherm.	Het	resultaat ziet	er	dan	als	volgt	
            uit:</p><p> Het	is	vandaag	dinsdag.</p><br/>
        <h2>Uitwerking</h2>
       <?php
        $dagen = array("zondag", "maandag", "dinsdag", "woensdag", "donderdag", "vrijdag", "zaterdag");
        $dagnummer = 5;
        echo "Het is vandaag $dagen[$dagnummer]<br>";
        echo "<br>";
        include 'tempfend.php';
        