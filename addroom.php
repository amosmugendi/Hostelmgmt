<?php
$title = "View Rooms";
include_once 'db/conn.php';
include_once 'includes/session.php';
include_once 'includes/adminheader.php';
$result = $reports->getRooms();
?>

<section class="main">
    <form action="roomaddition.php " method="post">
        <label for="room_type">Room Type:</label>
        <select id="room_type" name="room_type" required>
            <option value=""></option>
            <option value="single">Single</option>
            <option value="Shared">Shared</option>
        </select><br>

        <label for="fee">Fee:</label>
        <input type="text" id="fee" name="fee" required><br>

        <label for="max-occupants">Max Occupants:</label>
        <input type="text" id="max_occupants" name="max_occupants" required><br>

        <label for="status">Status:</label>
        <input type="radio" id="available" name="status" value="Empty" required>
        <label for="available">Empty</label>
        <input type="radio" id="partially_occupied" name="status" value="Partially Booked" required>
        <label for="occupied">Partially Booked</label><br>
        <input type="radio" id="occupied" name="status" value="Full" required>
        <label for="occupied">Fully Booked</label><br>
        <input type="submit" value="Submit">
        <a onclick="return confirm('are you sure you want to cancel?');" href="viewrooms.php"> Cancel</a>

        <script>
            function checkMaxOccupants() {
                var room_type = document.getElementById("room_type").value;
                var max_occupants = document.getElementById("max_occupants");
                if (room_type === "single") {
                    max_occupants.value = 1;
                } else {
                    max_occupants.value = 2;
                }
            }
        </script>
    </form>



</section>
<?php
include_once 'includes/adminheader.php';
?>