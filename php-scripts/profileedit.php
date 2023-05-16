<?php

use LDAP\Result;

require_once('../db/conn.php');
//get values from post operation
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //extract values from the $_POST array
    $id = $_POST['id'];
    $reg = $_POST['reg'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $idno = $_POST['idno'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $county = $_POST['county'];
    $contact = $_POST['contact'];

    //call Crud function
    $result = $crud->editStudent($id, $reg, $fname, $lname, $email, $idno, $dob, $phone, $county, $contact);
    //Redirect to viewrecords.php
    if ($result) {
        echo "<script>alert('Records updated Successfully!'); </script>";

        header("Location: ../student/student.php");
    }
} else {
    echo 'error';
}
