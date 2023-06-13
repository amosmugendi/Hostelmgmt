<?php 
    $host='localhost';
    $db='hostel';
    $user='amos';
    $pass='Un_locked1';
    $charset='utf8mb4';

    $dsn= "mysql:host=$host;dbname=$db;charset=$charset";

    try{
        $pdo= new PDO($dsn,$user,$pass);
        $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //echo "Hello Database";
    } catch(PDOException $e){
        echo '<h1 class="text-danger"> NO Database Found</h1>';
        throw new PDOException($e->getMessage());
    }
    require_once 'crud.php';
    require_once 'user.php';
    require_once 'reports.php';
    $crud=new crud($pdo);
    $users=new users($pdo);
    $reports= new reports($pdo);
    $users->insertUser("admin@gmail.com","password","Active");
