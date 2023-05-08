<?php
require_once '../db/conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = "password";

    //CALL FUNCTION to insert and track if success or not
    $isSuccess = $users->insertUser($email, $password);

    if ($isSuccess) {
        echo 'Registration Was Successful please head to login page';
        $result = $users->getNewUser($email);
        $userid = $result['id'];
        //extract values from the $_POST Array
        $reg = $_POST['regno'];
        // $user_id= $userid;
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        // $email = $_POST['email'];
        $idno = $_POST['idno'];
        $dob = $_POST['dob'];
        $phone = $_POST['phone'];
        $county = $_POST['county'];
        $contact = $_POST['contact'];
        //call function to insert and track if success or not
        $isSuccess = $crud->insertStudent($reg, $userid, $fname, $lname, $email, $idno, $dob, $phone, $county, $contact);

        if ($isSuccess) {
            echo 'Operation Sucessful';
            header('Location: ../admin/viewstudents.php');
        } else {
            echo 'an error occured please try again';
        }
    } else {
        echo 'Registration failed please try again';
    }
}
