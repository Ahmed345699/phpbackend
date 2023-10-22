<?php


session_start();
$conn = mysqli_connect("localhost", "root", "", "pms");

if (!$conn) {
    echo "connect error " . mysqli_connect_error($conn);
}

function validate($input){
    global $conn;
    $validatedDate = mysqli_real_escape_string($conn,$input);
    return trim($validatedDate);
}
function redirect($location, $status)
{
    $_SESSION['status']=$status;
    header('Location:' .$location);
  exit(0);
}


function insert($tableName, $data)
{
    global $conn;
    $table= validate($tableName);
    $column =array_keys($data);
    $values = array_values($data);
    $finalColumn = implode(',',$column);
    $finalValues= "'".implode("','",$values)."'";
    $query= "INSERT INTO $table ($finalColumn) VALUES ($finalValues)";
    $result = mysqli_query($conn,$query);
    return $result;
}
function update($tableName,$id, $data)
{
    global $conn;
    $table= validate($tableName);
    $id= validate($id);
        $updateDataString="";
        foreach ($data as $column => $value) {
            $updateDataString .= $column . '=' . "'$value',";
        }
        $finalUpdateData =substr(trim($updateDataString),0,-1);
        $query ="UPDATE $table SET $finalUpdateData WHERE id='$id' ";
    $result = mysqli_query($conn,$query);
    return $result;

}


function getAll ($tableName, $status=Null){
    global $conn;
    $table= validate($tableName);
    $status= validate($status);
    if ($status =='status'){
        $query = "SELECT * FORM $table WHERE status='1'";
    }else{
        $query = "SELECT * FROM $table";


    }
    return mysqli_query($conn,$query);

}

function checkParamId($type){
    if (isset($_GET[$type])){
        if ($_GET[$type]){
            return $_GET[$type];
        }else{
            return '<h5>No Id Found </h5>';

    }
    }else {
        return '<h5>No Id Given </h5>';
    }
}

function getById($tableName,$id )
{
    global $conn;
    $table = validate($tableName);
    $id = validate($id);

    $query = "SELECT * FROM $table WHERE id= '$id' LIMIT 1";
    $result = mysqli_query($conn, $query);
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $response = [
                'status' => 404,
                'data' => $row,
                'message' => 'Record Found'
            ];
            return $response;


        } else {
            $response = [
                'status' => 404,
                'message' => 'not found'
            ];
            return $response;

        }


    }else {
        $response = [
            'status' => 500,
            'message' => 'SomeThing went Wrong'
        ];
        return $response;

    }

}



if($_SERVER['REQUEST_METHOD']== "POST" && isset($_POST['name'])) {
    $name = validate($_POST['name']);
    $status = isset($_POST['status'])== true ?  1:0 ;
    $data =[
      'name' => $name,
        'status' => $status

    ];


    $result =insert('categories',$data);

    if ($result){
        redirect('../add_category.php','Category Created Successfully');
    }else{
        redirect('../add_category.php','Category Created wrong');
    }


}


if(isset($_GET['id'])){
    $conn = mysqli_connect("localhost","root","","pms");
    if(!$conn){
        $_SESSION['errors']=  "connect error " . mysqli_connect_error($conn);
    }



    $id = $_GET['id'];

    $sql = "SELECT * FROM `categories`  WHERE `id` = '$id' ";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_row($result);

    if(!$row){
        $_SESSION['errors'] = "data not exists";
    }else{
        $sql = "DELETE FROM `categories`  WHERE `id` = '$id' ";
        $result = mysqli_query($conn,$sql);
        if ($result){
            redirect('../category.php','Category Delete Successfully');
        }else{
            redirect('../category.php','Category Delete wrong');
        }

    }

//    header("location:../category.php");
}
