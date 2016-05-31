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
        <h1>Inverse opdracht 5b - Lettergrootte</h1>
        <h2>Opgave</h2>
        <p>Schrijf	een	for-lus	waarbij	de	lettergrootte	afloopt	van	500	% naar	
            100%.</p><br/>
        <h2>Uitwerking</h2>

        <?php
        for ($fnt = 500; $fnt >= 100; $fnt-=10) {
            echo "Het font is: " . $fnt . " procent<br>";
            ?>                     

            <p style="font-size:<?php echo $fnt ?>%">Hello World<br/></p>

            <?php
            echo "<br>";
        }
       include 'tempfend.php';
        