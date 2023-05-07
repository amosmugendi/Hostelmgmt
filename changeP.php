<?php
include_once './db/conn.php';
include_once './includes/session.php';
echo 'you just landed mf';


?>

<head>
  <Title>Password Validation</Title>
</head>
<?php 
//session_start();
//collecting data from the log in form
if (isset($_SESSION['id'])) {
$oldp=$_POST['oldp'];
$newp=$_POST['newp'];
$confirmp=$_POST['confirmp'];
$status="okay";
$msg="";

$result = $users->checkPassword($id);
if($result<>md5($oldp.$email)){
  $status="NOTOK";
  $msg .="Old password entered is incorrect<br>";
  }
  if(strlen($newp)<3 or strlen($newp)>8){
    $status="NOTOK";
    $msg .="password must be more than 3 and less than 8";
    }
    if($newp<>$confirmp){
      $status="NOTOK";
      $msg .="New Password does not match confirm password<br>";
      }
      if($status<>"OK"){
        echo"<font color=red> $msg </font>";
        }else{
        echo "Validation is Okay";
        }
        }
?>