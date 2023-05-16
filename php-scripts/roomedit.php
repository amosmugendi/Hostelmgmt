<?php 
    require_once('../db/conn.php');
    //get values from post operation
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        //extract values from the $_POST array
        $id=$_POST['id'];
        $room_type=$_POST['room_type'];
        $fee=$_POST['fee'];
        $max_occupants=$_POST['max_occupants'];
        $status=$_POST['status'];
    
    //call Crud function
    $result=$crud->editRoom($id, $room_type, $fee, $max_occupants, $status);
    //Redirect to viewrecords.php
    if($result){
        header("Location: ../admin/viewrooms.php");
    }
    }
    else{
        echo 'error';
    }

?>