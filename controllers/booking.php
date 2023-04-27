<?php
include_once '../db/conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //extract values from the $_POST Array
    $current_date = date("Y-m-d");
    $reg = $_POST['regno'];
    $roomid = $_POST['roomid'];
    $roomtype = $_POST['room_type'];


    if ($roomtype == 'single') {
        $roomstatus = "full";
    } else {
        $result = $crud->countBookings($roomid);


        if ($result['num'] >= 1) {
            $roomstatus = "full";
        } else {
            $roomstatus = "partial";
        }
    }

    // echo "code inafika hapa";

    //call function to insert and track if success or not
    if (isset($crud) && method_exists($crud, 'newBooking')) {
        $isSuccess = $crud->newBooking($reg, $roomid, $current_date, $roomstatus);
        if ($isSuccess) {
            session_start();
            $_SESSION["success"] = "Booking Successfull";
            //echo 'operation successful';
            header("Location: ../bookroom.php");
        } else {
            echo 'an error occurred please try again';
        }
    } else {
        echo 'crud object or newBooking method not defined';
    }
}
