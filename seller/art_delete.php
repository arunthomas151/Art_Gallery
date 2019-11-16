<?php

require("dbconfig.php");
$id=$_POST['artid'];

$sql="update art set status = 'Deleted' where id='$id'";
				$result=mysqli_query($con,$sql);
				if($result)
				{
					echo "Deleted Successfully";
				}
				else
				{
					echo "try agin";
				}

?>