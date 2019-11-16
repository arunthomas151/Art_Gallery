<?php
require("dbconfig.php");
require "session.php";
$sql="select * from menu order by orderid asc";
$result=mysqli_query($con,$sql);

$sqlorder="select * from booking where seller='$cname' and status='cancel'";
$resultorder=mysqli_query($con,$sqlorder);





?>

<!DOCTYPE html>
<html >
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Art Gallery </title>
	
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
     
    <script src="sc/smartcode.validation.js"></script>
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  margin-bottom:50px;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: orage;}

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
                <a class="navbar-brand" >Seller</a> 
            </div>
  <div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;"> 
    Last access : 
     <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a>
   
  </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse" >
                <ul class="nav" id="main-menu">

                    <?php
                    while ($row = mysqli_fetch_object($result))
                    {
                    ?>
                        <li><a  href="<?php echo $row->link;?>"><?php echo $row->title;?></a> </li>

                    <?php
                    }
                    ?>
				
				    
                </ul>   

                     
                        
     
               
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div >
              <h2>View Cancelled Orders</h2>
               
               <table id="customers">
       <tr>
          <th>Date</th>
          <th>Customer</th> 
          <th>Type</th>
           <th>Price</th>
         
         
       </tr>
       <?php

       while ($row1=mysqli_fetch_object($resultorder)) 
       {
        ?>
        <tr>
        <form method="post">
         <td><?php echo $row1->date;?></td>
           <td><?php echo $row1->buyer_id?></td> 
            <td><?php echo $row1->type?></td> 
            <td><?php echo $row1->price?></td>
          
          
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
   
    <div id = "output_msg" title = "Adoei Mailer">
   
   </div> 
   
</body>
</html>
<script >
    function saverecord()
    {

        if(inputvalidation('form1','error')&&dropdownvalidation('select1','error'))
            {
                $("#error").text('');
               var form = $('#form1')[0]; 
               var formData = new FormData(form);
                  $.ajax({
                  type  : "POST",
                  url   : "add_cars1.php",
                  data  : formData,
                  contentType:false,           
                  cache:false,                
                  processData:false,
                  success: function(data) {         
                    $("#error").text(data);
                  }
                });
            }
    }
</script>

