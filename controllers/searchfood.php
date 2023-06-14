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
    $result = $reports->searchFoodDetails($search);
} else {
    // if the form has not been submitted, redirect to the homepage
    echo 'No food found';
    header("Location: ../admin/viewfoods.php");
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
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Food ID</th>
                    <th scope="col">Food</th>
                    <th scope="col">Food Type</th>
                    <th>Actions</th>
                    <th>
                        <button class="primary-button small-button" onclick="window.location.href='../admin/viewfoods.php'">Back</button>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $row) { ?>
                    <tr>
                        <td><?php echo $row['food_id']; ?></td>
                        <td><?php echo $row['food']; ?></td>
                        <td><?php echo $row['diet_type']; ?></td>
                        <td>
                            <button type="button" class="primary-button small-button" onclick="window.location.href='../admin/viewfood.php?id= <?php echo $row['food_id'] ?>'">view </button>
                            <button type="button" class="warning-button small-button" onclick="window.location.href='../admin/editfood.php?id= <?php echo $row['food_id'] ?>'">Edit</button>
                            <button type="button" class="delete-button small-button" onclick="return confirm('are you sure you want to delete this meal?'); window.location.href='../admin/deletefood.php?id= <?php echo $row['food_id'] ?>'">Delete</button>
                        </td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p>No results found.</p>
    <?php } ?>
</section>

<!-- <?php include_once '../includes/footer.php'; ?> -->