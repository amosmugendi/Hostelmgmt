<?php
//this includes the session file. this file contains code that starts/resumes a session.
//by having it in the header file. it will be included on every page, allowing session capability to be used on every page across the website.
//include_once 'includes/session.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/ex.css">
    <script src="https://kit.fontawesome.com/8836deeb78.js" crossorigin="anonymous"></script>
    <script src="../js/script.js"></script>
    <title>Home Page <?php $title ?></title>
</head>
<body>
    <header>
        <div class="logo-menu">
            <h2>HMS </h2>
        </div>
        <nav class="navigation">
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#">Contact</a>
            <button class="btnLogin-popup">Login</button>

        </nav>

    </header>