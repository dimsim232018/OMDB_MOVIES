<?php 
      
      include '../session.php'; 
      require_once '../dbconnect.php';

	
	function login($username,$password){
		global $mysql;
		$username = mysqli_real_escape_string($mysql,$username);
                $username_san = filter_var($username, FILTER_SANITIZE_STRING);
		$password = mysqli_real_escape_string($mysql,$password);
                $password_san = filter_var($password, FILTER_SANITIZE_STRING);
		if (strcmp($username,$username_san)!=0){
                     return false;
                }
		if (strcmp($password,$password_san)!=0){
                     return false;
                } 
		//prepare
                 $password = md5($password);
		//if (!($stmt = $mysql->prepare("select id, username from user where username=? and password=?"))) {
		if (!($stmt = $mysql->prepare("select uid, username from admin where username=? and password=?"))) {	
//			 throw new Exception("Prepare failed: (" . $mysql->errno . ") " . $mysql->error);
			 return false;
		}
		// bind params
		if (!$stmt->bind_param("ss", $username, $password)) {
//			throw new Exception("Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error);
			 return false;
		}
		// execute 
		if (!$stmt->execute()) {
			throw new Exception("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
			 return false;
		}
		
		$stmt->store_result();
		
		if ($stmt->num_rows > 0){
			// user found
			$stmt->bind_result($uid, $username);
			$stmt->fetch();
			$stmt->free_result();
			$stmt->close();
			// store session variables
			$_SESSION['uid']=$uid;
			$_SESSION['username']=$username;
			return true;
		}else{
			// user not found
			$stmt->free_result();
			$stmt->close();
			return false;
		}
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$username=$_REQUEST['username'];
		$password=$_REQUEST['password'];
		if (login($username,$password)){
			header('Location: admin_panel.php');
		}
	}
?>
 <!--Bootstrap CDN-->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 <link rel="stylesheet" href="../css/css.css">
    <body style="background-color:black">
        <div class="jumbotron" id="header_jumbo">
          <h1 class="display-2 text-warning font-weight-bold" id="primary_title">
              <a class="display-2 text-warning font-weight-bold" href="../index.php">WatchMyMovie</a>
          </h1> 
          <p class="font-weight-bold" id="secondary_title">Powered by the OMDB API</p> 
          <footer class="blockquote-footer font-italic">"Congratulations...", Agent Smith - The Matrix</footer>

        </div>
        <div class="jumbotron form">
		   <div class="header" id="login_header">
			   <h2>Administrator Login</h2>
           </div>
	       <script src="../js/jquery-3.3.1.min.js"></script>
	
	    <script>
		function submitForm(e){
			e.preventDefault();
			$("#loginForm").submit();
		}
	    </script>

  	    <form method="post" action="#" name="login" id="loginForm" >
		   <br>
           <label>Username: </label>
           <input id="login_box1" type="text" name="username" placeholder="Enter your username" value="">   
		   <br>
		   <label>Password: </label>
           <input id="login_box2" type="password" name="password" placeholder="Enter your password" >   
		   <br>
		   <br>
           <button type="submit" name="login" class="btn btn-success" onclick="submitForm(event)">Login</button>
        </form> 
         
   <script src="../js/axios.min.js"></script>
   <script src="../js/main.js"></script> 
      
	
        </div>  
<br>
   <br>   	  
</body>

</html>
