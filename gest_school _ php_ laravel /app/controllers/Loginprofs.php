<?php
class Loginprofs extends Controller {

    public function __construct() {
        $this->loginprofModel = $this->model('Loginprof');
    }


    public function index() 
    {
      
        $data =
        [
            'id_professeur' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id_professeur' => trim($_POST['id_professeur'])
            ];
            if (!empty($data['id_professeur'])) 
            {
                $loggedInProf = $this->loginprofModel->connect($data['id_professeur']);
               
                if ($loggedInProf) 
                {
                    $_SESSION['id_professeur'] = $loggedInProf->id_professeur;
                    header('location:' . URLROOT . '/loginprofs/details/'. $loggedInProf->id_professeur);
                    // $this->details($loggedInProf->id_professeur);
                } 
                else 
                {
                    echo "invalid id";
                    $this->view('loginprofs/index', $data);
                }
            }

        } 
       
        $this->view('loginprofs/index', $data);
    }


    public function details($id_professeur)
    {
        $p_data = [];
        $profData = $this->loginprofModel->findprof($id_professeur);
        $p_data['profData'] = $profData;
        ///-(get prof matiere)
        $mat_curcus = $this->loginprofModel->get_prof_matiere_curcus($id_professeur);
        $p_data['prof_mat_curcus']= $mat_curcus;
        $this->view('loginprofs/info', $p_data);
    }



    public function profstudent($id_cursus, $id_professeur, $id_matiere) 
    {
    
      $profstudents = $this->loginprofModel->get_prof_students($id_cursus, $id_professeur);
      
      $this->view('loginprofs/profstudents', $profstudents);
    }




    public function get_students_note($id_etudiant, $id_professeur, $id_cursus, $id_matiere )
    {
        $data = [];
        $studentsnote = $this->loginprofModel->get_note($id_cursus, $id_professeur, $id_matiere, $id_etudiant);
        $data['studentsnote'] =  $studentsnote;
        if ($studentsnote)
        {
            $this->view('loginprofs/studentsnote' ,  $data);
        }
        else
        {
            echo " Aucune note n'a pas été encore attribué à cet étudiant";
        }

    }




    public function insert_note($id_e='', $id_p='', $id_c='', $id_m='')
    {
        $data = 
        [
            'id_matiere'=> $id_m,
            'id_cursus'=>$id_c,
            'id_professeur'=> $id_p,
            'id_etudiant'=>$id_e,
            'note'=>'',
            'appreciation'=>'',
            'semestre'=>'',
            'annee_scolaire'=>''
        ];
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = 
            [
                'id_matiere'=> $id_m,
                'id_cursus'=> $id_c,
                'id_professeur'=> $id_p,
                'id_etudiant'=> $id_e,
                'note'=> trim($_POST['note']),
                'appreciation'=> trim($_POST['appreciation']),
                'semestre'=> trim($_POST['semestre']),
                'annee_scolaire'=> trim($_POST['annee_scolaire'])
            ];
            if (!empty($data['id_matiere']) && !empty($data['id_cursus']) && !empty($data['id_professeur']) && !empty($data['id_etudiant']) 
            && !empty($data['note']) && !empty($data['appreciation']) && !empty($data['semestre']) && !empty($data['annee_scolaire']))
            {
              
                if ($this->loginprofModel->add_note_to_database($data)) 
                {
                    header('location: ' . URLROOT . '/loginprofs/profstudent/' .$id_c . '/' . $id_p . '/' .$id_m);
                } 
                 else
                {
                 die('Something went wrong.');
                }
            }
        }
        $this->view('loginprofs/insertnote', $data);
    }


}
