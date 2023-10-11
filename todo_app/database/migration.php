<?php


// create tables

$conn = mysqli_connect("localhost", "root", "", "todoapp");

if (!$conn) {
    echo "connect error " . mysqli_connect_error($conn);
}



$sql = "CREATE TABLE IF NOT EXISTS `tasks`(
   `id` INT PRIMARY KEY AUTO_INCREMENT,
   `title` VARCHAR(200) NOT NULL ) ";



$result = mysqli_query($conn,$sql);
echo mysqli_close($conn);
echo "<pre>";
var_dump($conn);

