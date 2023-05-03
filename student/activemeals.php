<?php 
$title = "Booked Meals";
//include_once 'db/conn.php';
include_once '../includes/session.php';
include_once '../includes/studentheader.php';

if (!$_SESSION['id']) {
    echo "<h1 class='text-danger'>Please check details and try again</h1>";
}  
 else {  
    // Get the ID of the current logged-in student
    $id = $_SESSION['id'];

    // Fetch the details of the room that the student has booked
    $result = $reports->getStudentFoodDetails($id);

    // Check if the query returned any results
    if ($result) {
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
    </section>

<?php
    } else {
        echo "No room details found for this student.";
    }
}
?>
            
           