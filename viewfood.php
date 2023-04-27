<?php
$title = "View Rooms";
include_once 'db/conn.php';
include_once 'includes/session.php';
include_once 'includes/adminheader.php';

if (!isset($_GET['id'])) {
    echo "<h1 class='text-danger'>Please check details and try again</h1>";
} else {
    $id = $_GET['id'];
    $result = $reports->getFoodDetails($id);;

?>
  
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
                    <a href="viewfoods.php?id= <?php echo $result['food_id'] ?>" class="primary-button">Back to List</a>
                    <a href="editfood.php?id= <?php echo $result['food_id'] ?>" class="warning-button">Edit</a>
                    <a onclick="return confirm('are you sure you want to delete this record?');" href="delete.php?id= <?php echo $r['food_id'] ?>" class="delete-button">Delete</a>
                </td>
            <?php } ?>

            </section>
            <?php
            include_once 'includes/adminfooter.php';
            ?>