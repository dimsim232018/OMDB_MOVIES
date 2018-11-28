<?php 

 include 'header.php';
 require_once 'dbconnect.php';
 
 function register($username,$password_1,$password_2,$email){
     global $mysql;
     

   
      $username = mysqli_real_escape_string($mysql,$_POST['username']);
      $email = mysqli_real_escape_string($mysql,$_POST['email']);
      $password_1 = mysqli_real_escape_string($mysql,$_POST['password_1']);
      $password_2 = mysqli_real_escape_string($mysql,$_POST['password_2']);
      
      // ensure that form fields are filled properly
   
      if (empty ($username)){
         array_push($errors,"Username is required."); //add error to errors array
      }
      if (empty ($email)){
         array_push($errors,"Email is required."); //add error to errors array
      }
      if (empty ($password_1)){
         array_push($errors,"Password is required."); //add error to errors array
      }
      if ($password_1 != $password_2){
         array_push($errors,"The two passwords do not match.");      
      
      }
      
 
      // if there are no errors , save user to database

     
         $password = md5($password_1); //encrypt password before storing in database(security)
         $sql = "INSERT INTO user (username,email,password) 
                   VALUES ('$username','$email','$password')";
                   
         mysqli_query($mysql,$sql); 
         return true;
        } 
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$username=$_REQUEST['username'];
		$password_1=$_REQUEST['password_1'];
        $password_2=$_REQUEST['password_2'];
        $email=$_REQUEST['email'];
        $_SESSION['success'] = "You are now logged in";
		if (register($username,$password_1,$password_2,$email)){
			header('Location: index.php');
            }
        }
         
   
      
  
 
 ?>
    <script src="js/jquery-3.3.1.min.js" ></script>

      <script>
		function submitForm(e){
			e.preventDefault();
			$("#registerForm").submit();
		}
	</script>
   <div class="header">
      <h2>Register</h2>
   </div> 
   <form method="post" action="#" class="form" id="registerForm">
   <!-- display validation errors here -->
      <div class="input-group">
         <label>Username</label>
         <input type="text" name="username" placeholder="Enter username">
      </div>
      <div class="input-group">
         <label>Email</label>
         <input type="text" name="email" placeholder="Enter email" value="">
      </div>
      <div class="input-group">
         <label>Password</label>
         <input type="password" name="password_1" placeholder="Enter password">   
      </div>
      <div class="input-group">
         <label>Confirm Password</label>
         <input type="password" name="password_2" placeholder="Confirm password">   
      </div>
      <div class="input-group">
         <button type="submit" name="register" class="btn btn-primary" onclick="submitForm(event)">Register</button>
      </div>
      <p>
         Already a member?<a href="login.php">&nbsp;&nbsp;Sing in</a>
      </p>
    </form> 
    

<script>
var submitButton = $("#registerForm button[type='submit']").attr("disabled", true);
$("#registerForm input").change(function () {
                var valid = true;
                $.each($("#registerForm input"), function (index, value) {
                    if(!$(value).val()){
                        console.log($(this))
                        $(this).addClass('error');
                        valid = false;
                    }
                    else{
                        $(this).removeClass('error');
                    }
                });
                if(valid){
                    $(submitButton).attr("disabled", false);
                } 
                else{
                    $(submitButton).attr("disabled", true);
                }
            });
</script>
 
   
   
   <script src="js/axios.min.js"></script>
   <script src="js/main.js"></script> 
   	  
</body>

</html>
