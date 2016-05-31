<?php
$pagina = basename(__FILE__);

/** functie die een willekeurige letter produceert
 * van de verzameling a,b en c.
 * 
 * @return string (letter)
 */
function getRandomLetter() {
    $letterbak = array("a", "b", "c");
    return $letterbak[mt_rand(0, 2)];
}

/** functie die een willekeurige plaatje 
 * van de array plaatjesbak pakt en er het pad voor plaatst.
 * 
 * @return string pad naar willekeurig plaatje
 */
function getRandomPlaatje() {
    $plaatjesbak = scandir('../img/fruit');
    $fruitgraai = $plaatjesbak[mt_rand(2, 4)];
    $randomfruit = "../img/fruit/" . $fruitgraai;
    return $randomfruit;
}

$fruit1 = getRandomLetter();
$fruit2 = getRandomLetter();
$fruit3 = getRandomLetter();

function checkJackpot() {
    global $fruit1;
    global $fruit2;
    global $fruit3;
    if ($fruit1 == $fruit2 and $fruit2 == $fruit3) {
        echo "<div id='fruitreeks'><h2>JACKPOT</h2></div >";
        echo "<audio id='wow' autoplay='autoplay'><source src='../sound/wow.mp3' /></audio>";
    }
}
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
        <h1>Opdracht 15 - Fruitmachine</h1> 
        <h2>Opgave</h2>   
        <p>Schrijf	een	functie	die	willekeurige	reeksen	van	3 letters	(A,B,C)
            teruggeeft.	Bijvoorbeeld	A	C	B,	B	B	A,	C	A C.	Gebruik	hiervoor	de	PHP	
            functie	mt_rand().	Als	de	letters	driemaal	hetzelfde	zijn, dan	wordt	de	
            boodschap	"Jackpot"	getoond.
            Toon	de	letter	reeksen	in	aparte	div	elementen	en	geef	ze	vorm	met	CSS.</p>
        <h2>Uitwerking</h2>
<?php
checkJackpot();
//echo "<div id='fruitreeks'><br/>test randomreeks :" . getRandomLetter() . getRandomLetter() . getRandomLetter() . "<br/></div >";
echo "<div id='fruitreeks'><br/>test randomreeks :" . $fruit1 . $fruit2 . $fruit3 . "<br/></div >";
?>
        <h1>Opdracht 16 - Fruitmachine met plaatjes</h1>
        <h2>Opgave</h2>   
        <p>Herschrijf	de	functie	uit	opdracht	15	zodat	je	in	plaats	van	3	letters	3	
            plaatjes	te	zien	krijgt.	Als	de	3	plaatjes	identiek zijn, dan	krijgt	je	de	
            boodschap	"Jackpot" getoond.</p>

        <h2>Uitwerking</h2>
<?php
$fruitpic1 = getRandomPlaatje();
$fruitpic2 = getRandomPlaatje();
$fruitpic3 = getRandomPlaatje();
if ($fruitpic1 == $fruitpic2 and $fruitpic2 == $fruitpic3) {
    echo "<div id='fruitreeks'><h2>JACKPOT</h2></div>";
    echo "<audio id='wow' autoplay='autoplay'><source src='../sound/wow.mp3' /></audio>";
}

//echo $fruitpic1;        
//echo"<img src=" . $kers . " class='small'><br/>";
//echo"<img src=" . $fruitpic1 . " class='small'><br/>";

echo"
                <table>
                    <tr>
                        <th>Pic 1</th>
                        <th>Pic 2</th>
                        <th>Pic 3</th>
                    </tr>
                    <tr>";


echo"<td><img src=" . $fruitpic1 . " class='fruit'></td>";
echo"<td><img src=" . $fruitpic2 . " class='fruit'></td>";
echo"<td><img src=" . $fruitpic3 . " class='fruit'></td></tr>";

echo "</table>";

include 'tempfend.php';

