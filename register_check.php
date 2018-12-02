<?php
require_once 'dbconnect.php';
include 'session.php'; 
 function register($username,$password_1,$password_2,$email){
     global $mysql;

      $msg="";
      $username = mysqli_real_escape_string($mysql,$_POST['username']);
      $email = mysqli_real_escape_string($mysql,$_POST['email']);
      $password_1 = mysqli_real_escape_string($mysql,$_POST['password_1']);
      $password_2 = mysqli_real_escape_string($mysql,$_POST['password_2']);
      
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
          echo json_encode(['error'=>$msg]);
          return false;
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
        if (fetchUserId($username)){
            echo json_encode(['status'=>'You are now logged in.']);
        }
    }
}
         
   
 function fetchUserId($username)  {
     global $mysql;
     if (!($stmt = $mysql->prepare("select id from user where username=?"))) {
//			 throw new Exception("Prepare failed: (" . $mysql->errno . ") " . $mysql->error);
			 return false;
		}
		// bind params
		if (!$stmt->bind_param("s", $username)) {
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
			$stmt->bind_result($uname);
			$result = $stmt->get_result();
            #$res_uid=$result->fetch_assoc();
            $uid=$result['id'];
			$stmt->free_result();
			$stmt->close();
			// store session variables
			$_SESSION["uid"]=$uid;
			$_SESSION["username"]=$username;
            //header('Location: index.php');
			return true;
        }
 }
  
 
 ?>