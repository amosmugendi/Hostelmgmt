<?php 
    require_once('db/conn.php');
    if(!$_GET['id']){
        include('includes/errormessage.php');
        header("Location: viewrooms.php ");
    }
    else{
        //get id values 
        $id=$_GET['id'];
        //call Delete function
        $result= $crud->resetRoom($id);
        //redirect
        if($result){
            header("Location: viewrooms.php");
        }
        else{
            echo 'Operation Failed';
        }
    }
?>