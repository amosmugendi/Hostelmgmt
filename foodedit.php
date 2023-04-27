<?php 
    require_once('db/conn.php');
    //get values from post operation
    if(isset($_POST['submit'])){
        //extract values from the $_POST array
        $id=$_POST['id'];
        $diet_type=$_POST['diet_type'];
        $food=$_POST['food'];
        $Day=$_POST['date'];
        //$food_id=$_POST['food_id'];
    
    //call Crud function
    $result=$crud->editFood($id, $diet_type, $food, $Day);
    //Redirect to viewrecords.php
    if($result){
        header("Location: viewrooms.php");
    }
}
else{
    echo 'error';
}

?>