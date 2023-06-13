<?php
$title = "Admin Dashboard";
require_once '../includes/adminheader.php';
require_once '../db/conn.php';
?>
<head>
  <link rel="stylesheet" href="../css/dashboards.css">
</head>

<section class="main">
    <div class="main-top">
        <h1>Admin Pannel</h1>
        <i class="fas fa-user-cog"></i>
    </div>
    <div class="myprofile">
        <div class="card">
            <i class="fas fa-user"></i>
            <h3>Registered Students</h3>
            <p>This card contains a list of registered students</p>
            <button id="stdnbtn">View</button>
        </div>
        <div class="card">
            <i class="fas fa-bed"></i>
            <h3>Booked Rooms</h3>
            <p> This card Contains a list of booked rooms</p>
            <button id="bookbtn">View</button>
        </div>
        <div class="card">
            <i class="fas fa-utensils"></i>
            <h3>Booked Meals</h3>
            <p>This card contains a list of all the foods booked</p>
            <button id="mealbtn">View</button>
        </div>
        <div class="card">
            <i class="fas fa-pen-square"></i>
            <h3>Update Admin</h3>
            <p></p>
            <button id="updatebtn">Update</button>
            <script>
                //script to acctivate buttons on the student pannel
                document.getElementById("stdnbtn").onclick = function() {
                    location.href = "studentlist.php";
                }
                document.getElementById("bookbtn").onclick = function() {
                    location.href = "bookedRooms.php";
                }
                document.getElementById("mealbtn").onclick = function() {
                    location.href = "bookedmeals.php";
                }
                document.getElementById("updatebtn").onclick = function() {
                    location.href = "update.php";
                }
            </script>
        </div>

    </div>
</section>
<br>
<br>
<br>
<br>

<?php
require_once '../includes/adminfooter.php';
?>