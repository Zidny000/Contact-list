<?php
    session_start();
    include "connect.php";
    $db = new connection();

     if(isset($_SESSION['user_name'])){
         header("location:index.php");
     }    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>

    <div class="box">
    <h1>Contact List</h1>
    <form action="" method="POST">
    <label for="user_name">Nmae</label>
    <input type="text" name="user_name" palceholder="Name">
    <label for="password">Password</label>
    <input type="password" name="password" palceholder="Password"><br>
    <div class="button">
    <button type="submit" name="log-in"  >Login</button>
    
    <button type="submit" id="sign" name="sign-up" onclick="addInput()" >Sign Up</button> 
    </div>
    </form>
    </div>


    <?php

if(isset($_POST['log-in'])){
    $user = $_POST['user_name'];
    $pass = md5($_POST['password']);
    $query = "SELECT * FROM users WHERE user_name='$user' AND password='$pass'";
    $result = $db->fetch($query,null);
    
    if(count($result)==1){
     
     foreach($result as $data){
         $_SESSION['user_id']=$data['id'];
         $_SESSION['user_name'] = $data['user_name'];
     }

     header("Location:index.php");
     exit();
     }else {
        $ip="Wrong Password or Name!!";
            
        echo "<h3 style='color:red;'>".$ip. "</h3>";
     
    }

}   
    ?>


    <?php
        if(isset($_POST['sign-up'])){
            header("location:signup.php");
        }
    
    ?>


</body>
</html>