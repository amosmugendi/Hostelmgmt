<?php
$title = "View Student";
//include_once 'db/conn.php';
include_once '../includes/session.php';
include_once '../includes/adminheader.php';


if (!isset($_GET['id'])) {
    echo "<h1 class='text-danger'>Please check details and try again</h1>";
} else {
    $id = $_GET['id'];
    $result = $reports->getStudentDetails($id);

?>
<head>
<link rel="stylesheet" href="../css/view.css">
</head>
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
            <button type="button" class="primary-button small-button" onclick="window.location.href='viewstudents.php?id= <?php echo $result['reg']?>'">Back to List</button>
            <button type="button" class="warning-button small-button" onclick="window.location.href='editstudent.php?id= <?php echo $result['reg']?>'">Edit</button>
        </td>
    <?php } ?>

    </section>
    <?php
    include_once '../includes/adminfooter.php';
    ?>