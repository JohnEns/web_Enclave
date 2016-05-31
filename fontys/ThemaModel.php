<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoginModel
 *
 * @author Poe
 */
class ThemaModel {
    public $themeName;
    public $Theme;
    public $model;

    public function __construct() {
        $this->themeName = $_POST["themePick"];
        $this->Theme = Theme::Create($themeName);      
    }
}

//$model = new ThemaModel();
//print("Test: " + $model->theme->backgroundColor);
