
<?php
session_start();
include '../core/functions.php';




if(checkRequstMethod("POST")) {
    $errors=[];
$name= sanitizeInput($_POST['name']);

//validation
//name
    if (!requiredVal($name)) {
        $errors[] = "name is required";
    } elseif (!minVal($name, 3)) {
        $errors[] = "name must be greater than 3 chars";
    } elseif (!maxVal($name, 25)) {
        $errors[] = "name must be smaller than 25 chars";
    }
    if(empty($errors)){
        $tasks = json_decode(file_get_contents('../data/user.json'), true);
        if ($tasks == null) {
            $data = ['id' => 1, 'task' => $name, 'user_id' => $_SESSION['auth']['id']];
            $tasks []=$data;
            file_put_contents('../data/user.json', json_encode($tasks, JSON_PRETTY_PRINT));
            $_SESSION['success'] = " task create successfully";
            redirect('../create.php');
            die;
        }else{
            $id =end($tasks)['id'] + 1;
            $data =['id'=> $id , 'task' => $name,  'user_id' => $_SESSION['auth']['id'] ];
            $tasks []=$data;
            file_put_contents('../data/user.json', json_encode($tasks, JSON_PRETTY_PRINT));
            $_SESSION['success'] = " task create successfully";
            redirect('../create.php');
            die;
        }
    }
}