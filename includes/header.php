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
    <style>
        nav1 ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        nav1 li {
            display: inline-block;
            margin: 0 10px;
            position: relative;
        }

        nav1 li.dropdown:hover .dropdown-menu {
            display: block;
        }

        nav1 .dropdown-menu {
            background-color: #fff;
            border: 1px solid #ccc;
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1;
        }

        nav1 .dropdown-menu li {
            display: block;
            margin: 0;
            padding: 0;
        }

        nav1 .dropdown-menu li a {
            color: #333;
            display: block;
            padding: 10px;
            text-decoration: none;
        }

        nav1 .dropdown-menu li a:hover {
            background-color: #f4f4f4;
        }
    </style>
</head>

<body>
    <header>
        <div class="logo-menu">
            <h2>HMS
                <nav1>
                    <ul>
                        <li><a href="#"></a></li>
                        <ul class="dropdown-menu">
                            li><a href="#">Student Login</a></li>
                            <li><a href="#">Admin Login</a></li>
                        </ul>
                        </li>
                    </ul>
                </nav1>
            </h2>
        </div>
        <nav class="navigation">
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#">Contact</a>
            <button class="btnLogin-popup">Login</button>

        </nav>

    </header>