<?php include 'inc/header.php'; ?>
<?php
if(!isset($_SESSION['auth'])){
    header("location:index.php");
    die;
}

//?>
<?php
$tasks = file_put_contents("data/task.json");
if ($tasks != null ){
    foreach ($tasks as $task){
        if ($task['user_id']== $_SESSION['auth']['id']){
            $myTask[]= $task;
        }
    }
}

?>
<?php include 'inc/nav.php'; ?>
<?php require_once 'core/functions.php';?>



    <div class="container mt-4">
        <div class="row col-12 d-flex">
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title ">name : <?=  $_SESSION['auth']['name']; ?></h5>
                        <p class="card-text" >email : <?= $_SESSION['auth']['email']; ?></p>
                        <a class="btn btn-danger" href="logout.php">Logout</a>
                    </div>
                </div>
            </div>

            <div class="col-8">
                <a href="create.php" class="btn btn-primary"> Creat New Task</a>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Task</th>
                        <th scope="col">Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php  foreach ($myTask as $task): ?>
                    <tr>
                        <th scope="row"><?= $task['id'] ?> </th>
                        <th ><?= $task['task'] ?> </th>

                        <th ><a href="handelers/DeleteController.php?id=<?= $task['task'] ?>" class="btn btn-danger"></a> Delete</th>

                    </tr>
              <?php endforeach; ?>


                    </tbody>

                </table>
            </div>


        </div>
    </div>

<?php include 'inc/footer.php'; ?>