<?php

include "includes/dbh.php";

?>

<div class="navbar-fixed">

<nav class="#ffee58 yellow lighten-1">

  <div class="nav-wrapper">

    <div class="container">

      <a href="" class="brand-logo center black-text">CyberDuck</a>
      <a href="#" data-target="slide-out" class="show-on-large sidenav-trigger"><i
          class="material-icons black-text">menu</i></a>

    </div>
  </div>
</nav>
</div>

<ul id="slide-out" class="sidenav fixed">

<li>
  <div class="user-view">

    <div class="background">
      <img src="../img/bground.jpg" class="responsive-img" alt="">
    </div>

    <?php
    $mail = $_SESSION['mail'];
    $sql = "select * from users where email = '$mail'";
    $exec = mysqli_query($conn, $sql);
    $x = mysqli_fetch_assoc($exec);
    ?>

    <a class="modal-trigger" href="#dpmodal<?php echo $x['id'] ?>">
    <img src="../img/<?php echo $x['picture'];?>" class="circle" alt="">
    </a>

    <!-- Modal Structure -->
    <div id="dpmodal<?php echo $x['id'] ?>" class="modal">
      <div class="modal-content">
      <img src="../img/<?php echo $x['picture'];?>" class="circle" alt="">
      <a href="settings.php" class="waves-effect waves-light btn yellow black-text">Change</a>
      </div>
    </div>

    <div class="name black-text " style="font-weight: bold; font-size: 20px;">
    <?php
    echo $x['username'];
    ?>
    </div>

    <div class="email black-text" style="font-weight: bold;"> 
    <?php echo $_SESSION['mail']; ?> 
    </div>

  </div>
</li>


<li>
  <a href="../index.php">Home</a>
</li>

<li>
  <a href="dashboard.php">Dashboard</a>
</li>

<li>
  <a href="post.php">Posts</a>
</li>

<li>
  <a href="image.php">Images</a>
</li>

<li>
  <a href="comments.php">Comments</a>
</li>

<li>
  <a href="settings.php">Settings</a>
</li>

<div class="divider"></div>

<li>
  <a href="logout.php">Logout</a>
</li>
</ul>


<script>

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
  });

</script>