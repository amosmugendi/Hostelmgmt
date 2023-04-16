<?php

include_once 'db/conn.php';
include_once 'includes/session.php';

$result = $reports->activeBookings();
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
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #f9f9f9;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
    </style>
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
            <?php
            echo "<table>";
            echo "<tr>
                    <th>Booking ID</th>
                    <th>Student ID</th>
                    <th>Room Number</th>
                    <th>Booking Date</th>                   
                </tr>";
            if (count($result) > 0) {
                foreach ($result as $row) {
                    echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["roomid"] . "</td>
                    <td>" . $row["studentregno"] . "</td>
                    <td>" . $row["date"] . "</td> 
                </tr>";
                }
            } else {
                echo "<tr>
                    <td colspan='4'>No bookings found.</td>
                </tr>";
            }
            echo "</table>";
            ?>


        </section>
    </div>
</body>

</html>