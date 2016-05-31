<?php

/**
 * Description of LoginView
 *
 * @author Poe
 */
class View {

    private $model;
    private $controller;

    public function __construct($controller,$model) {
        $this->controller = $controller;
        $this->model = $model;
    }

    public function output(){
//        return "<p>" . $this->model->string . "</p>";
        return '<a href="testert.php?action=clicked" rel="nofollow">'.$this->model->string."</a>";
        
    }
    
}