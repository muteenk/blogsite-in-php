<?php

include "includes/header.php";

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $sql = "select * from posts where id = $id";

    $res = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($res);
?>
 


<body style = "background-color: lightgrey;">

  <?php
    include "includes/navbar.php";
  ?>


  <div class="container">

    <form action="edit_check.php?id=<?php echo $row['id'];?>" method="post" enctype="multipart/form-data">

      <div class="card-panel " style="margin-top: 200px;">

        <div class="container">

          <h4>Title of your post</h4>

          <textarea name="title" id="title" cols="30" rows="10" class="materialize-textarea"
            placeholder="title goes here" style="font-size: 30px;" required>
            <?php
                echo $row['title'];
            ?>
            </textarea>

          <div class="card-panel center">

            <h4>Post content</h4>

            <textarea name="textarea" id="texteditor" class="materialize-textarea black-text"
              placeholder="whats on your mind" style="font-size: 25px;" required>
              <?php
                echo $row['content'];
              ?>
              </textarea>
          </div>


          <div class="center">
            <input type="submit" value="Update" name="update" class="btn yellow black-text">
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