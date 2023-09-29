<?php

session_start();
include '../core/functions.php';
include '../core/validations.php';
;
$errors=[];

if(checkRequstMethod("POST")&& checkPostInput('name')){
    foreach ($_POST as $key => $value) {
        $$key = sanitizeInput($value);
    }

    if(!requiredVal($email))
    {
        $errors[]="email is required";
    }elseif(!emailVal($email)){
        $errors[]="please type a valid email";
    }

/////password

    if(!requiredVal($password))
    {
        $errors[]="password is required";

    }

    if(empty($errors)) {
        $users = json_decode(file_get_contents('../data/user.json'), true);
        if ($users == null) {
            $_SESSION['success'] = "No Date";

            redirect('../index.php');
            die;
        } else {
            foreach ($users as $user){
               if ($users['email']==$email && password_verify($password, $users['password'])){
                   $_SESSION['auth']=$user;
                   redirect("../profile.php");
                   die();
               }
                $_SESSION['success'] = "No Date";
                redirect("../index.php");
                die();
               }

            }

        }




}
else {
        echo "not supported method";
}