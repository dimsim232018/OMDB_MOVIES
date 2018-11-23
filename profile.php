<?php
include 'header.php'; 
require_once 'dbconnect.php';
?>

<?php 
global $mysql;

if (!($stmt = $mysql->prepare("select title from movie where user_id=?"))) {
//			 throw new Exception("Prepare failed: (" . $mysql->errno . ") " . $mysql->error);
			 return false;
		}
		// bind params
		if (!$stmt->bind_param("i", $uid)) {
//			throw new Exception("Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error);
			 return false;
		}
		// execute 
		if (!$stmt->execute()) {
			throw new Exception("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
			 return false;
		}
		
		$result = $stmt->get_result();
        if($result->num_rows === 0) exit('No rows');
        
?>

<br>
 <div class="container">
      <div class="jumbotron">
         <h3 class="text-center">Your wishlist</h3>   
         <?php while($row = $result->fetch_assoc()) {
            $title = $row['title'];?>
            <p><?php echo $title; ?></p>
         <?php } ?>
      </div>
   </div>