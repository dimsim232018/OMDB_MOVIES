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

 <br>     
 <div class="container">
             <table>                
                <tr>
                   <td><a class="btn btn-primary" href="index.php">WatchMyMovie</a></td> 
                   <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                   <td>
                    <?php if (!isset($username)){?>
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