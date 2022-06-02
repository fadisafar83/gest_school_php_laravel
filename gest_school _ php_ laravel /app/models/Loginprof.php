<?php
class Loginprof {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function findProf($id_professeur)
    {
        $this->db->query('SELECT * FROM professeur where id_professeur =:id_professeur');

        $this->db->bind(':id_professeur', $id_professeur );
    
        $row = $this->db->single();
        
        return $row;
    }

public function connect($id_professeur)
{
    
    $this->db->query('SELECT * FROM professeur WHERE id_professeur =:id_professeur');
       
    $this->db->bind(':id_professeur', $id_professeur );
    
    $row = $this->db->single();

    return $row;

}

public function get_prof_matiere_curcus($id_prof)
{
    $sql=" SELECT a.*, b.*, c.*
            FROM c_p_m a
            JOIN matiere b ON b.id_matiere = a.id_matiere
            JOIN cursus c ON c.id_cursus = a.id_cursus
            WHERE a.id_professeur = :id_professeur
            ";
    $this->db->query($sql);
    $this->db->bind(':id_professeur', $id_prof);
    $results = $this->db->resultSet();
    return $results;
 
}

public function get_prof_students($id_cursus, $id_professeur)
{
            $sql = "SELECT a.*, b.*
            FROM c_p_m a
            JOIN etudiant b ON b.id_cursus=a.id_cursus
            WHERE a.id_cursus = :id_cursus 
            AND a.id_professeur = :id_professeur
            ";
    $this->db->query($sql);
    $this->db->bind(':id_cursus', $id_cursus);
    $this->db->bind(':id_professeur', $id_professeur);
    $results = $this->db->resultSet();
    return $results;
}

public function add_note_to_database($data)
{
    $this->db->query('INSERT INTO note (id_cursus, id_matiere, id_professeur, 
    id_etudiant, note, appreciation, semestre, annee_scolaire)
    VALUES (:id_cursus, :id_matiere, :id_professeur, :id_etudiant, :note, :appreciation, :semestre, :annee_scolaire)');
        //Bind values
        $this->db->bind(':id_cursus', $data['id_cursus']);
        $this->db->bind(':id_matiere', $data['id_matiere']);
        $this->db->bind(':id_professeur', $data['id_professeur']);
        $this->db->bind(':id_etudiant', $data['id_etudiant']);
        $this->db->bind(':note', $data['note']);
        $this->db->bind(':appreciation', $data['appreciation']);
        $this->db->bind(':semestre', $data['semestre']);
        $this->db->bind(':annee_scolaire', $data['annee_scolaire']);
        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function get_note($id_cursus, $id_professeur, $id_matiere, $id_etudiant)
    {
        $this->db->query('SELECT * FROM note Where id_cursus =:id_cursus AND id_professeur =:id_professeur AND id_matiere =:id_matiere AND id_etudiant =:id_etudiant');
        $this->db->bind(':id_cursus', $id_cursus);
        $this->db->bind(':id_professeur', $id_professeur);
        $this->db->bind(':id_matiere', $id_matiere);
        $this->db->bind(':id_etudiant', $id_etudiant);
        $row = $this->db->single();
        return $row;
        
    }

}

    



