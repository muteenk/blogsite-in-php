<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">

  <!-- responsive optimization -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- favicon -->
  <link rel="shortcut icon" href="img/logo.png">

  <!-- title  -->
  <title>Home | CyberDuck</title>

  <!-- css files -->
  <?php
  require "includes/header.php";
  ?>

</head>



<body>

  <!-- navbar content -->
  <?php
  require "includes/navbar.php";
  ?>


  <div class="row">
    
    <!-- main content area  -->
    <div class="col l9 m9 s12">
      <?php

        $sql1 = "select * from posts order by id desc";
        $res1 = mysqli_query($conn, $sql1);

        if(mysqli_num_rows($res1) > 0)
        {
          while($row1 = mysqli_fetch_assoc($res1))
          {

      ?>
      <!-- card -->

      <div class="col l3 m6 s12" style="margin-top: 40px;">
        <div class="card small">
          <div class="card-image">
            <img src="img/<?php echo $row1['feature_image']; ?>" style = "/*height: 250px; width: 330px;*/" alt="">
            <span class="card-title black-text truncate" style="font-weight: bolder;"><?php echo ucwords($row1['title']); ?></span>
          </div>
          <div class="card-content truncate">

            <?php
            
            echo $row1['content'];

            ?>

          </div>
          <div class="card-action" class="center" style="background: #efef64;">
            <a href="post.php?id=<?php echo $row1['id']; ?>" class="black-text ">SEE POST</a>
          </div>
        </div>
      </div>

      <?php
          }
        }
        else
        {
          echo "<div class = 'center grey-text' style = 'margin-top: 300px; font-size: 100px; font-weight: bold;'>NO POSTS YET!!</div>";
        }
      ?>

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