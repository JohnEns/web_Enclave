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

        <h1>Les week 5 - Functies</h1>
        <h2>Opgave</h2>
        <p>date(), time(), strtotime()</p>

        <ul>
            <li>echo date("d-m-Y");</li>
            <li>echo date("d-m-Y", time());</li>
            <li>echo date("d-m-Y", strtotime("now"));</li>
            <li>echo date("d-m-Y",strtotime("+1 week"));</li>
        </ul>
 <h2>Uitwerking</h2>
        <?php
        include 'func.php';
        $bink = taim(2, 35, 16);
        echo $bink;
        echo ("<br />");
        echo ("<br />");

        echo date("d-m-Y");
        echo (" d-m-Y <br />");
        echo date("d-m-Y-H-i-s", time());
        echo "<br />";
        echo time();
        echo (" d-m-Y, time <br />");
        echo date("d-M-Y", strtotime("now"));
        echo (" d-M-Y, strtotime now <br />");
        echo date("ddd-m-Y", strtotime("+1 week"));
        echo (" ddd-m-Y, strtotime +1 week <br />");
        include 'tempfend.php';
        