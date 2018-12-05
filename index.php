<?php include'header.php';

$url=$_SERVER['QUERY_STRING'];
//$param=parse_url($url, PHP_URL_QUERY);
//echo json_encode(['url'=>$param]);
?>
  
<script src="js/jquery-3.3.1.min.js" ></script>

<html>
   <body style="background-color:black">
      <div id="welcome" style="color:#fff;"><?php if (strcmp($url,'origin=register')==0) {echo "You are now logged in!"; } else if (strcmp($url,'origin=logout')==0) {echo "You are now logged out!"; } ?></div>
         <div class="jumbotron form">
            <h3 class="text-center" style="margin-bottom:50px">Αναζήτηση ταινίας</h3>
            <form id="searchForm">
               <input type="text" class="form-control" id="searchText"  placeholder="Please enter a movie title and let the magic happen...">
            </form>       
         </div>

         <div class="container">
         <div id="movies" class="row">
      </div>
	  </div>
   <script>
   setTimeout(fade_out, 5000);

	function fade_out() {
		$("#welcome").fadeOut().empty();
	}
   </script>
   <script src="js/axios.min.js"></script>
   <script src="js/main.js"></script> 

   </body>

</html>
