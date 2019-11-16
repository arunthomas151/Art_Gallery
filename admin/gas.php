<?php
require("dbconfig.php");
require "session.php";

$sql="select * from gas";
$result=mysqli_query($con,$sql);






?>

<!DOCTYPE html>
<html >
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>welcome </title>
	
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
                <a class="navbar-brand" >Admin</a> 
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
                <li><a href="home.php">Orders</a> </li>
                <li><a href="payment.php">Subsidy Payment</a> </li>
                <li><a href="view_dis.php">view Distributors</a> </li>
                <li><a href="view_customers.php">view customer</a> </li>
                <li><a href="change_password.php">change password</a></li>
                <li><a href="add_locality.php">Add locality</a></li>
                <li><a href="gas.php">Add gas type</a></li>
                </ul>   

                     
                        
     
               
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div >
              <h2>Gas Type</h2>
              <div class="col-md-6">

                <select class="form-control" id="gas_id" >
                <?php
                while($row=mysqli_fetch_array($result))
                {
                  ?> <option value="<?php echo $row[0] ?>"> <?php echo $row[1];?></option><?php
                }

                ?>
                 

               </select>
               
               </div>

               <div class="col-md-4">
                 <input type="button" class="btn btn-info" id="search" value="search">
               </div>
               <br><br>

              

              
               


               <table id="customers">
       <tr>
          <th>Gas type</th>
          <th>Amount</th> 
          <th>Action</th>
       </tr>
      <tr>
          <td><input type="text" name="gastype" id='type'>
            <input type="hidden" name="id" id='id'></td>
          <td><input type="text" name="amt" id='amt'></td> 
          <td>
            <input type="button" id='save' class="btn btn-sm btn-primary" value="Add">
            <input type="button" id='edit' class="btn btn-sm btn-info" value="edit">

          </td>
       </tr>
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
<script type="text/javascript">
  
  $('#save').click(function(){ 
  var type=$('#type').val();
  var amt=$('#amt').val();
  $.ajax({ type:"POST",url:"gas_op.php",data:{type:type,amt:amt },success:function(data){ 
    $('#type').val(''); $('#amt').val(''); alert(data)} });
  });

  $('#search').click(function(){ 
    var id=$('#gas_id option:selected').val();
    $.ajax({ type:"POST",url:"gas_op.php",data:{id:id},dataType:"JSON",success:function(data) 
      {   $('#type').val(data.gtype);$('#amt').val(data.amt);$('#id').val(data.gas_id);  } })
  });

$('#edit').click(function(){ 
  var type=$('#type').val();
  var amt=$('#amt').val();
  var edit_id=$('#id').val();
  $.ajax({ type:"POST",url:"gas_op.php",data:{edit_id:edit_id,type:type,edit_amt:amt },success:function(data){ 
    $('#type').val(''); $('#amt').val(''); alert(data)} });
  });
</script>


;