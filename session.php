<?php

$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
} 


	//get session variables
	if (isset($_SESSION['uid'])){
		$uid=$_SESSION['uid'];
	}
	if (isset($_SESSION['username'])){
		$username=$_SESSION['username'];
	}




?>



