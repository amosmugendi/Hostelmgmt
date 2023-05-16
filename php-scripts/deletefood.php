<?php 

    require_once '../db/conn.php';
    require_once '../includes/session.php';
    require_once '../includes/session.php';

    if(isset($_GET['food_id'])){
        //get id values 
        $id=$_GET['food_id'];
        //call Delete function
        $result= $crud->deleteFood($id);
        //redirect
        if($result){
            header("Location: ../admin/viewFoods.php");
        }
        else{
            echo '';
        }
    }
?>