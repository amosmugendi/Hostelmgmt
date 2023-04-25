<?php
$title="View Rooms";
include_once 'db/conn.php';
include_once 'includes/session.php';

if(!isset($_GET['id'])){
    echo "<h1 class='text-danger'>Please check details and try again</h1>";
    
}else{
    $id=$_GET['id'];
    $result = $reports->getRoomDetails($id);;

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
       /* css style of the page */
       .card {
  border: 1px solid #ccc; /* add a border to the card */
  border-radius: 5px; /* round the corners of the card */
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); /* add a shadow to the card */
  margin-bottom: 20px; /* add some space between cards */
  width: 18rem;
}

.card-body {
  padding: 20px; /* add padding to the card body */
}

.card-title {
  font-size: 1.2rem; /* increase the font size of the card title */
  font-weight: bold; /* make the card title bold */
  margin-bottom: 10px; /* add some space below the card title */
}

.card-subtitle {
  font-size: 1rem; /* decrease the font size of the card subtitle */
  margin-bottom: 10px; /* add some space below the card subtitle */
}

.card-text {
  margin-bottom: 5px; /* add some space below the card text */
}
.primary-button {
  background-color: blue;
  color: white;
  border-radius:10px;
  margin-top: 15px;
  cursor: pointer;
}
.warning-button {
  background-color: yellow;
  color: black;
  border-radius:10px;
  margin-top: 15px;
  cursor: pointer;
}

.delete-button {
  background-color: red;
  color: white;
  border-radius:10px;
  margin-top: 15px;
  cursor: pointer;
}
.primary-button,
.warning-button,
.delete-button {
  display: inline-block; /* make the button display inline */
  padding: 2px 5px; /* decrease the padding to make the button smaller */
  text-align: center; /* center the text inside the button */
  vertical-align: middle; /* center the button vertically */
}
a {
  display: inline-block;
  text-align: center;
  text-decoration: none;
 
  padding: 2px 5px;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
}


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
        <!-- create a container to hold the room details-->
        <div class="card" style="width: 18rem">
        <div class="card-body">
            <h5 class="card-title">
                Room Details
            </h5>
            <p class="Card-text">
                RoomID: <?php echo $result['id'];?>
            </p>
            <p class="Card-text">
                Room Type: <?php echo $result['room_type'];?>
            </p>
            <p class="card-text">
                Fees per Sem: <?php echo $result['fee'];?>
            </p>
            <p class="card-text">
                Maximum Occupants: <?php echo $result['max_occupants'];?>
            </p>
            <p class="card-text">
                Room Status: <?php echo $result['status'];?>
            </p>
            
        </div>

    </div>
    <br>
    <td>
         <a href="viewrooms.php?id= <?php echo $result['id']?>" class="primary-button">Back to List</a>
         <a href="edit.php?id= <?php echo $result['id']?>" class="warning-button">Edit</a>
         <a onclick="return confirm('are you sure you want to delete this record?');"href="delete.php?id= <?php echo $r['id']?>" class="delete-button">Delete</a>
</td>
<?php } ?>

        </section>
    </div>
</body>

</html>