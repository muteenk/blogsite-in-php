<?php

if(isset($_POST['update']))
{
    
    include "includes/header.php";

    $currentPass = $_POST['currentPass'];
    $currentPass = mysqli_real_escape_string($conn, $currentPass);
    $currentPass = htmlentities($currentPass);

    $newPass = $_POST['newPass'];
    $newPass = mysqli_real_escape_string($conn, $newPass);
    $newPass = htmlentities($newPass);

    $repass = $_POST['repass'];
    $repass = mysqli_real_escape_string($conn, $repass);
    $repass = htmlentities($repass);

    $mail = $_SESSION['mail'];

   //echo $currentPass, $newPass, $repass, $mail;

   $sql1 = "select * from users where email = '$mail'";
   $res1 = mysqli_query($conn, $sql1);
   $row1 = mysqli_fetch_assoc($res1);

   //echo $row1['username'];

   $pass = $row1['password'];
   if(password_verify($currentPass, $pass))
   {
       if($newPass === $repass)
       {
        $newPass = password_hash($newPass, PASSWORD_BCRYPT);

        $sql2 = "update users set password = '$newPass' where email = '$mail'";
        $res2 = mysqli_query($conn, $sql2);
        if($res2)
        {
            $_SESSION['message'] = "<div class = 'green-text' style = 'font-weight: bold;'>Password changed successfully</div>";
            header("Location: settings.php");  
        }
        else
        {
            $_SESSION['message'] = "<div class = 'red-text' style = 'font-weight: bold;'>Something went wrong</div>";
            header("Location: settings.php");  
        }
       }
       else
       {
        $_SESSION['message'] = "<div class = 'red-text' style = 'font-weight: bold;'>New Password doesn't match with re-entered password</div>";
        header("Location: settings.php");  
       }
   }
   else
   {
       $_SESSION['message'] = "<div class = 'red-text' style = 'font-weight: bold;'>Incorrect current password</div>";
       header("Location: settings.php");
   }

}
else
{
    header("Location: settings.php");
}
?>