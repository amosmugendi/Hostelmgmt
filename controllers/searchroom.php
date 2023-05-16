<?php
$title = "Search Results";
include_once '../includes/session.php';
include_once '../includes/adminheader.php';
include_once '../db/conn.php';

// check if the form has been submitted
if (isset($_POST['submit'])) {
    $search = $_POST["search"];
    // Get the ID of the current logged-in student
    // $id = $_SESSION['id'];

    // Call the searchStudentFoodDetails function to get the results
    $result = $reports->searchRoomDetails($search);
} else {
    // if the form has not been submitted, redirect to the homepage
    echo 'No food found';
    header("Location: ../admin/viewrooms.php");
    exit();
}
?>

<head>

    <head>
        <link rel="stylesheet" href="../css/view.css">
        <link rel="stylesheet" href="../css/search.css">
    </head>
</head>
<section class="main">
    <?php if ($result) { ?>
        <table>
        <tr>
            <th>Room ID</th>
            <th>Room Type</th>
            <th>Status</th>
            <th>Actions</th>
            <th>
                <button class="primary-button small-button" onclick="window.location.href='../admin/viewrooms.php'">Back</button>
            </th>
        </tr>
        
        <?php foreach ($result as $r) { ?>
            <tr>
                <td> <?php echo $r['id'] ?></td>
                <td> <?php echo $r['room_type'] ?></td>
                <td> <?php echo $r['status'] ?></td>
                <td>
                    <button class="primary-button small-button" onclick="window.location.href='../admin/viewroom.php?id= <?php echo $r['id'] ?>'">view</button>
                    <button class="warning-button small-button" onclick="window.location.href='../admin/editroom.php?id= <?php echo $r['id'] ?>'">Edit</button>
                    <button class="delete-button small-button" name="submit" onclick="return confirm('are you sure you want to reset this room?'); window.location.href='../admin/delete.php?id= <?php echo $r['id'] ?>'">Reset</button>
                    
                </td>
            </tr>
        <?php } ?>
    </table>
    <?php } else { ?>
        <p>No results found.</p>
    <?php } ?>
</section>

