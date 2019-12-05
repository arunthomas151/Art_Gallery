<?php
require("dbconfig.php");
//require ("session.php");
$sql = "select * from menu order by orderid asc";
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

  <script src="sc/smartcode.validation.js"></script>
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
        <div class="row">
          <div class="col-md-12">
            <h2 class="panel panel-primary text-center no-boder bg-color-red">Add Locality</h2>
          </div>
        </div>
        <form id="form1" enctype="multipart/form-data">
          <div>
            <div id="page-inner">
              <hr />
              <div class="row">
                <div class="col-md-12">
                  <div class="panel panel-default">
                    <div class="panel-body">
                      <div class="row">
                        <div class="form-group">
                          <label id="error"></label>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <select class="form-control" name="state" id="state" data-error="selet State">
                              <option>Select State</option>
                              <option>Andra Pradesh</option>
                              <option>Arunachal Pradesh</option>
                              <option>Assam</option>
                              <option>Bihar</option>
                              <option>Chhattisgarh</option>
                              <option>Goa</option>
                              <option>Gujarat</option>
                              <option>Haryana</option>
                              <option>Himachal Pradesh</option>
                              <option>Jammu and Kashmir</option>
                              <option>Jharkhand</option>
                              <option>Karnataka</option>
                              <option>Kerala</option>
                              <option>Madya Pradesh</option>
                              <option>Maharashtra</option>
                              <option>Manipur</option>
                              <option>Meghalaya</option>
                              <option>Mizoram</option>
                              <option>Nagaland</option>
                              <option>Orissa</option>
                              <option>Punjab</option>
                              <option>Rajasthan</option>
                              <option>Sikkim</option>
                              <option>Tamil Nadu</option>
                              <option>Telagana</option>
                              <option>Tripura</option>
                              <option>Uttaranchal</option>
                              <option>Uttar Pradesh</option>
                              <option>West Bengal</option>
                              <select>
                          </div>
                          <div class="form-group">
                            <label>District Name</label>
                            <input type="text" class="form-control" data-error="Enter District" data-sc-type="text" name="dis">
                          </div>
                          <div class="form-group">
                            <label>location</label>
                            <input type="text" class="form-control" data-error="Enter Locality" data-sc-type="text" name="loc">
                          </div>
        </form>
        <button type="button" class="btn btn-primary" onclick="saverecord();">Submit</button>
      </div>
    </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  <div id="output_msg" title="Adoei Mailer">
  </div>
</body>

</html>
<script>
  function saverecord() {
    if (dropdownvalidation('state', 'error') && inputvalidation('form1', 'error')) {
      $("#error").text('');
      var form = $('#form1')[0];
      var formData = new FormData(form);
      $.ajax({
        type: "POST",
        url: "add_locationphp.php",
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
          $("#error").text(data);
          $('#form1')[0].reset();
        }
      });
    }
  }
</script>