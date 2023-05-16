<?php
$title = "View Rooms";
//include_once 'db/conn.php';
include_once '../includes/session.php';
include_once '../includes/adminheader.php';

if (!isset($_GET['id'])) {
    echo "<h1 class='text-danger'>Please check details and try again</h1>";
} else {
    $id = $_GET['id'];
    $result = $reports->getRoomDetails($id);

?>
<head>
<link rel="stylesheet" href="../css/view.css">
</head>

    <section class="main">
        <!-- create a container to hold the room details-->
        <div class="card" style="width: 18rem">
            <div class="card-body">
                <h5 class="card-title">
                    Room Details
                </h5>
                <p class="Card-text">
                    RoomID: <?php echo $result['id']; ?>
                </p>
                <p class="Card-text">
                    Room Type: <?php echo $result['room_type']; ?>
                </p>
                <p class="card-text">
                    Fees per Sem: <?php echo $result['fee']; ?>
                </p>
                <p class="card-text">
                    Maximum Occupants: <?php echo $result['max_occupants']; ?>
                </p>
                <p class="card-text">
                    Room Status: <?php echo $result['status']; ?>
                </p>

            </div>

        </div>
        <br>
        <td>
            <button type="button" class="primary-button small-button" onclick="window.location.href='viewrooms.php?id= <?php echo $result['id']?>'">Back to List</button>
            <button class="warning-button small-button" onclick="window.location.href='editroom.php?id= <?php echo $result['id'] ?>'">Edit</button>
            <button class="delete-button small-button" name="submit" onclick="return confirm('are you sure you want to reset this room?'); window.location.href='delete.php?id= <?php echo $result['id'] ?>'">Reset</button>
        </td>
    <?php } ?>

    </section>
    <?php
    include_once '../includes/adminfooter.php';
    ?>