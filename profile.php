<?php
include 'header.php'; 
require_once 'dbconnect.php';
//$uid=1;
global $mysql;

if (!($stmt = $mysql->prepare("select id,title,genre from movie where user_id=?"))) {
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

<body style="background-color:black"> 

<div class="jumbotron" id="wishlist" style=""> 
	<h3 style="text-align:center;color:white"> My Profile </h5>
</div>

	<div class="jumbotron" id="wishlist"> 
		<h5 style="text-align:right; position:relative; right:60px;color:white">My wishlist</h3>
		<!--       <div class="table-responsive">  -->
          	<table class="table table-dark table-hover bg-dark" id="data-table" style="color:lightgray">  
				<thead>
					<tr class="table-no-border" style="border-radius:15px 15px 0px 0px;font-weight:bold;border-bottom:2px solid;border-color:lightgray">  
                              <td>Title</td>  
						<td>Genre</td>
						<td></td>   
               		</tr>  
				</thead>
                          <?php while($row = $result->fetch_assoc()) 
                          {
            				$title = $row['title'];
            				$genre = $row['genre'];
            				$movid = $row['id'];
            			  ?>
            			<tr>
            				<td style="align-text:center"><?php echo $title; ?></td>
            				<td style="align-txt:center"><?php echo $genre; ?></td>
            				<td><button class="btn btn-info" onclick="deletemovie(this)">Delete</button></td>
            			</tr>
					   
					<?php } ?> 
               </table>  
     <!--     </div>  -->
 </div> 

</body>
 
   
