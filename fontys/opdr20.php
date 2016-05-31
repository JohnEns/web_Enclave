<?php
$pagina = basename(__FILE__);

$pickedTheme = $_POST["themePick"];
setcookie("theme", $pickedTheme);


//$controller = new ThemaController();
//$pick = $controller->start();
//
//function __autoload($class) {
//    include_once $class . ".php";
//}

$cookie_name = "theme_user";
$cookie_value = "theme";
setcookie($cookie_name, $cookie_value, time() + (360), "/");

switch ($pickedTheme) {
    case 0:
        $textColor = '#000'; //black
        $backgroundColor = '#FFFF00'; //yellow
        $themeName = 'Kenteken'; //license plate
        break;
    case 1:
        $textColor = '#FF0000'; //red
        $backgroundColor = '#00FF00'; //green
        $themeName = 'Buzz'; //buzz
        break;
    case 2:
        $textColor = '#FF00FF'; //lilac
        $backgroundColor = '#00FFFF'; //turquoise
        $themeName = 'Misselijk'; //sick
        break;
    case 3:
        $textColor = '#484848'; //dark grey
        $backgroundColor = '#B8B8B8'; //light grey
        $themeName = '2 shades of grey'; //grey
        break;
    case 4:
        $textColor = '#000099'; //dark blue
        $backgroundColor = '#FF3399'; //pinkish
        $themeName = 'Vreemd'; //strange
        break;
    case 5:
        $textColor = '#660000'; //brown red
        $backgroundColor = '#CCFF66'; //light yellow
        $themeName = 'Elfjeshoed'; //Elves hat
        break;
    case 6:
        $textColor = '#CCFF99'; //yellowish
        $backgroundColor = '#6600FF'; //dark purple
        $themeName = 'Bosrijk'; //Forest-y
        break;
    case 7:
        $textColor = '#FFF'; //white
        $backgroundColor = '#000'; //black
        $themeName = 'Omgekeerd'; //inverse
        break;
    case 8:
        $textColor = '#6666FF'; //light purple
        $backgroundColor = '#003300'; //dark green
        $themeName = 'Trollenburght'; //troll manor
        break;
    default:
        $textColor = '#000'; //black
        $backgroundColor = '#FFF'; //white
        $themeName = 'Standaard';
        break;
}

function pageLoad() {
    global $message;
    if (!isset($_COOKIE['theme'])) {
        $message = "Er is geen thema gekozen wij hebben dus iets voor je ingesteld";
        setcookie("thema", 3);
    } else {
        $message = "<br>Je themanummer is: " . $_COOKIE['theme'] . "<br>";
    }
    return $message;
}

pageLoad();


//function pickColor($color){
//    switch (color);
//}
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
        <link href="../css/styles.php" type="text/css" rel="stylesheet" />
<!-- <style>       
            td {
                width:100px;
                height:100px;
                vertical-align:center;
                text-align:center;
            }
        </style>-->
    </head>
    <body>
        <?php
        include 'tempf.html';
        ?>
        <!--<div style="background-color:<?php echo "#" . $backgroundColor ?>" style="color:<?php echo "#" . $textColor ?>"/>-->
        <div style='color:<?php echo $textColor ?>; background-color:<?php echo $backgroundColor ?>'/>
        <!--<div id="chameleon" style="background-color:#686868 ">-->
        <h1>Opdracht 20 - Achtergrondkleur instellen</h1>
        <h2>Opgave</h2>   
        <p>Maak	een	pagina	met	daarop	een	formulier	waarmee	de	gebruiker	een	
            eigen	achtergrondkleur	kan	instellen.	Wanneer	de	knop	"Kleur	instellen"	
            wordt	geklikt,	wordt	de	pagina	opnieuw	geladen	met	de	gekozen	
            achtergrondkleur.	Gebruik	PHP	voor	het	inlezen	van de	kleur	en	stel	de	
            achtergrondkleur	met	behulp	van	CSS	in. Zorg	dat	de	achtergrondkleur	
            opgeslagen	wordt	in	een	Cookie.	Als	de	pagina	nog	eens	bezocht	wordt,	
            dan	wordt	de	pagina	getoond	met	de	eerder	gekozen	achtergrondkleur.</p>
        <h2>Uitwerking</h2>
        <?php
