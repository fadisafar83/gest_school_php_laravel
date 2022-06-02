<?php
class Admin {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function findAllUsers() {
        $this->db->query('SELECT * FROM `fadi-school-utilisateur`');

        $results = $this->db->resultSet();

        return $results;
    }


    public function addUser($data) {
        $this->db->query('INSERT INTO `fadi-school-utilisateur` (nom, prenom, email, mot_de_passe, fonction) VALUES (:nom, :prenom, :email, :mot_de_passe, :fonction)');
        $this->db->bind(':nom', $data['nom']);
        $this->db->bind(':prenom', $data['prenom']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':mot_de_passe', $data['mot_de_passe']);
        $this->db->bind(':fonction', $data['fonction']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function updateUser($data) {
        $this->db->query('UPDATE fadi-school-utilisateur SET nom = :nom, prenom = :prenom, email = :email, 
        mot_de_passe = :mot_de_passe, fonction = :fonction where id_utilisateur = '. $data['id_utilisateur']);

        $this->db->bind(':nom', $data['nom']);
        $this->db->bind(':prenom', $data['prenom']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':mot_de_passe', $data['mot_de_passe']);
        $this->db->bind(':fonction', $data['fonction']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function findUserById($id) {
        $this->db->query('SELECT * FROM utilisateur WHERE id_utilisateur = :id');

        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function deleteUser($id) {
        $this->db->query('DELETE FROM utilisateur WHERE id_utilisateur = :id');

        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    // public function FindCPstudents()
    // {
    //     $this->db->query('SELECT * FROM note WHERE id_cursus=1 ');
    //     $results = $this->db->resultSet();
    //     return $results;
    // }

    // public function FindCE1students()
    // {
    //     $this->db->query('SELECT * FROM note WHERE id_cursus=2 ');
    //     $results = $this->db->resultSet();
    //     return $results;
    // }

    public function FindCPstudents()
    {
       $this->db->query('SELECT a.*, b.*, c.*, d.*, e.*
       FROM note a
       JOIN matiere b ON b.id_matiere = a.id_matiere
       JOIN cursus c ON c.id_cursus = a.id_cursus
       JOIN etudiant d ON d.id_etudiant = a.id_etudiant
       JOIN professeur e ON e.id_professeur = a.id_professeur
       WHERE a.id_cursus = 1');
       $results = $this->db->resultSet();
       return $results;
    }

    public function FindCE1students()
    {
       $this->db->query('SELECT a.*, b.*, c.*, d.*, e.*
       FROM note a
       JOIN matiere b ON b.id_matiere = a.id_matiere
       JOIN cursus c ON c.id_cursus = a.id_cursus
       JOIN etudiant d ON d.id_etudiant = a.id_etudiant
       JOIN professeur e ON e.id_professeur = a.id_professeur
       WHERE a.id_cursus = 2');
       $results = $this->db->resultSet();
       return $results;
    }

    public function FindCE2students()
    {
       $this->db->query('SELECT a.*, b.*, c.*, d.*, e.*
       FROM note a
       JOIN matiere b ON b.id_matiere = a.id_matiere
       JOIN cursus c ON c.id_cursus = a.id_cursus
       JOIN etudiant d ON d.id_etudiant = a.id_etudiant
       JOIN professeur e ON e.id_professeur = a.id_professeur
       WHERE a.id_cursus = 3');
       $results = $this->db->resultSet();
       return $results;
    }

    public function FindCM1students()
    {
       $this->db->query('SELECT a.*, b.*, c.*, d.*, e.*
       FROM note a
       JOIN matiere b ON b.id_matiere = a.id_matiere
       JOIN cursus c ON c.id_cursus = a.id_cursus
       JOIN etudiant d ON d.id_etudiant = a.id_etudiant
       JOIN professeur e ON e.id_professeur = a.id_professeur
       WHERE a.id_cursus = 4');
       $results = $this->db->resultSet();
       return $results;
    }

    public function FindCM2students()
    {
       $this->db->query('SELECT a.*, b.*, c.*, d.*, e.*
       FROM note a
       JOIN matiere b ON b.id_matiere = a.id_matiere
       JOIN cursus c ON c.id_cursus = a.id_cursus
       JOIN etudiant d ON d.id_etudiant = a.id_etudiant
       JOIN professeur e ON e.id_professeur = a.id_professeur
       WHERE a.id_cursus = 5');
       $results = $this->db->resultSet();
       return $results;
    }

    public function FindCPProfesseursList()
    {
       $this->db->query('SELECT a.*, b.*, c.*, d.*
       FROM c_p_m a
       JOIN matiere b ON b.id_matiere = a.id_matiere
       JOIN cursus c ON c.id_cursus = a.id_cursus
       JOIN professeur d ON d.id_professeur = a.id_professeur
       WHERE a.id_cursus = 1');
       $results = $this->db->resultSet();
       return $results;
    }

    public function FindCE1ProfesseursList()
    {
       $this->db->query('SELECT a.*, b.*, c.*, d.*
       FROM c_p_m a
       JOIN matiere b ON b.id_matiere = a.id_matiere
       JOIN cursus c ON c.id_cursus = a.id_cursus
       JOIN professeur d ON d.id_professeur = a.id_professeur
       WHERE a.id_cursus = 2');
       $results = $this->db->resultSet();
       return $results;
    }

    public function FindCE2ProfesseursList()
    {
       $this->db->query('SELECT a.*, b.*, c.*, d.*
       FROM c_p_m a
       JOIN matiere b ON b.id_matiere = a.id_matiere
       JOIN cursus c ON c.id_cursus = a.id_cursus
       JOIN professeur d ON d.id_professeur = a.id_professeur
       WHERE a.id_cursus = 3');
       $results = $this->db->resultSet();
       return $results;
    }

    public function FindCM1ProfesseursList()
    {
       $this->db->query('SELECT a.*, b.*, c.*, d.*
       FROM c_p_m a
       JOIN matiere b ON b.id_matiere = a.id_matiere
       JOIN cursus c ON c.id_cursus = a.id_cursus
       JOIN professeur d ON d.id_professeur = a.id_professeur
       WHERE a.id_cursus = 4');
       $results = $this->db->resultSet();
       return $results;
    }

    public function FindCM2ProfesseursList()
    {
       $this->db->query('SELECT a.*, b.*, c.*, d.*
       FROM c_p_m a
       JOIN matiere b ON b.id_matiere = a.id_matiere
       JOIN cursus c ON c.id_cursus = a.id_cursus
       JOIN professeur d ON d.id_professeur = a.id_professeur
       WHERE a.id_cursus = 5');
       $results = $this->db->resultSet();
       return $results;
    }

}
