<?php
$title = "View Student";
//include_once 'db/conn.php';
include_once 'includes/session.php';
include_once 'includes/adminheader.php';


if (!isset($_GET['id'])) {
    echo "<h1 class='text-danger'>Please check details and try again</h1>";
} else {
    $id = $_GET['id'];
    $result = $reports->getStudentDetails($id);

?>

    <section class="main">
        <!-- create a container to hold the room details-->
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
        <br>
        <td>
            <a href="viewstudents.php?id= <?php echo $result['reg'] ?>" class="primary-button">Back to List</a>
            <a href="editstudent.php?id= <?php echo $result['reg'] ?>" class="warning-button">Edit</a>
        </td>
    <?php } ?>

    </section>
    <?php
    include_once 'includes/adminfooter.php';
    ?>