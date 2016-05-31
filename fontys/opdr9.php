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
        <h1>Opdracht 9 - Hashing</h1>
        <h2>Opgave</h2>
        <p>Schrijf	een	functie	myHashing die een	wachtwoord	versleuteld	met	de	
            PHP	functie	md5() of	sha1().	Zoek	op	hoe	deze twee	functies	werken	op	
            www.php.net of	www.w3schools.com/php. De	functie	krijgt	2	
            argumenten	mee	(wachtwoord	en	type	hashing) en	retourneert	een	
            MD5	hash	of	een	SHA1	hash.	De	aanroep	van	de	functie	kan	er	als	volgt	
            uitzien:
            <b> myHashing	("wachtwoord","MD5");</b></p>
        <h2>Uitwerking</h2>
        <?php
        $ww = "SterkWW";
        echo "Het wachtwoord is: " . $ww . "<br>";
        echo "Dit is de output in hex met md5: " . md5($ww) . "<br>";
        // Volgens PHP.net is md5 al achterhaald en niet veilig genoeg. Er moet eigenlijk een berekende variabele voor, genaamd een SALT. 
        // Dit probeer ik een andere keer. Nu doen we hetzelfde, maar dan volgens het sha1 principe
        echo "<br>Volgens PHP.net is md5 al achterhaald en niet veilig genoeg. Er moet eigenlijk een berekende variabele voor, genaamd een SALT. Dit probeer ik een andere keer. Nu doen we hetzelfde, maar dan volgens het sha1 principe<br>";
        echo "<br>Dit is de output met behulp van sha1: " . sha1($ww) . "<br>";
        ?>

        <h1>Opdracht 10 - Datum</h1>
        <h2>Opgave</h2>
        <p>Schrijf	een	functie	die	de	huidige	datum teruggeeft in	het	volgende	
            formaat:	dd-mm-yyyy.</p><br/>
        <h2>Uitwerking</h2>
        <?php
        echo "Vandaag is het " . date("dd-mm-yyyy") . "<br>";
        echo "<br>Mijn voorkeur heeft deze notatie:  <br>";
        echo "Vandaag is het " . date("d-M-Y") . "<br>";
        ?>

        <h1>Opdracht 11 - Groet</h1>
        <h2>Opgave</h2>
        <p>Schrijf	een	functie	die afhankelijk	van	de	huidige	tijd	een	van	de	
            volgende	groeten	teruggeeft:	goede	morgen,	goede	middag	of	goede	
            avond.</p><br/>
        <h2>Uitwerking</h2>
        <?php
        $timenow = date("H:i");

        echo "Het is nu " . $timenow . "<br>";
        $hournow = date("H");
        if ($hournow > 6 and $hournow <= 11) {
            echo " Goeiemorgen!";
        } else if ($hournow > 11 and $hournow <= 17) {
            echo " Goedemiddag!";
        } else if ($hournow > 17 and $hournow <= 0) {
            echo " Goedenavond!";
        } else {
            echo "Goedennacht!";
        }
        
        include 'tempfend.php';
        