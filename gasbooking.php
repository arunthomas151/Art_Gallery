<?php
require "session.php";
require "dbconfig.php";
$sqluser="select * from customer where id='$login_id'";
$result=mysqli_query($con,$sqluser);
$row=mysqli_fetch_object($result);


//distributor
$sqldistributor="select * from distributor";
$resultdis=mysqli_query($con,$sqldistributor);

//gas
$sqlgas="select * from gas";
$resultgas=mysqli_query($con,$sqlgas);


?>
<!DOCTYPE html>
<html>
<head>
<title></title>
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
		<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
					<li><i class="fa fa-phone" aria-hidden="true"></i>Order online or call us : (+0123) 234 567</li>
					
				</ul>
			</div>
			<div class="w3ls_logo_products_left">
				<h1><a href="index.html">Indane Gas</a></h1>
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
			<h3>Book Your cyllinder</h3>
		</div>
	</div>
	<div class="container">
		<form id="booking" method="post">

			<div class="form-group row col-md-12">
		    <label for="staticEmail" class="col-sm-2 col-form-label">Booking Date</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" value="<?php echo date("Y/m/d");?>" name="name" >
		    </div>
		  </div>

		  <div class="form-group row col-md-12">
		    <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" value="<?php echo $row->name;?>" name="name" >
		    </div>
		  </div>

		  <div class="form-group row col-md-12">
		    <label for="staticEmail" class="col-sm-2 col-form-label">Qty</label>
		    <div class="col-sm-8">
		      <input type="number" class="form-control"  name="qty" id="qty" value="1" onchange="gastype();">
		    </div>
		  </div>


		   <div class="form-group row col-md-12">
		    <label for="staticEmail" class="col-sm-2 col-form-label">Type of Gas</label>
		    <div class="col-sm-8">
		      <select class="form-control" name="type" id="type" onchange="gastype();">
		      	<option>Select Type of Cyllinder</option>
		      
		      	<?php
		      	while($rowgas=mysqli_fetch_object($resultgas))
		      	{
		      		?>  <option><?php echo $rowgas->type;?>  		</option><?php
		      	}
		      	?>
		      </select>
		    </div>
		  </div>

		    <div class="form-group row col-md-12">
		    <label for="staticEmail" class="col-sm-2 col-form-label">Price</label>
		    <div class="col-sm-8">
		      <input type="number" class="form-control"  name="price" id="price" >
		    </div>
		  </div>

		  <div class="form-group row col-md-12">
		   <label for="staticEmail" class="col-sm-2 col-form-label">Select Distributors</label>
		    <div class="col-sm-8">
		      <select class="form-control" name="distributor" id="distributor" onchange="checkdisable()" >
		      	<option>select distributor</option>
		      	<?php
		      	while($rowdis=mysqli_fetch_object($resultdis))
		      	{
		      		?>  <option><?php echo $rowdis->cname;?>  		</option><?php
		      	}
		      	?>
		      </select>
		    </div>
		  </div>

		  <div class="form-group row col-md-12">
		    <label for="inputPassword" class="col-sm-2 col-form-label">Address</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" name="address" value="<?php echo $row->address;?>" id="address">
		    </div>
		  </div>

		   <div class="form-group row col-md-12">
		    <label for="inputPassword" class="col-sm-2 col-form-label">Mobile</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" name="mobile" value="<?php echo $row->mobile;?>" id="mobile">
		    </div>
		  </div>

		  <div class="form-group row col-md-12">
		    <label for="inputPassword" class="col-sm-2 col-form-label"></label>
		    <div class="col-sm-8">
		      <input type="submit" class="btn btn-primary" value="Book Your Cyllinder" name="book" disabled>
		    </div>
		  </div>
		</form>

</div>
<!-- //register -->
	

<?php require "footer.php";?>

	
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
function gastype()
{
var type=$('#type').val();
var qty=$('#qty').val();

$.ajax({
	   type:"POST",url:"gas_details.php",data:{type:type},dataType:"JSON",
	   success:function(data)
	   {
	   	
	   	$('#price').val(data.price*qty);
	   	
	   }
		});

}

function checkdisable()
{
	var type_index=$('#type option:selected').index();
	var dis_index=$('#distributor option:selected').index();
	if(type_index>0 && dis_index>0)
	{
		 $("input[type=submit]").removeAttr("disabled");
	}
	else
		{
			// alert("select Gas type and Distributor");
		}
    
}
</script>

<?php
if(isset($_POST['book']))
{

	$date=date("Y/m/d");
	 $qty=$_POST['qty'];
     $type=$_POST['type'];
     $price=$_POST['price'];
     $distributor=$_POST['distributor'];
	// echo "<script>alert('$login_id');</script>";
	 //echo "<script>alert('$distributor');</script>";

	 $sql="insert into booking(date,customer_id,qty,type,price,distributor,status)
	 values('$date','$login_id','$qty','$type','$price','$distributor','booked')";
	 $newdate= date('Y-m-d', strtotime($date. ' + 7 days'));
	 
	 if(mysqli_query($con,$sql))
	 {
	 	echo "<script>alert('Booking Successfull');</script>";
	 	$msg="Your cyllinder is orderd.Which deliver on ".$newdate;
	 	$sqlnoti="insert into notification(login_id,date,msg)values('$login_id','$date','$msg')";
	 	mysqli_query($con,$sqlnoti);
	 }
	 else
	 {
	 	echo "<script>alert('Booking Try again');</script>";
	 }



}

?>