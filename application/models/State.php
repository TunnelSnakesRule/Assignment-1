<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class State extends CI_Model{
    
    //$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
    //       Initalizing
    //
    //$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
    protected $status;
    protected $round;
    protected $state;
    protected $countdown;
    protected $current;
    protected $duration;
    protected $upcoming;
    protected $alarm;
    protected $now;
    
    //$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
    //       COnstructors 
    //
    //$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
    function __construct() {
        parent::__construct();
        $this->status = 'http://botcards.jlparry.com/status';
        $this->stateData = $this->get_data($this->status);
        $this->round = (string) $this->stateData->round;
        $this->state = (string) $this->stateData->state;
        $this->countdown = (string) $this->stateData->countdown;
        $this->current = (string) $this->stateData->current;
        $this->duration = (string) $this->stateData->duration;
        $this->upcoming = (string) $this->stateData->upcoming;
        $this->alarm = (string) $this->stateData->alarm;
        $this->now = (string) $this->stateData->now;
    }
    //$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
    //Grab the file from the url and return it as xml file
    //
    //$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
    function get_data($url) {
        $file = file_get_contents($url);
        $xml = simplexml_load_string($file);
        return $xml;
    }
    function get_stateData(){
        return $this->stateData;
    }
    
    function get_round() {
        return $this->round;
    }
    
    function get_state() {
        return $this->state;
    }
    
    function get_countdown() {
        return $this->countdown;
    }
    
    function get_current() {
        return $this->current;
    }
    
    function get_duration() {
        return $this->duration;
    }
    
    function get_upcoming() {
        return $this->upcoming;
    }
    
    function get_alarm() {
        return $this->alarm;
    }
    
    function get_now() {
        return $this->now;
    }
    
    
}
