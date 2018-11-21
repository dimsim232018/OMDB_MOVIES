<?php
  include 'session.php'; 
 require_once 'dbconnect.php';

 global $mysql;
//$userid = $uid;
$movid=$_POST['movid'];
$genre=$_POST['gen'];
$title=$_POST['title'];


$sql = "INSERT INTO movie VALUES ($uid,'$movid','$title','$genre')";

if ($mysql->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $mysql->error;
}



?>
