<?php
$title = "View Rooms";
include_once '../db/conn.php';
include_once '../includes/session.php';
include_once '../includes/adminheader.php';
$result = $reports->getfoods();
?>

<section class="main">
    <form action="foodaddition.php " method="post">
        <label for="food_id">Food ID:</label>
        <input type="text" id="food_id" name="food_id" required><br>
        <label for="diet_type">Diet Type:</label>
        <select id="diet_type" name="diet_type" required>
            <option value=""></option>
            <option value="Special">Special</option>
            <option value="Normal">Normal</option>
        </select><br>
        <label for="food">Food:</label>
        <input type="text" id="food" name="food" required><br>
        <label for="Day">Day:</label>
        <input type="date" id="date" name="date" required><br>

        <input type="submit" value="Submit">
        <a onclick="return confirm('are you sure you want to cancel?');" href="viewfoods.php"> Cancel</a>
    </form>


</section>
<?php
include_once '../includes/adminfooter.php';
?>