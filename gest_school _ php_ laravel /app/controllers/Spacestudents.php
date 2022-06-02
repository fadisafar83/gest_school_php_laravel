<?php
class Spacestudents extends Controller {
    public function __construct()
    {
        $this->spacestudentModel = $this->model('Spacestudent');
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
                $connectenfant = $this->spacestudentModel->connect($data['id_etudiant']);
                if($connectenfant)
                {
                    // $this->view('parentstudents/index', $connectenfant); 
                   
                    header('location:' . URLROOT . '/spacestudents/detailsnote/'. $connectenfant->id_etudiant);
                  
                }
                else
                {
                   echo "invalid ID, ressayer";
                   $this->view('spacestudents/index', $data); 
                }
            }
        }
        $this->view('spacestudents/index', $data);
    }


public function detailsnote($id_etudiant)
{
    $data = [];

    $details = $this->spacestudentModel->chercher_note($id_etudiant);
    $data ['data']= $details;
    $this->view('spacestudents/notestudent', $data);
    if ( $data['data'] == false) echo " Aucune note n'a été retrouvée " ;
}


}

 