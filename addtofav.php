<?php
  include 'session.php'; 
 require_once 'dbconnect.php';

 global $mysql;

$movid=$_REQUEST['imdbID'];
$genre=$_REQUEST['genre'];
$title=$_REQUEST['title'];


//must check if movie already exists in database

$sql = "INSERT INTO movie VALUES ($uid,'$movid','$title','$genre')";

if ($mysql->query($sql) === TRUE) {
    echo json_encode(['res'=>'New record created successfully']);
} else {
    echo json_encode(['res'=>'Error' . $sql . "<br>" . $mysql->error]);
}



?>
