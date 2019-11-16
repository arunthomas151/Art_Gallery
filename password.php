<?PHP
if(isset($_POST['change']))
{
	$old=$_POST['old'];
	$new=$_POST['new'];
	$sql="UPDATE customer set password='$new' where id='$login_id'";
	if(mysqli_query($con,$sql))
	{
		echo "<script>alert('updated')</script>";
	}
}
