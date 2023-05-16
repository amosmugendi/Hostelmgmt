<?php
class reports
{
    //private database object
    private $db;
    function __construct($conn)
    {
        $this->db = $conn;
    }
    public function activeBookings()
    {
        try {
            $query = "SELECT * FROM bookings";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(); // fetch all rows
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function activeFoodBookings()
    {
        try {
            $query = "SELECT * FROM foodbookings";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(); // fetch all rows
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getStudentfoodDetails($id)
    {
        try {
            $sql = "SELECT * FROM food_menu JOIN foodbookings ON food_menu.food_id = foodbookings.food_id WHERE foodbookings.reg = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id); 
            $stmt->execute();
            $result = $stmt->fetchAll(); // fetch all rows
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getRooms()
    {
        try {
            $sql = "SELECT * FROM `rooms` ";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getmessage();
            return false;
        }
    }
    public function getRoomDetails($id)
    {
        try {
            $sql = "select * from rooms where id=:id";
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
    public function getStudentRoomDetails($id)
    {
        try {
            $sql = "SELECT * FROM rooms JOIN bookings ON rooms.id = bookings.roomid WHERE bookings.studentregno = :id"; 
            // $sql = "select * from rooms where id=:id";
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
    public function getfoods()
    {
        try {
            $sql = "SELECT * FROM `food_menu` ";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getmessage();
            return false;
        }
    }
    public function getFoodDetails($id)
    {
        try {
            $sql = "select * from food_menu where food_id=:id";
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

    public function getStudent()
    {
        try {
            $sql = "SELECT * FROM `student_details`";
            $result = $this->db->query($sql);
            return $result;
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
    public function getProfileDetails($id)
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
    public function searchFoodDetails ($search) {
        try {
            $sql = "SELECT * FROM food_menu WHERE food_id = :search";
            $stmt = $this->db->prepare($sql);
            // $stmt->bindparam(':id', $id);
            $stmt->bindparam(':search', $search);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function searchRoomDetails ($search) {
        try {
            $sql = "SELECT * FROM rooms WHERE id = :search";
            $stmt = $this->db->prepare($sql);
            // $stmt->bindparam(':id', $id);
            $stmt->bindparam(':search', $search);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function searchStudentDetails ($search) {
        try {
            $sql = "SELECT * FROM student_details WHERE reg = :search";
            $stmt = $this->db->prepare($sql);
            // $stmt->bindparam(':id', $id);
            $stmt->bindparam(':search', $search);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
}
