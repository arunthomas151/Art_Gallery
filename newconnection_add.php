<?php
require "dbconfig.php";

$name=$_POST['name'];
$address=$_POST['address'];
$mobile=$_POST['number'];
$dob=$_POST['date'];
$email=$_POST['email'];
$locality=$_POST['location'];
$dis=$_POST['district'];
$state=$_POST['state'];
$password=$_POST['password'];

$sqlcheck="select * from customer where mobile='$mobile'";
$result=mysqli_query($con,$sqlcheck);
$num=mysqli_num_rows($result);
if($num==0)
{

 $sql="insert into customer(name,address,mobile,dob,email,location,dis,state,password)values('$name','$address','$mobile','$dob','$email','$locality','$dis','$state','$password')";
 if(mysqli_query($con,$sql))
{
	echo "Successful";
}
else
{

	echo "Try again";
}
}







