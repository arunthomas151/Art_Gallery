<?php
session_start();

?>
<!DOCTYPE html>
<html>

<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<script src="js/jquery-1.11.1.min.js"></script>

</head>

<body>
	<div class="agileits_header">
		<div class="container">
			<div class="w3l_offers">

			</div>
			<div class="agile-login">
				<ul>
					<li><a href="login_admin.php">Admin Login</a></li>
					<li><a href="login_buyer.php">Buyer Login</a></li>
					<li><a href="login_seller.php">Seller Login</a></li>

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
	<div class="navigation-agileits">
		<div class="container">
			<?php require "common_menu.php"; ?>
		</div>
	</div>
	<div class="breadcrumbs">
		<div class="container">
			<h3>Login Buyer Account</h3>
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
					<input type="password" class="form-control" name="password">
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
	
</body>

</html>
<?php
if (isset($_POST['login'])) {
	require "dbconfig.php";
	$mobile = $_POST['mobile'];
	$password = $_POST['password'];
	$sql = "select * from buyer where mobile='$mobile' and password='$password' and status='Active'";
	$result = mysqli_query($con, $sql);
	$num = mysqli_num_rows($result);
	if ($num == 1) {
		$row = mysqli_fetch_object($result);
		//echo "<script>alert('$row->name');</script>";
		$_SESSION['login_id'] = $row->id;
		echo '<script type="text/javascript">window.location="user_home.php"</script>';
	} else {
		echo "<script>alert('Invalid login');</script>";
	}
}
?>