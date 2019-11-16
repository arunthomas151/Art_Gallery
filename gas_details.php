<?php
require "dbconfig.php";
$type=$_POST['type'];
$sql="select * from gas where type='$type'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_object($result);
$data['price']=$row->price;
echo json_encode($data);



?>