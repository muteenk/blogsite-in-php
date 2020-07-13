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

        <div class="card-panel center yellow lighten-3" style="margin-top: 30px;">
            <h4 style="margin:0px;">Settings</h4>
        </div>

        <?php
            if(isset($_SESSION['message']))
            {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
        ?>

        <?php
        $mail = $_SESSION['mail'];
        $sql = "select * from users where email = '$mail'";
        $exec = mysqli_query($conn, $sql);
        $x = mysqli_fetch_assoc($exec);
        ?>        

        <div class="card-panel">
            <h4 style = "margin-bottom: 20px;">Change profile picture</h4>
            <div class="row">
            <div class="center">
                <a href="#zoom" class = "modal-trigger">
                    <img src="../img/<?php echo $x['picture'];?>" class="circle responsive-img" style = "height: 200px; width: 200px;" alt="">
                </a>
            </div>

            <!-- Modal Structure -->
            <div id="zoom" class="modal">
                <div class="modal-content">
                    <img src="../img/<?php echo $x['picture'];?>" class="responsive-img" style = "//height: 500px; width: 590px;" alt="">                    
                </div>
                <div class="modal-footer">
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Back</a>
                </div>
            </div>

            <form action="profile.php?id=<?php echo $x['id'];?>" method="post" enctype="multipart/form-data">
            
                <div class="file-field input-field row">
                    <div class="btn yellow black-text">
                        <span>Choose image</span>
                        <input type="file" name="picture" required>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" required>
                    </div>

                </div>

                <div class="center">
                    <input type="submit" name="upload" class="btn yellow black-text" value="Upload">
                </div>
            
            </form>

            </div>
        </div>

        <div class="card-panel">
            <h5 class="">Change Password</h5>

            <form action="reset.php" method = "post">

                <div class="row ">
                    <div class="input-field col s12 ">
                        <input id="password" type="password" name="currentPass" placeholder="Current Password" class="validate" required>
                    </div>
                </div>

                <div class="row ">
                    <div class="input-field col s12 ">
                        <input id="password" type="password" name="newPass" placeholder="New Password" class="validate" required>
                    </div>
                </div>

                <div class="row ">
                    <div class="input-field col s12 ">
                        <input id="password" type="password" name="repass" placeholder="Re-enter Password" class="validate" required>
                    </div>
                </div>

                <div class="center">
                    <input type="submit" name="update" class="btn yellow black-text" value="Update">
                </div>

            </form>

        </div>

        <div class="card-panel">
            <h5 class="">Change other details</h5>

            <?php
            $mail = $_SESSION['mail'];
            $sql = "select * from users where email = '$mail'";
            $exec = mysqli_query($conn, $sql);
            $x = mysqli_fetch_assoc($exec);
            ?>


            <form action="reset_details.php" method = "post">

                <div class="row ">
                    <div class="input-field col s12 ">
                        <input type="text" name="newUser" class="validate" value="<?php echo $x['username']; ?>" placeholder="Username" required>
                    </div>
                </div>

                <div class="row ">
                    <div class="input-field col s12 ">
                        <input type="email" name="newMail" class="validate" value="<?php echo $x['email']; ?>" placeholder="E-mail" required>
                        <span class="helper-text" data-error="invalid format"></span>
                    </div>
                </div>

                <div class="center">
                    <input type="submit" name="update2" class="btn yellow black-text" value="Update">
                </div>

            </form>

        </div>


    </div>

































<script>
 $(document).ready(function(){
    $('.modal').modal();
  });
</script>


</body>

<?php
    include "includes/footer.php";
}
else
{
    header("Location: login.php");
}
?>