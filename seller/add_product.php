<?php
require("dbconfig.php");
$sql = "select * from menu order by orderid asc";
$result = mysqli_query($con, $sql);





?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Art Gallery</title>

    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.metisMenu.js"></script>
    <script src="jui/jquery-ui.js"></script>
    <link href="jui/jquery-ui.css" rel="stylesheet" />

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
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <?php
                    while ($row = mysqli_fetch_object($result)) {
                        ?>
                        <li><a href="<?php echo $row->link; ?>"><?php echo $row->title; ?></a> </li>

                    <?php
                    }
                    ?>


                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div>

                <div class="row">
                    <div class="col-md-12">
                        <h2 class="panel panel-primary text-center no-boder bg-color-red">Add New Art</h2>


                    </div>
                </div>
                <!--new row end-->
                <form id="form1" enctype="multipart/form-data">
                    <div class="form-group">
                        <label id="error"></label>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Art Name</label>
                            <input type="text" class="form-control" data-error="Enter Art name" data-sc-type="text" name="artname">
                        </div>

                        <div class="form-group">
                            <label>Art image</label>
                            <input type="file" class="form-control" data-error="Upload image" data-sc-type="text" name="image">
                        </div>

                        <div class="form-group">
                            <label>Specification</label>
                            <input type="text" class="form-control" data-error="Enter Specification" data-sc-type="text" name="specification">
                        </div>

                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" class="form-control" data-error="Enter price" data-sc-type="text" name="price">
                        </div>

                        <button type="button" class="btn btn-primary" onclick="saverecord();">Submit</button>
                    </div>
                </form>

            </div>

        </div>

    </div>


</body>

</html>
<script>
    function saverecord() {

        if (inputvalidation('form1', 'error')) {
            $("#error").text('');
            var form = $('#form1')[0];
            var formData = new FormData(form);
            $.ajax({
                type: "POST",
                url: "product_add.php",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $("#error").text(data);
                }
            });
        }
    }
</script>