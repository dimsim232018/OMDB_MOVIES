<!DOCTYPE html >
<html>

<head>

    <!--meta tags-->
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />

    <!--Bootstrap CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   
    <title>WatchMyMovie</title>

</head>

    <?php include 'session.php'; ?>

    <div class="jumbotron" style="background-image: url(/webeng3/media/cine2.jpg); background-position:center; background-size:cover; border-radius:0px; margin-bottom: 0px!important">
        <h1 class="display-2 text-warning font-weight-bold" style="text-align:center">WatchMyMovie</h1>  
        <p class="font-weight-bold" style="text-align:center; color:white">Powered by the OMDB API</p> 
        <footer class="blockquote-footer font-italic" style="text-align:right; color:white;">"Congratulations...", Agent Smith</footer>
        <footer class="blockquote-footer font-italic" style="text-align:right; color:white">"Maximum effort!", Mr. Pool</footer>
        <footer class="blockquote-footer font-italic" style="text-align:right; color:white">"Εσύ τι φάση?", Σοφία</footer>
    </div>


    <!--Nav menu-->
    <nav class="navbar bg-dark navbar-dark">

        <div class="dropdown">
                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"></button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="http://www.omdbapi.com/" target="_blank" style="text-align:center">OMDb API</a>
                    <a class="dropdown-item" href="about.php" style="text-align:center">About us</a>
                </div>
        </div>

        <a class="navbar-brand" href="index.php" style="position:relative; left:10px">WatchMyMovie</a>

        <ul class="navbar-nav ml-auto">                
           <?php if (!isset($username)){?>
                    <li class="btn btn-warning font-weight-bold" href="login.php"><?php echo 'Login';?></li>
                <?php }else{?>
                    <li class="btn btn-warning font-weight-bold" href="logout.php"><?php echo 'Logout';?></li>
                    <li class="btn btn-warning font-weight-bold" href="profile.php"><?php echo 'MyProfile';?></li>
                <?php };?>  
            </li>
        </ul>
        
    </nav> 

    <!--Necessary Bootstrap integration script files-->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
