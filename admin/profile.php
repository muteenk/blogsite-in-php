<?php

include "includes/header.php";

if(isset($_POST['upload']) && isset($_SESSION['mail']))
{
    $mail = $_SESSION['mail'];
    $picture = $_FILES['picture'];

    $name = $picture['name'];
    $size = $picture['size'];
    $type = $picture['type'];
    $tmp_name = $picture['tmp_name'];

    if($type == "image/jpg" || $type == "image/jpeg" || $type = "image/png")
    {
        if($size <= 4194304)
        {
            $sql = "update users set picture = '$name' where email = '$mail'";
            $res = mysqli_query($conn, $sql);
            if($res)
            {
                move_uploaded_file($tmp_name, "../img/".$name);
                $_SESSION['message'] = "<div class = 'green-text' style = 'font-weight: bold;'>Profile picture changed</div>";
                header("Location: settings.php");
            }
        }
        else
        {
            $_SESSION['message'] = "<div class = 'red-text' style = 'font-weight: bold;'>File is bigger than 4MB</div>";
            header("Location: settings.php");
        }
    }
    else
    {
        $_SESSION['message'] = "<div class = 'red-text' style = 'font-weight: bold;'>Invalid file type</div>";
        header("Location: settings.php");
    }

}
else
{
    //header("Location: register.php");
    echo "no";
}











?>