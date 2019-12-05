<?php
require "session.php";
require "dbconfig.php";


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
			<?php require "user_menu.php"; ?>
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
					<input type="text" class="form-control" name="old" required>
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
					<input type="submit" class="btn btn-primary" value="change" name="change">
				</div>
			</div>
		</form>

	</div>
	<!-- //register -->


	<?php require "footer.php"; ?>


</body>

</html>
<?php include "password.php"; ?>