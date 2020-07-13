
<!-- search bar content -->
      <ul class="collection" style = "margin-top: 48px;">
        <li class="collection-item">

          <h4>Search</h4>
          <form action = "search.php" method = "get">
          <div class="input-field">
          
            <input id="first_name" type="text" name="search_input" placeholder="Search" required>

            <div class="center">
              <input type="submit" name="search" class="btn #efef64 yellow black-text center" value="Search">
            </div>
          
          </div>
          </form>
        </li>
      </ul>


      <!-- top trending -->
      <div class="collection">
        <h4 style="padding-left: 20px;">Top Trending</h4>

        <?php

          $query0 = "select * from posts where views > 0 order by views desc limit 10";
          $exec0 = mysqli_query($conn, $query0);
          
          if(mysqli_num_rows($exec0))
          {
            while($row0 = mysqli_fetch_assoc($exec0))
            {

        ?>

        <a href="post.php?id=<?php echo $row0['id'] ?>" class="collection-item #e0e0e0 grey lighten-2" style = "padding-top: 20px; padding-bottom: 20px;">
          <?php
            echo $row0['title'];
          ?>
        </a>
        <hr style ="margin: 0px;">

        <?php
            }
          }
          else
          {
        ?>
        <a class="collection-item #e0e0e0 grey lighten-2 red-text" style = "padding-top: 20px; padding-bottom: 20px;">
            NO TRENDING POST YET!!
        </a>
        <hr style ="margin: 0px;">
        

        <?php
          }          
        ?>
      </div>



   