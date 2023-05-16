<?php
$title = "View Rooms";
include_once '../db/conn.php';
include_once '../includes/session.php';
include_once '../includes/adminheader.php';

$result = $reports->getRooms();
?>

<head>
    <link rel="stylesheet" href="../css/view.css">
    <link rel="stylesheet" href="../css/search.css">
</head>
<section class="main">
    <h1>List of Rooms</h1>
    <form action="../controllers/searchroom.php" method="post" class="search-container">
        <input class="form-control" type="search" placeholder="Search by RoomID" aria-label="Search" name="search" require>
        <button class="primary-button small-button" type="submit"  name="submit">Search</button><br>
    </form>
    <table>
        <tr>
            <th>Room ID</th>
            <th>Room Type</th>
            <th>Status</th>
            <th>Actions</th>
            <th>
                <button class="primary-button small-button" onclick="window.location.href='addroom.php'">Add Room</button>
            </th>
        </tr>
        <?php
        while ($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td> <?php echo $r['id'] ?></td>
                <td> <?php echo $r['room_type'] ?></td>
                <td> <?php echo $r['status'] ?></td>
                <td>
                    <button class="primary-button small-button" onclick="window.location.href='viewroom.php?id= <?php echo $r['id'] ?>'">view</button>
                    <button class="warning-button small-button" onclick="window.location.href='editroom.php?id= <?php echo $r['id'] ?>'">Edit</button>
                    <button class="delete-button small-button" name="submit" onclick="return confirm('are you sure you want to reset this room?'); window.location.href='delete.php?id= <?php echo $r['id'] ?>'">Reset</button>
                </td>
            </tr>
        <?php } ?>
    </table>
</section>
<?php
include_once '../includes/adminfooter.php';
?>