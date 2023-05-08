<?php
include_once './includes/session.php';
include_once 'db/conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // $email = strtolower(trim($_POST['email']));
  $password = $_POST['password'];
  $userId = $_SESSION['id'];
  $userEmail = $_SESSION["email"];

  $result = $users->updatePassword($userId, $userEmail, $password);
  //get backend response
  if (!$result) {
    echo '<div>Email or password is incorrect! please try again.</div>';
  } else {
    // $_SESSION['email'] = $email;
    echo "<script>alert('Password updated successfully.');</script>";
    header("Location: student/student.php");
    
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<title> Change Password</title>
<link rel="stylesheet" type="" href="">

</head>

<body>
  <br>
  <br>
  <br>
  <br>
  <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" onclick="return checkPassword();" method="post">
    <label for="new_password">New Password:</label>
    <input type="password" id="password" name="password" minlength="8" required>

    <label for="confirm_password">Confirm New Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" minlength="8" required>

    <button type="submit" name="submit">Change Password</button>
  </form>
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


  <script>
    const form = document.querySelector('form');
    const password = document.getElementById('password').value;
    const confirm_password = document.getElementById('confirm_password').value;


    form.addEventListener('submit', (event) => {
      if (password !== confirm_password) {
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