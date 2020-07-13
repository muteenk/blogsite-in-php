<?php

include "includes/header.php";

if(isset($_POST['update2']) && isset($_SESSION['mail']))
{   




    //user details phasse





    //current email
    $mail = $_SESSION['mail'];

    //inputted username
    $user = $_POST['newUser'];
    $user = mysqli_real_escape_string($conn, $user);
    $user = htmlentities($user);
    
    //inputted email
    $email = $_POST['newMail'];
    $email = mysqli_real_escape_string($conn, $email);
    $email = htmlentities($email);

    //for users current details
    $sql = "select * from users where email = '$mail'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);

    //variables for users current details
    $mail = $_SESSION['mail'];
    $id = $row['id'];
    $c_name = $row['username'];





    //email verification phase





    $sql2 = "select * from users where email = '$email' and username != '$c_name'";
    $res2 = mysqli_query($conn, $sql2);
    if(mysqli_num_rows($res2) == 0)
    {
        
        

        //updating details phase




        $sql3 = "update users set username = '$user', email = '$email' where id = $id";
        $res3 = mysqli_query($conn, $sql3);
        if($res3)
        {
            unset($_SESSION['mail']);
            $_SESSION['mail'] = $email;



            //getting post details





            //posts established with current username
            $sql4 = "select * from posts where author = '$c_name'";
            $res4 = mysqli_query($conn, $sql4);
            if(mysqli_num_rows($res4) > 0)
            {
                while($row4 = mysqli_fetch_assoc($res4))
                {

                    //post variables
                    $post_id = $row4['id'];


                    //updating post details





                    $sql5 = "update posts set author = '$user' where id = $post_id";
                    $res5 = mysqli_query($conn, $sql5);
                    if($res5)
                    {
                        $_SESSION['message'] = "<div class = 'green-text' style='font-weight: bold;'>Your details have been changed</div>";
                        header("Location: settings.php");
                    }
                    else
                    {
                        $_SESSION['message'] = "<div class = 'red-text' style='font-weight: bold;'>Something went wrong</div>";
                        header("Location: settings.php");
                    }




                }


            }
        }
        else
        {
            $_SESSION['message'] = "<div class = 'red-text' style='font-weight: bold;'>Something went wrong</div>";
            header("Location: settings.php");    
        }
    }
    else
    {
        $_SESSION['message'] = "<div class = 'red-text' style='font-weight: bold;'>The email you entered is already in use</div>";
        header("Location: settings.php");
    }
}
else
{
    header("Location: register.php;");
}

?>