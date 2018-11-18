<?php include 'header.php'; ?>
<?php include 'session.php'; ?>
<?php
// already logged in
	if (isset($uid)){
		header('Location: index.php');
	}  
?>    
   <div class="header">
      <h2>Login</h2>
   </div> 
   <form method="post" action="login.php" class="form">
      <div class="input-group">
         <label>Username</label>
         <input type="text" name="username" placeholder="Enter your username">   
      </div>
     
      <div class="input-group">
         <label>Password</label>
         <input type="text" name="password_1" placeholder="Enter your password">   
      </div>
      
      <div class="input-group">
         <button type="submit" name="login" class="btn btn-primary">Login</button>
      </div>
      <p>
         Not yet a member?<a href="register.php">&nbsp;&nbsp;Sing up</a>
      </p>
    </form> 
       
   
   
   <script src="js/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
   <script src="js/axios.min.js"></script>
   <script src="js/main.js"></script> 
   	  
</body>

</html>
