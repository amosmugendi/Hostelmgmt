<?php
    require_once '../db/conn.php';

    if($_SERVER['REQUEST_METHOD']=='POST'){
        //extract values from the $_POST Array
        $id=$_POST['id'];
        $room_type=$_POST['room_type'];
        $fee=$_POST['fee'];
        $max_occupants=$_POST['max_occupants'];
        $status=$_POST['status'];

        //call function to insert and track if success or not
        $isSuccess= $crud->insertRoom($id,$room_type,$fee,$max_occupants,$status);

        if($isSuccess){
           echo 'Operation Sucessful';
           header('Location: ../admin/viewrooms.php');
            
        }else{
            echo 'an error occured please try again';
        }
    }
?>
