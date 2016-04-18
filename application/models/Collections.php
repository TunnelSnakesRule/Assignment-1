<?php

class Collections extends MY_Model {

    function __construct() {
        parent::__construct();
        $this->_tableName = 'collections';
        $this->_keyField = 'Token';
    }

    public function getOwned($player, $series, $part) {
        $query = $this->db->query(''
                . 'SELECT COUNT(Piece) as Count '
                . 'FROM `collections` '
                . 'WHERE Player = "' . $player . '" '
                . 'AND Piece LIKE "' . $series . '__' . $part . '"');

    
        return $query->row()->Count;
    }

}
