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
    
   <div class="header">
      <h2>Login</h2>
   </div> 
      <script src="js/jquery-3.3.1.min.js"</script>
   <script>
		function submitForm(e){
			e.preventDefault();
			$("#loginForm").submit();
		}
	</script>
   <form method="post" action="#" name="login" id="loginForm" class="form">
      <div class="input-group">
         <label>Username</label>
         <input type="text" name="username" placeholder="Enter your username" value="">   
      </div>
     
      <div class="input-group">
         <label>Password</label>
         <input type="password" name="password" placeholder="Enter your password">   
      </div>
      
      <div class="input-group">
         <button type="submit" name="login" class="btn btn-primary" onclick="submitForm(event)">Login</button>
      </div>
      <p>
         Not yet a member?<a href="register.php">&nbsp;&nbsp;Sing up</a>
      </p>
    </form> 
       
   
   
   <script src="js/axios.min.js"></script>
   <script src="js/main.js"></script> 
   	  
</body>

</html>
