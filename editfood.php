<?php
$title = "Edit Room";
include_once 'db/conn.php';
include_once 'includes/session.php';
include_once 'includes/adminheader.php';
if (!isset($_GET['id'])) {
    //error messages 
    include 'includes/errormessage.php';
    header("Location: viewfoods.php ");
} else {
    $id = $_GET['id'];
    $foods = $reports->getFoodDetails($id);
?>
   
        <section class="main">
        <h1 class="text-center">Edit Room Details</h1>

        <form method="post" action="foodedit.php">
            <input type="hidden" name="id" value="<?php echo $foods['food_id'] ?>" />
            <div class="form-group">
                <label for="food_d" class="form-label">Food ID</label>
                <input type="text" class="form-control" value="<?php echo $foods['food_id'] ?>" " id="food_id" name="food_id">
                </div>
            <div class="form-group">
            <label for="diet_type">Diet type</label>
            <select id="diet_type" name="diet_type" value="<?php echo $foods['diet_type'] ?>" required>
                <option value="<?php echo $foods['diet_type'] ?>">Select Diet Type</option>
                <option value="single">Special</option>
                <option value="Shared">Normal</option>
            </select><br>
            </div>
            <div class="form-group">
                <label for="food" class="form-label">Food</label>
                <input type="text" class="form-control" value="<?php echo $foods['food'] ?>" id="food" name="food">
            </div>
            <div class="form-group">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" value="<?php echo $foods['Day'] ?>" id="date" name="date">
            </div>
            <button type="submit " name="save" class="btn">save changes</button>
            <a onclick="return confirm('are you sure you want to cancel?')"; href="viewfoods.php"> Cancel</a>
        </form>
        <?php  } ?>
        </section>
        <?php
        include_once 'includes/adminfooter.php';
        ?>
