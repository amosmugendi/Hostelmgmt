<?php
include_once '../db/conn.php';
include_once '../includes/session.php';
include_once '../includes/studentheader.php';
?>
    <head>
    <link rel="stylesheet" href="../registration.css">
    </head>
    <section class="main">
        <h1 class="text-center">Student Resigistration Form </h1>
   <div class="container">
    <div class="title"></div>
    <form method="post" action="register.php">
        <div class="user-details">
            <div class="input-box">
                <span class="details">Registration Number</span>
                <input type="text" id="regno" name="regno"required>
            </div>
            <div class="input-box">
                <span class="details">First Name</span>
                <input type="text"  id="fname" name="fname" required>
            </div>
            <div class="input-box">
                <span class="details">Last Name</span>
                <input type="text" id="lname" name="lname" required>
            </div>
           
            <div class="input-box">
                <span class="details">Email</span>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-box">
                <span class="details">ID/Passport </span>
                <input type="text"  id="idno" name="idno" required>
            </div>
            <div class="input-box">
                <span class="details">date of birth</span>
                <input type="date" id="dob" name="dob" required>
            </div>
            <div class="input-box">
                <span class="details">Phone Number</span>
                <input type="text"  id="phone" name="phone" required>
            </div>
            <div class="input-box">
                <span class="details">Home County</span>
                <input type="text"  id="county" name="county" required>
            </div>
            <div class="input-box">
                <span class="details">Emergency Contact</span>
                <input type="text" id="contact" name="contact" required>
            </div>
        </div>
        <div class="button">
            <input type="submit" value="Submit" class="submit">
        </div>
        <div class="login-register">
                    <p><a href="student.php" > Cancel</a></p>
                </div>
    </form>
   </div>
   </section>

     
  