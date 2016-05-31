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
        <h1>Opdracht 5a - Lettergrootte</h1>
        <h2>Opgave</h2>
        <p>Schrijf	een	for-lus	waarbij	de	lettergrootte van	de	zin	“Hello	World!”	
            oploopt van	10px	naar	100px.</p><br/>
        <h2>Uitwerking</h2>
        <?php
        for ($fnt = 10; $fnt <= 100; $fnt++) {
            echo "Het font is: " . $fnt . " pixels <br>";
            ?><p style="font-size:<?php echo $fnt ?>px">Hello World<br/></p>

            <?php
            echo "<br>";
        }
        echo "<br>";
      include 'tempfend.php';
        