<?php
require "session.php";
require "dbconfig.php";
$id=$_POST['id'];
$date=date("Y/m/d");
$sql="UPDATE booking set status='confirmed' where id='$id' and buyer_id='$login_id'";
if(mysqli_query($con,$sql))
{
	echo "Ready to Deliver";
    $msg="Your Art is Ready to Deliver on ".$date;
    $sqlnoti = "UPDATE notification set msg='$msg' where book_id='$id'";
    mysqli_query($con,$sqlnoti);
}
else
{
	echo "Try again";
	echo mysqli_error($con);
}
?>
