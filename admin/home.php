<?php
require("dbconfig.php");
require "session.php";

$sqlorder = "select b.id,a.artname,b.total,b.name as buyername,s.name as sellername from booking b inner join art a inner join seller s where s.id = a.login_id and a.id = b.art_id and b.status='booked'";
$resultorder = mysqli_query($con, $sqlorder);





?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Art Gallery </title>

  <link href="assets/css/dataTables.bootstrap.css" rel="stylesheet" />
  <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <link href="assets/css/custom.css" rel="stylesheet" />
  <script src="assets/js/jquery-1.10.2.js"></script>
  <script src="assets/js/jquery-3.2.1.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.metisMenu.js"></script>
  <script src="assets/js/custom.js"></script>
  <script src="jui/jquery-ui.js"></script>
  <link href="jui/jquery-ui.css" rel="stylesheet" />
  <script src="assets/css/jquery.dataTables.js"></script>

  <script src="sc/smartcode.validation.js"></script>
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
    <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
      <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
          <li><a href="home.php">Orders</a> </li>
          <li><a href="view_buyers.php">view Buyers</a> </li>
          <li><a href="view_seller.php">view Seller</a> </li>
          <li><a href="change_password.php">change password</a></li>
          <li><a href="add_locality.php">Add locality</a></li>
        </ul>

      </div>

    </nav>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
      <div>
        <h2>Orders</h2>

        <table id="customers">
          <tr>
            <th>Art Name</th>
            <th>Seller Name</th>
            <th>Buyer Name</th>
            <th>Total</th>
            <th>Action</th>

          </tr>
          <?php

          while ($row1 = mysqli_fetch_object($resultorder)) {
            ?>
            <tr>
              <form method="post">
                <input type="hidden" name="order_id" value="<?php echo $row1->id; ?>">
                <td><?php echo $row1->artname; ?></td>
                <td><?php echo $row1->buyername; ?></td>
                <td><?php echo $row1->sellername; ?></td>
                <td><?php echo $row1->total; ?></td>
              </form>
            <tr>
            <?php
            }

            ?>
        </table>


      </div>

    </div>
  </div>
  </div>
  <!-- End Form Elements -->
  </div>
  </div>


  </div>
  <!-- /. PAGE INNER  -->
  </div>


  </div><!-- /. PAGE INNER  -->
  </div> <!-- /. PAGE WRAPPER  -->
  </div><!-- /. WRAPPER  -->


  <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
  <!-- JQUERY SCRIPTS -->

  <div id="output_msg" title="Adoei Mailer">

  </div>

</body>

</html>

<script type="text/javascript">
  $(document).ready(function() {
    $('#customers').DataTable({
      "pageLength": 10,
      "processing": true,
    });
  });
</script>