<?php
  function redirectLoggedOutUser($redirectLocation) {
    session_start();
  
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
      $header = "location: " . $redirectLocation;
      header($header);
      exit;
    }
  }
?>