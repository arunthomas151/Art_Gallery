<?php

require "session.php";
require "dbconfig.php";
$sql = "select * from notification where login_id='$login_id'";
$result = mysqli_query($con, $sql);




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
			<h3>Notifications</h3>
		</div>
	</div>
	<div class="container">
		<ul class="list-group">
			<?php
			while ($row = mysqli_fetch_object($result)) {
				?>
				<li class="list-group-item list-group-item-success"><?php echo $row->msg; ?></li>

			<?php

			}

			?>


		</ul>

	</div>
	<!-- //register -->
	<!-- //footer -->
	<?php
	require "footer.php";
	?>


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