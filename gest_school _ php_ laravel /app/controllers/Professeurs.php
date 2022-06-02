<?php
class Professeurs extends Controller {
    public function __construct() {
        $this->profModel = $this->model('Professeur');
    }
    
//.............................Afficher informations compte ......................//
    public function index() {
        $utilisateurs = $this->profModel->findAllUsers();
        $data = [
            'utilisateurs' => $utilisateurs
        ];

        $this->view('professeurs/index', $data);


        // $professeurs = $this->profModel->findProf();
        // $data = [
        //     'professeurs' => $professeurs
        // ];

        // $this->view('professeurs/connect', $data);

    }



 //..................update informations compte................//

    public function update($id) {

        $utilisateur = $this->profModel->findUserById($id);

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
                if ($this->profModel->updateUser($data)) {
                    header("Location: " . URLROOT . "/professeurs");
                } else {
                    die("Something went wrong, please try again!");
                }
            } else {
                $this->view('professeurs/update', $data);
            }
        }

        $this->view('professeurs/update', $data);
    }

//.............................Delete compte......................//
    public function delete($id) {

        $utilisateur = $this->profModel->findUserById($id);

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

            if($this->profModel->deleteUser($id)) {
                    header("Location: " . URLROOT . "/professeurs");
            } else {
               die('Something went wrong!');
            }
        }
    }


}

//..................Function connect................//


// public function connect() {
//     $data = [
//         'id_professeur' => ''
//     ];

//     if($_SERVER['REQUEST_METHOD'] == 'POST') {
     
//         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

//         $data = [
//             'id_professeur' => trim($_POST['id_professeur'])
//         ];

       
//         if (!empty($data['id_professeur'])) {
//             $connectedProf = $this->profModel->connect($data['id_professeur']);
           
//             if ($connectedProf) 
                
//             {
//                 $this->createProfSession($connectedProf); 
//                 $this->view('professeurs/connect', $data);
                
//             } 
//         }

//     } else {
//         $data = [
//             'id_professeur' => ''
         
//         ];
//     }
//     $this->view('professeurs/index', $data);
// }


//.................Function create Session.................//

// public function createProfSession($professeur) {
//     $_SESSION['id_professeur'] = $professeur->id_professeur;

    
// }

//.................Afficher table professeur.................//


   
      







