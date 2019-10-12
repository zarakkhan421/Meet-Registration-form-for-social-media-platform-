<?php
session_start();

//initialise vriables

$email="";
$username="";
$password="";
$repeat="";


$empty_string="";
$invalid_string="";
$not_matching="";
$user_exist="";
$invalid_signin_info="";

//connect to db

$db = mysqli_connect('localhost','root','','meet') or die('couldnt connect to database');

//register users
    if(isset($_POST['password'])){

            $password=mysqli_real_escape_string($db,$_POST['password']);
                
            if(empty($password)){
                $empty_string="Password is required.";
            }
        }

    if(isset($_POST['repeat'])){
            $repeat=mysqli_real_escape_string($db,$_POST['repeat']);
            if(empty($repeat)){
                $empty_string="Repeat the Password.";
            }
            if(empty($password)){
                $empty_string="Password is required.";
            }
            if($password!==$repeat){
                $not_matching="Passwords do not Match.";
                $password="";
            }
    }

   
    if(isset($_POST['username'])){

            $username=mysqli_real_escape_string($db,$_POST['username']);

            if(empty($username)){
                $empty_string="Username is required.";
            }
    }

    if(isset($_POST['email'])){
            
            $email=mysqli_real_escape_string($db,$_POST['email']);
            
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $invalid_string = "Invalid email format";
            }
            
            if(empty($email)){
                $empty_string="Email is required.";
                $invalid_string="";
            }
    }
?>