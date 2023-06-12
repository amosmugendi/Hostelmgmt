<?php 
    require_once('../db/conn.php');
    require_once('../includes/session.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
         // Call the checkout method
    $result = $crud->Enable($id);
    
        // Redirect
        if ($result) {
            header("Location: ../admin/studentlist.php");
        } else {
            echo 'Operation Failed';
        }
    }
?>