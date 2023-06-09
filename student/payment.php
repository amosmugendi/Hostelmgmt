<?php
include_once '../db/conn.php';
include_once '../includes/session.php';
include_once '../includes/studentheader.php';


?>

<head>
    <link rel="stylesheet" href="../css/view.css">
</head>
<section class="main">
    <h1 class="text-center">Payment</h1>
    <div class="container">

    <form class="booking-form-container" action="../controllers/pay.php" method="POST" enctype="multipart/form-data">

            
            <label for="reg_number">User ID:</label>
            <input type="text" id="reg_number" name="regno"  value="<?php echo ($_SESSION['id']); ?>">
            <br>
            <!-- <input type="hidden" name="id" value="<?php echo $rooms['id'] ?>" /> -->
            <br>
            <br>
            <div>
                <label for="fee"> Fee Amout</label>
                <input type="number" id="fee" name="fee">
            </div>
            <br>
            <div>
                <label for="paid">Amount Paid</label>
                <input type="number" id="paid" name="paid">
            </div>
            <br>
            <div>
                <label for="slip">Payment Slip</label>
                <input type="file" id="slip" name="slip">
            </div>
            <br>
            <button type="submit" class="primary-button small-button">Confirm Payment</button>
            <button type="submit"><a onclick="return confirm('Are you sure you want to cancel?');" href="student.php?id" type="submit">Cancel</a></button>

        </form>
  
    </div>
   
</section>