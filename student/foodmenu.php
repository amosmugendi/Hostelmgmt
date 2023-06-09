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
            <br>

            <label for="diet_type">Diet Type:</label>
            <select id="diet_type" name="diet_type">
                <option value="">Select type of diet..</option>
                <option value="normal">Normal Diet</option>b
                <option value="special">Special Diet</option>
            </select>
            <br>
            <br>
            <div id="foods_list"></div>
            <br>
            <br>
            <button type="submit" class="primary-button small-button">Book Now</button>
            <button type="submit" onclick="return confirm('Are you sure you want to cancel?');" href="student.php?id" class="cancel-button small-button">Cancel</button>
        </form>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // trigger the function when the diet type is changed
            var dietTypeSelect = document.getElementById("diet_type");
            dietTypeSelect.addEventListener("change", function() {
                var dietType = dietTypeSelect.value;

                // create a new XMLHttpRequest object
                var xhr = new XMLHttpRequest();

                // configure the request
                xhr.open("POST", "../controllers/get_foodmenu.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                // define the callback function for a successful request
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        var data = JSON.parse(xhr.responseText); // Convert the returned data to a JavaScript array

                        // Build the select element with the food data using a for loop
                        var selectElement = '<select name="food_id" id="food_id">';
                        for (var i = 0; i < data.length; i++) {
                            var food = data[i];
                            selectElement += '<option value="' + food.food_id + '" name="food_id">' + food.food_id + ' (food: ' + food.food + ', Day: ' + food.Day + ')' + '</option>';
                        }
                        selectElement += '</select>';

                        // Add the select element to the #foods_list div
                        var foodsListDiv = document.getElementById("foods_list");
                        foodsListDiv.innerHTML = selectElement;
                    }
                };

                // send the request with the selected diet type
                xhr.send("diet_type=" + encodeURIComponent(dietType));
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
            }
        });
    </script>
    <script>
        // Get a reference to the diet type dropdown menu
        var dietType = document.getElementById("diet_type");
        // Attach a change event listener to the diet type dropdown menu
        dietType.addEventListener("change", function() {
            // Get a reference to the details section
            var detailsSection = document.getElementById("details-section");
            // Get a reference to the details text input field
            var details = document.getElementById("details");

            // If the selected value is "special", display the details section
            if (dietType.value === "special") {
                detailsSection.style.display = "block";
                details.required = true;
            } else {
                detailsSection.style.display = "none";
                details.required = false;
            }
        });
    </script>
</section>
