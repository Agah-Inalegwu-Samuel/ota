<?php
if(isset($_POST['update']) || isset($_POST['updatepro'])){
    session_start();
    require "database-connect.php";

    $allowed_ext = ['png', 'jpg', 'jpeg', 'gif', 'PNG', 'JPG', 'JPEG', 'GIF'];

    $user_id = filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $full_name = filter_input(INPUT_POST, 'full_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sessionofadmission = filter_input(INPUT_POST, 'sessionofadmission',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $image_name = $_FILES["image"]["name"];
    

    if(!empty($image_name)){
        $image_size = $_FILES['image']['size'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_ext = explode (".", $image_name);
        $image_ext = strtolower(end($image_ext));
        $dayInNumber = date("d");
        $monthInNumber = date ("m");
        $year = date("Y");
        $time24Hour = date("G");
        $timeMin = date("i");
        $timeSecs = date("s");
        $image_name = "{$phone}{$dayInNumber}{$monthInNumber}{$year}{$time24Hour}{$timeMin}{$timeSecs}.{$image_ext}";
        $final_dir = "student_img/{$image_name}";
    }

    if (isset($_POST["update"])){

        if(empty($user_id) || empty($full_name) || empty($username) || empty($email || empty($phone) || empty($gender) || empty($sessionofadmission))){
            $_SESSION["error"] = "All fields are required";
            header("location: profile.php");
            exit();
        }

        $sql = "SELECT * FROM profile WHERE user_id = ?";
        $statement = $pdo->prepare($sql);
        $statement->execute([$user_id]);
        $user = $statement->fetch(PDO::FETCH_ASSOC);
    
        if($row){
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['full_name'] = $user['full_name'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['phone'] = $user['phone'];
            $_SESSION['gender'] = $user['gender'];
            $_SESSION['sessionofadmission'] = $user['sessionofadmission'];
            $_SESSION['image'] = $user['image'];
        }

        if($user){
            $_SESSION["error"] = "Account already exist";
            header("location: profile.php");
            exit();
        }

        if(!in_array($image_ext, $allowed_ext)){
            $_SESSION['error'] = "Invalid file type";
            header("location: profile.php");
            exit();
        }

        if($image_size > 1000000){
            $_SESSION['error'] = "File too large";
            header("location: profile.php");
            exit();
        }
        if(empty($image_name)){
            $sql = "INSERT INTO profile(user_id, full_name, username, email, phone, gender, sessionofadmission) VALUES (?,?,?,?,?,?,?)";
            $statement = $pdo->prepare($sql);
            $statement->execute([$user_id,$full_name, $username, $email, $phone, $gender, $sessionofadmission]);

            if($statement->rowCount() > 0){
                $_SESSION['success'] = "Profile updated successfully";
                header("location: profile.php");
            }else{
                    $_SESSION['error'] = "No changes made";
                    header("location: profile.php");
            }
        } 
        else {
            $sql = "INSERT INTO profile (user_id, full_name, username, email, phone, gender, sessionofadmission, image) VALUE(?, ?, ?, ?, ?, ?, ?,?)";
            $statement = $pdo->prepare($sql);
            $statement->execute([$user_id, $full_name, $username, $email, $phone, $gender, $sessionofadmission, $image_name]);
            move_uploaded_file($image_tmp, $final_dir);
    
    
            if($statement->rowCount() > 0){
                $_SESSION['success'] = "Profile updated successfully";
                header("location: profile.php");
                }else{
                    $_SESSION['error'] = "No changes made";
                    header("location: profile.php");
            }
        }
    }





    if (isset($_POST["updatepro"])){

        if(empty($user_id) || empty($full_name) || empty($username) || empty($email || empty($phone) || empty($gender) || empty($sessionofadmission))){
            $_SESSION["error"] = "All fields are required";
            header("location: profile.php");
            exit();
        }
        if(!empty($image_name)){
            if(!in_array($image_ext, $allowed_ext)){
                $_SESSION["error"] = "invalid file type";
                header("location: profile.php");
                exit();
            }
        }

        if(!empty($image_name)){
            if($image_size > 1000000){
                $_SESSION["error"] = "file size not allowed";
                header("location: profile.php");
                exit();
            }
        }

        if(empty($image_name)){
            $sql = "UPDATE profile SET full_name = ?, username = ?, phone = ?, gender = ?, sessionofadmission = ? WHERE user_id = ?";
            $statement = $pdo->prepare($sql);
            $statement->execute([$full_name, $username, $phone, $gender, $sessionofadmission, $user_id]);
        }else{
                $sql = "UPDATE profile SET full_name = ?, username = ?, email=?, phone = ?, gender = ?, sessionofadmission = ? WHERE user_id = ?";
                $statement=$pdo->prepare($sql);
                $statement->execute([$user_id,$full_name,$username,$email,$phone,$gender, $sessionofadmission,$user_id]);
                move_uploaded_file($image_tmp, $final_dir);
        }
            if($statement->rowCount()>0){
                $_SESSION['success'] = "Successfully Updated";
                header("location: profile.php");
            }else{
                $_SESSION['error'] = "Failed to Update";
                header("location: profile.php");
            }
        
    }
        
}



