
<?php
$title="View students";
include_once '../db/conn.php';
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
                 </tr>
                <?php 
                while ($r=$result->fetch(PDO::FETCH_ASSOC)) {?>
                <tr>
                    <td>  <?php echo $r['reg']?></td>
                    <td> <?php echo $r['fname']?></td>
                    <td> <?php echo $r['lname']?></td>
                    <td> <?php echo $r['email']?></td>
                </tr>
            <?php } ?>
        </table>
         </section>
         <?php
         include_once '../includes/adminheader.php';
         ?>