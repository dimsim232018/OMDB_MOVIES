<!DOCTYPE html >
<html>

<head>

    <!--meta tags-->
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />

    <!--Bootstrap CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/css.css">

    <title>WatchMyMovie</title>

</head>

<?php include 'session.php'; ?>

<div class="jumbotron" id="header_jumbo">
    <h1 class="display-2 text-warning font-weight-bold" id="primary_title">
        <a class="display-2 text-warning font-weight-bold" href="index.php">WatchMyMovie</a>
    </h1>
   
    <p class="font-weight-bold" id="secondary_title">Powered by the <a href="https://www.omdbapi.com/" target="_blank" style="color:white;text-decoration:underline;font-style:italic;">OMDb API</a></p> 
    <footer class="blockquote-footer font-italic">"Congratulations...", Agent Smith - The Matrix</footer>

</div>

<!--Nav menu-->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">

    <ul class="navbar-nav">
        <li>
            <a class="btn font-weight-bold btn-main" href="index.php" style="margin-right:10px;">MovieSearch</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="about_link" href="about.php">About</a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">                
        <?php if (!isset($username)){?>
            <li>
                <a class="btn font-weight-bold btn-login" href="login.php"><?php echo 'Login';?></a>
            </li>
        <?php }else{?>
            <li>
                <a class="btn font-weight-bold btn-profile" href="profile.php" style="margin-right:10px"><?php echo 'MyProfile';?></a>
                <a class="btn font-weight-bold btn-logout" href="logout.php"><?php echo 'Logout';?></a>
            </li>
        <?php };?>  
            </li>
    </ul>
        
</nav> 

<!--Bootstrap integration script files-->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
