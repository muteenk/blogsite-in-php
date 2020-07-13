<?php
include "includes/header.php";
if(isset($_SESSION['mail']))
{
?>

<body>
  <?php
        include "includes/navbar.php";
  ?>

  <div class="container">
    <div class="card-panel center yellow lighten-3" style = "padding-bottom: 7px; padding-top: 1px; margin-top: 30px;">
      <h4>All your uploaded pictures</h4>
    </div>
  </div>

  <div class="row">
  <?php
        $sql0 = "select * from users where email = '$mail'";
        $res0 = mysqli_query($conn, $sql0);
        $row0 = mysqli_fetch_assoc($res0);
        $user = $row0['username'];

        $sql1 = "select * from posts where author = '$user' order by id desc";
        $res1 = mysqli_query($conn, $sql1);
        if(mysqli_num_rows($res1) > 0)
        {
        while($row1 = mysqli_fetch_assoc($res1))
        {
  ?>

  <div class="container">
    <div class="col l3 m4 s6" style="margin-top: 40px;">
      
      <div class="card ">
        <a href="../post.php?id=<?php echo $row1['id']?>">
        <div class="card-image">
          <img src="../img/<?php echo $row1['feature_image']; ?>" class = "responsive-img" style="height: 250px; width: 330px;" alt="">
          <span class="card-title black-text truncate" style="font-weight: bolder;"><?php echo $row1['title']; ?></span>
        </div>
      </div>
      </a>
    </div>

  </div>

  <?php
        }
      }
      else
      {
              echo "<div class = 'center red-text #f5f5f5 grey lighten-4 container' style = 'padding-top: 50px; padding-bottom: 50px; font-size: 20px;'>YOU DON'T HAVE ANY PICTURES YET!!!</div> ";
      }
  ?>
  </div>
</body>

<?php
include "includes/footer.php";
}
else
{
   header("Location: login.php"); 
}
?>