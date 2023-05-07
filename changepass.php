<?php
include_once './includes/session.php';
//ask for email
// and new password other than password

// if successfull 
// redirect to login
// session_start();
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
    <input type="password" name="oldp" placeholder="Old Password"><br>
    <label>New Password</label>
    <input type="password" name="newp" placeholder="new password"><br>
    <label>Confirm Password</label>
    <input type="password" name="confirmp" placeholder="confirm password"><br>
    <button type="submit">CHANGE</button>
    <a href="index.php" >HOME</a>
</form>

<script>
  const form = document.querySelector('form');
  const newPasswordInput = form.querySelector('input[name="newp"]');
  const confirmPasswordInput = form.querySelector('input[name="confirmp"]');

  form.addEventListener('submit', (event) => {
    if (newPasswordInput.value !== confirmPasswordInput.value) {
      event.preventDefault();
      alert('New password and confirm password do not match!');
    }
  });
</script>

</body>

</html>
<?php
// // }else{
//     header("Location: index.php");
//     exit();
// } 
?>