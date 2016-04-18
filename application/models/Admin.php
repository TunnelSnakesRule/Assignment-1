<?php

class Signup extends MY_Model {

    function __construct() {
        parent::__construct();
        $this->_tableName = 'signup';
        $this->_keyField = 'Signup';
    }

    public function insertInto($player) {
        $query = $this->db->query(''
                . 'INSERT INTO Players '
                . 'VALUES ("' . $player . '", 0 )');

        return $query->result();
       
    }
    
    public function dropPlayer($player) {
        $query = $this->db->query(''
                . 'DELETE FROM Players '
                . 'WHERE Player= "' . $player . '"');

        return $query->result();
       
    }

}