//if(!isset($_COOKIE[$cookie_name])) {
//    echo "Cookie named '" . $cookie_name . "' is not set!<br>";
//} else {
//    echo "Cookie '" . $cookie_name . "' is set!<br>";
//    echo "Value is: " . $_COOKIE[$cookie_name] . "<br>";
//}
//if(count($_COOKIE) > 0) {
//    echo "Cookies are enabled.<br>";
//} else {
//    echo "Cookies are disabled.<br>";
//}
        ?>
        <form method="post">
            <table id='colorpick'>
                <caption><h3>Selecteer een thema:</h3></caption>
                <tr><th></th><th></th></tr>
                <tr><td style='color:#000; background-color:#FFFF00' cursor:pointer>Dit is het thema Kenteken</p></td><td style='color:#FF0000; background-color:#00FF00'>Dit is het thema Buzz</p></td></tr>
                <tr><td><p style='color:#FF00FF; background-color:#00FFFF'/>Dit is het thema  Misselijk</p></td><td><p style='color:#484848; background-color:#B8B8B8'/>Dit is het thema 2 shades of grey</p></td></tr>
                <tr><td><p style='color:#000099; background-color:#FF3399'/>Dit is het thema  Vreemd</p></td><td><p style='color:#660000; background-color:#CCFF66'/>Dit is het thema Elfjeshoed</p></td></tr>
                <tr><td><p style='color:#CCFF99; background-color:#6600FF'/>Dit is het thema Bosrijk</p></td><td><p style='color:#FFF; background-color:#000'/>Dit is het thema Omgekeerd</p></td></tr>
                <tr><td><p style='color:#6666FF; background-color:#003300'/>Dit is het thema Trollenburght</p></td><td><p style='color:#000; background-color:#FFF'/>Dit is het thema Standaard</p></td></tr>
                <tr><td>Welk Thema wil je: </td><td>  <select name="themePick">
                <option value="0;">Kenteken</option>
                <option value="1;">Buzz</option>
                <option value="2;">Misselijk</option>
                <option value="3;">2 shades of grey</option>
                <option value="4;">Vreemd</option>
                <option value="5;">Elfjeshoed</option>
                <option value="6;">Bosrijk</option>
                <option value="7;">Omgekeerd</option>
                <option value="8;">Trollenburght</option>
                <option value="9;">Standaard</option>
                </select></td></tr>
                <tr><td>Thema instellen: </td><td><input type='submit' value='Druk HIER'></td></tr>
            </table>
        </form>

<!--        <form method="post">
            <h2>Selecteer een thema</h2>           
            <select name="thema">
                <option style="background: red;">Rood</option>
                <option style="background: green;">Groen</option>
                <option style="background: blue;">Blauw</option>
                <option style="background: purple;">Paars</option>
                <option style="background: lavender;">Lavendel</option>
            </select>
            <input type="submit" name="submit" value="Submit">
        </form>-->

        <?php
//echo "Op html niveau is var themePick dit:" .  $_POST["themePick"] . "<br>";
//echo  "tekst " . $textColor . "<br>";
//echo  "achtergr " . $backgroundColor . "<br>"; 
        echo "<h2><marquee>Dit is het thema " . $themeName . "<br></marquee></h2>";
        echo $message . "<br>";
//echo  "naam " . $themeName . "<br>"; 
//
//
//
//            setcookie("color_user", $themePick);
//
//            echo "<br>Inhoud van ons cookie: <br>";
//            print_r($_COOKIE);
        ?>
    </div>   
        <?php
//         $pick->WriteHtml();

        include 'tempfend.php';

        