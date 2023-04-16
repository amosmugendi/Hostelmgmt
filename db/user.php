<?php 
    class users{
        private $db;
         //constructor to initialize variable to the database connection
         function __construct($conn){
             $this->db=$conn;
         }
         public function insertUser($email,$password){
                try{
                    $result= $this->getUserbyemail($email);
                    if($result['num']>0){
                        return false;
                    }else{
                        $new_password= md5($password.$email);
                    //define sql statement to be exected 
                        $sql="INSERT INTO users (email,password)VALUES (:email,:password)";
                        //prepare the sql statement for execution
                        $stmt=$this->db->prepare($sql);
                        //bind all placeholders to the actual values
                        $stmt->bindparam(':email',$email);
                        $stmt->bindparam(':password',$new_password);
            
                        //execute statement 
                        $stmt-> execute();
                        return true;
                    }    
                }catch(PDOException $e){
                    echo $e->getmessage();
                    return false;
        
                }
         }
         public function getUser($email,$password){

            {try{ $sql="SELECT `id`,`email`, `password` FROM `users` WHERE email=:email AND :password";
                $stmt= $this->db->prepare($sql);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':password',$password);
                $stmt->execute();
                $result= $stmt->fetch();
                return $result;
                }catch(PDOException $e){
                        echo $e->getmessage();
                        return false;
                    }
               
             }
         }
         public function getUserbyemail($email){
            {try{ $sql="select count(*) as num from users where email=:email";
                $stmt= $this->db->prepare($sql);
                $stmt->bindparam(':email',$email);
                
                $stmt->execute();
                $result= $stmt->fetch();
                return $result;
                }catch(PDOException $e){
                        echo $e->getmessage();
                        return false;
                    }
               
             }
         }
    }
?>