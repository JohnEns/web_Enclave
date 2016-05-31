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
class NewsModel {

    public $userName;
    public $email;
    public $woonplaats;

    public function __construct() {
        $this->userName = $_POST["userName"];
        $this->email = $_POST["email"];
        $this->woonplaats = $_POST["woonplaats"];
    }
}
