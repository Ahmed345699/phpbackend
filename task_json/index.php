<?php include 'inc/header.php'; ?>
<?php
if(isset($_SESSION['auth'])){
    header("location:home.php");
    die;
}
?>
<?php include 'inc/nav.php'; ?>


<?php require_once 'core/msg.php' ;?>

    <div class="containar">
        <div class="row">
            <div class="col-8 mx-auto my-5">

                <h2 class="border p-2 my-2 text-center" >  Login  </h2>

                <form class="border p-3 " action="handelers/handelLogin.php" method="POST">

                    <div class="form-group p-2 my-1">
                        <label for="name"> Email</label>
                        <input type="email" name="email" class="form-control" id="email">

                    </div>
                    <div class="form-group p-2 my-1">
                        <label for="name"> PASSWORD</label>
                        <input type="password" name="password" class="form-control" id="password">

                    </div>
                    <div class="form-group p-2 my-1">

                        <input type="submit"  class="form-control" value="Login">

                    </div>
                    <div class="form-group p-2 my-1">

                        <a href="register.php"  class="form-control" style="text-decoration: none; text-align: center" >Create Account </a>


                    </div>


                </form>

            </div>
        </div>
    </div>

<?php include 'inc/footer.php'; ?>