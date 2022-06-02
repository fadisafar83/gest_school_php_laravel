<?php
class Classe {
    private $db;

    public function __construct()
    {
        $this->db = new Database; 
    }


    public function getAllClasses()
    {
    $this->db->query('SELECT * FROM cursus');
    $results = $this->db->resultSet();
    return $results;
    }
} 