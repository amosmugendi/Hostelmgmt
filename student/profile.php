<?php
$title = "View Profile";
include_once '../includes/studentheader.php';
include_once '../includes/session.php';
// if(!isset($_GET['id'])){
//     echo '<h1>Student not found</h1>';
// }
// elseif(isset($_GET['id'])){
//     $id=$_GET['id'];
//     $profile=$crud->getStudentDetails($id);


if (!$_SESSION['id']) {
    echo "<h1 class='text-danger'>Please check details and try again</h1>";
} else {
    // Get the ID of the current logged-in student
    $id = $_SESSION['id'];
    $result = $crud->getStudentDetails($id);
    // Check if the query returned any results
    if ($result) {
?>

        <head>
            <link rel="stylesheet" href="../css/view.css">
        </head>
        <section class="main">


            <div class="card" style="width: 18rem">
                <div class="card-body">
                    <h5 class="card-title">
                        Student Details
                    </h5>
                    <p class="Card-text">
                        Registration Number: <?php echo $result['reg']; ?>
                    </p>
                    <p class="Card-text">
                        First Name: <?php echo $result['fname']; ?>
                    </p>
                    <p class="card-text">
                        Last Name: <?php echo $result['lname']; ?>
                    </p>
                    <p class="card-text">
                        Email: <?php echo $result['email']; ?>
                    </p>
                    <p class="card-text">
                        ID/Passport: <?php echo $result['idno']; ?>
                    </p>
                    <p class="card-text">
                        Date of Birth: <?php echo $result['dob']; ?>
                    </p>
                    <p class="card-text">
                        Phone Number: <?php echo $result['phone']; ?>
                    </p>
                    <p class="card-text">
                        Home County: <?php echo $result['county']; ?>
                    </p>
                    <p class="card-text">
                        Emergency Contact: <?php echo $result['contact']; ?>
                    </p>

                </div>

            </div>
        </section>

<?php
    } else {
        echo "No details found for this student.";
    }
}
?>