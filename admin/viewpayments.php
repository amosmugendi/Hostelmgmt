<?php
$title = "payment records";
include_once '../db/conn.php';
include_once '../includes/session.php';
include_once '../includes/adminheader.php';

$result = $reports->getPayments();
?>

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
<section class="main">
    <h1>Payment Records</h1>
    <form action="../controllers/searchpayment.php" method="post" class="search-container">
        <input class="form-control" type="search" placeholder="Search by Status" aria-label="Search" name="search" require>
        <button class="primary-button small-button" type="submit" name="submit">Search</button><br>
    </form>
    <table>
        <tr>
            <th>User ID</th>
            <th>Fee</th>
            <th>Amount Paid</th>
            <th>Balance</th>
            <th>Status</th>
            <th>Payment Slip</th>
        </tr>
        <?php
        while ($r = $result->fetch(PDO::FETCH_ASSOC)) {
            $slip = $r['slip'];
        ?>
            <tr>
                <td><?php echo $r['userid'] ?></td>
                <td><?php echo $r['fee'] ?></td>
                <td><?php echo $r['amount_paid'] ?></td>
                <td><?php echo $r['balance'] ?></td>
                <td><?php echo $r['status'] ?></td>
                <td>
                <a href="<?php echo $slip; ?>" download>
                    <img src="<?php echo $slip; ?>" />
                </a>
                </td>
            </tr>
        <?php } ?>
    </table>
</section>
<?php
include_once '../includes/adminfooter.php';
?>