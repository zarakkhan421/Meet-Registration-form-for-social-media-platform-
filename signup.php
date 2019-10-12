<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="favicon.png">
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <title>Sign Up</title>
</head>
<body>
    <?php

    //signup a user
    $user_check_query="SELECT * FROM users WHERE email='$email' or username='$username' LIMIT 1";
    $already_user=mysqli_query($db, $user_check_query);

    $user=mysqli_fetch_assoc($already_user);
    
    if($user){
        $user_exist="User already exist";
    }else{

        if($email && $username && $password && $repeat){
        $password=md5($password);
        
        $query="INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$password')";
        mysqli_query($db,$query);

        header('location: signup_cong.html');
        session_destroy();
        }
    }
?>

    <div class="flexbox">

        <div class="flex-item-form">

            <form name="form" action="signup.php" method="POST" class="form-class">

                <div class="headings">
                    <span class="welcome">Welcome</span>
                    <span class="signup">Sign Up</span>
                </div>

                <span class="form-items form-item1">Email <input class="email" type="text" name="email" ></span>
                <span class="form-items form-item2">Username <input type="text" name="username" ></span>
                <span class="form-items form-item3">Password <input type="password" name="password" ></span>
                <span class="form-items form-item4">Repeat <input type="password" name="repeat" ></span>

                <span class="required"><?php echo $empty_string;?></span>
                <span class="required"><?php echo $invalid_string;?></span>
                <span class="required"><?php echo $not_matching;?></span>
                <span class="required"><?php echo $user_exist;?></span>
                
                <button class="button-signup" name="submit" type="submit">Sign Up</button>
                <span class="account-holder"><a onclick="location.href='signin.php'">Already a User? Sign In.</a></span>

            </form>
        </div>

        <div class="flex-item-triangle">
            <div class="big-triangle">
                <img src="svgs/big-triangle.svg" alt="">
            </div>
        
            <div class="small-triangle">
                <img src="svgs/small-triangle.svg" alt="">
            </div>
        </div>
    </div>

</body>
</html>