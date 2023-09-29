<?php include 'inc/header.php'; ?>
<?php
if(!isset($_SESSION['auth'])){
    header("location:index.php");
    die;
}
//?>
<?php include 'inc/nav.php'; ?>
<?php require_once 'core/functions.php';?>
<?php require_once 'core/msg.php' ;?>
<div class="container mt-2">
    <form action="handelers/CreateController.php" class="form-control w-25" method="POST">

            <label for="inputPassword5" class="form-label">Task</label>
        <input type="text" name="name" id="inputPassword5"  class="form-control">
        <input type="submit" value="Save"   class="btn btn-success mt-2">
        <a href="profile.php"  class="btn btn-primary mt-2">

    </form>

</div>