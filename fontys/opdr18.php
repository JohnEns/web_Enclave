<?php
$pagina = basename(__FILE__);

$cookie_name = "user";
$cookie_value = "count";
setcookie($cookie_name, $cookie_value, time() + (360), "/");

pageLoad();


/**
 * Teller genaamd cookie['count'] activeren en bijhouden.
 */
function pageLoad() {
    global $teller;
    if (!isset($_COOKIE['count'])) {
        $teller = "Welkom op deze pagina. Je bent hier voor het eerst (volgens ons koekie).";
        $cookie = 1;
        setcookie("count", $cookie);
    } else {
        $cookie = ++$_COOKIE['count'];
        setcookie("count", $cookie);
        $teller = "<div id='fruitreeks'><h2><marquee>Je bent hier al " . $_COOKIE['count'] . " keer geweest. Wordt toch lid!<br></marquee></h2></div>"; 
    }
    return $teller;
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
        <h1>Opdracht 18 - Cookie</h1>
        <h2>Opgave</h2>   
        <ol>
            <li>a) Schrijf	een	PHP	script	waarin	met	behulp	van	een	Cookie	wordt	
                bijgehouden	hoe	vaak	een	bepaalde	webpagina	is	bezocht.	Bij	elk	
                bezoek	aan	de	pagina	moet	de	teller	met	één	worden	opgehoogd.
                Controleer	de	update	van	de	Cookie	met	Firebug	of	in	Chrome	
                met	Element	Inspector - Resources	- Cookies.</li>
            <li>b) Laat	op	je	pagina	zien	hoe	vaak	de	pagina	al	is	bezocht.</li>
        </ol>
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


echo $teller;

echo "<br>Inhoud van ons cookie: <br>";
print_r($_COOKIE);

include 'tempfend.php';

