<?php
// mysql
$mysql_host='localhost';
$mysql_username='root';
$mysql_password='sofia!@#';
$mysql_schema='webeng3';


$mysql = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_schema);
if ($mysql->connect_errno) {
    throw new Exception("Failed to connect to MySQL: (" . $mysql->connect_errno . ") " . $mysql->connect_error);
}

if(!$mysql->query("SET NAMES 'utf8'")){
	throw new Exception('Could not set NAMES: ' . $mysql->error);
}

?>
