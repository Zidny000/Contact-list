<?php
    include "connect.php";
    $db=new connection();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
<?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $query="SELECT * FROM contacts WHERE id = '$id'";
        $result=$db->fetch($query,null);

    }

?>

<?php

    foreach($result as $data){

?>
    <div class="box">

    <h1>Update</h1>
    <form action="" method="POST">

        <label for="name">Name</label><br>
        <input type="text" name="name" value="<?php echo $data['ui_name']?>">
        <label for="number">Number</label><br>
        <input type="text" name="number" value="<?php echo $data['ui_number']?>">
        <button type="submit" name="done">Done</button>


    </form>

    </div>

<?php
    }
?>    

<?php 

if(isset($_POST['done'])){
    if(!empty($_POST['name']) && !empty($_POST['number'])){
        $name = $_POST['name'];
        $number = $_POST['number'];
        echo $name;
        $query = "UPDATE contacts SET ui_name='$name' , ui_number='$number' WHERE id=$id;";
        $db->insert($query,null);
        header("location:index.php");
    }else{
        $ip="All field must be filled!!";
            
        echo "<h3 style='color:red;'>".$ip. "</h3>";
    }
}

?>

 
</body>
</html>

