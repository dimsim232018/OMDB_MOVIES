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
        if($result->num_rows === 0) 
			//exit('No rows');
		exit( ' <body style="background-color:black"> 
		        <div class="jumbotron" id="wishlist" style=""> 
	                <h3 style="text-align:center;color:white"> My Profile </h5>
               </div>
               <div class="jumbotron" id="wishlist"> 
		           <h4 style="text-align:center; position:relative;color:white">My wishlist is empty!</h3>
		       </div>
			   <div> &nbsp; <br><br><br> </div>
			   </body>');
        
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
        "aLengthMenu": [[10, 25, 50, 100,  -1], [10, 25, 50, 100, "All"]],
        "searching":false,
        "bPaginate":false
       });
   });
  </script>
  <script>
$(document).ready(function(){
 load_data();
 $('#search').change(function(){
   load_data();
 });
});
</script>

<body style="background-color:black"> 

<div class="jumbotron" id="" style=""> 
	<h3 style="text-align:center;color:white"> My Profile </h5>
</div>

	<div class="jumbotron"> 
		<h4 style="text-align:center; position:relative; color:white">My wishlist</h3>
		<br>
		<!--       <div class="table-responsive">  -->
		<select id="search" style="float:right">
  <option>All</option>
  <option>Action</option>
  <option> Adventure</option>
  <option>Fantasy</option>
  <option>Sci-Fi</option>
   <option>Drama</option>
  <option> Romance</option>
  <option>Crime</option>
  <option>Thriller</option>
<option>Animation</option>
<option>Comedy</option>
<option>Adventure</option>
<option>Western</option>
</select>
 <div id="wishlist"></div>		
     
 </div> 

 <div> &nbsp; <br><br><br> </div>

</body>
 
   
