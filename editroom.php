<?php
$title = "Edit Room";
include_once 'db/conn.php';
include_once 'includes/session.php';

if (!isset($_GET['id'])) {
    //error messages 
    include 'includes/errormessage.php';
    header("Location: viewrooms.php ");
} else {
    $id = $_GET['id'];
    $rooms = $reports->getRoomDetails($id);
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
            /*css for this page*/
            /* Center the heading */
h1.text-center {
  text-align: center;
}

/* Style the form */
form {
  max-width: 600px;
  margin: 0 auto;
}

/* Style the form group */
.form-group {
  margin-bottom: 1rem;
}

/* Style the label */
.form-label {
  display: inline-block;
  margin-bottom: 0.5rem;
}

/* Style the input */
.form-control {
  display: block;
  width: 100%;
  height: calc(1.5em + 0.75rem + 2px);
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1.5;
  color: #495057;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  border-radius: 0.25rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

/* Style the select */
select.form-control {
  height: auto;
}

/* Style the button */
.btn {
  display: inline-block;
  font-weight: 400;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  user-select: none;
  border: 1px solid transparent;
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  line-height: 1.5;
  border-radius: 0.25rem;
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out,
    border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  color: #fff;
  background-color: #007bff;
  border-color: #007bff;
}

.btn:hover {
  color: #fff;
  background-color: #0069d9;
  border-color: #0062cc;
}

.btn:focus {
  box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
}

.btn:active {
  color: #fff;
  background-color: #0062cc;
  border-color: #005cbf;
}

.btn:disabled {
  color: #fff;
  background-color: #6c757d;
  border-color: #6c757d;
  cursor: not-allowed;
}

.btn:not(:disabled):not(.disabled) {
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
        <h1 class="text-center">Edit Room Details</h1>

        <form method="post" action="roomedit.php">
            <input type="hidden" name="id" value="<?php echo $rooms['id'] ?>" />
            <div class="form-group">
            <label for="status">Status</label>
            <select id="room_type" name="room_type" value="<?php echo $rooms['room_type'] ?>" required>
                <option value="<?php echo $rooms['room_type'] ?>">Select Room Category</option>
                <option value="single">Single</option>
                <option value="Shared">Shared</option>
            </select><br>
            </div>
            <div class="form-group">
                <label for="fee" class="form-label">Fees</label>
                <input type="text" class="form-control" value="<?php echo $rooms['fee'] ?>" id="fee" name="fee">
            </div>
            <div class="form-group">
                <label for="max_occupants" class="form-label">Maximum Occupants</label>
                <input type="text" class="form-control" value="<?php echo $rooms['max_occupants'] ?>" id="max_occupants" name="max_occupants">
            </div>
             <div class="form-group">
                <label for="status" class="form-label">Status</label>
                <input type="text" class="form-control" value="<?php echo $rooms['status'] ?>" " id=" status" aria-describedby="emailHelp" name="email">
                </div>

                <button type="submit " name="save" class="btn">save changes</button>
                <a onclick="return confirm('are you sure you want to cancel?')"; href="viewrooms.php"> Cancel</a>
        </form>
        <?php  } ?>
        </section>
    </div>
</body>

</html>
