<?php

include_once '../db/conn.php';
include_once '../includes/session.php';
//echo 'Welcome ' . $_SESSION['id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Management Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../css/dashboards.css">
    <link rel="stylesheet" href="../css/add.css">
    <link rel="stylesheet" href="../css/dashboards.css">
    <link rel="stylesheet" href="../css/edit.css">
    


    <script src="../js/script.js"></script>
</head>

<body>
    <div class="container">
        <nav class="nav">
            <ul>
                <li><a href="student.php" class="logo">
                        <img SRC="../pictures/logo.png" alt="">
                        <span class="nav-item">Student</span>
                    </a></li>
                <li><a href="student.php">
                        <i class="fas fa-home"></i>
                        <span class="nav-item">Home</span>
                    </a></li>
                <li><a href="profile.php">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Profile</span>
                    </a></li>
                <li><a href="activeroom.php">
                        <i class="fas fa-chess-rook"></i>
                        <span class="nav-item">Booked Room</span>
                    </a></li>
                <!--<li><a href="">
                        <i class="fas fa-bed"></i>
                        <span class="nav-item">Room Details</span>
                    </a></li>-->
                <li><a href="activemeals.php">
                        <i class="fas fa-utensils"></i>
                        <span class="nav-item">Booked Meals</span>
                    </a></li>
                <li><a href="../logout.php
                " class="logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="nav-item">Logout </span>
                    </a></li>
            </ul>
        </nav>