<?php
    
    if (isset($_POST["register"])){
        session_start();
        require "database-connect.php";

        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];
    
        if(empty($email) || empty($password) || empty($confirmpassword)){
            $_SESSION["error"] = "<p style='color:white; text-align: center; font-size: 20px; margin-top: 50px'>All fields are required</p>";
            header("location: registration.php");
            exit();
        }
        if(strlen($password) < 5){
            $_SESSION["error"] = "<p style='color:white; text-align: center; font-size: 20px; margin-top: 50px'>Password lenght must be more than five</p>";
            header("location: registration.php");
            exit();
        }

        if($password != $confirmpassword){
            $_SESSION["error"] = "<p style='color:white; text-align: center; font-size: 20px; margin-top: 50px'>Password and confirm password do not match</p>";
            header("location: registration.php");
            exit();
        }

        //check if emailalready exist
        $sql = "SELECT email FROM users WHERE email = ?";
        $statement = $pdo->prepare($sql);
        $statement->execute([$email]);
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $rowCount = $statement->rowCount();

    
        if($rowCount > 0){
            $_SESSION["error"] = "<p style='color:white; text-align: center; font-size: 20px; margin-top: 50px'>Email already exist</p>";
            header("location: registration.php");
            exit();
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION["error"] = "<p style='color:white; text-align: center; font-size: 20px; margin-top: 50px'>Invalid email format!</p>";
            header("location: registration.php");
            exit();
    }

        $sql = "INSERT INTO users (email, password) VALUE ( ?, ?)" ;
        $statement = $pdo->prepare($sql);
        $statement->execute([$email, $password]);

        if($statement->rowCount() > 0 ){
            $_SESSION["success"] = "<p style='color:white; text-align: center; font-size: 20px; margin-top: 50px'>Registration successful!</p>";
            header("location: login.php");
        }else{
            $_SESSION["error"] = "<p style='color:white; text-align: center; font-size: 20px; margin-top: 50px'>Failed!</p>";
            header("location: registration.php");
        }
    }
    
    
?>