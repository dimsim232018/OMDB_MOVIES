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
<<<<<<< HEAD
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
=======
<br>
      
 <div class="container">
             <table>                
                <tr>
                   <td><a class="btn btn-primary" href="index.php">WatchMyMovie</a></td> 
                   <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                   <td>
                    <?php if (!isset($uname)){?>
                        <a class="btn btn-primary" href="login.php"><?php echo 'Login';?></a>
                    <?php }else{?>
                        <a class="btn btn-primary" href="logout.php"><?php echo 'Logout';?></a>
                    <?php };?>  
                   </td>
                </tr>
            </table>
                         
          </div>   
     </nav>	
   </div>
>>>>>>> 29278d95f539e0d023cce2cc9911d122288ac441
