<?php
//ask for email
// and new password other than password

// if successfull 
// redirect to logi
// session_start();
// if(isset($_SESSION['id']) && isset($_SESSION['email'])){
echo ("You are here MF");
// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get input values
  $new_password = $_POST['np'];
  $cnp = $_POST['cnp'];
  $np= md5($new_password . $email);

  // Check if fields are not empty
  if (empty($np) || empty($cnp)) {
    $error = 'Please fill in both fields.';
  }
  // Check if passwords match
  else if ($np !== $confirm_password) {
    $error = 'Passwords do not match.';
  }
  else {
    // Passwords are valid, continue with password change logic
    // ...
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<title> Change Password</title>
<link rel="stylesheet" type="" href="">

</head>

<body>
    <form method="post" action="changeP.php">
        <h2>Chage Password</h2>
        <?php if (isset($error)) { ?>
            <p class="error"><?php echo '$error' ?></p>
        <?php } ?>
        <label>Old Password</label>
        <input type="password" name="op" placeholder="Old Password"><br>
        <label>New Password</label>
        <input type="password" name="np" placeholder="new password"><br>
        <label>Confirm Password</label>
        <input type="password" name="cp" placeholder="confirm password"><br>
        <button type="submit">CHANGE</button>
        <a href="index.php" class="cnp">HOME</a>
    </form>
</body>

</html>
<?php
// // }else{
//     header("Location: index.php");
//     exit();
// } 
?>