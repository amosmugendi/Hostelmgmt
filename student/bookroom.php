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
             <input type="text" id="reg_number" name="regno" value="<?php echo($_SESSION['id']);?>">
             <br>
             <br>
             <br>

             <label for="room_type">Room Category:</label>
             <select id="room_type" name="room_type">
                 <option value="">Selet type of room..</option>
                 <option value="single">Single Room</option>
                 <option value="shared">Sharing</option>
             </select <br>
             <br>
             <div id='rooms_list'></div>
             <br>
             <br>
             <button type="submit" class="primary-button small-button">Book Now </button>
             <button type="subit"><a onclick="return confirm('are you sure you want to cancel?');" href="student.php?id" type="submit">Cancel</a></button>

         </form>
     </div>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script>
         $(document).ready(function() {
             // trigger the function when the room type is changed
             $("#room_type").change(function() {
                 var room_type = $(this).val();

                 // send an AJAX request to retrieve the list of rooms
                 $.ajax({
                     url: "../controllers/get_rooms.php",
                     type: "POST",
                     data: {
                         room_type: room_type
                     },
                     success: function(data) {
                         var roomArray = JSON.parse(data); // Convert the returned data to a JavaScript array

                         // Build the select element with the room data using a PHP foreach loop
                         var selectElement = '<select name="roomid" id="room_id">';
                         $.each(roomArray, function(index, room) {
                             selectElement += '<option value="' + room.id + '" name="roomid">' + room.id + ' (Fee: ' + room.fee + ', Max Occupants: ' + room.max_occupants + ')' + '</option>';
                         });
                         selectElement += '</select>';

                         // Add the select element to the #rooms_list div
                         $("#rooms_list").html(selectElement);
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
         var serviceType = document.getElementById("room_type");
         // Get a reference to the details text input field
         var detailsSection = document.getElementById("details-section");
         var details = document.getElementById("details");
         // Attach a change event listener to the service type dropdown menu
         serviceType.addEventListener("change", function() {
             // If the selected value is "sigle room", display the details section
             if (serviceType.value === "single") {
                 detailsSection.style.display = "block";
                 details.required = true;
             } else {
                 detailsSection.style.display = "none";
                 details.required = false;
             }
         });
     </script>



 </section>