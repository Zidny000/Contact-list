<?php
session_start();
include "connect.php";
$db = new connection();

if(!isset($_SESSION['user_name'])){
    header("location:login.php");
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<link rel="stylesheet" href="style1.css">

<script src="https://kit.fontawesome.com/6fc321b65c.js" crossorigin="anonymous"></script>
</head>
<body>

<div class="box">

    <h1>Creat Your contacts</h1>
    
    <form action="" method="POST">
    
        <label for="name">Name</label>
        <input type="text" name="name" >

        <label for="number">Number</label>
        <input type="text" name="number">
    <div class="button">
        <button type="submit" name="add">ADD</button>
        <button type="submit" name="log-out">Log Out</button>
    </div>
    </form>


</div>

<?php
    if(isset($_POST['log-out'])){
        header("location:logout.php");
    }

?>

<?php

    if(isset($_POST['add'])){
        if(!empty($_POST['name']) && !empty($_POST['number'])){
            $name = $_POST['name'];
            $number = $_POST['number'];
            $id=$_SESSION['user_id'];
            
            $query = "INSERT INTO contacts (ui_name,ui_number,ui_id) VALUES ('$name','$number','$id')";
            $db->insert($query,null);
            header("location:index.php");
        }else{
            $ip="All field must be filled!!";
            
            echo "<h3 style='color:red;'>".$ip. "</h3>";
            
        }
        
    }
       
?>

<table>
        <tr id="tr">
            <td><h3>Name</h3></td>
            <td><h3>Number</h3></td>
        </tr>

        <tr>   </tr>
        <tr>   </tr>
        <tr>   </tr>
<?php  
    $id=$_SESSION['user_id'];
    $query = "SELECT * FROM contacts WHERE ui_id='$id'";
    $result = $db->fetch($query,null);
    foreach($result as $data){           
?>        
        <tr>
            <td><?php echo $data['ui_name']?></td>
            <td><?php echo $data['ui_number']?></td>
            <td><a href="Update.php?id=<?php echo $data['id'];?>"><i class= "far fa-list-alt"></i></a> </td>
            <td><a onclick="return confirm('are you sure?');" href="delet.php?id=<?php echo $data['id']; ?>"><i class="fas fa-trash-alt"></i></a></td> 
        </tr>
<?php                                  
    }       
?>            
        
    </table>
  
    
</body>
</html>