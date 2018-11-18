<!DOCTYPE html >
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>WatchMyMovie</title>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/css.css">

</head>

<body>
<?php include 'session.php'; ?>
   <nav class="navbar navbar-default">
       <div class="container">
          <div class="navbar-header">
             <a class="nav-brand" href="index.php">WatchMyMovie</a>
             <?php if (!isset($uname)){?>
             <a class="nav-brand" href="login.php"><?php echo 'Login';?></a>
             <?php }else{?>
             <a class="nav-brand" href="logout.php"><?php echo 'Logout';?></a>
             <?php };?>
		  </div>
       </div>    
   </nav> 