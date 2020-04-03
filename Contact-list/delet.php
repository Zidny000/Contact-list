<?php
include 'Connect.php';
$db = new Connection();

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query=("DELETE FROM contacts WHERE id=$id;");
	$db->insert($query,null);
	header("location: index.php");
}

?>