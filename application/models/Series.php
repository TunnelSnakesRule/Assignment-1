<?php
class Series extends MY_Model{
        function __construct() 
    {
        parent::__construct();
        $this->tableName = 'series';
        $this->keyfield = 'Series';
    }
    
    public function assemble($player, $type)
    {
        $query = $this->db->query(
                "SELECT (Piece) FROM collections WHERE Player = '$player' and Piece LIKE '%%%-$type' ORDER BY Piece"
                );
        
        return $query->result();
    }   
    
    
}

