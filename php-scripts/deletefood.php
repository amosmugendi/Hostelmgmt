<?php
    require_once '../db/conn.php';
    require_once '../includes/session.php';

    if (isset($_GET['food_id'])) {
        // Get id value
        $id = $_GET['food_id'];
        
        // Call the deleteFood method
        $result = $crud->deleteFood($id);
    
        // Redirect
        if ($result) {
            header("Location: ../admin/viewFoods.php");
        } else {
            echo 'Deletion Failed';
        }
    }
?>
