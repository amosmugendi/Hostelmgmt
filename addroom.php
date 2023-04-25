<?php
$title = "View Rooms";
include_once 'db/conn.php';
include_once 'includes/session.php';

$result = $reports->getRooms();
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
        /* Style the form container */
        form {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Style the form labels */
        label {
            display: inline-block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        /* Style the form input fields */
        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 8px 16px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }

        /* Style the radio button labels */
        input[type="radio"]+label {
            display: inline-block;
            margin-right: 10px;
            font-weight: normal;
        }

        /* Style the submit button */
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        /* Style the submit button on hover */
        input[type="submit"]:hover {
            background-color: #45a049;
        }
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
                <li><a href="logout.php" class="logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="nav-item">Logout </span>
                    </a></li>
            </ul>
        </nav>
        <section class="main">
            <form action="roomaddition.php " method="post">
                <label for="room_type">Room Type:</label>
                <select id="room_type" name="room_type" required>
                    <option value=""></option>
                    <option value="single">Single</option>
                    <option value="Shared">Shared</option>
                </select><br>

                <label for="fee">Fee:</label>
                <input type="text" id="fee" name="fee" required><br>

                <label for="max-occupants">Max Occupants:</label>
                <input type="text" id="max_occupants" name="max_occupants" required><br>

                <label for="status">Status:</label>
                <input type="radio" id="available" name="status" value="Empty" required>
                <label for="available">Empty</label>
                <input type="radio" id="partially_occupied" name="status" value="Partially Booked" required>
                <label for="occupied">Partially Booked</label><br>
                <input type="radio" id="occupied" name="status" value="Full" required>
                <label for="occupied">Fully Booked</label><br>
                <input type="submit" value="Submit">
                <script>
                function checkMaxOccupants() {
                    var room_type = document.getElementById("room_type").value;
                    var max_occupants = document.getElementById("max_occupants");
                    if (room_type === "single") {
                        max_occupants.value = 1;
                    } 
                    else{
                        max_occupants.value = 2;
                    }
                }
            </script>
            </form>
            

        </section>
    </div>
</body>

</html>