<?php 
 echo 'you made it this far champ';
include_once 'db/conn.php';
// session_start();
// if(isset($_SESSION['id']) && isset($_SESSION['email'])){
// echo ("You are here MF");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $op = $_POST['op'];
    $np= $_POST['np'];
    //$cnp = $_POST['cnp'];
    
            //check if the fields are empty 
            if(empty($op) || empty($cnp))
            {
                $error = 'Please fill all the fields.';
        // check if the password match
            }else if(empty($np !== $cnp)){
                $error='Passwords do not match!';
            }else{
                //hashing the password
                $op= md5($op);
                $np= md5($np. $email);
                $id= $_SESSION['id'];
               
                if(mysqli_num_rows($result)===1){
                    echo "correct";
                }else{
                    header("Location: chage-password.php?error=Incorrect password");
                    exit();
                }
            }


    }else{
        echo 'requirements not met';
        exit();
    } 
// } 
?>