<?php
session_start();
require "database-connect.php";

  if(isset($_SESSION['error'])){
    echo $_SESSION['error'];
  }
  unset($_SESSION['error']);

  if(isset($_SESSION['success'])){
    echo $_SESSION['success'];
  }
  unset($_SESSION['success']);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="center">
    <button id="show-login">Register</button>
</div>

    <form action="process-registration.php" method="post">

    <div class="popup">
        <div class="close-btn">&times;</div>

        <div class="form">
            <h2>Register</h2>
            <div class="form-element">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Enter email">
            </div>

            <div class="form-element">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter password">
            </div>

            <div class="form-element">
                <label for="confirmpassword">Password</label>
                <input type="password" name="confirmpassword" id="password" placeholder="Enter password">
            </div>

            <div class="form-element">
                <input type="checkbox" name="" id="Remember-me">
                <label for="Remember-me">Agree to the terms & condition</label>
            </div>

            <div class="form-element">
                <button type="submit" name="register">Register</button>
            </div>

            <div class="login-register">
                <p>Already have an account?<a href="login.php" class="login-link">Login</a></p>
            </div>
        </div>
    </div>
    </form>
<script src="script.js"></script>
</body>
</html>