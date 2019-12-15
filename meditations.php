<?php
  require_once "functions.php";

  redirectLoggedOutUser('index.php');

  require_once "db/config.php";
  
  $user_id = $_SESSION["id"];
  $duration = $description = "";
  $user_id_err = $duration_err = $description_err = "";
  
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate duration    
    // Validate description
    // Check input errors before inserting in database
  }
?>
 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
      body{ font: 14px sans-serif; }
      .wrapper{ width: 350px; padding: 20px; }
    </style>
  </head>
  <body>
    <div class="wrapper">
      <h2>Record a New Meditation?</h2>
      <!-- Form to describe your new meditation -->
      <!-- Link to your calendar -->
    </div>    
  </body>
</html>