<?php
class users
{
    private $db;
    //constructor to initialize variable to the database connection
    function __construct($conn)
    {
        $this->db = $conn;
    }
    public function insertUser($email, $password,$Status)
    {
        try {

            $result = $this->getUserbyemail($email);
            if ($result['num'] > 0) {
                return false;
            } else {
                $new_password = md5($password . $email);
                //define sql statement to be exected 
                $sql = "INSERT INTO users (email,password,status)VALUES (:email,:password,:status)";
                //prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);
                //bind all placeholders to the actual values
                $stmt->bindparam(':email', $email);
                $stmt->bindparam(':password', $new_password);
                $stmt->bindparam(':status', $Status);
                //execute statement 
                $stmt->execute();
                return $stmt;
            }
        } catch (PDOException $e) {
            echo $e->getmessage();
            return false;
        }
    }
    public function getUser($email, $password)
    { {
            try {
                $sql = "SELECT `id`,`role`,`email`, `password`, `status` FROM `users` WHERE email=:email AND password=:password";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':email', $email);
                $stmt->bindparam(':password', $password);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e->getmessage();
                return false;
            }
        }
    }
    public function getNewUser($id)
    {
        try {
            $sql = "SELECT * FROM `users` WHERE email=:sessionId";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':sessionId', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getmessage();
            return false;
        }
    }
    public function getUserbyemail($email)
    {
        try {
            $sql = "select count(*) as num from users where email=:email";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':email', $email);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getmessage();
            return false;
        }
    }    
    public function updatePassword($id, $email, $newp)
    {
        try {
            $new_password = md5($newp . $email);
            $sql = "UPDATE users SET `password` = :newp WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':newp', $new_password);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function checkPassword($id)
    {
        try {
            $sql = "SELECT `password` FROM users WHERE id=:id";
            $stmt = $this->db->prepare($sql);
            // $stmt->bindparam(':password', $oldp);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
