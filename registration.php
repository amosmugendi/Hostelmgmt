<?php
include_once 'db/conn.php';
include_once 'includes/session.php';
?>
    <head>
    <link rel="stylesheet" href="css/style.css">
    </head>
    <section>
   <div class="container">
    <div class="title">Student Resigistration Form</div>
    <form method="post" action="register.php">
        <div class="user-details">
            <div class="input-box">
                <span class="details">Registration Number</span>
                <input type="text" placeholder="enter registration number" id="regno" name="regno"required>
            </div>
            <div class="input-box">
                <span class="details">First Name</span>
                <input type="text" placeholder="enter first name" id="fname" name="fname" required>
            </div>
            <div class="input-box">
                <span class="details">Last Name</span>
                <input type="text" placeholder="enter your last name" id="lname" name="lname" required>
            </div>
           
            <div class="input-box">
                <span class="details">Email</span>
                <input type="email" placeholder="enter your email" id="email" name="email" required>
            </div>
            <div class="input-box">
                <span class="details">ID/Passport </span>
                <input type="text" placeholder="Enter your ID/Passport" id="id" name="passport" required>
            </div>
            <div class="input-box">
                <span class="details">date of birth</span>
                <input type="date" id="dob" name="dob" required>
            </div>
            <div class="input-box">
                <span class="details">Phone Number</span>
                <input type="text" placeholder="enter your phone number" id="phone" name="number" required>
            </div>
            <div class="input-box">
                <span class="details">Home County</span>
                <input type="text" placeholder="enter your county" id="county" name="county" required>
            </div>
            <div class="input-box">
                <span class="details">Emergency Contact</span>
                <input type="text" placeholder="emergency contact" id="contact" name="contact" required>
            </div>
        </div>
        <div class="gender-details">
            <input type="radio" name="Gender" id="dot-1">
            <input type="radio" name="Gender" id="dot-2">
            <span class="gender-title">Gender</span>
            <div class="category">
                <label for="dot-1">
                    <span class="dot one"></span>
                    <span class="gender">Male</span>
                </label>
                <label for="dot-2">
                    <span class="dot two"></span>
                    <span class="gender">Female</span>
                </label>
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

     
  