<?php
class Parentstudents extends Controller {
    public function __construct()
    {
        $this->parentstudentModel = $this->model('Parentstudent');
    }
  

    public function index()
    {
        $data = 
        [
           'id_etudiant'=> ''
        ];
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = 
            [
                'id_etudiant' => trim($_POST['id_etudiant'])
            ];
            if (!empty($data['id_etudiant']))
            {
                $connectenfant = $this->parentstudentModel->connect($data['id_etudiant']);
                if($connectenfant)
                {
                    // $this->view('parentstudents/index', $connectenfant); 
                   
                    header('location:' . URLROOT . '/parentstudents/detailsnote/'. $connectenfant->id_etudiant);
                  
                }
                else
                {
                   echo "invalid ID, ressayer";
                   $this->view('parentstudents/index', $data); 
                }
            }
        }
        $this->view('parentstudents/index', $data);
    }


public function detailsnote($id_etudiant)
{
    $data = [];

    $details = $this->parentstudentModel->chercher_note($id_etudiant);
    $data ['data']= $details;
    $this->view('parentstudents/enfantnote', $data);
}


}

