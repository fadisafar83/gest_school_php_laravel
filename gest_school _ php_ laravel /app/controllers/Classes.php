<?php
class Classes extends Controller {

public function __construct() {
    $this->classeModel = $this->model('Classe');

}

public function index()
{

    $classes =  $this->classeModel->getAllClasses();
    $data = [
        'classes' => $classes
            ];
        $this->view('classes/index', $data);
}


}