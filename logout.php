<?php
  require "php/db_connection.php";

  if($con) {
    $query = "UPDATE admin_credentials SET IS_LOGGED_IN = 'false'";
    $result = mysqli_query($con, $query);
  }
  session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Logging out...</title>
    <script src="js/restrict.js"></script>
    <style>
      body {
        background: #141414;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        color: white;
        font-family: Arial, sans-serif;
      }
      .logout-message {
        text-align: center;
      }
      .spinner {
        border: 5px solid rgba(255,255,255,0.1);
        border-radius: 50%;
        border-top: 5px solid #28a745;
        width: 50px;
        height: 50px;
        animation: spin 1s linear infinite;
        margin: 20px auto;
      }
      @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
      }
    </style>
  </head>
  <body>
    <div class="logout-message">
      <h2>Logging out...</h2>
      <div class="spinner"></div>
      <p>Please wait while we securely log you out</p>
    </div>
    
    <script>
      // Optional: Add a small delay before redirect to show the message
      setTimeout(function() {
        window.location.href = "login.php";
      }, 1500);
    </script>
  </body>
</html>
