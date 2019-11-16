<?php
require "dbconfig.php";
$cname=$_POST['cname'];
$name=$_POST['name'];
$address=$_POST['address'];
$mobile=$_POST['number'];
$email=$_POST['email'];
$locality=$_POST['location'];
$dis=$_POST['district'];
$state=$_POST['state'];
$password=$_POST['password'];

 $sqlcheck="select * from seller where mobile='$mobile' and cname='$cname'";
 $checkresult=mysqli_query($con,$sqlcheck);
 $num=mysqli_num_rows($checkresult);

 if($num==0)
 {
 	$sql="insert into seller(cname,name,address,mobile,email,locality,dis,state,password)values('$cname','$name','$address','$mobile','$email','$locality','$dis','$state','$password')";
	if(mysqli_query($con,$sql))
	{
		echo "Successful";
	}
	else
	{
		echo "Try again";
	}
 }
 else
 {
 	echo "already Exist";
 }

	 





