<?php

include_once 'db/conn.php';
include_once 'includes/session.php';
include_once 'includes/adminheader.php';

$result = $reports->activeFoodBookings();
?>


<section class="main">
    <h1>List of All the Meals Booked</h1>
    <?php
    echo "<table>";
    echo "<tr>
                    <th>Booking ID</th>
                    <th>Food Id</th>
                    <th>Student ID</th>
                    <th>Booking Date</th>                   
                </tr>";
    if (count($result) > 0) {
        foreach ($result as $row) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["food_id"] . "</td>
                    <td>" . $row["reg"] . "</td>
                    <td>" . $row["date"] . "</td> 
                </tr>";
        }
    } else {
        echo "<tr>
                    <td colspan='4'>No bookings found.</td>
                </tr>";
    }
    echo "</table>";
    ?>


</section>
<?php
include_once 'includes/adminfooter.php';
?>