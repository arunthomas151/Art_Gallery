<?php
require "dbconfig.php";
$loc=$_POST["loc"];
$sql="select * from location where loc='$loc'";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_object($result))
{
$data['state']=$row->state;
$data['dis']=$row->dis;
}
echo json_encode($data);
?>