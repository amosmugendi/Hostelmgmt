<?php
include_once '../db/conn.php';
if (isset($_POST['diet_type'])) {
    $diet_type = $_POST['diet_type'];
    $host = 'localhost';
    $db = 'hostel';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';
    $connection = mysqli_connect($host, $user, $pass, $db);

    $query = "SELECT * FROM food_menu WHERE diet_type = '$diet_type' ";
    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $food_menu[] = $row;
    }

    // Return the room data as a JSON encoded array
    echo json_encode($food_menu);
    //This code retrieves the room data from the database and stores it in an array. Then, it uses the json_encode function to encode the array as a JSON string and returns it to the Ajax success function. The JSON.parse function in the success function converts the JSON string back into a JavaScript array. You can then use this array to display the rooms in a select element using a PHP foreach loop.

}
