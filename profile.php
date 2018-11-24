<?php
include 'header.php'; 
require_once 'dbconnect.php';
$uid=1;
global $mysql;

if (!($stmt = $mysql->prepare("select movtitle,genre from movie where userid=?"))) {
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
   <script src="js/jquery-3.3.1.min.js" ></script>
   <script src="js/axios.min.js"></script>
   <script src="js/main.js"></script> 

<br>
 <div class="container">
      <div class="jumbotron">
         <h3 class="text-center">Your wishlist</h3>   
         <div class="table-responsive">  
                     <table id="data-table">  
                          <thead>  
                               <tr>  
                                    <td>Title</td>  
                                    <td>Genre</td>   
                               </tr>  
                          </thead> 
                          <?php while($row = $result->fetch_assoc()) 
                          {
            				$title = $row['movtitle'];
            				$genre = $row['genre'];
            			  ?>
            				<tr>
            				<td><?php echo $title; ?></td>
            				<td><?php echo $genre; ?></td>
            				<td><button class="btn btn-primary" onclick="deletemovie(this)">Delete</button></td>
            				</tr>
        				  <?php } ?> 
                      </table>  
           </div>
                </div>
   </div>
 
   