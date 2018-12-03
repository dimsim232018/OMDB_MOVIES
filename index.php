<?php include'header.php';

?>
  
<script src="js/jquery-3.3.1.min.js" ></script>

<html>
   <body style="background-color:black">
     
         <div class="jumbotron" style="position:relative; top:50px; margin-left:20%; margin-right:20%; background-color:black; color:grey">
            <h3 class="text-center" style="margin-bottom:50px">Αναζήτηση ταινίας</h3>
            <form id="searchForm">
               <input type="text" class="form-control" id="searchText"  placeholder="Please enter a movie title and let the magic happen..." style="text-align:center; border-color:#ffbb33; border-radius:10px; border-width:3px">
            </form>       
         </div>

         <div class="container">
         <div id="movies" class="row">
      </div>
        
   <script src="js/axios.min.js"></script>
   <script src="js/main.js"></script> 

   </body>

</html>
