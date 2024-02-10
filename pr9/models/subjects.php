<?php

class SubjectsModel extends Model
{
    public function getSubjectsFromDB()
    {
        $query = "SELECT * FROM subjects";

        return $this->db_select_array($query);
    }

    public function addSubjectToDB()
    {
        $query = $this->insert_db_query($_POST, 'subjects');
        $this->db_query($query);
    }

    public function deleteSubjectFromDB()
    {
        $query = "DELETE FROM `subjects` WHERE `id` = " . $_POST['delete'];
        $this->db_query($query);
    }

    public function updateSubject(){
        $query = "UPDATE subjects SET name='".$_POST['name'][$_POST['update']]."' WHERE id = ".$_POST['update'];
        $this->db_query($query);
    }


}