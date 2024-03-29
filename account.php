<?php
  require_once "functions.php";

  redirectLoggedOutUser('login.php');
?>
 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Your Account</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
      body{ font: 14px sans-serif; text-align: center; }
    </style>
  </head>
  <body>
    <div class="page-header">
      <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></h1>
    </div>
    <p>
      <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
      <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
  </body>
</html>