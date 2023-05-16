<?php
$title = "Edit Student";
include_once '../db/conn.php';
include_once '../includes/session.php';
include_once '../includes/studentheader.php';
include '../includes/errormessage.php';
if ($_SESSION['id']) {    
    $id = $_SESSION['id'];
    $student = $reports->getProfileDetails($id);
?>
  
            <section class="main">
                <h1 class="text-center">Edit Student Details</h1>

                <form method="post" action="../php-scripts/profileedit.php">
                    <input type="hidden" name="id" value="<?php echo $student['userid'] ?>" />
                    <!-- <div class="form-group">
                        <label for="userid" class="form-label">User ID</label>
                        <input type="text" class="form-control" value="<?php echo $student['userid'] ?>" id="userid" name="userid"> 
                    </div> -->
                    <div class="form-group">
                        <label for="reg" class="form-label">Registration Number</label>
                        <input type="text" class="form-control" value="<?php echo $student['reg'] ?>" id="reg" name="reg">
                    </div>
                    <div class="form-group">
                        <label for="fname" class="form-label">First Name</label>
                        <input type="text" class="form-control" value="<?php echo $student['fname'] ?>" id="fname" name="fname">
                    </div>
                    <div class="form-group">
                        <label for="lname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" value="<?php echo $student['lname'] ?>" id="fname" name="lname">
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" value="<?php echo $student['email'] ?>" id=" email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="idno" class="form-label">ID/Passport</label>
                        <input type="text" class="form-control" value="<?php echo $student['idno'] ?>"  id=" idno" name="idno">
                    </div>
                    <div class="form-group">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" value="<?php echo $student['dob'] ?>" id=" dob" name="dob">
                    </div>
                    <div class="form-group">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" value="<?php echo $student['phone'] ?>" id="phone" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="county" class="form-label">County</label>
                        <input type="text" class="form-control" value="<?php echo $student['county'] ?>" id="conty" name="county">
                    </div>
                    <div class="form-group">
                        <label for="contact" class="form-label">Emergency Contact</label>
                        <input type="text" class="form-control" value="<?php echo $student['contact'] ?>" id="contact" name="contact">
                    </div>

                    <button type="submit " name="save" class="btn">save changes</button>
                    <a onclick="return confirm('are you sure you want to cancel?')" ; href="student.php"> Cancel</a>
                </form>
            <?php  } ?>
            </section>
            <?php
            include_once '../includes/adminfooter.php';
            ?>