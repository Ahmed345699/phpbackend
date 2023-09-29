<?php
session_start();
include '../core/functions.php';
include '../core/validations.php';

$errors=[];


if(checkRequstMethod("POST")&& checkPostInput('name')){
    foreach($_POST as $key => $value){
        $$key = sanitizeInput($value);
    }

    //validation
//name
    if(!requiredVal($name))
    {
        $errors[]="name is required";
    }elseif(!minVal($name,3)){
        $errors[]="name must be greater than 3 chars";
    }elseif(!maxVal($name,25)){
        $errors[]="name must be smaller than 25 chars";
    }

/////email
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
    }elseif(!minVal($password,6)){
        $errors[]="password must be greater than 6 chars";
    }elseif(!maxVal($password,20)){
        $errors[]="password must be smaller than 20 chars";
    }





    if(empty($errors)){
        $users = json_decode(file_get_contents('../data/user.json'), true);
        if ($users == null){
            $data =['id'=> 1 , 'name' => $name,   'email' => $email,  'password' =>password_hash($password, PASSWORD_DEFAULT)  ];
            $users []=$data;
            file_put_contents('../data/user.json', json_encode($users, JSON_PRETTY_PRINT));

            redirect('../index.php');
           die;
        }else{
            $id =end($users)['id'] + 1;
            $data =['id'=> $id , 'name' => $name,   'email' => $email,  'password' =>password_hash($password, PASSWORD_DEFAULT)  ];
            $users []=$data;
            file_put_contents('../data/user.json', json_encode($users, JSON_PRETTY_PRINT));
            $_SESSION['success'] = " please Login";
            redirect('../index.php');
            die;
        }

    }else{
        $_SESSION['errors'] = $errors;
        header("location:../register.php");
        header("../register.php");
        die;
    }
}else {
    echo "not supported method";
}