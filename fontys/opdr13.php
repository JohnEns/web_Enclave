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
        <h1>Opdracht 13 - Random plaatjes met voorkeur</h1>
        <h2>Opgave</h2>   
        <p>Pas	de	functie	in	opdracht	12 aan	zodat	je	het	ene	plaatje vaker	ziet	dan	
            het	andere plaatje.	Laat	bijvoorbeeld	een	plaatje	50%	van	de	keren	zien,	
            een	andere	plaatje	20	%	van	de	keren	en	de	overige	plaatjes	in	10%	van	
            de	keren.</p>
        <h2>Uitwerking</h2>   
        <?php
        $kans = mt_rand(1, 4);

        if ($kans > 0 and $kans <= 2) {
            $random = 12;
            echo "<br>$random<br>";
        } else if ($kans == 3) {
            $random = mt_rand(01, 11);
            echo "<br>$random<br>";
        } else {

            $random = mt_rand(13, 332);
            echo "<br>$random<br>";
        }

        $plaatje = $random * 10;
        $ext = ".jpg";
        $pad = "../img/collectie/";

        echo "<img src='" . $pad . $random . $ext . "' class='medium' alt='" . $plaatje . "'><br/>";
        echo "<br>Kans van de kans op kans.<br>";
        include 'tempfend.php';
        ?>