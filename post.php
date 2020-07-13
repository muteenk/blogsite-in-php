<?php

if(isset($_GET['id']))
{
  $id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">

  <!-- responsive optimization -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="shortcut icon" href="img/logo.png">
  <title>Home | CyberDuck</title>
  <!-- css files -->
  <?php
  require "includes/header.php";
  ?>

</head>

<body>

  <!-- main statements  -->
  <?php

$sql1 = "select * from posts where id = $id";
$res1 = mysqli_query($conn, $sql1);
$x = mysqli_fetch_assoc($res1);

$views = $x['views'];
$views++;

$sql2 = "update posts set views = $views where id = $id";
$res2 = mysqli_query($conn, $sql2);

?>

  <!-- navbar content -->
  <?php
require "includes/navbar.php";
?>


  <div class="row">
    <!-- main content area  -->
    <div class="col l9 m9 s12">

      <div class="container">

        <!-- title  -->
        <div class=" card-panel" style="margin-top: 40px;">

          <div class="row">

            <h5 style="font-weight: bold;">
              <?php
            echo ucwords($x['title']);
          ?>
              <a class="right black-text tooltipped" data-position="bottom" data-tooltip="These are views"
                style="cursor: pointer;"><i class="material-icons">remove_red_eye</i><?php echo $x['views'] ?></a>

            </h5>


          </div>

        </div>

        <?php
            if(isset($_SESSION['message']))
            {
              echo $_SESSION['message'];
              unset($_SESSION['message']);
            }
        ?>

        <div class=" card-panel " style="margin-top: 40px;">

          <div class="row">

            <!-- image of the post -->
            <img src="img/<?php echo $x['feature_image']; ?>" class="responsive-img" alt="">

            <!-- content of the post  -->
            <div style="margin: 20px; font-weight: bold;">
              <?php
          
                echo $x['content'];

              ?>

            </div>

            <!-- author of the post  -->
            <div class="right row" style="margin-right: 40px; font-weight: bold;">
              <?php
              $author = $x['author'];
              $sql4 = "select * from users where username = '$author'";
              $res4 = mysqli_query($conn, $sql4);
              $row4 = mysqli_fetch_assoc($res4);
              ?>
              <a href="#zoom2" class="modal-trigger"><img src="img/<?php echo $row4['picture'] ?>" class = "circle responsive-img" style = "height: 30px; width: 30px; border: solid 1px black; margin-right: 10px;" alt="">
              <span class='secondary-text' style = 'padding-bottom: 30px;'><?php echo $x['author']; ?></span></a>
            </div>

          </div>

        </div>

        <!-- Modal Structure -->
        <div id="zoom2" class="modal">
          <div class="modal-content">
              <img src="img/<?php echo $row4['picture'];?>" class="responsive-img" style = "//height: 500px; width: 590px;" alt="">                    
          </div>
          <div class="modal-footer fixed-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Back</a>
          </div>
        </div>

        <!-- comment section  -->
        <div class="card-panel">

          <h5>Write a comment</h5>

          <div class="row">

            <div class="col l8 offset-l2 m10 offset-m1 s12">

              <form action="post.php?id=<?php echo $id; ?>" method="post">

                <div class="input-field center">
                  <input name="name" type="text" class="validate" placeholder="enter your name" required>
                </div>

                <div class="input-field center">
                  <input type="text" name="comment" class="materialize-textarea" placeholder="comment goes here"
                    required>
                </div>

                <div class="center">
                  <input type="submit" name="comment_btn" value="Comment" class="btn yellow black-text">
                </div>

              </form>

            </div>

          </div>

          <h5>Comments</h5>

          <ul class="collection">

            <?php

            $sql3 = "select * from comments where post_id = $id order by id desc";
            $res3 = mysqli_query($conn, $sql3);
            
            if(mysqli_num_rows($res3) > 0)
            {
              while($row3 = mysqli_fetch_assoc($res3))
              {
            ?>

            <li class="collection-item" style = "font-weight: bold;">
              <?php
              echo $row3['comment_text'];
              ?>
              <span class="secondary-content">
              <?php
              echo "by ".ucwords($row3['name']);
              ?>
              </span>
            </li>

            <?php
              }
            }
            else
            {
            ?>
            <li class="collection-item red-text" style = "font-weight: bold;">
              No comments yet, be the first to comment!
            </li>
            <?php
            }
            ?>

          </ul>

        </div>

      </div>

    </div>

    <!-- this is a sidebar  -->
    <div class="col l3 m3 s12">

      <?php
    require "includes/sidebar.php";
    ?>

    </div>

  </div>


  <!-- footer content -->
  <?php
  require "includes/footer.php";
  ?>

  <script>
    $(document).ready(function () {
      $('.tooltipped').tooltip();
    });
  </script>

  <script>
   $(document).ready(function(){
    $('.modal').modal();
  });
  </script>

  <?php
  if(isset($_POST['comment_btn']))
  {
    $name = $_POST['name'];
    $name = mysqli_real_escape_string($conn, $name);
    $name = htmlentities($name);

    $comment = $_POST['comment'];
    $comment =  mysqli_real_escape_string($conn, $comment);
    $comment =  htmlentities($comment);

    $post_id = $_GET['id'];

    $sql69 = "insert into comments(name, comment_text, post_id) values('$name', '$comment', $post_id)";
    $res69 = mysqli_query($conn, $sql69);
    if($res69)
    {
      $_SESSION['message'] = "<div class = 'green-text'>Comment published successfully</div>";
      header("Location: post.php?id=$post_id");
    }
    else
    {
      $_SESSION['message'] = "<div class = 'red-text'>Comment didn't published </div>";
      header("Location: post.php?id=$post_id");
    }
  }

  ?>

  <?php

}
else
{
  header("Location: index.php");
}

?>