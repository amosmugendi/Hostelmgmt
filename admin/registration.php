<?php
include_once '../db/conn.php';
include_once '../includes/session.php';
include_once '../includes/adminheader.php';
?>

<head>
    <link rel="stylesheet" href="../registration.css">
    <script src="../js/registration.js"></script>
    <style>
        .error-message {
            color: red;
            font-size: 12px;
        }
    </style>
</head>
<section class="main">
    <h1 class="text-center">Student Resigistration Form </h1>
    <div class="container">
        <div class="title"></div>
        <form method="post" action="../php-scripts/register.php" autocomplete="off" novalidate>
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Registration Number</span>
                    <input type="text" id="regno" name="regno" required maxlength="7">
                    <div class="error-message" id="regno-error"></div>
                </div>
                <div class="input-box">
                    <span class="details">First Name</span>
                    <input type="text" id="fname" name="fname" required>
                    <div class="error-message" id="fname-error"></div>
                </div>
                <div class="input-box">
                    <span class="details">Last Name</span>
                    <input type="text" id="lname" name="lname" required>
                    <div class="error-message" id="lname-error"></div>
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="email" id="email" name="email" required>
                    <div class="error-message" id="email-error"></div>
                </div>
                <div class="input-box">
                    <span class="details">ID/Passport</span>
                    <input type="text" id="idno" name="idno" required maxlength="9">
                    <div class="error-message" id="idno-error"></div>
                </div>
                <div class="input-box">
                    <span class="details">Date of Birth</span>
                    <input type="date" id="dob" name="dob" required>
                    <div class="error-message" id="dob-error"></div>
                </div>
                <div class="input-box">
                    <span class="details">Phone Number</span>
                    <input type="text" id="phone" name="phone" required maxlength="11">
                    <div class="error-message" id="phone-error"></div>
                </div>
                <div class="input-box">
                    <span class="details">Home County</span>
                    <input type="text" id="county" name="county" required>
                    <div class="error-message" id="county-error"></div>
                </div>
                <div class="input-box">
                    <span class="details">Emergency Contact</span>
                    <input type="text" id="contact" name="contact" required maxlength="11">
                    <div class="error-message" id="contact-error"></div>
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Submit" class="submit" onclick="validateForm(event)">
            </div>
            <div class="login-register">
                <p><a href="admin.php">Cancel</a></p>
            </div>
        </form>
        <script src="../js/registration.js"></script>
    </div>
</section>