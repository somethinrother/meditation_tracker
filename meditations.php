<?php
  require_once "functions.php";

  redirectLoggedOutUser('index.php');

  require_once "db/config.php";
  
  $user_id = $_SESSION["id"];
  $duration = $description = "";
  $duration_err = $description_err = "";
  
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate duration
    if($_POST["duration"] <= 0){
      $duration_err = "You can't save a meditation session of less than a minute.";
    } else {
      $duration = trim($_POST["duration"]);
    }

    // Validate description
    if(empty(trim($_POST["description"]))){
      $description_err = "Please enter a description.";
    } else{
      $description = trim($_POST["description"]);
    }
    // Check input errors before inserting in database
    if(empty($duration_err) && empty($description_err)){
      $sql = "INSERT INTO meditations (user_id, duration, description) VALUES (?, ?, ?)";
        
      if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "iis", $param_user_id, $param_duration, $param_description);
        $param_user_id = $user_id;
        $param_duration = $duration;
        $param_description = $description;
        
        if(mysqli_stmt_execute($stmt)){
          header("location: meditations.php");
        } else{
          echo "Something went wrong. Please try again later.";
        }
      }
        
      mysqli_stmt_close($stmt);
    }
  }
?>
 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Record a Meditation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
      body{ font: 14px sans-serif; }
      .wrapper{ width: 350px; padding: 20px; }
    </style>
  </head>
  <body>
    <div class="wrapper">
      <h2>Record a New Meditation?</h2>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
          <label>Duration (in minutes)</label>
          <input type="number" name="duration" class="form-control" value="<?php echo $duration; ?>">
          <span class="help-block"><?php echo $duration_err; ?></span>
        </div>    
        <div class="form-group <?php echo (!empty($description_err)) ? 'has-error' : ''; ?>">
          <label>Description</label>
          <input type="description" name="description" class="form-control" value="<?php echo $description; ?>">
          <span class="help-block"><?php echo $description_err; ?></span>
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Submit">
          <input type="reset" class="btn btn-default" value="Reset">
        </div>
      </form>
      <!-- Link to your calendar -->
    </div>    
  </body>
</html>