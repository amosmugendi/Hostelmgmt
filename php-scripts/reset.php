<?php 
    require_once('../db/conn.php');
    require_once('../includes/session.php');
    require_once '../includes/session.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        // Call the reset function
        $result = $crud->resetRoom($id);
    
        // Redirect
        if ($result) {
            header("Location:../admin/viewrooms.php");
        } else {
            echo 'Operation Failed';
        }
    }
    
    
?>