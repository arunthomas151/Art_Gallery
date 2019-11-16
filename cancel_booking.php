<?php
require "dbconfig.php";
require "session.php";
$sql="select * from booking where buyer_id='$login_id' and status='booked'";
$result=mysqli_query($con,$sql);



?>
<!DOCTYPE html>
<html>
<head>
<title>Art Gallery</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  margin-bottom:50px;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: orage;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: orange;
  color: white;
}
</style>

</head>
	
<body>
<!-- header -->
	<div class="agileits_header">
		<div class="container">
			<div class="w3l_offers">
				
			</div>
			<div class="agile-login">
				<ul>
					
					
				</ul>
			</div>
			
			<div class="clearfix"> </div>
		</div>
	</div>

	<div class="logo_products">
		<div class="container">
			<div class="w3ls_logo_products_left">
				<h1><a href="index.html">Art Gallery</a></h1>
			</div>


			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<!-- navigation -->
	<div class="navigation-agileits">
		<div class="container">
			<?php require "user_menu.php";?>
			</div>
		</div>
		
<!-- //navigation -->
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<h3>Cancel booking</h3>
		</div>
	</div>
	<div class="container">
		<table id="customers">
			 <tr>
				<th>Product</th> 
				<th>Order Date</th>
				<th>Amount</th>
				<th>Status</th>
			     <th>Action</th>
			 </tr>
			 <?php

			 while ($row=mysqli_fetch_object($result)) 
			 {
			 	?>
			 	<tr>
			 	<form method="post">
			 	 
			     <td><?php echo $row->qty?></td> 
			     <td><?php echo $row->price?></td>
			     <td><button type="submit"onclick="cancel('<?php echo $row->id?>');" class="btn btn-danger">Cancel</button></td>
			 </form>
			    <tr>
			 	<?php
			 }

			 ?>
		</table>

   </div>
<!-- //register -->




<!-- //footer -->	
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			
								
			
								
			});
	</script>
<!-- //here ends scrolling icon -->
<script src="js/minicart.min.js"></script>

<script src="js/skdslider.min.js"></script>
<link href="css/skdslider.css" rel="stylesheet">


</body>
</html>

 <script type="text/javascript">
 	
 	function cancel(id)
 	{
 		
 		$.ajax({
	   type:"POST",url:"cancel.php",data:{id:id},
	   success:function(data)
	   {
	   	
	   	alert(data);
	   	
	   }
		});
 	}
 </script>