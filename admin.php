<?php

include_once 'db/conn.php';
include_once 'includes/session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Management Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="css/dashboards.css">
    <script src="../js/script.js"></script>
</head>

<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="#" class="logo">
                        <img SRC="" alt="">
                        <br>
                        <span class="nav-item">Admin DashBoard</span>
                    </a></li>
                <li><a href="#">
                        <i class="fas fa-home"></i>
                        <span class="nav-item">Home</span>
                    </a></li>
                <li><a href="#">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Users Profile</span>
                    </a></li>
                <li><a href="#">
                        <i class="fas fa-chess-rook"></i>
                        <span class="nav-item">View Room Booked</span>
                    </a></li>
                <li><a href="">
                        <i class="fas fa-bed"></i>
                        <span class="nav-item">Update Room Details</span>
                    </a></li>
                <li><a href="">
                        <i class="fas fa-utensils"></i>
                        <span class="nav-item">Update Food Menu</span>
                    </a></li>
                <li><a href="logout.php
                " class="logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="nav-item">Logout </span>
                    </a></li>
            </ul>
        </nav>
        <section class="main">
            <div class="main-top">
                <h1>Profile</h1>
                <i class="fas fa-user-cog"></i>
            </div>
            <div class="myprofile">
                <div class="card">
                    <i class="fas fa-user"></i>
                    <h3>User Profile</h3>
                    <p>this card contains my details</p>
                    <button>View Profile</button>
                </div>
                <div class="card">
                    <i class="fas fa-bed"></i>
                    <h3>Book Room</h3>
                    <p></p>
                    <button id="bookbtn">View Room Booked</button>
                </div>
                <div class="card">
                    <i class="fas fa-utensils"></i>
                    <h3>Food Menu</h3>
                    <p>Categories of foods provided</p>
                    <button>View Menu</button>
                </div>
                <div class="card">
                    <i class="fas fa-pen-square"></i>
                    <h3>Update Your Details</h3>
                    <p>Make sure your personal details are up-to-date</p>
                    <button id="regbtn">Update</button>
                    <script>
                        //script to acctivate buttons on the student pannel
                        document.getElementById("regbtn").onclick = function() {
                            location.href = "registration.php";
                        }
                        document.getElementById("bookbtn").onclick = function() {
                            location.href = "bookedRooms.php";
                        }
                    </script>
                </div>
            </div>
        </section>
    </div>
</body>

</html>