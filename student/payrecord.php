<?php
$title = "Payment Record";
include_once '../includes/session.php';
include_once '../includes/studentheader.php';

if (!$_SESSION['id']) {
    echo "<h1 class='text-danger'>Please check details and try again</h1>";
} else {
    // Get the ID of the current logged-in student
    $id = $_SESSION['id'];
    $result = $reports->getPaymentDetails($id);
    // Check if the query returned any results
    if ($result) {
?>

        <head>
            <link rel="stylesheet" href="../css/view.css">
        </head>
        <section class="main">
            <h1>Payment Records</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Payment ID</th>
                        <th>Fee</th>
                        <th>Balance</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $row) { ?>
                        <tr>
                            <td><?php echo $row['Id']; ?></td>
                            <td><?php echo $row['fee']; ?></td>
                            <td><?php echo $row['balance']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
<?php
    } else {
        echo "No payment records found for this student.";
    }
}
?>