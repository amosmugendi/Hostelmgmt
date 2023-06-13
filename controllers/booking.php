<?php
include_once '../db/conn.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Extract values from the $_POST array
    $current_date = date("Y-m-d");
    $reg = $_SESSION['id'];
    $hostel = $_POST['hostel'];
    $roomid = $_POST['roomid'];
    $roomtype = $_POST['room_type'];

    // Store the values in session variables
    $_SESSION['hostel'] = $hostel;
    $_SESSION['roomid'] = $roomid;
    $_SESSION['roomtype'] = $roomtype;

    if ($roomtype == 'single') {
        $newroomstatus = "full";
    } else {
        $result = $crud->countBookings($roomid);

        if ($result['num'] >= 1) {
            $newroomstatus = "full";
        } else {
            $newroomstatus = "partial";
        }
    }

    // Call function to insert and track if success or not
    if (isset($crud) && method_exists($crud, 'newBooking')) {
        $isSuccess = $crud->newBooking($reg, $hostel, $roomid, $current_date, $newroomstatus);
        if ($isSuccess) {
            header("Location: ../student/payment.php");
            exit(); // Add this line to stop the script execution
        } else {
            echo 'An error occurred. Please try again.';
        }
    } else {
        echo 'crud object or newBooking method not defined.';
    }
}
?>
