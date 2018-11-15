<!DOCTYPE html >
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Register</title>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/css.css">

</head>

<body>
      
   <div class="header">
      <h2>Register</h2>
   </div> 
   <form method="post" action="register.php">
      <div class="input-group">
         <label>Username</label>
         <input type="text" name="username">   
      </div>
      <div class="input-group">
         <label>Email</label>
         <input type="text" name="email">   
      </div>
      <div class="input-group">
         <label>Password</label>
         <input type="text" name="password_1">   
      </div>
      <div class="input-group">
         <label>Confirm Password</label>
         <input type="text" name="password_2">   
      </div>
      <div class="input-group">
         <button type="submit" name="register" class="btn btn-primary">Register</button>
      </div>
      <p>
         Already a member?<a href="Login.php">&nbsp;&nbsp;Sing in</a>
      </p>
    </form> 
    


<!-- 
 
    <form>  
      <fieldset>
      <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" type="email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input class="form-control" id="exampleInputPassword1" placeholder="Password" type="password">
    </div>       </fieldset>
     </form>  
   
      
    -->   
  
    
   
   
   <script src="js/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
   <script src="js/axios.min.js"></script>
   <script src="js/main.js"></script> 
   	  
</body>

</html>
