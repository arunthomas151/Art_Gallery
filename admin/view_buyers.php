<?php
require("dbconfig.php");
require "session.php";

$sql = "select * from buyer where status = 'Active'";
$result = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Art Gallery </title>
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <link href="assets/css/custom.css" rel="stylesheet" />
  <script src="assets/js/jquery-3.2.1.min.js"></script>
  <style>
    #customers {
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
      margin-bottom: 50px;
    }

    #customers td,
    #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #customers tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    #customers tr:hover {
      background-color: orage;
    }

    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: orange;
      color: white;
    }
  </style>
</head>

<body>
  <div id="wrapper">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand">Admin</a>
      </div>
      <div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;">
        Last access :
        <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a>
      </div>
    </nav>
    <nav class="navbar-default navbar-side" role="navigation">
      <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
          <li><a href="home.php">Orders</a> </li>
          <li><a href="arts.php">view Art's</a> </li>
          <li><a href="view_buyers.php">view Buyers</a> </li>
          <li><a href="view_seller.php">view Seller</a> </li>
          <li><a href="change_password.php">change password</a></li>
          <li><a href="add_locality.php">Add locality</a></li>
        </ul>
      </div>
    </nav>
    <div id="page-wrapper">
      <div>
        <h2>view Buyer</h2>
        <table id="customers">
          <tr>
            <th>name</th>
            <th>address</th>
            <th>mobile</th>
            <th>Locality</th>
            <th>District</th>
            <th>Action</th>
          </tr>
          <?php

          while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
              <form method="post">
                <input type="hidden" name="buyer_id" value="<?php echo $row[0] ?>" id="buyer_id">
                <td><?php echo $row[1]; ?></td>
                <td><?php echo $row[2]; ?></td>
                <td><?php echo $row[3]; ?></td>
                <td><?php echo $row[6]; ?></td>
                <td><?php echo $row[7]; ?></td>
                <td><button type="submit" name="deactive" class="btn btn-danger">Deactive</button></td>
              </form>
            <tr>
            <?php
            }
            ?>
        </table>
      </div>
    </div>
  </div>
  <div id="output_msg" title="Adoei Mailer">
  </div>
</body>

</html>
<?php
if (isset($_POST['deactive'])) {
  require "dbconfig.php";
  $buyer_id = $_POST['buyer_id'];
  $sql = "UPDATE buyer set status='Deactive' where id='$buyer_id'";
  if (mysqli_query($con, $sql)) {
    echo "<script>alert('Successfully Deativated ');</script>";
    echo '<script type="text/javascript">window.location="view_buyers.php"</script>';
  } else {
    echo "Try again";
    echo mysqli_error($con);
  }
}

?>