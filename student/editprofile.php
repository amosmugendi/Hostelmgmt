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

                <form method="post" action="../php-scripts/profileedit.php" autocomplete="off" novalidate>
                    <input type="hidden" name="id" value="<?php echo $student['userid'] ?>" />
                   
                    <div class="form-group">
                        <label for="reg" class="form-label">Registration Number</label>
                        <input type="text" class="form-control" value="<?php echo $student['reg'] ?>" id="reg" name="reg" required maxlength="7">
                    </div>
                    <div class="form-group">
                        <label for="fname" class="form-label">First Name</label>
                        <input type="text" class="form-control" value="<?php echo $student['fname'] ?>" id="fname" name="fname" required>
                    </div>
                    <div class="form-group">
                        <label for="lname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" value="<?php echo $student['lname'] ?>" id="fname" name="lname" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" value="<?php echo $student['email'] ?>" id=" email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="idno" class="form-label">ID/Passport</label>
                        <input type="text" class="form-control" value="<?php echo $student['idno'] ?>"  id=" idno" name="idno" required maxlength="9">
                    </div>
                    <div class="form-group">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" value="<?php echo $student['dob'] ?>" id=" dob" name="dob" required>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" value="<?php echo $student['phone'] ?>" id="phone" name="phone" required maxlength="11">
                    </div>
                    <div class="form-group">
                        <label for="county" class="form-label">County</label>
                        <input type="text" class="form-control" value="<?php echo $student['county'] ?>" id="conty" name="county" required>
                    </div>
                    <div class="form-group">
                        <label for="contact" class="form-label">Emergency Contact</label>
                        <input type="text" class="form-control" value="<?php echo $student['contact'] ?>" id="contact" name="contact" required maxlength="11">
                    </div>

                    <button type="submit " name="save" class="btn" >save changes</button>
                    <a onclick="return confirm('are you sure you want to cancel?')" ; href="student.php"> Cancel</a>
                </form>
            <?php  } ?>
            </section>
            <?php
            include_once '../includes/adminfooter.php';
            ?>