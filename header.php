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
    <a href="index.php">
        <h1 class="display-2 text-warning font-weight-bold" id="primary_title">WatchMyMovie</h1>
    </a>  
    
    <p class="font-weight-bold" id="secondary_title">Powered by the OMDB API</p> 
    <footer class="blockquote-footer font-italic">"Congratulations...", Agent Smith - The Matrix</footer>

</div>

<!--Nav menu-->
<nav class="navbar bg-dark navbar-dark">
    <div class="dropdown">
        <button type="button" class="btn btn-warning dropdown-toggle" id="main_dropdown_button" data-toggle="dropdown">Menu</button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="index.php">Movie Search</a>
                <div class="dropdown-divider"></div> 
                <a class="dropdown-item" href="http://www.omdbapi.com/" target="_blank">OMDb API</a>
                <a class="dropdown-item" href="about.php">About us</a>
            </div>
    </div>

    <ul class="navbar-nav ml-auto">                
        <?php if (!isset($username)){?>
            <li>
                <a class="btn btn-success font-weight-bold" href="login.php"><?php echo 'Login';?></a>
            </li>
        <?php }else{?>
            <li>
                <a class="btn btn-info font-weight-bold" href="profile.php"><?php echo 'MyProfile';?></a>
                <a class="btn btn-info font-weight-bold" href="logout.php"><?php echo 'Logout';?></a>
            </li>
        <?php };?>  
            </li>
    </ul>
        
</nav> 

<!--Bootstrap integration script files-->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
