<?php
class Utilisateur {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function register($data) {
        $this->db->query('INSERT INTO utilisateur (nom, prenom, email, mot_de_passe, fonction) VALUES
        (:nom, :prenom, :email, :mot_de_passe, :fonction)');

        //Bind values
        $this->db->bind(':nom', $data['nom']);
        $this->db->bind(':prenom', $data['prenom']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':mot_de_passe', $data['mot_de_passe']);
        $this->db->bind(':fonction', $data['fonction']);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


public function login($email,$mot_de_passe) {
    $this->db->query('SELECT * FROM utilisateur WHERE email =:email');
       
    $this->db->bind(':email', $email);
    
    $row = $this->db->single();

    $hashedPassword = $row->mot_de_passe;

    if (password_verify($mot_de_passe, $hashedPassword)) {
        return $row;
    } else {
        return false;
    }
}




}

    



