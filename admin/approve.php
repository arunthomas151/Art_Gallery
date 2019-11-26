<?php
require "session.php";
require "dbconfig.php";
$id=$_POST['id'];
$date=date("Y/m/d");
$sql="UPDATE art set status='Active' where id='$id'";
if(mysqli_query($con,$sql))
{
	echo "Approved";
}
else
{
	echo "Try again";
	echo mysqli_error($con);
}
?>