<?php
session_start();
if (!isset($_SESSION['login_id'])) 
{ 
   echo '<script type="text/javascript">window.location="index.html"</script>';

}
else
{
	$login_id=$_SESSION['login_id'];
	$cname=$_SESSION['cname'];
	//echo "<script>alert('$login_id');</script>";
	//echo "<script>alert('$cname');</script>";


}
?>