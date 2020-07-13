<?php

include "includes/header.php";

if(isset($_POST['signup']))
{
    $email = $_POST['email'];   //email from user
    $username = $_POST['username']; //username from user
    $password = $_POST['password']; //password from user

    $email = mysqli_real_escape_string($conn, $email); //email protection for sql injection

    $username = mysqli_real_escape_string($conn, $username); //username protection for sql injection

    $email = htmlentities($email); //email protection 2 for xss or cross site scripting

    $username = htmlentities($username); //username protection 2 for xss or cross site scripting

    $password = password_hash($password, PASSWORD_BCRYPT); //password encryption

    $query1 = "select * from users where email = '$email'"; //query to select from database

    $exec1 = mysqli_query($conn, $query1); //executing query1

    if(mysqli_num_rows($exec1) > 0)    //to check if user exists
    {
        header("Location: register.php");
        $_SESSION['message'] = "<div class = 'red-text'>E-mail already exists, you can 'Login' or use another 'E-mail id'</div>";
    }

    else
    {
        // query to insert user input to database
        $query2 = "insert into users(username, email, password) values('$username', '$email', '$password')";

        //executing query2
        $exec2 = mysqli_query($conn, $query2);
    
        if($exec2) //checking if query2 executed
        {
            $_SESSION['mail'] = $email;
            header("Location: dashboard.php");
        }
    
        else 
        {
            header("Location: register.php");
            $_SESSION['message']= "<div class = 'red-text'>Sorry something went wrong, please signup again</div>";
        }
    }

   
}
else
{
    header("Location: register.php");
}





















?>