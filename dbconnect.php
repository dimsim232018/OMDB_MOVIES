<?php
/* mysql
$mysql_host='localhost';
$mysql_username='watchmymovie';
$mysql_password='ait232018';
$mysql_schema='';

$mysql = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_schema);
if ($mysql->connect_errno) {
    throw new Exception("Failed to connect to MySQL: (" . $mysql->connect_errno . ") " . $mysql->connect_error);
}

if(!$mysql->query("SET NAMES 'utf8'")){
	throw new Exception('Could not set NAMES: ' . $mysql->error);
}*/


$servername = "localhost";
$username = "admin";
$password = "ait232018";

// Create connection
$db = mysqli_connect($servername, $username, $password);

// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
?> 
