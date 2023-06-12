<?php
$title = "View students";
//include_once 'db/conn.php';
include_once '../includes/session.php';
include_once '../includes/adminheader.php';

$result = $reports->getStudent();
?>

<head>
    <link rel="stylesheet" href="../css/view.css">
    <link rel="stylesheet" href="../css/search.css">
    <style>
        .flex-container {
            display: flex;
            align-items: center;
        }

        .text-center {
            text-align: center;
            margin-right: 20px;
            /* Adjust the margin as needed */
        }
    </style>

</head>
<section class="main">
    <div class="flex-container">
        <h1 class="text-center">List of Registered Students</h1>
        <form action="../controllers/searchstudent.php" method="post" class="search-container">
            <input class="form-control" type="search" placeholder="Search by regno/userid" aria-label="Search" name="search" require>
            <button class="primary-button small-button" type="submit" name="submit">Search</button><br>
        </form>
    </div>
    <table>
        <tr>

            <th>Regno</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>

            <th>
                <button class="primary-button small-button" onclick="window.location.href='registration.php'">Add Student</button>
            </th>
        </tr>
        <?php
        while ($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td> <?php echo $r['reg'] ?></td>
                <td> <?php echo $r['fname'] ?></td>
                <td> <?php echo $r['lname'] ?></td>
                <td> <?php echo $r['email'] ?></td>
                <td>
                    <button type="button" class="primary-button small-button" onclick="window.location.href='viewstudent.php?id= <?php echo $r['reg'] ?>'">view</button>
                    <button type="button" class="warning-button small-button" onclick="window.location.href='editstudent.php?id= <?php echo $r['reg'] ?>'">Edit</button>
                </td>
            </tr>
        <?php } ?>
    </table>
</section>
<?php
include_once '../includes/adminfooter.php';
?>