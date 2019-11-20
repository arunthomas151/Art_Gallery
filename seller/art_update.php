<?php
require("dbconfig.php");
$id = $_POST['artid'];
$artname = $_POST['artname'];
$specification = $_POST['specification'];
$price = $_POST['price'];
$stock = $_POST['stock'];


if (isset($_FILES['image'])) {
    $errors = array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    @$file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));

    $expensions = array("jpeg", "jpg", "png", "JPEG", "JPG", "PNG");

    if (in_array($file_ext, $expensions) === false) {
        $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
    }
    if ($file_size > 2097152) {
        $errors[] = 'File size must be excately 2 MB';
    }

    if (empty($errors) == true) {
        $path = "uploads/" . $file_name;
        move_uploaded_file($file_tmp, "uploads/" . $file_name);
        $sql = "update art set imagepath = '$path' where id = '$id'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            
        } else {
            
        }
    } else {
        
    }
}
$sql = "update art set artname = '$artname' , specification = '$specification' ,price = '$price' ,stock = '$stock' where id = '$id'";
$result = mysqli_query($con, $sql);
if ($result) {
    echo "Successfully Updated";
} else {
    echo "try agin";
}
