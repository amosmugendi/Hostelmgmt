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
    public function getRooms(){try{
        $sql = "SELECT * FROM `rooms` ";
        $result=$this->db->query($sql);
        return $result;
        }catch(PDOException $e){
            echo $e->getmessage();
            return false;
        }
        
     }
     public function getRoomDetails($id)
     {try{ $sql="select * from rooms where id=:id";
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
     public function getStudent()
     {try{
        $sql = "SELECT * FROM `student_details`";
        $result=$this->db->query($sql);
        return $result;
        }catch(PDOException $e){
            echo $e->getmessage();
            return false;
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
