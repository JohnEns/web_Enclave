<?php
$pagina = basename(__FILE__);

$maxItemCount = 3;
$fruit = array();
$fruitpic = array();
$scoreList = array();
$totalScore = 0;

pageLoad();

/**
 * Initialisatie van de pagina. 
 */
function pageLoad() {
    global $maxItemCount;

    fillScoreList();

    global $fruit;
    for ($x = 0; $x < $maxItemCount; $x++) {
        array_push($fruit, getRandomLetter());
    }

    global $fruitpic, $totalScore, $scoreList;

    for ($x = 0; $x < $maxItemCount; $x++) {
        $pic = getRandomPicture();
        array_push($fruitpic, $pic);
        $totalScore += $scoreList[$pic];
    }
}

/**
 * Waarde bepalen van ieder plaatje
 * @global type $scoreList
 */
function fillScoreList() {
    global $scoreList;

    $pictures = scandir('../img/fruit', SCANDIR_SORT_ASCENDING);
    for ($x = 2; $x < count($pictures); $x++) {
        $scoreList["../img/fruit/" . $pictures[$x]] = 5 * $x;
    }
}

/**
 * Functie die een willekeurige letter produceert van de verzameling a,b en c.
 * 
 * @return string (letter)
 */
function getRandomLetter() {
    $letters = array("a", "b", "c");
    return $letters[mt_rand(0, count($letters) - 1)];
}

/**
 * Functie die een willekeurige plaatje van de array plaatjesbak pakt en er het pad voor plaatst.
 * 
 * @return string pad naar willekeurig plaatje
 */
function getRandomPicture() {
    $pictures = scandir('../img/fruit', SCANDIR_SORT_NONE);
    return "../img/fruit/" . $pictures[mt_rand(2, count($pictures) - 1)];
}

/**
 * Controleert of de jackpot is gevallen op basis van de random getrokken letters en output dan een HTML melding
 */
function checkJackpot() {
    global $fruit;
    if (isJackPot($fruit))
        printJackpotMessage();
    }

/**
 * Controleert of de jackpot is gevallen op basis van de random gekozen plaatjes en output dan een HTML melding
 */
function checkJackpotImage() {
    global $fruitpic;
    if (isJackpot($fruitpic))
        printJackpotMessage();
    }

/**
 * Controleert voor de opgegeven array $list of het een jackpot is of niet.
 *
 * @param $list de te controleren array
 * @return true als het een jackpot is, anders false
 */
function isJackpot($list) {
    if (count($list) < 2)
        return true;

    $value = $list[0];
    foreach ($list as $item) {
        if ($item != $value)
            return false;
    }

    return true;
}

/**
 * Jackpot melding HTML output.
 */
function printJackpotMessage() {
    echo "<div id='fruitreeks'><marquee><h2>JACKPOT!!!</h2></marquee></div>";
    echo "<audio id='wow' autoplay='autoplay'><source src='../sound/wow.mp3' /></audio>";
}

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

<button onclick="document.location.reload(true);" title="Geef 'm een zwieper!">DRAAIEN</button>
<?php checkJackpot(); ?>		        
<p id="fruitreeks">Resultaat test randomreeks: <?php echo sprintf("<b>%s %s %s</b>", $fruit[0], $fruit[1], $fruit[2]) ?></p>
<br>
<h1>Opdracht 16 - Fruitmachine met plaatjes</h1>
<h2>Opgave</h2>   
<p>Herschrijf	de	functie	uit	opdracht	15	zodat	je	in	plaats	van	3	letters	3	
    plaatjes	te	zien	krijgt.	Als	de	3	plaatjes	identiek zijn, dan	krijgt	je	de	
    boodschap	"Jackpot" getoond.</p>

<h2>Uitwerking</h2>
<br>		
<?php checkJackpotImage(); ?>				
<table>
    <tr>
<?php
for ($x = 0; $x < count($fruitpic); $x++) {
    echo "<th>Slot&nbsp;" . ($x + 1) . "</th>";
}
?>
    </tr>
    <tr>
        <?php
        for ($x = 0; $x < count($fruitpic); $x++) {
            echo "<td><img src=" . $fruitpic[$x] . " class='fruit'></td>";
        }
        ?>
    </tr>
</table>
<h2>Totale score = <?php echo $totalScore; ?></h2>
        <?php include 'tempfend.php'; ?>