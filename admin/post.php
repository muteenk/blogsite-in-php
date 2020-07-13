<?php

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
  <title>Posts | CyberDuck</title>

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

      <div class="col l12 m12 s12 center">

        <ul class="collection with-header">

          <li class="collection-header #fff176 yellow lighten-2">
            <h5>All Posts<h5>
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
              
              while($row = mysqli_fetch_assoc($res))
              {
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
            else
            {
              echo "<div class = 'center red-text #f5f5f5 grey lighten-4' style = 'padding-top: 50px; padding-bottom: 50px; font-size: 20px;'>YOU DON'T HAVE ANY POSTS YET!!!</div> ";
            }

          ?>

        </ul>
      </div>

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