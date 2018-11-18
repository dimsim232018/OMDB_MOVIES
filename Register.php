<?php include 'header.php';?>
      
   <div class="header">
      <h2>Register</h2>
   </div> 
   <form method="post" action="register.php" class="form">
      <div class="input-group">
         <label>Username</label>
         <input type="text" name="username" placeholder="Enter username">
      </div>
      <div class="input-group">
         <label>Email</label>
         <input type="text" name="email" placeholder="Enter email">
      </div>
      <div class="input-group">
         <label>Password</label>
         <input type="text" name="password_1" placeholder="Enter password">   
      </div>
      <div class="input-group">
         <label>Confirm Password</label>
         <input type="text" name="password_2" placeholder="Confirm password">   
      </div>
      <div class="input-group">
         <button type="submit" name="register" class="btn btn-primary">Register</button>
      </div>
      <p>
         Already a member?<a href="login.php">&nbsp;&nbsp;Sing in</a>
      </p>
    </form> 
    


 
   
   
   <script src="js/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
   <script src="js/axios.min.js"></script>
   <script src="js/main.js"></script> 
   	  
</body>

</html>
