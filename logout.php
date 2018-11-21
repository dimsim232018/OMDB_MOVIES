<?PHP

if (isset($username)){
      session_destroy();
      unset($_SESSION['username']);
      header('location:login.php');
}
?>