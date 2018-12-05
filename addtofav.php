<?php
  include 'session.php'; 
 require_once 'dbconnect.php';

 global $mysql;

$movid=$_REQUEST['imdbID'];
$genre=$_REQUEST['genre'];
$title=$_REQUEST['title'];
//$uid=1;
//check if movie already exists in database
//it produces error when movie exists in table. must be fixed
if (!($stmt = $mysql->prepare("select id from movie where user_id=? AND id=?"))) {
//			 throw new Exception("Prepare failed: (" . $mysql->errno . ") " . $mysql->error);
			 return false;
		}
		// bind params
		if (!$stmt->bind_param("is", $uid,$movid)) {
//			throw new Exception("Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error);
			 return false;
		}
		// execute 
		if (!$stmt->execute()) {
			throw new Exception("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
			 return false;
		}
		
		$result = $stmt->get_result();
        if($result->num_rows === 0) {
        	$sql = "INSERT INTO movie VALUES ($uid,'$movid','$title','$genre')";
			if ($mysql->query($sql) === TRUE) {
    			echo json_encode(['res'=>'New record created successfully']);
			} else {
    			echo json_encode(['res'=>'Error' . $sql . "<br>" . $mysql->error]);
			}

        }else if($result->num_rows > 0){
				echo "Already liked";        
           }

?>
