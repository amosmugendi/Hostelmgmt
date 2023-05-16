<?php
include_once '../db/conn.php' ;
include_once '../includes/session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Hostel <?php $title ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../css/add.css">
    <link rel="stylesheet" href="../css/bookform.css">
    <link rel="stylesheet" href="../css/dashboards.css">
    <link rel="stylesheet" href="../css/edit.css">
    <link rel="stylesheet" href="/css/ex.css"> 
    <link rel="stylesheet" href="/css/view.css">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/index.css">

    <script src="../js/script.js"></script>
</head>

<body>
    <div class="container">
        <nav class="nav">
            <ul>
                <li><a href="../admin/admin.php" class="logo">
                        <img SRC="../pictures/logo.png" alt="">
                        <br>
                        <span class="nav-item">Admin</span>
                    </a></li>
                <li><a href="../admin/admin.php">
                        <i class="fas fa-home"></i>
                        <span class="nav-item">Home</span>
                    </a></li>
                <li><a href="../admin/viewstudents.php">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Students</span>
                    </a></li>
                <li><a href="../admin/viewrooms.php">
                        <i class="fas fa-bed"></i>
                        <span class="nav-item">Rooms</span>
                    </a></li>
                <li><a href="../admin/viewfoods.php">
                        <i class="fas fa-utensils"></i>
                        <span class="nav-item">Foods</span>
                    </a></li>
                <li><a href="../logout.php
                " class="logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="nav-item">Logout </span>
                    </a></li>
            </ul>
        </nav>
    
