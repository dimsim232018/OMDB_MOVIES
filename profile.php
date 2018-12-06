<?php
include 'header.php'; 
include 'session.php';
require_once 'dbconnect.php';

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
   <script src="js/bootstrap.min.js" type="text/javascript"></script>

<!-- DATA TABES SCRIPT -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript" >
   $(function() {
    $("#data-table").dataTable({
        "iDisplayLength": 10,
        "aLengthMenu": [[10, 25, 50, 100,  -1], [10, 25, 50, 100, "All"]]
       });
   });
  </script>
  

<body style="background-color:black"> 

<div class="jumbotron" id="wishlist" style=""> 
	<h3 style="text-align:center;color:white"> My Profile </h5>
</div>

	<div class="jumbotron" id="wishlist"> 
		<h4 style="text-align:center; position:relative;color:white">My wishlist</h3>
		<br>
		<!--       <div class="table-responsive">  -->
          	<table class="table bg-dark" id="data-table" style="color:black">  
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
            				<td><button class="btn btn-profile" id="button_delete" onclick="deletemovie(this)">Delete</button></td>
            			</tr>
					   
					<?php } ?> 
               </table>  
     <!--     </div>  -->
 </div> 

</body>
 
   
