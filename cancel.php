<?php
require "session.php";
require "dbconfig.php";
$id=$_POST['id'];
$date=date("Y/m/d");
$sql="UPDATE booking set status='cancel' where id='$id' and customer_id='$login_id'";
if(mysqli_query($con,$sql))
{
	echo "Cancelled";
	$msg="Your cyllinder is Cancelled on ".$date;
$sqlnoti="insert into notification(login_id,date,msg)values('$login_id','$date','$msg')";
mysqli_query($con,$sqlnoti);
}
else
{
	echo "Try again";
	echo mysqli_error($con);
}


?>