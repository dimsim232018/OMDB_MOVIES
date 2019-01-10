<?php
  include 'session.php'; 
 require_once 'dbconnect.php';

 global $mysql;


$title=$_REQUEST['title'];

//must check if movie already exists in database

$sql = "DELETE FROM movie where user_id = $uid AND title = '$title'";

if ($mysql->query($sql) === TRUE) {
    echo json_encode(['res'=>'Successfully deleted']);
 
} else {
    echo json_encode(['res'=>'Error' . $sql . "<br>" . $mysql->error]);
}



?>
