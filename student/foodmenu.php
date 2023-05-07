<?php
include_once '../db/conn.php';
include_once '../includes/session.php';
include_once '../includes/studentheader.php'
?>

<head>
    <link rel="stylesheet" href="../css/view.css">
</head>
<section class="main">
    <h1 class="text-center">Food Booking Form</h1>
    <div class="container">
        <form class="booking-form-container" action="../controllers/foodbooking.php" method="POST">
            <label for="reg_number">User ID:</label>
            <input type="text" id="reg_number" name="reg" value="<?php echo ($_SESSION['id']); ?>">
            <br>
            <!-- <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
                <option value="Sunday">Sunday</option>
            </select>-->

            <br>
            <br>

            <label for="Diet">Diet Type:</label>
            <select id="diet_type" name="diet_type">
                <option value="">Selet type of diet..</option>
                <option value="normal">Normal Diet</option>
                <option value="special">Special Diet</option>
            </select <br>
            <br>
            <div id='foods_list'></div>
            <br>
            <br>
            <button type="submit" class="primary-button small-button">Book Now </button>
            <button type="subit"><a onclick="return confirm('are you sure you want to cancel?');" href="student.php?id" type="submit">Cancel</a></button> 
            <!-- <button type="submit" class="delete-button small-button" onclick="return confirm('are you sure you want to cancel?'); window.location.href='student.php?'">Cancel</button> -->
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // trigger the function when the room type is changed
            $("#diet_type").change(function() {
                var diet_type = $(this).val();

                // send an AJAX request to retrieve the list of rooms
                $.ajax({
                    url: "../controllers/get_foodmenu.php",
                    type: "POST",
                    data: {
                        diet_type: diet_type
                    },
                    success: function(data) {
                        var foodArray = JSON.parse(data); // Convert the returned data to a JavaScript array

                        // Build the select element with the food data using a PHP foreach loop
                        var selectElement = '<select name="food_id" id="food_id">';
                        $.each(foodArray, function(index, food) {
                            selectElement += '<option value="' + food.food_id + '" name="food_id">' + food.food_id + ' (food: ' + food.food + ', Day: ' + food.Day + ')' + '</option>';
                        });
                        selectElement += '</select>';

                        // Add the select element to the #rooms_list div
                        $("#foods_list").html(selectElement);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Check if there is a success message in the session
            <?php if (isset($_SESSION["success"])) { ?>
                // Display the success message in an alert
                alert("<?php echo $_SESSION["success"]; ?>");
                // Clear the success message from the session
                <?php unset($_SESSION["success"]); ?>
            <?php } ?>
        });
    </script>
    <script>
        // Get a reference to the room Category dropdown menu
        var serviceType = document.getElementById("diet_type");
        // Get a reference to the details text input field
        var detailsSection = document.getElementById("details-section");
        var details = document.getElementById("details");
        // Attach a change event listener to the service type dropdown menu
        serviceType.addEventListener("change", function() {
            // If the selected value is "sigle room", display the details section
            if (serviceType.value === "Special") {
                detailsSection.style.display = "block";
                details.required = true;
            } else {
                detailsSection.style.display = "none";
                details.required = false;
            }
        });
    </script>



</section>