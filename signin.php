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
    <title>Sign In</title>
</head>
<body>
    <?php
    //if user already exist
    
    if($email && $username && $password){

        $password=md5($password);

        $query="SELECT * FROM users WHERE username='$username' AND password='$password' ";
        $results=mysqli_query($db,$query);

        if(mysqli_num_rows($results)){

            header('location: signin_enter.html');
            session_destroy();
            
        } else{
            $invalid_signin_info="Invalid user information.";
        }
    }
?>



    <div class="flexbox">

        <div class="flex-item-form">

            <form name="form" action="signin.php" method="POST" class="form-class">

                <div class="headings">
                    <span class="welcome">Welcome, Again</span>
                    <span class="signup">Sign In</span>
                </div>

                <span class="form-items form-item1">Email <input class="email" type="text" name="email" ></span>
                <span class="form-items form-item2">Username <input type="text" name="username" ></span>
                <span class="form-items form-item3">Password <input type="password" name="password" ></span>

                <span class="required"><?php echo $empty_string;?></span>
                <span class="required"><?php echo $invalid_string;?></span>
                <span class="required"><?php echo $invalid_signin_info;?></span>

                <button class="button-signup" name="submit" type="submit" name="signin">Sign In</button>
                <span class="create-account"><a onclick="location.href='signin.php'">Don't have account, create now.</a></span>

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
















    <script rel="text/javascript" src="script.js"></script>
</body>
</html>