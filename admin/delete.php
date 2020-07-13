<?php

include "includes/header.php";

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $id = mysqli_real_escape_string($conn, $id);
    $id = htmlentities($id);

    $sql2 = "SELECT * FROM `posts` WHERE id = $id";
    $res2 = mysqli_query($conn, $sql2);
       
    if($res2)
    {
            
        $x = mysqli_fetch_assoc($res2);
        $path = "../img/".$x['feature_image'];
        unlink($path);

    }
    $sql = "delete from posts where id = $id";
    $res = mysqli_query($conn, $sql);


    
    if($res)
    {

        $_SESSION['message'] = "<div class = 'green-text'>post deleted</div>";
        header("Location: post.php");
        
    }
    else
    {
        $_SESSION['message'] = "<div class = 'red-text'>post didn't deleted</div>";
        header("Location: post.php");

    }
}
else
{
  header("Location: login.php");
}

?>