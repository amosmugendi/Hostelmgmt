<?php
$title = "Booked Food";
include_once '../includes/session.php';
include_once '../includes/studentheader.php';

if (!$_SESSION['id']) {
    echo "<h1 class='text-danger'>Please check details and try again</h1>";
} else {
    // Get the ID of the current logged-in student
    $id = $_SESSION['id'];

    // Fetch the details of the meals that the student has booked
    $result = $reports->getStudentfoodDetails($id);

    // Check if the query returned any results
    if ($result) {
?>
<head>
<link rel="stylesheet" href="../css/view.css">
</head>
    <section class="main">
        <?php foreach ($result as $row) { ?>
        <!-- create a container to hold the food details-->
        <div class="card" style="width: 18rem">
            <div class="card-body">
                <h5 class="card-title">
                    Food Details
                </h5>
                <p class="Card-text">
                    Food ID: <?php echo $row['food_id']; ?>
                </p>
                <p class="Card-text">
                    Food Type: <?php echo $row['diet_type']; ?>
                </p>
                <p class="card-text">
                    Food: <?php echo $row['food']; ?>
                </p>
                <p class="card-text">
                    Day: <?php echo $row['Day']; ?>
                </p>
            </div>
        </div>
        <?php } ?>
    </section>
<?php
    } else {
        echo "No Food details found for this student.";
    }
}
?>
