<?php
require "session.php";
require "dbconfig.php";


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
			<h3>change password</h3>
		</div>
	</div>
	<div class="container">
		<form id="booking" method="post">

			<div class="form-group row col-md-12">
		    <label for="staticEmail" class="col-sm-2 col-form-label">Old password</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" name="old"  required>
		    </div>
		  </div>

		  <div class="form-group row col-md-12">
		    <label for="staticEmail" class="col-sm-2 col-form-label">New password</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" name="new" required>
		    </div>
		  </div>

		  

		 <div class="form-group row col-md-12">
		    <label for="inputPassword" class="col-sm-2 col-form-label"></label>
		    <div class="col-sm-8">
		      <input type="submit" class="btn btn-primary" value="change" name="change" >
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
<?php include "password.php";?>


