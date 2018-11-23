<?php include 'header.php'; 

?>
   
   <br>
   
      <div class="container">
	     
            <div id="movie" class="well">
               
            </div>
            <p style="font-size:12px;color:green;" id="msg_box"></p>
        
	  </div>	 
   
   
   <script src="js/jquery-3.3.1.min.js" ></script>
   <script src="js/axios.min.js"></script>
   <script src="js/main.js"></script> 
   <script>
   <?php 
   if (isset($uid)){
       $islogged="logged";
   }
   else $islogged="";
   ?>
        var logged='<?php echo $islogged; ?>';
        if (logged){
            param=true;
        }
        else param=false;
      getMovie(param);
   </script>	  
</body>

</html>
