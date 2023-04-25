<?php
$title="View Rooms";
include_once 'db/conn.php';
include_once 'includes/session.php';

$result = $reports->getRooms();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Management Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="css/dashboards.css">
    <script src="../js/script.js"></script>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #f9f9f9;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }
        td .a{
            padding: 0%;
        }
        tr td:last-child {
        display: flex;
        justify-content: center;
        gap: 10px;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

button {
  border: none;
  color: white;
  padding: 5px 2px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  border-radius: 10px;
  font-size: 16px;
  margin-top: 15px;
  margin: 4px 2px;
  cursor: pointer;
}

.warning-button {background-color:yellow;} /* yellow */
.delete-button {background-color: red;} /* Red */ 
.primary-button {background-color: blue} /* Gray */ 
.success-button{background-color: darkgray} /* Black */
</style>
</head>

<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="#" class="logo">
                        <img SRC="" alt="">
                        <br>
                        <span class="nav-item">Admin DashBoard</span>
                    </a></li>
                <li><a href="#">
                        <i class="fas fa-home"></i>
                        <span class="nav-item">Home</span>
                    </a></li>
                <li><a href="#">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Users Profile</span>
                    </a></li>
                <li><a href="#">
                        <i class="fas fa-chess-rook"></i>
                        <span class="nav-item">View Room Booked</span>
                    </a></li>
                <li><a href="">
                        <i class="fas fa-bed"></i>
                        <span class="nav-item">Update Room Details</span>
                    </a></li>
                <li><a href="">
                        <i class="fas fa-utensils"></i>
                        <span class="nav-item">Update Food Menu</span>
                    </a></li>
                <li><a href="logout.php" class="logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="nav-item">Logout </span>
                    </a></li>
            </ul>
        </nav>
        <section class="main">
        <table>
                 <tr>
                    <th>Room ID</th>
                    <th>Room Type</th>
                    <th>Status</th>
                    <th>Actions</th> 
                    <th>
                        <button class="primary-button"><a href="addroom.php">Add Room</button>
                    </th>                
                 </tr>
                <?php 
                while ($r=$result->fetch(PDO::FETCH_ASSOC)) {?>
                <tr>
                    <td>  <?php echo $r['id']?></td>
                    <td> <?php echo $r['room_type']?></td>
                    <td> <?php echo $r['status']?></td>
                    <td>
                       <button type="button" class="primary-button"><a href="viewroom.php?id= <?php echo $r['id']?>">view</a></button> 
                       <button type="button" class="warning-button"><a href="edit.php?id= <?php echo $r['id']?>" >Edit</a></button>
                       <button type="button" class="delete-button"><a onclick="return confirm('are you sure you want to reset this room?');"href="delete.php?id= <?php echo $r['id']?>">Reset</a></button>
                    </td>
                </tr>
            <?php } ?>
        </table>
         </section>
    </div>
</body>

</html>