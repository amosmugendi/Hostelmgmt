<?php
include_once '../includes/session.php';
include_once '../db/conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // $email = strtolower(trim($_POST['email']));
  $password = $_POST['password'];
  $userId = $_SESSION['id'];
  $userEmail = $_SESSION["email"];

  $result = $users->updateAdmin($userId, $userEmail, $password);
  //get backend response
  if (!$result) {
    echo '<div>.</div>';
  } else {
    // $_SESSION['email'] = $email;
    session_start();
    $_SESSION['success_message'] = "Admin updated successfully.";
    header("Location: ../admin/admin.php");
    exit();
}

}
?>
