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
			<h3>Seller Registration</h3>
		</div>
	</div>
	<div class="container">
		<form id="seller">

			<div class="form-group row col-md-7">
				<label for="staticEmail" class="col-sm-4 col-form-label">Company Name</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="cname" name="cname">
				</div>
			</div>
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
				<label for="inputPassword" class="col-sm-4 col-form-label">Email</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="email" name="email">
				</div>
			</div>

			<div class="form-group row col-md-7">
				<label for="inputPassword" class="col-sm-4 col-form-label">Locality</label>
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
				<label for="inputPassword" class="col-sm-4 col-form-label"></label>
				<div class="col-sm-8">
					<input type="button" class="btn btn-primary" value="Submit" onclick="save();">
				</div>
			</div>

		</form>

	</div>
	<!-- //register -->
	<!-- //footer -->
	<div class="footer">
		<div class="container">
			<div class="w3_footer_grids">
				<div class="col-md-3 w3_footer_grid">
					<h3>Contact</h3>

					<ul class="address">
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>1234k Avenue, 4th block, <span>New York City.</span></li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">info@example.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 567</li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Information</h3>
					<ul class="info">
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="about.html">About Us</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="contact.html">Contact Us</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="short-codes.html">Short Codes</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="faq.html">FAQ's</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="products.html">Special Products</a></li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Category</h3>
					<ul class="info">
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="groceries.html">Groceries</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="household.html">Household</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="personalcare.html">Personal Care</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="packagedfoods.html">Packaged Foods</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="beverages.html">Beverages</a></li>
					</ul>
				</div>

				<div class="col-md-3 w3_footer_grid">
					<h3>Profile</h3>
					<ul class="info">
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="products.html">Store</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="checkout.html">My Cart</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="login.html">Login</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="registered.html">Create Account</a></li>
					</ul>


				</div>
				<div class="clearfix"> </div>
			</div>
		</div>



	</div>



	<div class="footer-botm">
		<div class="container">
			<div class="w3layouts-foot">
				<ul>
					<li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					<li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
					<li><a href="#" class="w3_agile_vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
				</ul>
			</div>
			<div class="payment-w3ls">
				<img src="images/card.png" alt=" " class="img-responsive">
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
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
	function save() {
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		var cname = $("#cname").val();
		var name = $("#name").val();
		var address = $("#address").val();
		var number = $("#number").val();
		var email = $("#email").val();
		var location = $("#location").val();
		var district = $("#district").val();
		var state = $("#state").val();
		var password = $("#password").val();

		if (cname == "" || name == "" || address == "" || location == "" || district == "" || state == "" || password == "") {
			alert("All fields is mandatoey");
		} else if (number.length != 10) {
			alert("invalid mobile number");
		} else if (!emailReg.test(email)) {
			alert("invalid email");
		} else {

			//alert($('#seller').serialize());
			$.ajax({
				type: "POST",
				url: "seller_add.php",
				data: $('#seller').serialize(),
				success: function(data) {
					alert(data);
					$('#seller')[0].reset();
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


	function validateEmail(sEmail) {
		var filter = /^[w-.+]+@[a-zA-Z0-9.-]+.[a-zA-z0-9]{2,4}$/;
		if (filter.test(sEmail)) {
			return true;
		} else {
			return false;
		}
	}
</script>