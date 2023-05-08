<?php

include_once '../db/conn.php';
include_once '../includes/session.php';
include_once '../includes/studentheader.php';

//check if user uses the default password:
$userid = $_SESSION['id'];
$usr = $users->getNewUser($userid);
if (!$usr) {
    echo ("You are not logged in!!!");
} else {
    $defaultPass = "password";
    $mdPassword = md5($defaultPass . $_SESSION['email']);
    ///change password
    if ($usr['password'] == $mdPassword) {
        echo("You are here MF");
        header("Location: ../changepass.php");
    }
}


?>
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
            <button id="profbtn">View Profile</button>
        </div>
        <div class="card">
            <i class="fas fa-bed"></i>
            <h3>Book Room</h3>
            <p></p>
            <button id="bookbtn">Book</button>
        </div>
        <div class="card">
            <i class="fas fa-utensils"></i>
            <h3>Food Menu</h3>
            <p>Categories of foods provided</p>
            <button id="foodbtn">Book</button>
        </div>
        <div class="card">
            <i class="fas fa-pen-square"></i>
            <h3></h3>
            <p>Make sure your personal details are up-to-date</p>
            <button id="updatebtn">Update</button>
        </div>

        <script>
            //script to acctivate buttons on the student pannel 
            document.getElementById("bookbtn").onclick = function() {
                location.href = "bookroom.php";
            }
            document.getElementById("profbtn").onclick = function() {
                location.href = "profile.php";
            }
            document.getElementById("foodbtn").onclick = function() {
                location.href = "foodmenu.php";
            }
            document.getElementById("updatebtn").onclick = function() {
                location.href = "editprofile.php";
            }
        </script>

    </div>
</section>