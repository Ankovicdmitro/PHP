<?php

class SubjectsController
{
    public $model;

    public function __construct()
    {
        $this->model = new SubjectsModel();
    }

    public function redirect($url)
    {

        if ($url) header('Location:'. $url);
    }

    public function index()
    {
        $subjects = $this->model->getSubjectsFromDB();

        include 'views/subjects.php';
    }

    public function addSubject()
    {
        if ($_POST['name']) {
            $this->model->addSubjectToDB();
        }

        $this->redirect('/pr8/index.php/subjects');
    }

    public function actions()
    {
        if (isset($_POST['delete'])) $this->model->deleteSubjectFromDB();
        if (isset($_POST['update'])) $this->model->updateSubject();
        $this->redirect('/pr8/index.php/subjects');
    }
}