<?php

include "includes/dbh.php";
session_start();

if(isset($_SESSION['mail']))
{
  
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">

  <!-- responsive optimization -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="shortcut icon" href="../img/logo.png">
  <title>Home | CyberDuck</title>

  <!-- css files -->
  <!-- materialize css -->
  <link rel="stylesheet" href="../css/materialize.min.css" type="text/css">
  <link rel="stylesheet" href="../css/materialize.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- importing css -->
  <link type="text/css" rel="stylesheet" href="css/main.css" />

</head>

<body>

  <?php
    include "includes/navbar.php";
  ?>


  <div style="margin-top: 50px;"></div>

  <!-- main content  -->
  <div class="container">

    <?php

      if(isset($_SESSION['message']))
      {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
      }

    ?>

    <div class="row">

      <div class="col l6 m6 s12">

        <ul class="collection with-header">

          <li class="collection-header #fff176 yellow lighten-2">
            <h5>Recent Posts</h5>
          </li>

          <?php

            $mail = $_SESSION['mail'];  

            $sql2 = "select * from users where email = '$mail'";
            $res2 = mysqli_query($conn, $sql2);
            $fetch = mysqli_fetch_assoc($res2);
            $user = $fetch['username'];

            $sql = "select * from posts where author = '$user' order by id desc ";
            $res = mysqli_query($conn, $sql);

            if(mysqli_num_rows($res) > 0)
            {
                $x = array(1,2,3,4,5,6);
                foreach($x as $i)
                {
                  if($i <= mysqli_num_rows($res))
                  {
                    $row = mysqli_fetch_assoc($res);
          ?>        

          <li class="collection-item #f5f5f5 grey lighten-4">
            <a href="../post.php?id=<?php echo $row['id']?>"> <?php echo ucwords($row['title']); ?> </a><br><br>
            <span> <a href="edit.php?id=<?php echo $row['id']; ?>"><i class="material-icons tiny">edit</i>Edit</a> | <a
                href="#modal<?php echo $row['id']; ?>" class="delete modal-trigger"><i class="material-icons tiny red-text">clear</i>Delete</a>
              | <a href=""><i class="material-icons tiny green-text">share</i>Share</a> </span>
          </li>

          <!-- Modal Structure -->
          <div id="modal<?php echo $row['id']; ?>" class="modal">
            <div class="modal-content">
              <h4 class = "red-text">Do you really want to delete:</h4>
            </div>
            <div class="modal-footer">
              <a href="delete.php?id=<?php echo $row['id']; ?>" class="modal-close waves-effect waves-green btn-flat">Agree</a>
              <a href="" class="modal-close waves-effect waves-green btn-flat">Disagree</a>
            </div>
          </div>

          <?php
                  }
                }

            }
            else
            {
              echo "<div class = 'center red-text #f5f5f5 grey lighten-4' style = 'padding-top: 50px; padding-bottom: 50px; font-size: 20px;'>YOU DON'T HAVE ANY POSTS YET!!!</div> ";
            }

          ?>

        </ul>
      </div>

      <div class="col l6 m6 s12">

        <ul class="collection with-header">

          <li class="collection-header #fff176 yellow lighten-2">
            <h5>Recent Comments<h5>
          </li>

          <?php

          //for post_ids
          $author = $user;
          $sql3 = "select * from posts where author = '$author'";
          $res3 = mysqli_query($conn, $sql3);

          if(mysqli_num_rows($res3) > 0)
          {
            while($row3 = mysqli_fetch_assoc($res3))
            {
              $post = $row3['id'];
              $sql4 = "select * from comments where post_id = $post order by id desc limit 2";
              $res4 = mysqli_query($conn, $sql4);

              if(mysqli_num_rows($res4) > 0)
              {
                while($row4 = mysqli_fetch_assoc($res4))
                {
          ?>

          <li class="collection-item #f5f5f5 grey lighten-4">
            <?php 
              echo $row4['comment_text']; 
            ?>
            <span class="secondary-content"><?php echo "by ".ucwords($row4['name']); ?></span>
            <br><br>

            on post <a href="../post.php?id=<?php echo $post; ?>"><?php echo ucwords($row3['title']); ?></a>
            
            <br><br>
            <span><a href="#modal<?php echo $row4['id']; ?>" class="delete modal-trigger"><i class="material-icons tiny red-text">clear</i> Remove</a> </span>
          </li>


          <!-- Modal Structure -->
          <div id="modal<?php echo $row4['id']; ?>" class="modal">
            <div class="modal-content">
              <h4 class = "red-text">Do you really want to delete:</h4>
            </div>
            <div class="modal-footer">
              <a href="delete_comment.php?id=<?php echo $row4['id']; ?>" class="modal-close waves-effect waves-green btn-flat">Agree</a>
              <a href="" class="modal-close waves-effect waves-green btn-flat">Disagree</a>
            </div>
          </div>


          <?php
                }
              }
            }

          }
          else
          {
            echo "<div class = 'center red-text #f5f5f5 grey lighten-4' style = 'padding-top: 50px; padding-bottom: 50px; font-size: 20px;'>YOU DON'T HAVE ANY COMMENTS YET!!!</div> ";
          }
          ?>




        </ul>

      </div>

      <?php

        $mail = $_SESSION['mail'];
        $query = "select username from users where email = '$mail'";
        $exec = mysqli_query($conn, $query);
        $x = mysqli_fetch_assoc($exec);

      ?>

      <div class="fixed-action-btn">
        <a href="write.php" class="btn-floating btn btn-large #ffee58 yellow lighten-1 pulse"><i
            class="material-icons black-text">edit</i></a>
      </div>
    </div>
  </div>









  <!-- materialize js -->
  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/materialize.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script>
    $(document).ready(function () {
      $('.sidenav').sidenav();
    });

  </script>

  <script>
    $(document).ready(function () {
      $('.modal').modal();
    });

  </script>

</body>

</html>

<?php
//unset($_SESSION['mail']);
}

else
{
  header("Location: register.php");
}
?>