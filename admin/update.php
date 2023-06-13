<?php
$title = "Edit Room";
include_once '../db/conn.php';
include_once '../includes/session.php';
include_once '../includes/adminheader.php';



if ($_SESSION['id']) {
    $id = $_SESSION['id'];
    $results = $reports->getAdmin($id);
?>


    <section class="main">
        <h1 class="text-center">Update Details</h1>
        <form method="post" action="../php-scripts/updateadmin.php" onsubmit="return checkPassword();">
            <input type="hidden" name="id" value="<?php echo $results['id'] ?>" />
            <br>
            <label for="email">Admin Email:</label>
            <input type="email" id="email" name="email" minlength="8" value="<?php echo $results['email'] ?>">
            <br>
            <label for="new_password">New Password:</label>
            <input type="password" id="password" name="password" minlength="8">
            <br>
            <label for="confirm_password">Confirm New Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" minlength="8">
            <button type="submit" name="submit">Update</button>
            <p><a href="admin.php">Cancel</a></p>
        </form>

        <script>
            function checkPassword() {
                const password = document.getElementById('password').value;
                const confirm_password = document.getElementById('confirm_password').value;

                if (password !== confirm_password) {
                    alert('New password and confirm password do not match!');
                    return false; // Prevent form submission
                } else if (password.length < 8) {
                    alert('Password should be at least 8 characters long');
                    return false; // Prevent form submission
                } else if (!/[A-Z]/.test(password) || !/[a-z]/.test(password)) {
                    alert('Password should contain at least one uppercase and one lowercase letter.');
                    return false; // Prevent form submission
                } else if (!/[@_]/.test(password)) {
                    alert("Password should contain either '@' or '_' symbol.");
                    return false; // Prevent form submission
                }

                return true; // Allow form submission
            }
        </script>

        <style>
            form {
                max-width: 500px;
                margin: 0 auto;
                padding: 20px;
                background-color: #f2f2f2;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            }

            label {
                display: block;
                margin-bottom: 5px;
                font-weight: bold;
            }

            input[type="password"] {
                width: 100%;
                padding: 10px;
                border: none;
                border-radius: 5px;
                margin-bottom: 10px;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            }

            input[type="email"] {
                width: 100%;
                padding: 10px;
                border: none;
                border-radius: 5px;
                margin-bottom: 10px;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            }

            button[type="submit"] {
                background-color: #4CAF50;
                color: white;
                border: none;
                border-radius: 5px;
                padding: 10px;
                font-size: 16px;
                cursor: pointer;
            }

            button[type="submit"]:hover {
                background-color: blue;
            }
        </style>


    <?php  } ?>
    </section>
    <?php
    include_once '../includes/adminfooter.php';
    ?>