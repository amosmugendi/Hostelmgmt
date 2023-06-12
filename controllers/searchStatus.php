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
    $result = $reports->searchStudentStatus($search);
} else {
    // if the form has not been submitted, redirect to the homepage
    echo '';
    header("Location: ../admin/viewstudents.php");
    exit();
}
?>

<head>
    <link rel="stylesheet" href="../css/view.css">
    <link rel="stylesheet" href="../css/search.css">

</head>

<section class="main">
    <!-- <div class="flex-container">
        <h1 class="text-center">List of Registered Students</h1>
        <form action="../controllers/searchstudent.php" method="post" class="search-container">
            <input class="form-control" type="search" placeholder="Search by regno/userid" aria-label="Search" name="search" require>
            <button class="primary-button small-button" type="submit" name="submit">Search</button>
        </form>
    </div> -->
    <?php if ($result) { ?>
    <table>
        <tr>

            <th>Regno</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Actions</th>
            <th>
                <button class="primary-button small-button" onclick="window.location.href='../admin/studentlist.php'">Back</button>
            </th>

        </tr>
        <  <?php foreach ($result as $r) {?>
            <tr>
                <td> <?php echo $r['reg'] ?></td>
                <td> <?php echo $r['fname'] ?></td>
                <td> <?php echo $r['lname'] ?></td>
                <td> <?php echo $r['email'] ?></td>
                <td> <?php echo $r['status'] ?></td>
                <td>
                    <button id="enableBtn_<?php echo $r['userid']; ?>" type="button" class="primary-button small-button" onclick="enableConfirmation(<?php echo $r['userid']; ?>)">Enable</button>
                    <button id="disableBtn_<?php echo $r['userid']; ?>" type="button" class="delete-button small-button" onclick="disableConfirmation(<?php echo $r['userid']; ?>)">Disable</button>
                </td>
                <script>
                    function enableConfirmation(userid) {
                        if (confirm('Are you sure you want to enable this student?')) {
                            var enableBtn = document.getElementById('enableBtn_' + userid);
                            var disableBtn = document.getElementById('disableBtn_' + userid);

                            enableBtn.style.backgroundColor = 'grey';
                            enableBtn.disabled = true;
                            disableBtn.style.backgroundColor = ''; // Set the desired color for disable button
                            disableBtn.disabled = false;

                            window.location.href = '../php-scripts/enable.php?id=' + userid;
                        }
                    }

                    function disableConfirmation(userid) {
                        if (confirm('Are you sure you want to disable this student?')) {
                            var enableBtn = document.getElementById('enableBtn_' + userid);
                            var disableBtn = document.getElementById('disableBtn_' + userid);

                            enableBtn.style.backgroundColor = ''; // Set the desired color for enable button
                            enableBtn.disabled = false;
                            disableBtn.style.backgroundColor = 'grey';
                            disableBtn.disabled = true;

                            window.location.href = '../php-scripts/disable.php?id=' + userid;
                        }
                    }

                    // Initialize button states based on initial status (Assuming status is stored in a variable called 'initialStatus')
                    var initialStatus = '<?php echo $r['status']; ?>'; // Replace with the actual variable holding the status
                    var enableBtn = document.getElementById('enableBtn_<?php echo $r['userid']; ?>');
                    var disableBtn = document.getElementById('disableBtn_<?php echo $r['userid']; ?>');

                    if (initialStatus === 'Active') {
                        enableBtn.style.backgroundColor = 'grey';
                        enableBtn.disabled = true;
                    } else if (initialStatus === 'Inactive') {
                        disableBtn.style.backgroundColor = 'grey';
                        disableBtn.disabled = true;
                    }
                </script>



            </tr>
        <?php } ?>
    </table>
    <?php } else { ?>
        <p>No Student found.</p>
    <?php } ?>
</section>
<?php
include_once '../includes/adminfooter.php';
?>