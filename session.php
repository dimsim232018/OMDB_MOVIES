<?php
	session_start();

	//get session variables
	if (isset($_SESSION['uid'])){
		$uid=$_SESSION['uid'];
	}
	if (isset($_SESSION['uname'])){
		$uname=$_SESSION['uname'];
	}
	
?>
