<?php
require_once 'dbconnect.php';
include 'session.php'; 
      $msg="";
 function register($username,$password_1,$password_2,$email){
     global $mysql;
	 global $msg;
      $username=trim($username);
      $username = mysqli_real_escape_string($mysql,$_POST['username']);
      $username_san = filter_var($username, FILTER_SANITIZE_STRING);
      //$msg.=$username."  ".$username_san;
      if (strcmp($username,$username_san)!=0){
          $msg.= "Invalid username.";
      }
      $email = mysqli_real_escape_string($mysql,$_POST['email']);
      $password_1 = mysqli_real_escape_string($mysql,$_POST['password_1']);
      $password_1_san = filter_var($password_1, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
      if (strcmp($password_1,$password_1_san)!=0){
          $msg.="Invalid password.";
      }
      $password_2 = mysqli_real_escape_string($mysql,$_POST['password_2']);
      $password_2_san = filter_var($password_2, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
      if (strcmp($password_2,$password_2_san)!=0){
          $msg.="Invalid password.";
      }      
      
      // ensure that form fields are filled properly
   
      if (empty ($username)){
         $msg.="Username is required."; //add error to errors array
      }
      if (empty ($email)){
         $msg.="Email is required."; //add error to errors array
      }
      if (empty ($password_1)){
         $msg.="Password is required."; //add error to errors array
      }
      if (strcmp($password_1,$password_2)){
         $msg.="The two passwords do not match.";      
      
      }
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg.="$email is not a valid email address";
     } 
      
      if ($msg!=''){
          return false;
      }
      // if there are no errors , save user to database
	  //must check if password and username exists already
         $password = md5($password_1); //encrypt password before storing in database(security)
	$stmt = $mysql->prepare("INSERT INTO user (username,email,password) 
                   VALUES (?,?,?)");
		
	$stmt->bind_param("sss", $username,$email,$password);
	
	if ($stmt->execute()) {
		$_SESSION["uid"]=$stmt->insert_id;
		$_SESSION["username"]=$username;
		$mysql->close();
		return true;
	} 
	return false;
   
} 
        
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$username=$_REQUEST['username'];
$password_1=$_REQUEST['password_1'];
$password_2=$_REQUEST['password_2'];
$email=$_REQUEST['email'];
$_SESSION['success'] = "You are now logged in";
if (register($username,$password_1,$password_2,$email)){
            echo json_encode(['status'=>'You are now logged in.']);
        }
		else {
			echo json_encode(['error'=>$msg]);
		}
}
         
   

  
 
 ?>
