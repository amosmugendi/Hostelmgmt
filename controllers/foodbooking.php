<?php
include_once '../db/conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //extract values from the $_POST Array
    $date = date("Y-m-d");
    $reg = $_POST['reg'];
    $food_id = $_POST['food_id'];
    $diet_type = $_POST['diet_type'];


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
    if (isset($crud) && method_exists($crud, 'newFood')) {
        $isSuccess = $crud->newFood($reg, $food_id, $date, $food);
        if ($isSuccess) {
            session_start();
            $_SESSION["success"] ="Booking Successfull";
            //echo 'operation successful';
            header("Location: ../foodmenu.php");
        } else {
            echo 'an error occurred please try again';
        }
    } else {
        echo 'crud object or newBooking method not defined';
    }
}
