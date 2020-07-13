<?php
include "includes/header.php";

if(isset($_SESSION['mail']))
{
    unset($_SESSION['mail']);
    header("Location: login.php");
}

else
{
    header("Location: register.php");
}