<?php 
        $title="Sucess";
        require_once 'db/conn.php';

        if(isset($_POST['submit'])){
            //extract values from the $_POST array
            $email=$_POST['email'];
            $password=$_POST['password'] ;

            //CALL FUNCTION to insert and track if success or not
            $isSuccess= $users->insertUser($email,$password);

            if($isSuccess){
              echo 'Registration Was Successful please head to login page';
                header('Location:index.php');
            
            }
            else{
              echo 'Registration failed please try again';
            }
        }


    ?>