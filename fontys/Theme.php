<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Theme
 *
 * @author PoeHaoSan
 */
class Theme {

    public $textColor;
    public $backgroundColor;
    public $font;
    public $themeName;
    public $countTheme;

    public static function Create($theme) {
        $newTheme = new Theme();
//        $countTheme = 0;
        switch ($theme) {

            case 0:
                $newTheme->textColor = '#000'; //black
                $newTheme->backgroundColor = '#FFFF00'; //yellow
                $newTheme->font = "Arial";
                $newTheme->themeName = 'Kenteken'; //license plate
                break;
            case 1:
                $newTheme->textColor = '#FF0000'; //red
                $newTheme->backgroundColor = '#00FF00'; //green
                $newTheme->font = "Asimov";
                $newTheme->themeName = 'Buzz'; //buzz
                break;
            case 2:
                $newTheme->textColor = '#FF00FF'; //lilac
                $newTheme->backgroundColor = '#00FFFF'; //turquoise
                $newTheme->font = "Trebucher";
                $newTheme->themeName = 'Misselijk'; //sick
                break;
            case 3:
                $newTheme->textColor = '#484848'; //dark grey
                $newTheme->backgroundColor = '#B8B8B8'; //light grey
                $newTheme->font = "Impact";
                $newTheme->themeName = '2 shades of grey'; //grey
                break;
            case 4:
                $newTheme->textColor = '#000099'; //dark blue
                $newTheme->backgroundColor = '#FF3399'; //pinkish
                $newTheme->font = "Comic Sans MS";
                $newTheme->themeName = 'Vreemd'; //strange
                break;
            case 5:
                $newTheme->textColor = '#660000'; //brown red
                $newTheme->backgroundColor = '#CCFF66'; //light yellow
                $newTheme->font = "Arial Black";
                $newTheme->themeName = 'Elfjeshoed'; //Elves hat 
                break;
            case 6:
                $newTheme->textColor = '#CCFF99'; //yellowish
                $newTheme->backgroundColor = '#6600FF'; //dark purple
                $newTheme->font = "Verdana";
                $newTheme->themeName = 'Bosrijk'; //Forest-y
                break;
            case 7:
                $newTheme->textColor = '#FFF'; //white
                $newTheme->backgroundColor = '#000'; //black
                $newTheme->font = "Trebuchet MS";
                $newTheme->themeName = 'Omgekeerd'; //inverse
                break;
            case 8:
                $newTheme->textColor = '#6666FF'; //light purple
                $newTheme->backgroundColor = '#003300'; //dark green
                $newTheme->font = "Tahoma";
                $newTheme->themeName = 'Trollenburght'; //troll manor
                break;
            default:
                $newTheme->textColor = '#000'; //black
                $newTheme->backgroundColor = '#FFF'; //white
                $newTheme->font = "Lucida Sans Unicode";
                $newTheme->themeName = 'Standaard';
                break;
        }

        return $newTheme;
    }

}

// Zo gebruik je een static methode, met twee dubbele punt:
//$myTheme = Theme::Create(1);

