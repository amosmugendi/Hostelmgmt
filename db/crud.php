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
    public function insertStudent($reg, $userid, $fname, $lname, $email, $idno, $dob, $phone, $county, $contact)
    {
        try {
            $sql = "INSERT INTO student_details(reg,userid,fname,lname,email,idno,dob,phone,county,contact) VALUES(:reg,:userid,:fname,:lname,:email,:idno,:dob,:phone,:county,:contact)";
            $stmt = $this->db->prepare($sql);

            $stmt->bindparam(':reg', $reg);
            $stmt->bindparam(':userid', $userid);
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
    public function newBooking($reg, $hostel, $roomid, $current_date, $roomstatus)
    {
        try {
            //check if entry with the same student exhist


            $sql = "INSERT INTO `bookings` (`roomid`, `hostel`,`studentregno`, `date`)VALUES(:roomid,:hostel,:reg,:current_date)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':reg', $reg);
            $stmt->bindparam(':hostel', $hostel);
            $stmt->bindparam(':roomid', $roomid);
            $stmt->bindparam(':current_date', $current_date);
            //$stmt->bindparam(':status',$roomstatus);
            // execute insert statement
            if ($stmt->execute()) {
                // if insert successful, update the room status
                $sql = "UPDATE `rooms` SET `status` = :status  WHERE `id` = :roomid";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':roomid', $roomid);
                $stmt->bindparam(':status', $roomstatus);
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
    public function insertFood($id, $diet_type, $food, $Day)
    {
        try {
            $sql = "INSERT INTO food_menu (food_id,diet_type,food,Day) VALUES(:food_id,:diet_type,:food,:Day)";
            $stmt = $this->db->prepare($sql);

            $stmt->bindparam(':food_id', $id);
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
    public function newfoodbooking($reg, $food_id, $date)
    {
        try {
            //check if entry with the same student exhist


            $sql = "INSERT INTO foodbookings (food_id,reg, date) VALUES(:food_id,:reg,:date)";
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
    public function insertPayment($userid, $fee, $amount_paid, $upload_slip, $balance, $status, $date)
    {
        try {
            $sql = "INSERT INTO `payment` (userid, fee, amount_paid, slip, balance, status, date) VALUES (:userid,:fee, :amount_paid, :upload_slip, :balance, :status, :date)";
            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(':userid', $userid);
            $stmt->bindParam(':fee', $fee);
            $stmt->bindParam(':amount_paid', $amount_paid);
            $stmt->bindParam(':upload_slip', $upload_slip);
            $stmt->bindParam(':balance', $balance);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':date', $date);

            // Execute the statement
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function editFood($food_id, $diet_type, $food, $Day)
    {
        try {
            $sql = "UPDATE `food_menu` SET `food_id`= :food_id, `diet_type`=:diet_type, `food`=:food,`Day`=:date WHERE food_id= :food_id";

            $stmt = $this->db->prepare($sql);
            //bind all placeholders to the actual values
            // $stmt->bindparam(':id', $id);
            $stmt->bindparam(':food_id', $food_id);
            $stmt->bindparam(':diet_type', $diet_type);
            $stmt->bindparam(':food', $food);
            $stmt->bindparam(':date', $Day);

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
            $sql = "DELETE FROM `food_menu` where food_id=:food_id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':food_id', $id);
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
            $sql = "UPDATE `rooms` SET `id`= :id,`room_type`=:room_type,`fee`=:fee,`max_occupants`=:max_occupants,`status`=:status WHERE id= :id";

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
            $sql = "UPDATE `rooms` SET `status` = 'Empty' WHERE id =:id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getmessage();
            return false;
        }
    }
    // Inside your CRUD class
    public function checkout($id)
    {
        try {
            // Get the current date and time
            $checkoutDate = date('Y-m-d H:i:s');

            // Update the bookings table with the checkout date
            $sql = "UPDATE bookings SET checkout = :checkoutDate WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':checkoutDate', $checkoutDate);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function Disable($id)
{
    try {
    
        // Update the users table to chage status to inactive
        $sql = "UPDATE `users` SET `status` = 'Inactive' WHERE id =:id";
        // $sql = "UPDATE users SET status = :status WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        // $stmt->bindParam(':status', $Status);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

    public function Enable($id)
    {
        try {
            // set status Active

            // Update the bookings table with the checkout date
            $sql = "UPDATE `users` SET `status` = 'Active' WHERE id =:id";
            $stmt = $this->db->prepare($sql);
            // $stmt->bindParam(':status', $Status);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public function getStudentDetails($id)
    {
        try {
            $sql = "select * from student_details where userid=:id";
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
            $sql = "UPDATE `student_details` SET `reg`=:reg, `fname`=:fname, `lname`=:lname, `email`=:email, `idno`=:idno, `dob`=:dob, `phone`=:phone, `county`=:county, `contact`=:contact WHERE userid=:id";

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
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
