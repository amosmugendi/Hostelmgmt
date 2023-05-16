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
    $result = $reports->searchStudentDetails($search);
} else {
    // if the form has not been submitted, redirect to the homepage
    echo 'No food found';
    header("Location: ../admin/viewrooms.php");
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
                    
                    <th>Regno</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>  
                     
                    <th>
                        <button class="primary-button small-button" onclick="window.location.href='../admin/viewstudents.php'">Back</button>
                    </th>             
                 </tr>
              
               <?php foreach ($result as $r) {?>
                <tr>
                    <td>  <?php echo $r['reg']?></td>
                    <td> <?php echo $r['fname']?></td>
                    <td> <?php echo $r['lname']?></td>
                    <td> <?php echo $r['email']?></td>
                    <td>
                       <button type="button" class="primary-button small-button" onclick="window.location.href='../admin/viewstudent.php?id= <?php echo $r['reg']?>'">view</button> 
                       <button type="button" class="warning-button small-button" onclick="window.location.href='../admin/editstudent.php?id= <?php echo $r['reg']?>'">Edit</button>
                    </td>
                </tr>
                <?php } ?>
    </table>
    <?php } else { ?>
        <p>No results found.</p>
    <?php } ?>
</section>
