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
            $stmt->bindparam(':fname', $fname);
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
    public function insertFood($food_id, $diet_type, $food, $Day)
    {
        try {
            $sql = "INSERT INTO food_menu (food_id,diet_type,food,Day) VALUES(:food_id,:diet_type,:food,:Day)";
            $stmt = $this->db->prepare($sql);

            $stmt->bindparam(':food_id', $food_id);
            $stmt->bindparam(':diet_type', $diet_type);
            $stmt->bindparam(':food', $food);
            $stmt->bindparam(':Day', $Day);

            //execute statement
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function newfood($reg, $food_id, $date)
    {
        try {
            //check if entry with the same student exhist


            $sql = "INSERT INTO `foodbookings` (`reg`,`food_id`, `date`)VALUES(:reg,:food_id,:date)";
            $stmt = $this->db->prepare($sql);
            //$stmt->bindparam(':food_id', $food_id);
            $stmt->bindparam(':reg', $reg);
            $stmt->bindparam(':date', $date);
            $stmt->bindparam(':food_id', $food_id);
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
    public function editFood($id, $diet_type, $food, $Day)
    {
        try {
            $sql = "UPDATE ` food_menu` SET `id`= :food_id,` diet_type`=:diet_type,`food`=:food,`Day`=:Day WHERE food_id= :id";

            $stmt = $this->db->prepare($sql);
            //bind all placeholders to the actual values
            $stmt->bindparam(':food_id', $id);
            $stmt->bindparam(':diet_type', $diet_type);
            $stmt->bindparam(':food', $food);
            $stmt->bindparam(':Day', $Day);

            //execute statement

            //execute statement 
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getmessage();
            return false;
        }
    }
    public function deleteFood($id)
    {
        try {
            $sql = "delete from Food_menu where food_id=:id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getmessage();
            return false;
        }
    }
    public function countBookings($roomid)
    {
        try {
            //$sql = 'SELECT count (*) as count FROM `bookings` WHERE `roomid` = :roomid';
            $sql = "select count(*) as num from bookings where roomid=:roomid";
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
    public function insertRoom($id, $room_type, $fee, $max_occupants, $status)
    {
        try {
            $sql = "INSERT INTO rooms(id,room_type,fee,max_occupants,status) VALUES(:id,:room_type,:fee,:max_occupants,:status)";
            $stmt = $this->db->prepare($sql);

            $stmt->bindparam(':id', $id);
            $stmt->bindparam(':room_type', $room_type);
            $stmt->bindparam(':fee', $fee);
            $stmt->bindparam(':max_occupants', $max_occupants);
            $stmt->bindparam(':status', $status);
            //execute statement
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
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
    public function editRoom($id, $room_type, $fee, $max_occupants, $status)
    {
        try {
            $sql = "UPDATE ` rooms` SET `id`= :id,`room_type`=:room_type,`fee`=:fee,`max_occupants`=:max_occupants,`status`=:status WHERE room_id= :id";

            $stmt = $this->db->prepare($sql);
            //bind all placeholders to the actual values
            $stmt->bindparam(':id', $id);
            $stmt->bindparam(':room_type', $room_type);
            $stmt->bindparam(':fee', $fee);
            $stmt->bindparam(':max_occupants', $max_occupants);
            $stmt->bindparam(':status', $status);
            //execute statement

            //execute statement 
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getmessage();
            return false;
        }
    }
    public function resetRoom($id)
    {
        try {
            $sql = "UPDATE rooms SET status = 'empty' WHERE id =:id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getmessage();
            return false;
        }
    }
    public function getStudentDetails($id)
    {
        try {
            $sql = "select * from student_details where reg=:id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getmessage();
            return false;
        }
    }
    public function editStudent($id, $reg, $fname, $lname, $email, $idno, $dob, $phone, $county, $contact)
    {
        try {
            $sql = "UPDATE `student_details` SET `reg`= :reg,`fname`=:fname,`lname`=:lname,`email`=:email,`idno`=:idno,`dob`=:dob,`phone`=:phone,`county`=:county,`contact`=:contact, WHERE reg= :id";

            $stmt = $this->db->prepare($sql);
            //bind all placeholders to the actual values
            $stmt->bindparam(':id', $id);
            $stmt->bindparam(':reg', $reg);
            $stmt->bindparam(':fname', $fname);
            $stmt->bindparam(':lname', $lname);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':idno', $idno);
            $stmt->bindparam(':dob', $dob);
            $stmt->bindparam(':phone', $phone);
            $stmt->bindparam(':county', $county);
            $stmt->bindparam(':contact', $contact);
            //execute statement

            //execute statement 
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getmessage();
            return false;
        }
    }
}
