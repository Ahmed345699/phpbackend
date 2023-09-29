<?php

require_once '../core/functions.php';

if(session_status() === PHP_SESSION_NONE) session_start();



if(isset($_GET['id'])) {

    // Check if this id is exist

    $key = $_GET['id'];
    $tasks = json_decode(file_get_contents('../data/task.json '), true);

    unset($tasks[$key]);
//ترتيب id
    $students = array_values($tasks);

    file_put_contents('../data/task.json', json_encode($tasks));

    $_SESSION['success'] = 'Tasks Deleted Successfully!';
    redirect('../profile.php');
    die();

}
