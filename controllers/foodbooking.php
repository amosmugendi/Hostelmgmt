<?php
include_once '../db/conn.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //extract values from the $_POST Array

    $reg = $_SESSION['id'];
    $food_id = $_POST['food_id'];
    //$food = $_POST['food'];
    $diet_type = $_POST['diet_type'];
    $date = date("Y-m-d");


    /* if ($roomtype == 'single') {
        $roomstatus = "full";
    } else {
        $result= $crud->countBookings($roomid);
        

        if ($result['num']>=1) {
            $roomstatus = "full";
        } else {
            $roomstatus = "partial";
        }
    }
*/
    // echo "code inafika hapa";

    //call function to insert and track if success or not
    if (isset($crud) && method_exists($crud, 'newfoodbooking')) {
        $isSuccess = $crud->newfoodbooking($reg, $food_id, $date);
        if ($isSuccess) {
            session_start();
            $_SESSION["success"] = "Booking Successfull";
            //echo 'operation successful';
            header("Location: ../student/foodmenu.php");
        } else {
            echo 'an error occurred please try again';
        }
    } else {
        echo 'crud object or newBooking method not defined';
    }
}
