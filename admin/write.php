<?php

include "includes/header.php";

if(isset($_SESSION['mail']))
{
  $mail = $_SESSION['mail'];  

  $sql2 = "select * from users where email = '$mail'";
  $res2 = mysqli_query($conn, $sql2);
  $fetch = mysqli_fetch_assoc($res2);
  $user = $fetch['username'];

?>

<body style="background-color: lightgrey;">

  <?php
    include "includes/navbar.php";
  ?>


  <div class="container">

    <form action="write_check.php?user=<?php echo $user; ?>" method="post" enctype="multipart/form-data">

      <div class="card-panel " style="margin-top: 140px;">

        <div class="container">

          <?php

            if(isset($_SESSION['message']))
            {
              echo $_SESSION['message'];
              unset($_SESSION['message']);
            }

          ?>

          <h4>Featured image</h4>

            <div class="file-field input-field">
              <div class="btn yellow black-text">
                <span>Choose image</span>
                <input type="file" name="image" required>
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text" required>
              </div>
            </div>

          <h4>Title of your post</h4>

          <textarea name="title" id="title" cols="30" rows="10" class="materialize-textarea"
            placeholder="title goes here" style="font-size: 30px;" required></textarea>

          <div class="card-panel center">

            <h4>Post content</h4>

            <textarea name="textarea" id="texteditor" class="materialize-textarea black-text"
              placeholder="whats on your mind" style="font-size: 25px;" required></textarea>
          </div>


          <div class="center">
            <input type="submit" value="Publish" name="publish" class="btn yellow black-text">
          </div>

        </div>

      </div>
    </form>
  </div>



















  <!-- materialize js -->
  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/materialize.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="../js/ckeditor/ckeditor.js" type="text/javascript"></script>
  <script>
    $(document).ready(function () {
      $('.sidenav').sidenav();
    });

  </script>

</body>

</html>

<?php
}
else
{
  header("Location: login.php");
}
?>