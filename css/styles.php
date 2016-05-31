<?php
header("Content-type: text/css; charset: UTF-8");

//$pickedTheme = $this->cookie->get("theme");
$pickedTheme = $_COOKIE["theme"];

   switch ($pickedTheme) {
    case 0:
        $textColor = '000'; //black
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
        $textColor = '000099'; //dark blue
        $backgroundColor = 'FF3399'; //pinkish
        $themeName = 'Vreemd'; //strange
        break;
    case 5:
        $textColor = '660000'; //brown red
        $backgroundColor = 'CCFF66'; //light yellow
        $themeName = 'Bos'; //Forest
        break;
    case 6:
        $textColor = 'CCFF99'; //yellowish
        $backgroundColor = '6600FF'; //dark purple
        $themeName = 'Bosrijk'; //Forest-y
        break;
    case 7:
        $textColor = 'FFF'; //wit
        $backgroundColor = '000'; //zwart
        $themeName = 'Omgekeerd'; //inverse
        break;
    default:
        $textColor = '000'; //zwart
        $backgroundColor = 'FFF'; //wit
        $themeName = 'Standaard';
        break;
}  

?>

#chameleon {
background-color: <?php echo $backgroundColor; ?>;       
color: <?php echo $textColor; ?>; 
}

