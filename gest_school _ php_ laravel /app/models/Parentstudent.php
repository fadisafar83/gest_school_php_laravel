<?php
class Parentstudent {
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }


    public function connect($id_etudiant)
    {
        $this->db->query('SELECT * FROM etudiant where id_etudiant =:id_etudiant');
        $this->db->bind(':id_etudiant', $id_etudiant);
        $row = $this->db->single();
        return $row;
    }


    // public function chercher_note($id_etudiant)
    // {
    //    $this->db->query('SELECT * FROM note WHERE id_etudiant =:id_etudiant');
    //    $this->db->bind('id_etudiant', $id_etudiant);
    //    $results = $this->db->resultSet();
    //    return $results;
    // }


    public function chercher_note($id_etudiant)
    {
       $this->db->query('SELECT a.*, b.*, c.*, d.*
       FROM note a
       JOIN matiere b ON b.id_matiere = a.id_matiere
       JOIN cursus c ON c.id_cursus = a.id_cursus
       JOIN etudiant d ON d.id_etudiant = a.id_etudiant
       WHERE a.id_etudiant = :id_etudiant');
       $this->db->bind('id_etudiant', $id_etudiant);
       $results = $this->db->resultSet();
       return $results;
    }
}