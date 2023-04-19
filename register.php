<?php
    require_once 'db/conn.php';

    if($_SERVER['REQUEST_METHOD']=='POST'){
        //extract values from the $_POST Array
        $reg=$_POST['regno'];
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $id=$_POST['id'];
        $dob=$_POST['dob'];
        $phone=$_POST['phone'];
        $county=$_POST['county'];
        $contact=$_POST['contact'];

        //call function to insert and track if success or not
        $isSuccess= $crud->insertStudent($reg,$fname,$lname,$email,$id,$dob,$phone,$county,$contact);

        if($isSuccess){
           echo 'Operation Sucessful';
           header('Location:index.php');
            
        }else{
            echo 'an error occured please try again';
        }
    }
?>
