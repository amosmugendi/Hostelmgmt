<?php
$title = "View Rooms";
//include_once 'db/conn.php';
include_once '../includes/session.php';
include_once '../includes/adminheader.php';

$result = $reports->getFoods();
?>

<head>
    <link rel="stylesheet" href="../css/view.css">
    <link rel="stylesheet" href="../css/search.css">
</head>
<section class="main">
    <h1>List of Foods Available</h1>

    <form action="../controllers/searchfood.php" method="post" class="search-container">
        <input class="form-control" type="search" placeholder="search by food-id/diet-type" aria-label="Search" name="search" require>
        <button class="primary-button small-button" type="submit" name="submit">Search</button><br>
    </form>



    <table>
        <tr>
            <th>Food ID</th>
            <th>Food</th>
            <th>Diet Type</th>

            <th>Actions</th>
            <th>
                <button class="primary-button small-button" onclick="window.location.href='addfood.php'">Add Food</button>
            </th>
        </tr>
        <?php
        while ($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td> <?php echo $r['food_id'] ?></td>
                <td> <?php echo $r['food'] ?></td>
                <td> <?php echo $r['diet_type'] ?></td>
                <td>
                    <button type="button" class="primary-button small-button" onclick="window.location.href='viewfood.php?id= <?php echo $r['food_id'] ?>'">view </button>
                    <button type="button" class="warning-button small-button" onclick="window.location.href='editfood.php?id= <?php echo $r['food_id'] ?>'">Edit</button>
                    <button type="button" class="delete-button small-button" name="submit" onclick="deletefoodConfirmation(<?php echo $r['food_id']; ?>)">Delete</button>
                    <script>
                        function deletefoodConfirmation(food_id) {
                            if (confirm('Are you sure you want to delete this meal?')) {
                                window.location.href = '../php-scripts/deletefood.php?food_id=' + food_id;
                            }
                            return false;
                        }
                    </script>
                </td>
            </tr>
        <?php } ?>
    </table>
</section>
<?php
include_once '../includes/adminfooter.php';
?>