<?php
$title = "Booked Room";
//include_once 'db/conn.php';
include_once '../includes/session.php';
include_once '../includes/studentheader.php';

if (!$_SESSION['id']) {
    echo "<h1 class='text-danger'>Please check details and try again</h1>";
} else {
    // Get the ID of the current logged-in student
    $id = $_SESSION['id'];

    // Fetch the details of the room that the student has booked
    $result = $reports->getStudentRoomDetails($id);

    // Check if the query returned any results
    if ($result) {
?>

        <head>
            <link rel="stylesheet" href="../css/view.css">
        </head>
        <section class="main">
            <!-- create a container to hold the room details-->
            <div class="card" style="width: 18rem">
                <div class="card-body">
                    <h5 class="card-title">
                        Room Details
                    </h5>
                    <p class="Card-text">
                        RoomID: <?php echo $result['id']; ?>
                    </p>
                    <p class="Card-text">
                        Room Type: <?php echo $result['room_type']; ?>
                    </p>
                    <p class="card-text">
                        Fees per Sem: <?php echo $result['fee']; ?>
                    </p>
                    <p class="card-text">
                        Maximum Occupants: <?php echo $result['max_occupants']; ?>
                    </p>
                    <p class="card-text">
                        Room Status: <?php echo $result['status']; ?>
                    </p>
                </div>
                <button class="delete-button small-button" name="submit" onclick="resetRoomConfirmation(<?php echo $result['id']; ?>)" <?php echo ($result['checkout'] ? 'disabled' : ''); ?> style="<?php echo ($result['checkout'] ? 'background-color: gray;' : ''); ?>">Checkout</button>
                <button class="checkin-button small-button" name="submit" style="display: <?php echo ($result['checkout'] ? 'inline-block' : 'none'); ?>; background-color: green;" onclick="redirectToBookRoom()">Check-in</button>

                <script>
                    function resetRoomConfirmation(id) {
                        if (confirm('Are you sure you want to checkout this room?')) {
                            window.location.href = '../php-scripts/checkout.php?id=' + id;
                        }
                        return false;
                    }

                    function redirectToBookRoom() {
                        window.location.href = 'bookroom.php';
                    }
                </script>



            </div>
        </section>

<?php
    } else {
        echo "No room details found for this student.";
    }
}
?>