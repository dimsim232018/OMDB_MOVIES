<?php 
      include 'header.php'; 
      require_once 'dbconnect.php';
// already logged in
	if (isset($uid)){
		header('Location: index.php');
	}
	
	function login($username,$password){
		global $mysql;
		//prepare
        $password = md5($password);
		if (!($stmt = $mysql->prepare("select id, username from user where username=? and password=?"))) {
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
			$stmt->bind_result($uid, $uname);
			$stmt->fetch();
			$stmt->free_result();
			$stmt->close();
			// store session variables
			$_SESSION["uid"]=$uid;
			$_SESSION["username"]=$uname;
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
			header('Location: index.php');
		}
	}
?>
  <body style="background-color:black">
	
  <div class="jumbotron form">
		<div class="header" id="login_header">
			<h2>Login</h2>
		</div>
	
	
	<script src="js/jquery-3.3.1.min.js"></script>
	
	<script>
		function submitForm(e){
			e.preventDefault();
			$("#loginForm").submit();
		}
	</script>

  	<form method="post" action="#" name="login" id="loginForm" class="form">
		<br>
        <label>Username: </label>
        <input id="login_box1" type="text" name="username" placeholder="Enter your username" value="">   
		<br>
		<label>Password: </label>
        <input id="login_box2" type="password" name="password" placeholder="Enter your password" >   
		<br>
		<br>
        <button type="submit" name="login" class="btn btn-success" onclick="submitForm(event)">Login</button>
     
      <footer class="footer" id="login_footer">
			<p>
				Not a member yet...?&nbsp;&nbsp;<a href="register.php">Sign up</a> now!
			</p>
		</footer>
	 </form> 
   
   <script src="js/axios.min.js"></script>
	<script src="js/main.js"></script> 	
	
</div>    	  
</body>

</html>
