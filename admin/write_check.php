
<?php

include "includes/header.php";

?>


<?php

    if(isset($_POST['publish']) && isset($_GET['user']))
    {
      //processing for the data

      $user = $_GET['user'];
      $user = mysqli_real_escape_string($conn, $user);
      $user = htmlentities($user);

      $data = $_POST['textarea'];
      $data = mysqli_real_escape_string($conn, $data);
      $data = htmlentities($data);

      $title = $_POST['title'];
      $title =  mysqli_real_escape_string($conn, $title);
      $title = htmlentities($title);

      //processing for the image

      $image = $_FILES['image'];
      $img_type = $image['type'];
      $img_size = $image['size'];

      if($img_type == "image/jpeg" || $img_type == "image/jpg" || $img_type == "image/png")
      {
        if($img_size <= 4194304)
        {
          $img_name = $image['name'];
          move_uploaded_file($image['tmp_name'], "../img/".$image['name']);
        }
        else
        {
          header("Location: write.php");
          $_SESSION['message'] = "<div class = 'red-text'>file size is more than 4MB</div>";
        }
      }
      else
      {
        header("Location: write.php");
        $_SESSION['message'] = "<div class = 'red-text'>invalid image format</div>";
      }


      $query1 = "insert into posts(title, content, feature_image, author) values('$title', '$data', '$img_name', '$user')";

      $exec = mysqli_query($conn, $query1);

      if($exec)
      {
        $_SESSION['message'] = "<div class = 'green-text'>post published</div>";
        header("Location: write.php");
      }

      else 
      {
        $_SESSION['message'] = "<div class = 'red-text'>post didn't published</div>";
        header("Location: write.php");
      }

    }
    else
    {
      header("Location: login.php");
    }



?>