<?php
include_once '../db/conn.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Extract values from the $_POST array
    $date = date("Y-m-d");
    // Retrieve form values
    $userid = $_SESSION['id'];
    $fee = floatval($_POST['fee']);
    $amount_paid = floatval($_POST['paid']);

    // Calculate the balance
    $balance = $fee - $amount_paid;

    // Set status based on balance
    $status = ($balance == 0) ? 'complete' : 'incomplete';

    // Retrieve the file input
    $slip = $_FILES['slip'];
    $slipfilename = $slip['name'];
    $slipfileerror = $slip['error'];
    $slipfiletemp = $slip['tmp_name'];
    $filename_separate = explode('.', $slipfilename);
    $file_extension = strtolower(end($filename_separate));
    $extension = array('jpeg', 'jpg', 'png');

    // Call function to insert and track if success or not
    if (in_array($file_extension, $extension)) {
        $upload_slip = '../slips/'. $slipfilename;

        move_uploaded_file($slipfiletemp, $upload_slip);

        $isSuccess = $crud->insertPayment($userid, $fee, $amount_paid, $upload_slip, $balance, $status, $date);
        if ($isSuccess) {
            $_SESSION["success"] = "Payment Successful";
            header("Location: ../student/student.php");
            exit();
        } else {
            echo 'An error occurred. Please try again.';
        }
    } else {
        echo 'Invalid file extension. Please upload a JPEG, JPG, or PNG file.';
    }
}

