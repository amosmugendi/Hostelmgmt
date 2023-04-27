<?php
$title="View Rooms";
//include_once 'db/conn.php';
include_once 'includes/session.php';
include_once 'includes/adminheader.php';

$result = $reports->getFoods();
?>
        <section class="main">
        <table>
                 <tr>
                    <th>Food ID</th>
                    <th>Food</th>
                    <th>Actions</th> 
                    <th>
                        <button class="primary-button"><a href="addfood.php">Add Food</button>
                    </th>                
                 </tr>
                <?php 
                while ($r=$result->fetch(PDO::FETCH_ASSOC)) {?>
                <tr>
                    <td>  <?php echo $r['food_id']?></td>
                    <td> <?php echo $r['food']?></td>
                    <td>
                       <button type="button" class="primary-button"><a href="viewfood.php?id= <?php echo $r['food_id']?>">view</a></button> 
                       <button type="button" class="warning-button"><a href="editfood.php?id= <?php echo $r['food_id']?>" >Edit</a></button>
                       <button type="button" class="delete-button"><a onclick="return confirm('are you sure you want to reset this meal?');"href="deletefood.php?id= <?php echo $r['food_id']?>">Delete</a></button>
                    </td>
                </tr>
            <?php } ?>
        </table>
         </section>
         <?php
         include_once 'includes/adminfooter.php';
         ?>