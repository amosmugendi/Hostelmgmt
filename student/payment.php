<?php
include_once '../db/conn.php';
include_once '../includes/session.php';
include_once '../includes/studentheader.php';

// Access the roomid from the session
$roomid = $_SESSION['roomid'];

// Retrieve the fee for the selected room
if (isset($reports) && method_exists($reports, 'getRoomFee')) {
    $rooms = $reports->getRoomFee($roomid);
}

?>

<head>
    <link rel="stylesheet" href="../css/view.css">
    <script>
        function validateForm() {
            var fee = document.getElementById('fee').value;
            var paid = document.getElementById('paid').value;
            var slip = document.getElementById('slip').value;

            if (paid === '' || slip === '') {
                alert('Paid amount and slip fields are required.');
                return false;
            }

            if (parseFloat(paid) > parseFloat(fee)) {
                alert('Paid amount cannot exceed the fee amount.');
                return false;
            }

            return true;
        }
    </script>
</head>

<section class="main">
    <h1 class="text-center">Payment</h1>
    <div class="container">
        <form class="booking-form-container" action="../controllers/pay.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm();">
            <!-- Form fields -->
            <label for="reg_number">User ID:</label>
            <input type="text" id="reg_number" name="regno" value="<?php echo ($_SESSION['id']); ?>">
            <br>
            <div>
                <label for="fee">Fee Amount:</label>
                <input type="number" id="fee" name="fee" value="<?php echo $rooms['fee'] ?>">
            </div>

            <div>
                <label for="paid">Amount Paid:</label>
                <input type="number" id="paid" name="paid">
            </div>

            <div>
                <label for="slip">Payment Slip:</label>
                <input type="file" id="slip" name="slip">
            </div>

            <button type="submit" class="primary-button small-button">Confirm Payment</button>
            <button type="submit"><a onclick="return confirm('Are you sure you want to cancel?');" href="student.php?id" type="submit">Cancel</a></button>
        </form>
    </div>
</section>

