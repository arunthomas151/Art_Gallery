<?php
include "session.php";
$id = $_GET['id'];
require("dbconfig.php");
$sql = "select * from art where id='$id'";
$result = mysqli_query($con, $sql);

$sqluser = "select * from buyer where id='$login_id'";
$userdetails = mysqli_query($con, $sqluser);
$row1 = mysqli_fetch_object($userdetails);
?>
<!DOCTYPE html>
<html>

<head>
	<title>Art Gallery</title>
	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
			<?php require "user_menu.php"; ?>
		</div>
	</div>

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
				</div>
				<div class="col-md-2">
					<?php $subcharge = 50; ?>
					<h4 class="price"><b>Price :</b><?php echo $row->price; ?></h4>
					<h4 class="price"><b>Delivery Charge :</b><?php echo $subcharge; ?></h4>
					<h4 class="price"><b>Total :</b><?php echo $row->price + $subcharge; ?></h4>
					<?php $total = $row->price + $subcharge; ?>
				</div>
			<?php
			}
			?>
		</div>
		<div class="breadcrumbs">
			<div class="container">

			</div>
		</div>
		<div class="row">
			<div class="col-md-8" id="adjust">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Order Your Art</h3>
					</div>
					<div class="panel-body">
						<form method="post">
							<div class="form-group row col-md-8">
								<label for="staticEmail" class="col-sm-4 col-form-label">Name</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="name" name="name" value="<?php echo $row1->name; ?>">
								</div>
							</div>
							<div class="form-group row col-md-8">
								<label for="inputPassword" class="col-sm-4 col-form-label">Address</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="address" name="address" value="<?php echo $row1->address; ?>">
								</div>
							</div>
							<div class="form-group row col-md-8">
								<label for="inputPassword" class="col-sm-4 col-form-label">Mobile</label>
								<div class="col-sm-8">
									<input type="number" class="form-control" id="number" name="mobile" value="<?php echo $row1->mobile; ?>">
								</div>
							</div>

							<div class="form-group row col-md-8">
								<label for="inputPassword" class="col-sm-4 col-form-label">Email</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="address" name="email" value="<?php echo $row1->email; ?>">
								</div>
							</div>

							<div class="form-group row col-md-8">
								<label for="inputPassword" class="col-sm-4 col-form-label"></label>
								<div class="col-sm-8">
									<input type="submit" class="btn btn-danger" value="Confirm Order" name="book">
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php require "footer.php"; ?>
</body>

</html>
<?php
if (isset($_POST['book'])) {
	$name = $_POST['name'];
	$date = date("Y/m/d");
	$mobile = $_POST['mobile'];
	$bsql = "insert into booking(date,buyer_id,art_id,name,mobile,total,status)values('$date','$login_id','$id','$name','$mobile','$total','booked')";
	if (mysqli_query($con, $bsql)) {
		echo $book_id = mysqli_insert_id($con);
		echo "<script>alert('booked successfull');</script>";
		$newdate = date('Y-m-d', strtotime($date . ' + 10 days'));
		$msg = "Your booking is orderd.Expecte deliver on " . $newdate;
		$sqlnoti = "insert into notification(date,book_id,login_id,msg)values('$date','$book_id','$login_id','$msg')";
		mysqli_query($con, $sqlnoti);
		echo "<script>window.location.href='artdetails.php';</script>";
	} else {
		echo "<script>alert('Try again');</script>";
	}
}
?>