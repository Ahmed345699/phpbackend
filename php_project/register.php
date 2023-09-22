<?php include 'inc/header.php'; ?>
<?php
if(isset($_SESSION['auth'])){
    header("location:home.php");
    die;
}
?>
<?php include 'inc/nav.php'; ?>

<div class="containar">
    <div class="row">
        <div class="col-8 mx-auto my-5">

<h2 class="border p-2 my-2 text-center" >  Register </h2>
<?php   
if(isset($_SESSION['errors'])):
foreach($_SESSION['errors'] as $errors): ?>
<div class="alert alert-danger text-center">
    <?php echo $errors; ?>

</div>
<?php 
endforeach; 
unset($_SESSION['errors']);
endif;
?>

<form class="border p-3 " action="handelers/handelRegister.php" method="POST">
<div class="form-group p-2 my-1">
    <label for="name"> Name</label>
    <input type="text" name="name" class="form-control" id="name">

</div>
<div class="form-group p-2 my-1">
    <label for="name"> Email</label>
    <input type="email" name="email" class="form-control" id="email">

</div>
<div class="form-group p-2 my-1">
    <label for="name"> PASSWORD</label>
    <input type="password" name="password" class="form-control" id="password">

</div>
<div class="form-group p-2 my-1">
    
    <input type="submit" value="Register"  class="form-control" >

</div>



</form>

</div>
    </div>
</div>

    <?php include 'inc/footer.php' ; ?>
