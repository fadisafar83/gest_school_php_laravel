<?php
class Parents extends Controller {
    public function __construct() {
        $this->parentModel = $this->model('Parente');
    }

    public function index() {
        $utilisateurs = $this->parentModel->findAllUsers();

        $data = [
            'utilisateurs' => $utilisateurs
        ];

        $this->view('parents/index', $data);
    }

    public function insert() {
        if(isLoggedIn()) {
           
        $data = [
            'nom' => '',
            'prenom' => '',
            'email' => '',
            'mot_de_passe' => '',
            'fonction' => ''
        ];
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'nom' => trim($_POST['nom']),
                'prenom' => trim($_POST['prenom']),
                'email' => trim($_POST['email']),
                'mot_de_passe' => trim($_POST['mot_de_passe']),
                'fonction' => trim($_POST['fonction'])
            ];

            if(!empty($data['nom']) && !empty($data['prenom']) && !empty($data['email'])
            && !empty($data['mot_de_passe']) && !empty($data['fonction'])) {
                $data['mot_de_passe'] = password_hash($data['mot_de_passe'], PASSWORD_DEFAULT);
                if ($this->parentModel->addUser($data)) {
                    header("Location: " . URLROOT . "/parents");
                } else {
                    die("Something went wrong, please try again!");
                }
            } else {
                $this->view('parents/insert', $data);
            }
        }

        $this->view('parents/insert', $data);
    }

    
    public function update($id) {

        $utilisateur = $this->parentModel->findUserById($id);

        if(isLoggedIn()) {
          
        $data = [
            'utilisateur' => $utilisateur,
            'nom' => '',
            'prenom' => '',
            'email' => '',
            'mot_de_passe' => '',
            'fonction' => ''
        ];
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id_utilisateur' => $id,
                'utilisateur' => $utilisateur,
                'nom' => trim($_POST['nom']),
                'prenom' => trim($_POST['prenom']),
                'email' => trim($_POST['email']),
                'mot_de_passe' => trim($_POST['mot_de_passe']),
                'fonction' => trim($_POST['fonction'])
            ];

            if(!empty($data['nom']) && !empty($data['prenom']) && !empty($data['email'])
             && !empty($data['mot_de_passe']) && !empty($data['fonction']) ) {
                $data['mot_de_passe'] = password_hash($data['mot_de_passe'], PASSWORD_DEFAULT);
                if ($this->parentModel->updateUser($data)) {
                    header("Location: " . URLROOT . "/parents");
                } else {
                    die("Something went wrong, please try again!");
                }
            } else {
                $this->view('parents/update', $data);
            }
        }

        $this->view('parents/update', $data);
    }


    public function delete($id) {

        $utilisateur = $this->parentModel->findUserById($id);

        if(isLoggedIn()) {
        $data = [
            'utilisateur' => $utilisateur,
            'nom' => '',
            'prenom' => '',
            'email' => '',
            'mot_de_passe' => '',
            'fonction' => ''
        ];
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if($this->parentModel->deleteUser($id)) {
                    header("Location: " . URLROOT . "/parents");
            } else {
               die('Something went wrong!');
            }
        }
    }

}

