<?php
$title = "Search Results";
include_once '../includes/session.php';
include_once '../includes/adminheader.php';
include_once '../db/conn.php';

// check if the form has been submitted
if (isset($_POST['submit'])) {
    $search = $_POST["search"];
    // Get the ID of the current logged-in student
    // $id = $_SESSION['id'];

    // Call the searchStudentFoodDetails function to get the results
    $result = $reports->searchPayment($search);
} else {
    // if the form has not been submitted, redirect to the homepage
    echo 'No payments found';
    header("Location: ../admin/viewpayments.php");
    exit();
}
?>

<head>

    <head>
        <link rel="stylesheet" href="../css/view.css">
        <link rel="stylesheet" href="../css/search.css">
        <style>
        
        img {
            max-width: 100px;
            max-height: 100px;
        }
    </style>

    </head>
</head>
<section class="main">
    <h1>Results</h1>
    <?php if ($result) { ?>
        <table>
            <tr>

                <th>User Id</th>
                <th>Aount Paid</th>
                <th>Balance</th>
                <th>Status</th>
                <th>Payment Slip</th>

                <th>
                    <button class="primary-button small-button" onclick="window.location.href='../admin/viewpayments.php'">Back</button>
                </th>
            </tr>

            <?php foreach ($result as $r) {
                $slip = $r['slip'];
                ?>
                
                <tr>
                    <td> <?php echo $r['userid'] ?></td>
                    <td> <?php echo $r['amount_paid'] ?></td>
                    <td> <?php echo $r['balance'] ?></td>
                    <td> <?php echo $r['status'] ?></td>
                    <td>
                        <a href="<?php echo $slip; ?>" download>
                            <img src="<?php echo $slip; ?>" />
                        </a> 
                    </td>
                </tr>
            <?php } ?>
        </table>
    <?php } else { ?>
        <p>No results found.</p>
    <?php } ?>
</section>