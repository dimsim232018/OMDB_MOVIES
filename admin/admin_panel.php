<?php 
      
      include '../session.php'; 
      require_once '../dbconnect.php';
	  global $mysql;
?>
<!DOCTYPE html >
<html>

<head>

    <!--meta tags-->
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />

    <!--Bootstrap CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/css.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
	<script src="../js/jquery-3.3.1.min.js" ></script>
    <script src="../js/axios.min.js"></script>
    <script src="../js/main.js"></script> 
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>	
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
	<script>
        function checkIfOk(){  				
			   cb = document.getElementsByTagName("input");
			   for (i=0; i<cb.length; i++){
				   if (cb[i].type != 'checkbox'){ //και το submit input είναι...
					   continue;
				   }
				   if (cb[i].checked){
					 return true; 
					 
				   }				  				   				   
			   }			   
			   alert("Everything is unchecked!");
			   return false;
			}					
	</script>

    <title>WatchMyMovie Panel</title>

</head>

 <!--Bootstrap CDN-->
    <body style="background-color:black">
        <div class="jumbotron" id="header_jumbo">
          <h1 class="display-2 text-warning font-weight-bold" id="primary_title">
		     WatchMyMovie Panel
             <!--<a class="display-2 text-warning font-weight-bold" href="../index.php">WatchMyMovie Panel</a>-->
          </h1> 
          <p class="font-weight-bold" id="secondary_title">Powered by the OMDB API</p> 
          <footer class="blockquote-footer font-italic">"Congratulations...", Agent Smith - The Matrix</footer>

        </div>
		<!--Nav menu-->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">

  

    <ul class="navbar-nav ml-auto">                
        <?php if (!isset($username)){?>
            <li>
                <a class="btn font-weight-bold btn-login" href="admin_login.php"><?php echo 'Login';?></a>
            </li>
        <?php }else{?>
            <li>
                
                <a class="btn font-weight-bold btn-logout" href="../logout.php"><?php echo 'Logout';?></a>
            </li>
        <?php };?>  
            </li>
    </ul>
        
</nav> 
        
		<div class="jumbotron" id="wishlist"> 
		<h4 style="text-align:center; position:relative; color:white">Users of WatchMyMovie</h3>
		<br>		
        <form name='frm' action='admin_panel.php' method='POST' onsubmit='return checkIfOk()' class='form'>
		<?php 				 
                
	         
	         mysqli_set_charset($mysql,"utf8");				 	                                            
             
             
             if (isset($_POST['emails'])){
				$emails =  $_POST['emails'];
				
				$sqlcommand = "DELETE FROM user WHERE email = '".$emails[0]."'"; //ο πρώτος...
			
				for ($i=1; $i<count($emails); $i++) { // οι επόμενοι
					$sqlcommand = $sqlcommand." OR email = '".$emails[$i]."'";
			
				}
			
				$mysql->query($sqlcommand);				
			 }
			 
			 $admin='admin';	
			 $sqlcommand = "SELECT id,username,password,email from user WHERE username<>'".$admin."'order by username";              
             $result = $mysql->query($sqlcommand); 				
             
			 echo "<table class='table bg-dark' id='data-table' style='color:black'> "; 
			 echo"	       <thead>";
			 echo"		      <tr class='table-no-border' style='border-radius:15px 15px 0px 0px;font-weight:bold;border-bottom:2px solid;border-color:lightgray'> "; 
             echo"               <td>Username</td>  ";
			 
			 echo"			     <td>Email</td>";
			 echo"			     <td>Διαγραφή</td>";
             echo"  		     </tr>  ";
			 echo"	      </thead>";
             
			 while ($row = $result->fetch_assoc()){				 
				echo "<tr class='table-no-border' style='border-radius:15px 15px 0px 0px;font-weight:bold;border-bottom:2px solid;border-color:lightgray'>";
				echo "<td>".$row['username']."</td>";
				
				echo "<td><a href='mailto:".$row['email']."'>".$row['email']."</a></td>";
				echo "<td align='center'><input type='checkbox' name='emails[]' value='".$row['email']."'</td>";
				echo "</tr>";				
			 }
			 echo "<tr class='table-no-border' style='border-radius:15px 15px 0px 0px;font-weight:bold;border-bottom:2px solid;border-color:lightgray'><td colspan=3 align='center'><input name='sub' type=submit value='Διαγραφή'/></td></tr>";
			 echo "</table>";
		
			 $mysql->close(); 	             	                                                        
        ?> 	
        
    </form>	
    </div> 
 	 
<br>
   <br>   	  
</body>
</html>
