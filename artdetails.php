<?php
require "session.php";
require "dbconfig.php";
$sqluser = "select * from art where status='Active' and stock > 0";
$result = mysqli_query($con, $sqluser);


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
			<?php require "user_menu.php"; ?>
		</div>
	</div>

	<!-- //navigation -->
	<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">

		</div>
	</div>
	<div class="content">
		<div class="row">

			<?php
			while ($row = mysqli_fetch_object($result)) {
				?>
				<div class="col-md-3">
					<div class="img">

						<img src="seller/<?php echo $row->imagepath; ?>" alt="" width="250px">

					</div>


				</div>
				<div class="col-md-3">
					<h2 class="text"><?php echo $row->artname; ?></h2>
					<h4>Price:<?php echo $row->price; ?></h4>
					<h4><?php echo $row->specification; ?></h4>
					<a class="btn btn-danger" href="artbooking.php?id=<?php echo $row->id; ?>">Book Now</a>
				</div>


			<?php
			}
			?>

		</div>

	</div>
	<div class="breadcrumbs">
		<div class="container">

		</div>
	</div>
	<!-- //register -->


	<?php require "footer.php"; ?>


</body>

</html>
