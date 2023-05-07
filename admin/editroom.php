<?php
$title = "Edit Room";
include_once '../db/conn.php';
include_once '../includes/session.php';
include_once '../includes/adminheader.php';

if (!isset($_GET['id'])) {
    //error messages 
    include '../includes/errormessage.php';
    header("Location: viewrooms.php ");
} else {
    $id = $_GET['id'];
    $rooms = $reports->getRoomDetails($id);
?>
        <section class="main">
        <h1 class="text-center">Edit Room Details</h1>

        <form method="post" action="../php-scripts/roomedit.php">
            <input type="hidden" name="id" value="<?php echo $rooms['id'] ?>" />
            <div class="form-group">
            <label for="room_type">Room Type</label>
            <select id="room_type" name="room_type" value="<?php echo $rooms['room_type'] ?>" required>
                <option value="<?php echo $rooms['room_type'] ?>">Select Room Category</option>
                <option value="single">Single</option>
                <option value="Shared">Shared</option>
            </select><br>
            </div>
            <div class="form-group">
                <label for="fee" class="form-label">Fees</label>
                <input type="text" class="form-control" value="<?php echo $rooms['fee'] ?>" id="fee" name="fee">
            </div>
            <div class="form-group">
                <label for="max_occupants" class="form-label">Maximum Occupants</label>
                <input type="text" class="form-control" value="<?php echo $rooms['max_occupants'] ?>" id="max_occupants" name="max_occupants">
            </div>
             <div class="form-group">
                <label for="status" class="form-label">Status</label>
                <input type="text" class="form-control" value="<?php echo $rooms['status'] ?>" " id=" status" name="status">
                </div>

                <button type="submit " name="save" class="btn">save changes</button>
                <a onclick="return confirm('are you sure you want to cancel?')"; href="viewrooms.php"> Cancel</a>
        </form>
        <?php  } ?>
        </section>
        <?php
        include_once '../includes/adminfooter.php';
        ?>
