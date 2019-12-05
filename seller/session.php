<?php
session_start();
if (!isset($_SESSION['login_id'])) 
{ 
   echo '<script type="text/javascript">window.location="index.php"</script>';

}
else
{
	$login_id=$_SESSION['login_id'];
}
?>