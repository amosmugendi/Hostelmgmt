<?php
$title = "Booked Food";
include_once '../includes/session.php';
include_once '../includes/studentheader.php';

if (!$_SESSION['id']) {
    echo "<h1 class='text-danger'>Please check details and try again</h1>";
} else {
    // Get the ID of the current logged-in student
    $id = $_SESSION['id'];

    // Check if the search query was submitted
    if (isset($_SESSION['search']) && !empty($_GET['search'])) {
        $search = $_SESSION['search'];

        // Fetch the details of the meals that the student has booked matching the search term
        $result = $reports->searchStudentFoodDetails($id, $search);
    } else {
        // Fetch all the details of the meals that the student has booked
        $result = $reports->getStudentfoodDetails($id);
    }

    // Check if the query returned any results
    if ($result) {
?>

        <head>
            <link rel="stylesheet" href="../css/view.css">
        </head>
        <section class="main">
            <!-- <form class="form-inline mb-3" action="../controllers/searchfood.php" method="GET">
                <input class="form-control mr-sm-2" type="search" placeholder="Search by Food ID" aria-label="Search" name="search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form> -->
            <table class="table">
                <thead>
                    <tr>
                        <th>Food ID</th>
                        <th>Food Type</th>
                        <th>Food</th>
                        <th>Day</th>
                        <!-- <th class="d-flex align-items-">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search by Food ID" aria-label="Search" name="search">
                            <button class="primary-button small-button" type="submit">Search</button>
                        </th> -->

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $row) { ?>
                        <tr>
                            <td><?php echo $row['food_id']; ?></td>
                            <td><?php echo $row['diet_type']; ?></td>
                            <td><?php echo $row['food']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
<?php
    } else {
        echo "No Food details found for this student.";
    }
}
?>