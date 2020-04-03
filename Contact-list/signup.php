<?php

    include "connect.php";
    $db = new connection();
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- <script src="app.js" defer></script> -->
</head>
<body>

    <div class="box">
    <h1>Welcome</h1>
    <form action="" method="POST">
    <label for="user_name">Nmae</label>
    <input type="text" name="user_name">
    <label for="email">Email</label>
    <input type="email" name="email" >
    <label for="password">Password</label>
    <input type="password" name="password" >
    <label for="confirm-pass">Confirm Password</label>
    <input type="password" name="confirm-pass"><br>
    <div class="button">
    
    
    <button type="submit"  name="sign" onclick="addInput()" >Sign Up</button> 
    </div>





    <?php
    
        if(isset($_POST['sign'])){

            if(!empty($_POST['user_name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm-pass'])){
                if($_POST['password']==$_POST['confirm-pass']){
                     $query="INSERT INTO users (user_name,user_email,password) VALUES (:user_name,:user_email,:password)";

                     $array=array(
                         ':user_name'=>$_POST['user_name'],                       
                         ':user_email'=>$_POST['email'],
                        ':password'=>md5($_POST['password']));
                    $db->insert($query,$array);
                    
                    header("location:login.php");
                }else{
                    $ip="Password did not match!!";
            
                    echo "<h3 style='color:red;'>".$ip. "</h3>";
                }
            }else{
                $ip="All field must be filled!!";
            
                echo "<h3 style='color:red;'>".$ip. "</h3>";
            }
        }
    
    ?>



    
    </form>
    </div>
