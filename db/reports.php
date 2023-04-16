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
}
