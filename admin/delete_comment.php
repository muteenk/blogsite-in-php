<?php

include "includes/header.php";

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $id = mysqli_real_escape_string($conn, $id);
    $id = htmlentities($id);

    $sql = "delete from comments where id = $id";
    $res = mysqli_query($conn, $sql);


    
    if($res)
    {

        $_SESSION['message'] = "<div class = 'green-text'>comment removed</div>";
        header("Location: comments.php");
        
    }
    else
    {
        $_SESSION['message'] = "<div class = 'red-text'>couldn't remove comment</div>";
        header("Location: comments.php");

    }
}
else
{
  header("Location: login.php");
}

?>