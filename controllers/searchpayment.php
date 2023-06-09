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
    </head>
</head>
<section class="main">
    <?php if ($result) { ?>
        <table>
                 <tr>
                    
                    <th>User Id</th>
                    <th>Aount Paid</th>
                    <th>Payment Slip</th>
                    <th>Balance</th> 
                    <th>Status</th> 
                     
                    <th>
                        <button class="primary-button small-button" onclick="window.location.href='../admin/viewpayments.php'">Back</button>
                    </th>             
                 </tr>
              
               <?php foreach ($result as $r) {?>
                <tr>
                    <td>  <?php echo $r['userid']?></td>
                    <td> <?php echo $r['amount_paid']?></td>
                    <td><img src="<?php echo $slip; ?>" /></td>
                    <td> <?php echo $r['balance']?></td>
                    <td> <?php echo $r['status']?></td>
                </tr>
                <?php } ?>
    </table>
    <?php } else { ?>
        <p>No results found.</p>
    <?php } ?>
</section>
