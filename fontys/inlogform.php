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
//
        $gebruiker = $_POST['uname'];
        $wachtw = $_POST['wachtwoord'];

        echo $gebruiker;
        echo $wachtw;
        ?>


        <p>Welkom <?php echo $_POST["uname"]; ?><br>
            Je wachtwoord is: <?php echo $_POST["wachtwoord"]; ?></p>



<!--        <p>
 <form action="inlogform.php" method="post">
  Voornaam: <input type="text" name="fname"><br>
  Achternaam: <input type="text" name="lname"><br>
  Wachtwoord: <input type="password" name="wachtwoord"><br>
  <input type="submit" value="Submit">
</form>
            <h1>Opdracht 1 - Hoi</h1><br/></html>-->
        <?php
        include 'tempfend.html';
        ?>



        <!--</main>-->

