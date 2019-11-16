<?php
session_start();

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
					<li><a href="login_admin.php">Admin Login</a></li>
					<li><a href="login_user.php">Consumer Login</a></li>
					
					<li><a href="login_distributor.php">Distributors Login</a></li>
					
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
			<?php require "common_menu.php";?>
			</div>
		</div>
		
<!-- //navigation -->
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<h3>Login Distributors Account</h3>
		</div>
	</div>
	<div class="container">
		<form method="post">
		  <div class="form-group row col-md-7">
		    <label for="staticEmail" class="col-sm-4 col-form-label">Mobile No</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" name="mobile" required>
		    </div>
		  </div>
		  <div class="form-group row col-md-7">
		    <label for="inputPassword" class="col-sm-4 col-form-label">Password</label>
		    <div class="col-sm-8">
		      <input type="password" class="form-control" name="password" >
		    </div>
		  </div>

		  <div class="form-group row col-md-7">
		    <label for="inputPassword" class="col-sm-4 col-form-label"></label>
		    <div class="col-sm-8">
		      <input type="submit" class="btn btn-primary" value="Submit" name="login">
		    </div>
		  </div>
		</form>

</div>
<!-- //register -->
<!-- //footer -->
	




<!-- //footer -->	
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

	
<script src="js/minicart.min.js"></script>

<script src="js/skdslider.min.js"></script>
<link href="css/skdslider.css" rel="stylesheet">


</body>
</html>
<?php
if(isset($_POST['login']))
{
	require "dbconfig.php";
	 $mobile=$_POST['mobile'];
	 $password=$_POST['password'];
	 $sql="select * from distributor where mobile='$mobile' and password='$password'";
	 $result=mysqli_query($con,$sql);
	 $num=mysqli_num_rows($result);
	 if($num==1)
	 {
	 	$row=mysqli_fetch_object($result);
	 	//echo "<script>alert('$row->name');</script>";
	 	$_SESSION['login_id']=$row->id;
	 	$_SESSION['cname']=$row->cname;
	 	echo '<script type="text/javascript">window.location="distributor/view_orders.php"</script>';
	 }
	 else
	 {
	 	echo "<script>alert('Invalid login');</script>";
	 }
	
}