<?php
session_start();
require "database-connect.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coment Box</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="center">
        <button id="show-login">Login</button>
    </div>

    <form action="process-login.php" method="post">

    <div class="echo">
        <?php
            if(isset($_SESSION['error'])){
                echo $_SESSION['error'];
            }
            unset($_SESSION['error']);

            if(isset($_SESSION['success'])){
                echo $_SESSION['success'];
            }
            unset($_SESSION['success']);

            $email ='';
            $password ='';
        ?><br><br>
    </div>
       

        <div class="popup">
            <div class="close-btn">&times;</div>

            <div class="form">
                <h2>Log In</h2>
                <div class="form-element">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter email">
                </div>

                <div class="form-element">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter password">
                </div>

                <div class="form-element">
                    <button type="submit" name="login">Login</button>
                </div>

                <div class="login-register">
                    <p>Don't have an account?<a href="registration.php" class="login-link">Register</a></p>
                </div>
            </div>
        </div>

    </form>
<script src="script.js"></script>
</body>
</html>

<?php
 