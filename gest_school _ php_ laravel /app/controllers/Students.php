<?php
class Students extends Controller {
    public function __construct() {
        $this->studentModel = $this->model('Student');
    }

    public function index() {
        $utilisateurs = $this->studentModel->findAllUsers();

        $data = [
            'utilisateurs' => $utilisateurs
        ];

        $this->view('students/index', $data);
    }

    
    public function update($id) {

        $utilisateur = $this->studentModel->findUserById($id);

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
                if ($this->studentModel->updateUser($data)) {
                    header("Location: " . URLROOT . "/students");
                } else {
                    die("Something went wrong, please try again!");
                }
            } else {
                $this->view('students/update', $data);
            }
        }

        $this->view('students/update', $data);
    }


    public function delete($id) {

        $utilisateur = $this->studentModel->findUserById($id);

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

            if($this->studentModel->deleteUser($id)) {
                    header("Location: " . URLROOT . "/students");
            } else {
               die('Something went wrong!');
            }
        }
    }
}

