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
        <h1>Opdracht 23 -  Meerdere	plaatjes	tegelijkertijd	uploaden</h1>
        <h2>Opgave</h2>   
        <p></p>
        <ol>
            <li>a) Maak	een	formulier	waarmee	meerdere	plaatjes	tegelijkertijd	op	
                je	webserver	opgeslagen	kunnen	worden.</li>
            <li>b) Zorg	dat	er	een	foutmelding	getoond	wordt	als	er	iets	fout	gaat	
                met	het	versturen	naar	de	server.</li>
            <li>c) Zorg	dat	na	het	uploaden	de	plaatjes	worden	getoond	op	het	
                scherm.</li>
        </ol>
        <h2>Uitwerking</h2>
        <form action="uploadOp22.php" method="post" enctype="multipart/form-data">
            Selecteer het plaatje dat je wilt delen met de wereld:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload plaatje" name="submit">
        </form>


        <?php
        include 'tempfend.php';

        