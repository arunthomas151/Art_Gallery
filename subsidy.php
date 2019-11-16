<?php
require "session.php";
require "dbconfig.php";
$customer_id=$_SESSION['login_id'];
$sqlcheck1="select * from subsidy where customer_id='$customer_id'";
$result1=mysqli_query($con,$sqlcheck1);
	if(mysqli_num_rows($result1)==0)
	{
		$oldacno="";
		$oldacname="";
		$oldifsc="";
	}
	else
	{
		$row1=mysqli_fetch_object($result1);
		$oldacno=$row1->acno;
		$oldacname=$row1->acname;
		$oldifsc=$row1->ifsc;
	}




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
			<h3>Subsidy A/c</h3>
		</div>
	</div>
	<div class="container">
		<form id="booking" method="post">

			<div class="form-group row col-md-12">
		    <label for="staticEmail" class="col-sm-2 col-form-label">A/c No</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" name="acno" value="<?php echo $oldacno;?>" required>
		    </div>
		  </div>

		  <div class="form-group row col-md-12">
		    <label for="staticEmail" class="col-sm-2 col-form-label">A/c name</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" name="acname" value="<?php echo $oldacname;?>" required>
		    </div>
		  </div>

		   <div class="form-group row col-md-12">
		    <label for="staticEmail" class="col-sm-2 col-form-label">IFSC code</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" name="ifsc" value="<?php echo $oldifsc;?>" required>
		    </div>
		  </div>

		 <div class="form-group row col-md-12">
		    <label for="inputPassword" class="col-sm-2 col-form-label"></label>
		    <div class="col-sm-8">
		      <input type="submit" class="btn btn-primary" value="Update" name="update" >
		    </div>
		  </div>
		</form>

</div>
<!-- //register -->
	

<?php require "footer.php";?>

	
<!-- //footer -->	
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

	
<script src="js/minicart.min.js"></script>

<script src="js/skdslider.min.js"></script>
<link href="css/skdslider.css" rel="stylesheet">


</body>
</html>



<?php
if(isset($_POST['update']))
{

	
	$acno=$_POST['acno'];
	$acname=$_POST['acname'];
	$ifsc=$_POST['ifsc'];
	

	$sqlcheck="select * from subsidy where customer_id='$customer_id'";
	$result=mysqli_query($con,$sqlcheck);
	if(mysqli_num_rows($result)==0)
	{
		$sql="insert into subsidy(customer_id,acno,acname,ifsc)values('$customer_id','$acno','$acname','$ifsc')";
		 if(mysqli_query($con,$sql))
	     {
	 	    echo "<script>alert('Subsidy information added!');</script>";
	 		
	     }
		 else
		 {
		 	echo "<script>alert(' Try again');</script>";
		 }

	}
	else
	{
		$sql="update subsidy set acno='$acno',acname='$acname',ifsc='$ifsc' where customer_id='$customer_id'";
		if(mysqli_query($con,$sql))
	     {
	 	    echo "<script>alert('Subsidy information Updated!');</script>";
	 		
	     }
		 else
		 {
		 	echo "<script>alert(' Try again');</script>";
		 }

	}

	 



}

?>