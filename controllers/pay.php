<?php
include_once '../db/conn.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //extract values from the $_POST Array
    $date = date("Y-m-d");
    // Retrieve form values
    $userid = $_SESSION['id'];
    $fee = $_POST['fee'];
    $amount_paid = $_POST['paid'];


    //calclate the balance 
    $balance = $fee - $amount_paid;

    // Set status based on balance
    $status = ($balance == 0) ? 'complete' : 'incomplete';
    //retrieve the file input
    $slip = $_FILES['slip'];
    $slipfilename = $slip['name'];
    $slipfileerror = $slip['error'];
    $slipfiletemp = $slip['tmp_name'];
    $filename_separate = explode('.', $slipfilename);
    $file_extension = strtolower(end($filename_separate));
    $extension = array('jpeg', 'jpg', 'png');
    //call function to insert and track if success or not
    if (in_array($file_extension, $extension)) {
        $upload_slip = '../slips/'. $slipfilename;
        // echo $slipfiletemp . "<br>";
        // echo $upload_slip . "<br>";


        move_uploaded_file($slipfiletemp, $upload_slip);

        $isSuccess = $crud->insertPayment($userid,$fee,$amount_paid, $upload_slip, $balance, $status, $date);
        if ($isSuccess) {
            // session_start();
            $_SESSION["success"] = "Booking Successfull";
            // $_SESSION["success"] = "Payment Successfull";
            //echo 'operation successful';
            header("Location: ../student/student.php");
        } else {
            echo 'an error occurred please try again';
        }
    } else {
        echo 'error';
    }
}
