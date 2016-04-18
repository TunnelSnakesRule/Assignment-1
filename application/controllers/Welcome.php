<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

    //$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
    // INdex page for Welcome
    //
    //$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
    public function index() {

        $this->data['game_players'] = $this->game_players();
        $this->data['game_summary'] = $this->game_summary();
           
        $this->data['pagebody'] = 'welcome';
        $this->Registration->_register();
        $this->Registration->buy();
        $this->render();
    }

    //$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
    //Function to iterate through the players in the game and how much shizzle
    //wizzle they have.
    //
    //$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
    private function game_players() {
        $rows = array();
        foreach ($this->Players->getAmountOfPeanuts() as $record) {
            $rows[] = (array) $record;
        }
        $this->data['gamers'] = $rows;

        return $this->parser->parse('game_players', $this->data, true);
    }
    //$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
    //Function to iterate through the diffrent bots and a summary of them
    //
    //$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
    private function game_summary() {
        $rows = array();
        foreach ($this->Summary->getSummary() as $record) {
            $rows[] = (array) $record;
        }
        $this->data['summary'] = $rows;

        return $this->parser->parse('game_summary', $this->data, true);
    }
    
    private function create_player() {
        $rows = array();
        foreach ($this->Admin->insertInto() as $record) {
            $rows[] = (array) $record;
        }
        $this->data['create'] = $rows;

        return $this->parser->parse('create_Player', $this->data, true);
    }

    private function delete_player() {
        $rows = array();
        foreach ($this->Admin->dropPlayer() as $record) {
            $rows[] = (array) $record;
        }
        $this->data['delete'] = $rows;

        return $this->parser->parse('delete_Player', $this->data, true);
    }
    
}
