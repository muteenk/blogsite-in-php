
<?php

include "includes/header.php";


if(isset($_POST['update']))
{
      $data = $_POST['textarea'];

      $data = mysqli_real_escape_string($conn, $data);

      $data = htmlentities($data);

      $title = $_POST['title'];

      $title =  mysqli_real_escape_string($conn, $title);

      $title = htmlentities($title);

      $id = $_GET['id'];

      $query1 = "update posts set title = '$title', content = '$data' where id = $id ";

      $exec = mysqli_query($conn, $query1);

      if($exec)
      {
        $_SESSION['message'] = "<div class = 'green-text'>post updated</div>";
        header("Location: dashboard.php");
      }

      else 
      {
        $_SESSION['message'] = "<div class = 'red-text'>post didn't updated</div>";
        header("Location: dashboard.php");
      }


}
else
{
  header("Location: login.php");
}




?>