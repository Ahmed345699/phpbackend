<?php
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



function validate($input){
    global $conn;
    $validatedDate = mysqli_real_escape_string($conn,$input);
    return trim($validatedDate);
}
function alertMassage(){
    if (isset( $_SESSION['status'])){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <h6>'.$_SESSION['status'].'</h6>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        unset( $_SESSION['status']);

    }
}
$conn = mysqli_connect("localhost", "root", "", "pms");

if (!$conn) {
    echo "connect error " . mysqli_connect_error($conn);
}

function getById($tableName,$id )
{
    global $conn;
    $table = validate($tableName);
    $id = validate($id);

    $query = "SELECT * FROM  $table WHERE id= '$id' LIMIT 1";
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

