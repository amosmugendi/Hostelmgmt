<?php 
    require_once('../db/conn.php');
    require_once('../includes/session.php');
    if(!$_GET['id']){
        include('includes/errormessage.php');
        header("Location: ../admin/viewrooms.php ");
    }
    else{
        //get id values 
        $id=$_GET['id'];
        //call reset function
        $result= $crud->resetRoom($id);
        //redirect
        if($result){
            header("Location: ../admin/viewrooms.php");
        }
        else{
            echo 'Operation Failed';
        }
    }
?>