<?php

class Summary extends MY_Model {

    function __construct() {
        parent::__construct();
        $this->_tablename = 'series';
        $this->_keyField = 'Series';
    }
    //$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
    //grabs details about the bots for the homepage dashboard
    //
    //$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
    public function getSummary() {
        $query = $this->db->query(''
                . 'SELECT s.Series, s.Description, s.Frequency, s.Value, '
                . 'COUNT(c.Piece) as Held '
                . 'FROM series s '
                . 'LEFT JOIN collections c '
                . 'ON c.Piece LIKE CONCAT(s.Series, "%") '
                . 'GROUP BY s.Series '
                . 'ORDER BY s.Series;');

        return $query->result();
    }

}
