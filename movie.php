<?php include 'server.php';
      include 'header.php'; 
      // already logged in
	  if (isset($uid)){
		header('Location: index.php');
	  } 
	  else{
	  $uid=1;
	  } 
?> 


   <br>
   
      <div class="container">
	     
            <div id="movie" class="well">
               
            </div>
        
	  </div>	 
   
   
   <script src="js/jquery-3.3.1.min.js" ></script>
   <script src="js/axios.min.js"></script>
   <script src="main.js"></script>
      <script>
      getMovie();
   </script>
  

</body>

</html>
