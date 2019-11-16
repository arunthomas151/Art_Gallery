<?php
require("dbconfig.php");
 $state=$_POST['state'];
 $dis=$_POST['dis'];
 $loc=$_POST['loc'];
 $sql="select * from location where loc='$loc'";
 $result=mysqli_query($con,$sql);
 $row=mysqli_num_rows($result);
 if($row==0)
 {
 	$sqladd="insert into location(state,dis,loc)values('$state','$dis','$loc')";
 	if(mysqli_query($con,$sqladd))
 	{
 		echo "location added";

 	}
 	else
 	{
 		echo "Tey again";
 	}

 }
 else
 {
 	echo "Already inserted";
 }
