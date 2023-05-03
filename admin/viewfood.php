<?php
$title = "View Rooms";
include_once '../db/conn.php';
include_once '../includes/session.php';
include_once '../includes/adminheader.php';

if (!isset($_GET['id'])) {
    echo "<h1 class='text-danger'>Please check details and try again</h1>";
} else {
    $id = $_GET['id'];
    $result = $reports->getFoodDetails($id);;

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
                            Food ID: <?php echo $result['food_id']; ?>
                        </p>
                        <p class="Card-text">
                            Room Type: <?php echo $result['diet_type']; ?>
                        </p>
                        <p class="card-text">
                            food: <?php echo $result['food']; ?>
                        </p>
                        <p class="card-text">
                            Day: <?php echo $result['Day']; ?>
                        </p>

                    </div>

                </div>
                <br>
                <td>
                <button type="button" class="primary-button small-button" onclick="window.location.href='viewfoods.php?id= <?php echo $result['food_id'] ?>'">Back to List</button>
                    <button type="button" class="warning-button small-button" onclick="window.location.href='editfood.php?id= <?php echo $result['food_id'] ?>'">Edit</button>
                    <button type="button" class="delete-button small-button" onclick="return confirm('are you sure you want to delete this meal?'); window.location.href='deletefood.php?id= <?php echo $result['food_id'] ?>'">Delete</button </td>
                </td>
            <?php } ?>

            </section>
            <?php
            include_once '../includes/adminfooter.php';
            ?>