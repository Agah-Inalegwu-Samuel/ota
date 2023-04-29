<?php
session_start();
require "database-connect.php";

$sql = "SELECT * FROM profile WHERE";
$statement = $pdo->prepare($sql);
$statement->execute();
$students = $statement->fetchAll(PDO::FETCH_ASSOC); 

  if(isset($_SESSION['error'])){
    echo $_SESSION['error'];
  }
  unset($_SESSION['error']);

  if(isset($_SESSION['success'])){
    echo $_SESSION['success'];
  }
  unset($_SESSION['success']);

  
  
  $user_id = $_SESSION['id'];
  $full_name= "";
  $username = "";
  $email ="";
  $phone ="";
  $gender = "";
  $sessionofadmission = "";
  $updatepro= false;

  if (isset($_GET['edit'])) {
    $id=filter_input(INPUT_GET, 'edit', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $updatepro=true;
    $sql = 'SELECT * FROM profile WHERE user_id = ?';
    $statement = $pdo->prepare($sql);
    $statement->execute([$id]);
    $student=$statement->fetch(PDO::FETCH_ASSOC);
    $rowCount = $statement->rowCount();
    if($rowCount>0){ 
        $full_name = $student['full_name'];
        $username = $student['username'];
        $email = $student['email'];
        $phone = $student['phone'];
        $gender= $student['gender'];
        $sessionofadmission= $student['sessionofadmission'];
        $image = $student['image'];
    }
    else{
        echo "Failed to create profile";
    }
  }

  $edit = false;

  $sql = "SELECT * FROM profile WHERE user_id = ?";
  $statement = $pdo->prepare($sql);
  $statement->execute([$user_id]);
  $profile=$statement->fetch(PDO::FETCH_ASSOC);

  if($statement->rowCount()>0){
    $edit = true;
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="heading">
            <?php if ($updatepro == true && $edit == true){?>
                <h2>Edit Profile</h2>
                <a href="profile.php?edit=<?php echo $_SESSION['id'];?>">Edit</a>
            <?php } else { ?>
                <h2>Create Profile</h2>
            <?php }?>
        </div>

        <form action="process-profile.php" method="post" enctype="multipart/form-data">
            <div style="display: none;">
                <label for="user_id">User id</label>
                <input type="text" name="user_id" value="<?php echo $_SESSION['id'];?>">
            </div>
            <div>
                
                <?php if($updatepro == true) { ?>
                    <label for="">Fullname</label>
                    <input type="text" name="full_name" value="<?php echo $full_name;?>">
                <?php } else { ?>
                    <label for="">Fullname</label>
                    <input type="text" name="full_name" value="">
                <?php } ?>
            </div><br><br>
            <div>
                
                <?php if($updatepro == true) { ?>
                    <label for="">Username</label>
                    <input type="text" name="username" value="<?php echo $username;?>">
                <?php } else { ?>
                    <label for="">Username</label>
                    <input type="text" name="username" value="">
                <?php } ?>
            </div><br><br>
            <div style="display: none">
                <label for="">Email</label>
                <?php if($updatepro == true) { ?>
                    <input type="email" name="email"  placeholder="Email Adress..." value="<?php echo $email;?>">
                <?php } else { ?>
                    <input type="email" name="email" value="<?php echo $_SESSION['email'];?>">
                <?php } ?>
            </div>
            <div>
                <label for="">Phone</label>
                <?php if($updatepro == true) { ?>
                    <input type="number" name="phone" value="<?php echo $phone;?>">
                <?php } else { ?>
                    <input type="number" name="phone" value="">
                <?php } ?>
            </div><br><br>
            <div>
                <label for="gender">Gender</label>
                <select name="gender"> Gender 
                <?php if($updatepro==true){ ?>
                        <Option selected disabled value="<?php echo $gender?>"><?php echo $gender?></Option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                <?php } else { ?>
                        <option value="gender" selected disabled>Select Gender</option>
                        <Option value="female">Male</Option>
                        <Option value="female">Female</Option>
                <?php }?>
                </select>
            </div><br><br>
            <div>
                <label for="">Academic Session</label>
                <select name="sessionofadmission">
                    <?php if($updatepro==true){ ?>
                        <option selected disabled><?php echo $sessionofadmission?></option>
                        <Option value="2020/2021">2020/2021</Option>
                        <option value="2000/2001">2000/2001</option>
                        <option value="2001/2002">2001/2002</option>
                        <option value="2002/2003">2002/2003</option>
                        <option value="2003/2004">2003/2004</option>
                        <option value="2005/2006">2005/2006</option>
                        <option value="2006/2007">2006/2007</option>
                    <?php } else { ?>
                        <option value="">Select Session</option>
                        <Option value="2020/2021">2020/2021</Option>
                        <option value="2000/2001">2000/2001</option>
                        <option value="2001/2002">2001/2002</option>
                        <option value="2002/2003">2002/2003</option>
                        <option value="2003/2004">2003/2004</option>
                        <option value="2005/2006">2005/2006</option>
                        <option value="2006/2007">2006/2007</option>
                    <?php }?>
                </select>
            </div><br><br>
            <div>
                <label for="">Image</label>
                <input type="file" name="image" value="image">
            </div>
            <div>
                <?php if($updatepro==true && $edit == true){ ?>
                    <button name="updatepro" type="submit">Update</button>
                <?php } else { ?>
                    <button name="update" type="submit">Create</button>
                <?php } ?>
            </div>
        </form>
    </div>
</body>
</html>