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
class LoginModel {

    public $userName;
    public $password;
    public $colorpick;

    public function __construct() {
        $this->userName = $_POST["userName"];
        $this->password = $_POST["password"];
        $this->colorpick = $_POST["colorpick"];
    }
}
