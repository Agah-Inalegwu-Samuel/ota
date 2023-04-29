<?php

if (isset($_POST["login"])){
    session_start();
    require "database-connect.php";

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
    $statement = $pdo->prepare($sql);
    $statement->execute([$email, $password]);
    $user = $statement->fetch(PDO::FETCH_ASSOC); 


    if($user){
        $_SESSION['success'] = "<p style='color:white; text-align: center; font-size: 20px; margin-top: 50px'>Login success</p>";
        $_SESSION['email'] = $user['email'];
        $_SESSION['id'] = $user['id'];
        header("location: dashboard.php");
    } else{
        $_SESSION["error"] = "<p style='color:white; text-align: center; font-size: 20px; margin-top: 50px'>Invalid email or password</p>";
        header("location: login.php");
    }


}

?>