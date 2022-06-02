<?php
class Professeur {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }
//.............................Afficher informations de compte......................//

    public function findAllUsers() {
        $this->db->query('SELECT * FROM utilisateur where id_utilisateur = '. $_SESSION['id_utilisateur']);

        $results = $this->db->resultSet();

        return $results;
    }


    //.............................update informations de compte......................//

    public function updateUser($data) {
        $this->db->query('UPDATE utilisateur SET nom = :nom, prenom = :prenom, email = :email, 
        mot_de_passe = :mot_de_passe, fonction = :fonction where id_utilisateur = '. $_SESSION['id_utilisateur']);

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


    //.............................afficher information de compte .....................//

    public function findUserById($id) {
        $this->db->query('SELECT * FROM utilisateur WHERE id_utilisateur = :id');

        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

//.............................delete compte ......................//

    public function deleteUser($id) {
        $this->db->query('DELETE FROM utilisateur WHERE id_utilisateur = :id');

        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    //.............................function connect prof......................//


    // public function connect($id_professeur) {
    //     $this->db->query('SELECT * FROM professeur WHERE id_professeur =:id_professeur');
           
    //     $this->db->bind(':id_professeur', $id_professeur);
        
    //     $row = $this->db->single();
    
    //         return $row;
       
    // }
//.............................Afficher info prof......................//

    // public function findProf() {
    //     $this->db->query('SELECT * FROM professeur where id_professeur= '. $_SESSION['id_professeur']);

    //     $this->db->bind(':id_professeur', $_SESSION['id_professeur']);
        
    //     $row = $this->db->single();
    
    //         return $row;

     
    // }

}
