<?php
function checkRequstMethod($method){
    if($_SERVER['REQUEST_METHOD'] == $method){
        return true;
    }
    return false;
}


function checkPostInput($input){
    if(isset($_POST[$input])){
        return true;
    }
    return false;
}

function sanitizeInput($input){
    return trim(htmlspecialchars(htmlentities($input)));

}

function redirect($path){
    header("location:$path");
}

if (!function_exists('pageTitle')){
    function pageTitle(){
        $script_name =$_SERVER['SCRIPT_NAME'];
        $array =  explode('/' ,$script_name );
        $title = end($array);
        $new = explode('.', $title);
        if ($new[0] == 'index'){
            $title ='login';

        }else{
            $title =ucfirst($new[0]);

        }
        return $title;

    }
}