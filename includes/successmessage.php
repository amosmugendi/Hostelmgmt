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