<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DataObject
{
    protected $identity;
    
    public function __construct($id = 0)
    {
        $this->identity = $id;
        if($id > 0)
        {
            $this->Load();
        }
    }
    
    public function Load()
    {
        
    }
    
    public function Save()
    {
        
    }
}

/**
 * Description of Boek
 *
 * @author poeha
 */
class Boek extends DataObject {
    public $idboeken;
    public $boekennaam;
    public $boekpic;
    public $boekeninfo;
    public $verschijndata;
    public $schrijver;
    public $ISBN;
    public $ISBN_10;
}

$boek1 = new Boek(5);
$boek1->idboeken = 1;
$boek1->boekennaam = "Epos van Lorber";

