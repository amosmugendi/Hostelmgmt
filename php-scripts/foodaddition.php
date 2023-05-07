<?php
    require_once '../db/conn.php';

    if($_SERVER['REQUEST_METHOD']=='POST'){
        //extract values from the $_POST Array
        $id=$_POST['id'];
        $diet_type=$_POST['diet_type'];
        $food=$_POST['food'];
        $Day=$_POST['date'];
        

        //call function to insert and track if success or not
        $isSuccess= $crud->insertFood($id, $diet_type, $food, $Day);

        if($isSuccess){
           echo 'Operation Sucessful';
           header('Location:../admin/viewfoods.php');
            
        }else{
            echo 'an error occured please try again';
        }
    }
?>
