<?php
require "dbconfig.php";
$sql = "select * from location";
$result = mysqli_query($con, $sql);

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
	<!-- //header -->
	<!-- navigation -->
	<div class="navigation-agileits">
		<div class="container">
			<?php require "common_menu.php"; ?>
		</div>
	</div>

	<!-- //navigation -->
	<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<h3>Buyer Registration</h3>
		</div>
	</div>
	<div class="container">
		<form id="consumer">
			<div class="form-group row col-md-7">
				<label for="staticEmail" class="col-sm-4 col-form-label">Name</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="name" name="name">
				</div>
			</div>

			<div class="form-group row col-md-7">
				<label for="inputPassword" class="col-sm-4 col-form-label">Address</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="address" name="address">
				</div>
			</div>

			<div class="form-group row col-md-7">
				<label for="inputPassword" class="col-sm-4 col-form-label">Mobile</label>
				<div class="col-sm-8">
					<input type="number" class="form-control" id="number" name="number">
				</div>
			</div>

			<div class="form-group row col-md-7">
				<label for="inputPassword" class="col-sm-4 col-form-label">Dob</label>
				<div class="col-sm-8">
					<input type="date" class="form-control" id="date" name="date">
				</div>
			</div>

			<div class="form-group row col-md-7">
				<label for="inputPassword" class="col-sm-4 col-form-label">Email</label>
				<div class="col-sm-8">
					<input type="email" class="form-control" id="email" name="email">
				</div>
			</div>



			<div class="form-group row col-md-7">
				<label for="inputPassword" class="col-sm-4 col-form-label">Location</label>
				<div class="col-sm-8">
					<select class="form-control" onchange="getstate()" id="location" name="location">
						<option>select Location</option>
						<?php
						while ($row = mysqli_fetch_object($result)) {
							?> <option><?php echo $row->loc; ?> </option><?php
																			}
																			?>
					</select>
				</div>
			</div>

			<div class="form-group row col-md-7">
				<label for="inputPassword" class="col-sm-4 col-form-label">District</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="district" name="district">
				</div>
			</div>

			<div class="form-group row col-md-7">
				<label for="inputPassword" class="col-sm-4 col-form-label">State</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="state" name="state">
				</div>
			</div>


			<div class="form-group row col-md-7">
				<label for="inputPassword" class="col-sm-4 col-form-label">Password</label>
				<div class="col-sm-8">
					<input type="password" class="form-control" id="password" name="password">
				</div>
			</div>
			<div class="form-group row col-md-7">
				<label for="inputPassword" class="col-sm-4 col-form-label">Confirm Password</label>
				<div class="col-sm-8">
					<input type="password" class="form-control" id="cpassword" name="cpassword">
				</div>
			</div>

			<div class="form-group row col-md-7">
				<label for="inputPassword" class="col-sm-4 col-form-label"></label>
				<div class="col-sm-8">
					<input type="button" class="btn btn-primary" value="Submit" onclick="save();">
				</div>
			</div>

		</form>

	</div>
	


	<div class="footer-botm">
		
	</div>



</body>

</html>
<script type="text/javascript">
	function save() {

		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		var name = $("#name").val();
		var address = $("#address").val();
		var number = $("#number").val();
		var date = $("#date").val();
		var email = $("#email").val();
		var location = $("#location").val();
		var district = $("#district").val();
		var state = $("#state").val();
		var password = $("#password").val();
		var cpassword = $("#cpassword").val();


		if (name == "" || address == "" || date == "" || location == "" || district == "" || state == "" || password == "" || cpassword == "") {
			alert("All fields is mandatoey");
		} else if (number.length < 10) {
			alert("invalid mobile number");
		} else if (password != cpassword) {
			alert("confirm password is incorrect");
		} else if (!emailReg.test(email)) {
			alert("invalid email");
		} else {
			$.ajax({
				type: "POST",
				url: "newbuyer_add.php",
				data: $('#consumer').serialize(),
				success: function(data) {
					alert(data);
					$('#consumer')[0].reset();
				}
			});
		}

	}

	function getstate() {
		var loc = $("#location").val();
		$.ajax({
			type: "POST",
			url: "getstate.php",
			data: {
				loc: loc
			},
			dataType: "json",
			success: function(data) {
				$("#district").val(data.dis);
				$("#state").val(data.state);

			}
		});
	}
</script>