<?php
require("dbconfig.php");
require "session.php";
$sqluser = "select a.id,a.artname,a.price,s.name from art a inner join seller s where s.id = a.login_id and a.status='Deactive'";
$result = mysqli_query($con, $sqluser);

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
                <h2>Art's</h2>
                <table id="customers">
                    <thead>
                        <tr>
                            <th>Art Name</th>
                            <th>Seller Name</th>
                            <th>Price</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        while ($row1 = mysqli_fetch_object($result)) {
                            ?>
                            <tr>
                                <form method="post">
                                    <td><?php echo $row1->artname; ?></td>
                                    <td><?php echo $row1->name; ?></td>
                                    <td><?php echo $row1->price; ?></td>
                                    <td><button type="submit" onclick="approve('<?php echo $row1->id ?>');" class="btn btn-danger">Approve</button></td>
                                </form>
                            <tr>
                            <?php
                            }

                            ?>
                    </tbody>
                </table>
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
<script type="text/javascript">
    function approve(id) {

        $.ajax({
            type: "POST",
            url: "approve.php",
            data: {
                id: id
            },
            success: function(data) {

                alert(data);

            }
        });
    }
</script>