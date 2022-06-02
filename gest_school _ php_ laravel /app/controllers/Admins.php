<?php
class Admins extends Controller {
    public function __construct() {
        $this->adminModel = $this->model('Admin');
    }

    public function index() 
    {
        $data = [];
        $utilisateurs = $this->adminModel->findAllUsers();
        $data ['utilisateurs']= $utilisateurs;
      
        $cpstudents = $this->adminModel->FindCPstudents();
        $data['cpstudents'] = $cpstudents;

        $ce1students = $this->adminModel->FindCE1students();
        $data['ce1students'] = $ce1students;
               
        $ce2students = $this->adminModel->FindCE2students();
        $data['ce2students'] = $ce1students;

        $cm1students = $this->adminModel->FindCM1students();
        $data['cm1students'] = $cm1students;

        $cm2students = $this->adminModel->FindCM2students();
        $data['cm2students'] = $cm2students;

        $cpprofesseursList = $this->adminModel->FindCPProfesseursList();
        $data['cpprofesseursList'] = $cpprofesseursList;

        $ce1professeursList = $this->adminModel->FindCE1ProfesseursList();
        $data['ce1professeursList'] = $ce1professeursList;

        $ce2professeursList = $this->adminModel->FindCE2ProfesseursList();
        $data['ce2professeursList'] = $ce2professeursList;

        $cm1professeursList = $this->adminModel->FindCM1ProfesseursList();
        $data['cm1professeursList'] = $cm1professeursList;

        $cm2professeursList = $this->adminModel->FindCM2ProfesseursList();
        $data['cm2professeursList'] = $cm2professeursList;
               
        $this->view('admins/index', $data);

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
                if ($this->adminModel->addUser($data)) {
                    header("Location: " . URLROOT . "/admins");
                } else {
                    die("Something went wrong, please try again!");
                }
            } else {
                $this->view('admins/insert', $data);
            }
        }

        $this->view('admins/insert', $data);
    }

    
    public function update($id) {

        $utilisateur = $this->adminModel->findUserById($id);

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
                if ($this->adminModel->updateUser($data)) {
                    header("Location: " . URLROOT . "/admins");
                } else {
                    die("Something went wrong, please try again!");
                }
            } else {
                $this->view('admins/update', $data);
            }
        }

        $this->view('admins/update', $data);
    }


    public function delete($id) {

        $utilisateur = $this->adminModel->findUserById($id);

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

            if($this->adminModel->deleteUser($id)) {
                    header("Location: " . URLROOT . "/admins");
            } else {
               die('Something went wrong!');
            }
        }
    }


    // public function FindCPstudents()
    // {
    //    $cpstudents = $this->adminModel->FindCPstudents();
    //    $data = [
    //        'cpstudents'=> $cpstudents
    //    ];
    //    $this->view('admins/index', $data);
    // }

}

