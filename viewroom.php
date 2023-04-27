<?php
$title = "View Rooms";
//include_once 'db/conn.php';
include_once 'includes/session.php';
include_once 'includes/session.php';

if (!isset($_GET['id'])) {
    echo "<h1 class='text-danger'>Please check details and try again</h1>";
} else {
    $id = $_GET['id'];
    $result = $reports->getRoomDetails($id);;

?>

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
            <a href="viewrooms.php?id= <?php echo $result['id'] ?>" class="primary-button">Back to List</a>
            <a href="editroom.php?id= <?php echo $result['id'] ?>" class="warning-button">Edit</a>
            <a onclick="return confirm('are you sure you want to delete this record?');" href="delete.php?id= <?php echo $r['id'] ?>" class="delete-button">Delete</a>
        </td>
    <?php } ?>

    </section>
    <?php
    include_once 'includes/adminfooter.php';
    ?>