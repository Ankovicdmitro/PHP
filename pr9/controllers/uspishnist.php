<?php
class UspishnistController{
    public $model;

    public function __construct(){
        $this->model = new UspishnistModel;
    }

    public function redirect($url){
        if($url) header('Location: '.$url);
    }

    public function index(){
        
        $uspishnist = $this->model->getItemsFromDb();
        $students = $this->model->getStudents();
        $subjects = $this->model->getSubjects();
        include 'views/uspishnist.php';
    }

    public function addToDb(){
        if(isset($_POST)){
            $this->model->addToDB();
        }
        $this->redirect("/pr8/index.php/uspishnist");
    }

    public function actions(){
        if(isset($_POST['delete'])) $this->model->deleteFromDb();
        if(isset($_POST['update'])) $this->model->updateFromDb();
        $this->redirect("/pr8/index.php/uspishnist");
    }

}

?>