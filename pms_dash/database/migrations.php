<?php
$conn = mysqli_connect("localhost", "root", "", "pms");

if (!$conn) {
    echo "connect error " . mysqli_connect_error($conn);
}

$result = mysqli_query($conn,$sql);
echo mysqli_close($conn);
echo "<pre>";
var_dump($conn);

