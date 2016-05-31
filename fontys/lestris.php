<?php
$fruit1; $fruit2; $fruit3;
$fruitpic1; $fruitpic2; $fruitpic3;

pageLoad();

/** functie die een willekeurige letter produceert
 * van de verzameling a,b en c.
 *
 * @return string (letter)
 */
function letterkots() {
    $letterbak = array("a", "b", "c");
    $lukraak = mt_rand(0, 2);
    $randomletter = $letterbak[$lukraak];
    return $randomletter;
}

/** functie die een willekeurige plaatje
 * van de array plaatjesbak pakt en er het pad voor plaatst.
 *
 * @return string pad naar willekeurig plaatje
 */
function plaatjekots() {
    $plaatjesbak = scandir('../img/fruit');
    $grabbel = mt_rand(2, 4);
    $fruitgraai = $plaatjesbak[$grabbel];
    $randomfruit = "../img/fruit/" . $fruitgraai;
    return $randomfruit;
}

function pageLoad() {
    $fruit1 = letterkots();
    $fruit2 = letterkots();
    $fruit3 = letterkots();
   
    $fruitpic1 = plaatjekots();
    $fruitpic2 = plaatjekots();
    $fruitpic3 = plaatjekots();       
}

function checkJackpot()
{
    if ($fruit1 == $fruit2 and $fruit2 == $fruit3) {
        echo "<div id='fruitreeks'><h2>JACKPOT</h2></div >";
    }   
}

function checkJackpotImage()
{
    if ($fruitpic1 == $fruitpic2 and $fruitpic2 == $fruitpic3) {
        echo "<div id='fruitreeks'><h2>JACKPOT</h2></div>";
    }   
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Game Gaming Gear" />
        <meta name="keywords" content="gaming, game, opinion, pc, console, playstation, xbox" />
        <title>Enclave Gaming</title>
        <link href="../css/styles.css" type="text/css" rel="stylesheet" />
        <script type="text/javascript">
            function toggleCodeBlock()
            {
                if (document.getElementById('spoiler').style.display == 'none')
                {
                    document.getElementById('spoiler').style.display = ''
                } else {
                    document.getElementById('spoiler').style.display = 'none'
                }               
            }
        </script>
    </head>
    <body>
        <?php include 'tempf.html'; ?>

        <h1>Opdracht 15 - Fruitmachine</h1><br/>
        <button onclick='document.location.reload(true);'>Ververs de pagina</button>

        <?php checkJackpot(); ?>
       
        <div id='fruitreeks'><br/>test randomreeks :"<?php $fruit1 . $fruit2 . $fruit3 ?><br/></div>
        <h1>Opdracht 16 - Fruitmachine met plaatjes</h1><br/>
       
        <?php checkJackpotImage(); ?>
        <table>
            <tr>
                <th>Pic 1</th>
                <th>Pic 2</th>
                <th>Pic 3</th>
            </tr>
            <tr>
                <td><img src="<?php $fruitpic1 ?>" class='fruit'></td>
                <td><img src="<?php $fruitpic2 ?>" class='fruit'></td>
                <td><img src="<?php $fruitpic3 ?>" class='fruit'></td>
            </tr>
        </table>
        <hr>
        <div id="spoiler" style="display: none;">
            <p><?php highlight_file(__FILE__); ?></p>
        </div>       
        <p><button title="Click voor Code" onclick="toggleCodeBlock();" type="button"><h1>Toon source code</h1></button></p>
        <?php include 'tempfend.html'; ?>
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
        ?>
        <p>
 <form action="inlogform.php" method="post">
     
<!--  Voornaam: <input type="text" name="fname"><br>
  Achternaam: <input type="text" name="lname"><br>-->
  Gebruikersnaam: <input type="text" name="uname"><br>
  Wachtwoord: <input type="password" name="wachtwoord"><br>
  <input type="submit" value="Submit">
</form> 
            <!--<h1>Opdracht 1 - Hoi</h1><br/></html>-->
            <?php
       
              include 'tempfend.html';
            
            
            ?>



            <!--</main>-->
    
      