<?php
include "dbconfig.php";
if(isset($_POST['amt']))
{
	$amt=$_POST['amt'];
	$type=$_POST['type'];
	if(!empty($amt))
	{
		$sql="insert into gas(type,price)values('$type','$amt')";
	if(mysqli_query($con,$sql))
	{
		echo "inserted";
	}
	}
	
}

if(isset($_POST['id']))
{
	$id=$_POST['id'];
	$sql="select * from gas where id='$id'";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
	$data['gas_id']=$row[0];
	$data['gtype']=$row[1];
	$data['amt']=$row[2];
	echo json_encode($data);
}
if(isset($_POST['edit_id']))
{	
	$id=$_POST['edit_id'];
	$amt=$_POST['edit_amt'];
	$type=$_POST['type'];
	$sql="UPDATE gas set type='$type',price='$amt' where id='$id'";
	if(mysqli_query($con,$sql))
	{
		echo "updated";

	}


}
?>