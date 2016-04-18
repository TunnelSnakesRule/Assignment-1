<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class GameData extends Application {
    
    function __construct() {
        parent::__construct();
    }
    
    function index() {
        $this->data['title'] = 'Game Data';
        $this->dadta['pagebody'] = 'gameData';
        
        $this->Registration->_register();
        for($i=0; $i < 5; $i++){
            $this->register->buy();
        }
                $this->render();
    }
}