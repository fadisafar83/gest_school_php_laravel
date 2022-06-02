<?php
class Utilisateurs extends Controller {
    public function __construct() {
        $this->utilisateurModel = $this->model('Utilisateur');
    }


    public function register() {
        $data = [
            'nom' => '',
            'prenom' => '',
            'email' => '',
            'mot_de_passe' => '',
            'fonction' => ''
            
        ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

              $data = [
                'nom' => trim($_POST['nom']),
                'prenom' => trim($_POST['prenom']),
                'email' => trim($_POST['email']),
                'mot_de_passe' => trim($_POST['mot_de_passe']),
                'fonction' => trim($_POST['fonction'])
              
            ];

            $nameValidation = "/^[a-zA-Z0-9]*$/";
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

            //Validate username on letters/numbers
            if (!empty($data['nom']) && !empty($data['prenom']) && !empty($data['email']) && !empty($data['mot_de_passe'])
            && !empty($data['fonction'])) {
            
                // Hash password
                $data['mot_de_passe'] = password_hash($data['mot_de_passe'], PASSWORD_DEFAULT);

                //Register user from model function
                if ($this->utilisateurModel->register($data)) {
                    //Redirect to the login page
                    header('location: ' . URLROOT . '/utilisateurs/login');
                } else {
                    die('Something went wrong.');
                }
            }
        }
        $this->view('utilisateurs/register', $data);
    }



        public function login() {
            $data = [
                'title' => 'Login page',
                'email' => '',
                'mot_de_passe' => ''
            ];
    
            //Check for post
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                //Sanitize post data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                $data = [
                    'email' => trim($_POST['email']),
                    'mot_de_passe' => trim($_POST['mot_de_passe'])
                  
                ];
  
                //Check if all errors are empty
                if (!empty($data['email']) && !empty($data['mot_de_passe'])) {
                    $loggedInUser = $this->utilisateurModel->login($data['email'], $data['mot_de_passe']);
                   
                    if ($loggedInUser) 
                    
                    {
                        $this->createUserSession($loggedInUser); 
                        
                    } else {
                       
                        $this->view('utilisateurs/login', $data);
                    }
                }
    
            } else {
                $data = [
                    'email' => '',
                    'mot_de_passe' => ''
                 
                ];
            }
            $this->view('utilisateurs/login', $data);
        }

        public function createUserSession($utilisateur) {
            $_SESSION['id_utilisateur'] = $utilisateur->id_utilisateur;
            $_SESSION['email'] = $utilisateur->email;
            $_SESSION['mot_de_passe'] = $utilisateur->mot_de_passe;
            $_SESSION['fonction'] = $utilisateur->fonction;
        
            if ($utilisateur->fonction == 'admin') {
                header('location:' . URLROOT . '/admins');	  
            }elseif($utilisateur->fonction == 'parent') {
                header('location:' . URLROOT . '/parents');   
            }elseif($utilisateur->fonction == 'professeur') {
                header('location:' . URLROOT . '/professeurs');
            }elseif($utilisateur->fonction == 'etudiant') {
                header('location:' . URLROOT . '/students');
            }else{
            $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
            header('location:' . URLROOT . '/utilisateurs/login');
        }

    }
    

    // public function index() {
    //     $data = [
    //         'title' => 'Home page'
    //     ];

    //     $this->view('index', $data);
    // }



    public function logout() {
        unset($_SESSION['id_utilisateur']);
        unset($_SESSION['email']);
        unset($_SESSION['mot_de_passe']);
        header('location:' . URLROOT . '/utilisateurs/login');
    }

    

    }
    