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

        <!-- <head>
            <link rel="stylesheet" href="../css/view.css"> 
        </head> -->
        <section>
            <div class="container">
                
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
                <!-- <form method="post" action="register.php">
                    <input type="hidden" name="id" value="<?php echo $profile['reg'] ?>" />
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Registration Number</span>
                            <input type="text" value="<?php echo $profile['reg'] ?>" placeholder="enter registration number" id="regno" name="regno" required>
                        </div>
                        <div class="input-box">
                            <span class="details">First Name</span>
                            <input type="text" value="<?php echo $profile['fname'] ?>" placeholder="enter first name" id="fname" name="fname" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Last Name</span>
                            <input type="text" value="<?php echo $profile['lname'] ?>" placeholder="enter your last name" id="lname" name="lname" required>
                        </div>

                        <div class="input-box">
                            <span class="details">Email</span>
                            <input type="email" value="<?php echo $profile['email'] ?>" placeholder="enter your email" id="email" name="email" required>
                        </div>
                        <div class="input-box">
                            <span class="details">ID/Passport </span>
                            <input type="text" value="<?php echo $profile['id'] ?>" placeholder="Enter your ID/Passport" id="id" name="id" required>
                        </div>
                        <div class="input-box">
                            <span class="details">date of birth</span>
                            <input type="date" value="<?php echo $profile['dob'] ?>" id="dob" name="dob" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Phone Number</span>
                            <input type="text" value="<?php echo $profile['phone'] ?>" placeholder="enter your phone number" id="phone" name="phone" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Home County</span>
                            <input type="text" value="<?php echo $profile['county'] ?>" placeholder="enter your county" id="county" name="county" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Emergency Contact</span>
                            <input type="text" value="<?php echo $profile['contact'] ?>" placeholder="emergency contact" id="contact" name="contact" required>
                        </div>
                    </div>
                    <div class="gender-details">
                        <input type="radio" name="Gender" id="dot-1">
                        <input type="radio" name="Gender" id="dot-2">
                        <span class="gender-title">Gender</span>
                        <div class="category">
                            <label for="dot-1">
                                <span class="dot one"></span>
                                <span class="gender">Male</span>
                            </label>
                            <label for="dot-2">
                                <span class="dot two"></span>
                                <span class="gender">Female</span>
                            </label>
                        </div>
                    </div>
                    <div class="button">
                        <input type="submit" value="Submit" class="submit">
                    </div>
                    <div class="login-register">
                        <p><a href="student.php"> Cancel</a></p>
                    </div>
                </form> -->
        <?php
    } else {
        echo "No details found for this student.";
    }
}
        ?>
            </div>
        </section>