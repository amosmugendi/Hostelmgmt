<?php 
    require_once('db/conn.php');
    if(!$_GET['id']){
        include('includes/errormessage.php');
        header("Location: viewrecords,php ");
    }
    else{
        //get id values 
        $id=$_GET['id'];
        //call Delete function
        $result= $crud->deleteFood($id);
        //redirect
        if($result){
            header("Location: viewFoods.php");
        }
        else{
            echo '';
        }
    }
?>