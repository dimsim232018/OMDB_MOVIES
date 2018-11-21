<?php include 'server.php';
      include 'header.php'; 
      // already logged in
	  if (isset($uid)){
		header('Location: index.php');
	  } 
	  else{
	  $uid=1;
	  } 

$userid = $uid;
$movid=$_POST['movid'];
$genre=$_POST['gen'];
$title=$_POST['title'];


$sql = "INSERT INTO favmov VALUES ($userid,'$movid','$title','$genre')";

if ($db->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

$db->close();

?>
