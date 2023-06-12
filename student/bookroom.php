 <?php
    include_once '../db/conn.php';
    include_once '../includes/session.php';
    include_once '../includes/studentheader.php';

    
    ?>
<head>
    <link rel="stylesheet" href="../css/view.css">
</head>
<section class="main">
    <h1 class="text-center">Room Booking Form</h1>
    <div class="container">
        <form class="booking-form-container" action="../controllers/booking.php" method="POST">
            <label for="reg_number">User ID:</label>
            <input type="text" id="reg_number" name="regno" value="<?php echo ($_SESSION['id']); ?>">
            <br>
            <label for="hostel">Hostel Building:</label>
            <select id="hostel" name="hostel">
                <option value="">Select Hostel</option>
                <option value="Ridges">Ridges</option>
                <option value="Abardare">Abardare</option>
                <option value="Kilimanjaro">Kilimanjaro</option>
                <option value="Everest">Everest</option>
            </select>
            <br>
            <br>

            <label for="room_type">Room Category:</label>
            <select id="room_type" name="room_type">
                <option value="">Select type of room..</option>
                <option value="single">Single Room</option>
                <option value="shared">Sharing</option>
            </select>
            <br>
            <br>
            <div id="rooms_list"></div>
            <br>
            <br>
            <button type="submit" class="primary-button small-button">Book Now</button>
            <a onclick="return confirm('are you sure you want to cancel?');" href="student.php"> Cancel</a>
            <!-- <button type="submit" onclick="return confirm('Are you sure you want to cancel?');" href="/student/student.php" class="cancel-button small-button">Cancel</button> -->
        </form>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // trigger the function when the room type is changed
            var roomTypeSelect = document.getElementById("room_type");
            roomTypeSelect.addEventListener("change", function() {
                var roomType = roomTypeSelect.value;

                // create a new XMLHttpRequest object
                var xhr = new XMLHttpRequest();

                // configure the request
                xhr.open("POST", "../controllers/get_rooms.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                // define the callback function for a successful request
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        var data = JSON.parse(xhr.responseText); // Convert the returned data to a JavaScript array

                        // Build the select element with the room data using a for loop
                        var selectElement = '<select name="roomid" id="room_id">';
                        for (var i = 0; i < data.length; i++) {
                            var room = data[i];
                            selectElement += '<option value="' + room.id + '" name="roomid">' + room.id + ' (Fee: ' + room.fee + ', Max Occupants: ' + room.max_occupants + ')' + '</option>';
                        }
                        selectElement += '</select>';

                        // Add the select element to the #rooms_list div
                        var roomsListDiv = document.getElementById("rooms_list");
                        roomsListDiv.innerHTML = selectElement;
                    }
                };

                // send the request with the selected room type
                xhr.send("room_type=" + roomType);
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Check if there is a success message in the session
            var successMessage = "<?php echo isset($_SESSION['success']) ? $_SESSION['success'] : ''; ?>";
            if (successMessage !== "") {
                // Display the success message in an alert
                alert(successMessage);
                // Clear the success message from the session
                <?php unset($_SESSION["success"]); ?>
            }
        });
    </script>
</section>