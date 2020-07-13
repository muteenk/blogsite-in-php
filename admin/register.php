
<!-- header  -->
<?php

include "includes/header.php"

?>


<body style="background-image:url(../img/bground.jpg); background-size: cover;">


  <!-- tab buttons -->
  <div class="row" style = "margin-top: 130px;">
    
    <!-- spacing  -->
    <div class="col l6 offset-l3 m8 offset-m2 s12 center ">

      <!-- panel  -->
      <div class="card-panel grey lighten-2" style="margin-bottom: 1px;">

        <!-- tabs  -->
        <ul class="tabs grey lighten-2">

          <!-- login tab  -->
          <li class="tab">
            <a href="#login">Login</a>
          </li>

          <!-- signup tab  -->
          <li class="tab">
            <a href="#signup">SignUp</a>
          </li>
        </ul>

      </div>
    </div>

    <!-- login area -->
    <div class="col l6 offset-l3 m8 offset-m2 s12" id="login">

      <!-- panel  -->
      <div class="card-panel center" style="margin-top: 1px;">

        <!-- heading -->
        <h4>Login to admin panel</h4>

        <?php

          if(isset($_SESSION['message']))
          {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
          }
        ?>

        <div class="container">

          <div class="row">

            <!-- login form  -->
            <form class="col s12" action = "login.php" method = "POST"> 

              <!-- email  -->
              <div class="row">
                <div class="input-field col s12">
                  <input id="email" type="email" name = "email" class="validate" placeholder="E-mail" required>
                  <span class="helper-text" data-error="invalid format"></span>
                </div>
              </div>

              <!-- password  -->
              <div class="row">
                <div class="input-field col s12">
                  <input id="password" type="password" name = "password" class="validate" placeholder="Password" required>
                </div>
              </div>

              <!-- button  -->
              <input type="submit" name="login" class="btn yellow black-text" value="Login">

            </form>
          </div>
        </div>

      </div>
    </div>

    <!-- signup area  -->
    <div class="col l6 offset-l3 m8 offset-m2 s12" id="signup">

      <!-- panel  -->
      <div class="card-panel center" style="margin-top: 1px;">

        <!-- heading -->
        <h4>SignUp for the admin panel</h4>

        <div class="container">

          <div class="row">

            <!-- signup area  -->
            <form class="col s12" action = "signup.php" method = "POST">

              <!-- name  -->
              <div class="row">
                <div class="input-field col s12">
                  <input id="first_name" name = "username" type="text" placeholder="Username" class="validate" required>
                </div>
              </div>

              <!-- email  -->
              <div class="row">
                <div class="input-field col s12">
                  <input id="email" type="email" name = "email" placeholder="Email" class="validate" required>
                  <span class="helper-text" data-error="invalid format"></span>
                </div>
              </div>

              <!-- password  -->
              <div class="row">
                <div class="input-field col s12">
                  <input id="password" type="password" name="password" placeholder="Password" class="validate" required>
                </div>
              </div>

              <!-- button  -->
              <input type="submit" name="signup" class="btn yellow black-text" value="SignUp">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>



<!-- footer  -->
 <?php

 include "includes/footer.php";

 ?>