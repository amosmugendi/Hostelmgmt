<?php 
    require_once('../db/conn.php');
    //get values from post operation
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        //extract values from the $_POST array
        // $id=$_POST['id'];
        $food_id=$_POST['food_id'];
        $diet_type=$_POST['diet_type'];
        $food=$_POST['food'];
        // $Day=$_POST['date'];
        //$food_id=$_POST['food_id'];
    
    //call Crud function
    $result=$crud->editFood($food_id, $diet_type, $food);
    //Redirect to viewrecords.php
    if($result){
        header("Location: ../admin/viewfoods.php");
    }
}
else{
    echo 'error';
}

?>