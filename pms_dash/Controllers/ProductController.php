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
function redirect($location, $status)
{
    $_SESSION['status']=$status;
    header('Location:' .$location);
    exit(0);
}


if($_SERVER['REQUEST_METHOD']== "POST" && isset($_POST['save_product'])) {

    $name = validate($_POST['name']);
    $price = validate($_POST['price']);
    $stock = validate($_POST['stock']);
    $description= validate($_POST['description']);

      $discount = validate($_POST['discount']);
      $price_after_discount = validate($_POST['price_after_discount']);
    $category_id = validate($_POST['category_id']);

    $status = isset($_POST['status'])== true ?  1:0 ;

    if ($_FILES['image']['size'] >0){
        $path ="../img";
        $image_ext= pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $filename = time().'.'.$image_ext;
        move_uploaded_file($_FILES['image']['tmp_name'], $path."/".$filename);
        $finalImage ="img/".$filename;


    }else{
        $finalImage ='';
    }

    $data =[

        'name' => $name,
        'price' => $price,
        'stock' => $stock,
        'status' => $status,
        'image' => $finalImage,
        'discount' => $discount,
        'price_after_discount' =>$price_after_discount,
        'category_id' => $category_id,



    ];


    $result =insert('products',$data);

    if ($result){
        redirect('../add_product.php','Product Created Successfully');
    }else{
        redirect('../add_product.php','Product   Created wrong');
    }


}


if(isset($_GET['id'])){
    $conn = mysqli_connect("localhost","root","","pms");
    if(!$conn){
        $_SESSION['errors']=  "connect error " . mysqli_connect_error($conn);
    }



    $id = $_GET['id'];

    $sql = "SELECT * FROM `products`  WHERE `id` = '$id' ";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_row($result);

    if(!$row){
        $_SESSION['errors'] = "data not exists";
    }else{
        $sql = "DELETE FROM `products`  WHERE `id` = '$id' ";
        $result = mysqli_query($conn,$sql);

        if ($result){
            redirect('../product.php',' Delete Product  Successfully');
        }else{
            redirect('../product.php','Product   Created wrong');
        }
    }


}
function checkParamId($type){
    if (isset($_GET[$type])){
        if ($_GET[$type] !='' ){
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

