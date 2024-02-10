<?php
class UspishnistModel extends Model{

    public function getItemsFromDb(){
        $query = "SELECT * FROM uspishnist";
        return $this->db_select_array($query);
    }
    
     public function getStudents(){
        $query = "SELECT * FROM students";
        return $this->db_select_array($query);
    }

    public function getSubjects(){
        $query = "SELECT * FROM subjects";
        return $this->db_select_array($query);
    }

    public function addToDb(){
        $query = $this->insert_db_query($_POST, 'uspishnist');
        $this->db_query($query);
    }

    public function deleteFromDb(){
        $q = "DELETE FROM uspishnist WHERE id = ".$_POST['delete'];
        $this->db_query($q);
    }

    public function updateFromDb(){
        $query = "UPDATE uspishnist SET sid='".$_POST['sid'][$_POST['update']]."', pid='".$_POST['pid'][$_POST['update']]."', mark='".$_POST['mark'][$_POST['update']]."' WHERE id = ".$_POST['update'];
        $this->db_query($query);
    }

}
?>