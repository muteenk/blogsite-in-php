<?php

include "includes/header.php";

if(isset($_POST['login']))
{
    $email = $_POST['email'];   //email from user

    $password = $_POST['password']; //password from user

    $email = mysqli_real_escape_string($conn, $email); //email protection for sql injection

    $email = htmlentities($email); //email protection 2 for xss or cross site scripting

    $query1 = "select password from users where email = '$email'";

    $exec1 = mysqli_query($conn, $query1);

    if($exec1)
    {
        $row = mysqli_fetch_assoc($exec1);

        if(password_verify($password, $row['password']))
        {
            $row = mysqli_fetch_assoc($exec1);

            $_SESSION['mail'] = $email;
            header("Location: dashboard.php");
        }
        else
        {
            header("Location: register.php");
            $_SESSION['message'] = "<div class = 'red-text'>Sorry! Credentials didn't match</div>";
        }
    }
}
else
{
    $_SESSION['message']= "<div class = 'red-text'>login to continue</div>";
    header("Location: register.php");
}

?>
