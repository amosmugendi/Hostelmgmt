
<?php
$title="View students";
//include_once 'db/conn.php';
include_once '../includes/session.php';
include_once '../includes/adminheader.php';

$result = $reports->getStudent();
?>
<head>
<link rel="stylesheet" href="../css/view.css">
</head>
        <section class="main">
        <h1 class="text-center">List of Registered Students</h1>
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
                while ($r=$result->fetch(PDO::FETCH_ASSOC)) {?>
                <tr>
                    <td>  <?php echo $r['reg']?></td>
                    <td> <?php echo $r['fname']?></td>
                    <td> <?php echo $r['lname']?></td>
                    <td> <?php echo $r['email']?></td>
                    <td>
                       <button type="button" class="primary-button small-button" onclick="window.location.href='viewstudent.php?id= <?php echo $r['reg']?>'">view</button> 
                       <button type="button" class="warning-button small-button" onclick="window.location.href='editstudent.php?id= <?php echo $r['reg']?>'">Edit</button>
                    </td>
                </tr>
            <?php } ?>
        </table>
         </section>
         <?php
         include_once '../includes/adminfooter.php';
         ?>