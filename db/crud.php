<?php
class crud
{
    //private database object
    private $db;
    //constructor to initialize a variable to the database connection
    function __construct($conn)
    {
        $this->db = $conn;
    }
    public function insertStudent($reg, $fname, $lname, $email, $idno, $dob, $phone, $county, $contact)
    {
        try {
            $sql = "INSERT INTO student_details(reg,fname,lname,email,idno,dob,phone,county,contact) VALUES(:reg,:fname,:lname,:email,:idno,:dob,:phone,:county,:contact)";
            $stmt = $this->db->prepare($sql);

            $stmt->bindparam(':reg', $reg);
            $stmt->bindparam(':fname', $lname);
            $stmt->bindparam(':lname', $lname);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':idno', $idno);
            $stmt->bindparam(':dob', $dob);
            $stmt->bindparam(':phone', $phone);
            $stmt->bindparam(':county', $county);
            $stmt->bindparam(':contact', $contact);

            //execute statement
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function newBooking($reg, $roomid, $current_date, $roomstatus)
    {
        try {
            //check if entry with the same student exhist
            

            $sql = "INSERT INTO `bookings` (`roomid`, `studentregno`, `date`)VALUES(:roomid,:reg,:current_date)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':reg', $reg);
            $stmt->bindparam(':roomid', $roomid);
            $stmt->bindparam(':current_date', $current_date);
            //$stmt->bindparam(':status',$roomstatus);
            // execute insert statement
            if ($stmt->execute()) {
                // if insert successful, update the room status
                $sql = "UPDATE `rooms` SET `status` = 'full' WHERE `id` = :roomid";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':roomid', $roomid);
                $stmt->execute();
                return true;
            }
            // //execute statement
            // $stmt-> execute();
            // return true;

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function newfood($reg, $food_id,$date)
    {
        try {
            //check if entry with the same student exhist
            

            $sql = "INSERT INTO `foodbookings` (`food_id`,`reg`, `date`)VALUES(:food_id,:reg,:date)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':reg', $reg);
            $stmt->bindparam(':food_id', $food_id);
            $stmt->bindparam(':date', $date);
            //$stmt->bindparam(':food', $food);
            //$stmt->bindparam(':status',$roomstatus);
            // execute insert statement
                $stmt->execute();
                return true;
            // //execute statement
            // $stmt-> execute();
            // return true;

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function countBookings($roomid)
    {
        try {
            //$sql = 'SELECT count (*) as count FROM `bookings` WHERE `roomid` = :roomid';
            $sql="select count(*) as num from bookings where roomid=:roomid";
            $stmt = $this->db->prepare($sql);           
            $stmt->bindparam(':roomid', $roomid);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getmessage();
            return false;
        }
    }
    public function getRooms()
    { {
            try {
                $sql = "SELECT * FROM `rooms`";
                $stmt = $this->db->prepare($sql);
                // $stmt->bindparam(':email',$email);
                // $stmt->bindparam(':password',$password);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e->getmessage();
                return false;
            }
        }
    }
    public function getStudentDetails($id)
    {try{ $sql="select * from student_details where reg=:id";
       $stmt= $this->db->prepare($sql);     
       $stmt->bindparam(':id',$id);
       $stmt->execute();
       $result= $stmt->fetch();
       return $result;
       }catch(PDOException $e){
               echo $e->getmessage();
               return false;
           }
      
    }
}
