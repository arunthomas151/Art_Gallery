<?php
require("dbconfig.php");
require "session.php";
$columns = array( 
    0 => 'artname',
    1 => 'buyername',
    2 => 'sellername',
    3 => 'total',
);

$sql = "select b.id,a.artname,b.total,b.name as buyername,s.name as sellername from booking b inner join art a inner join seller s where s.id = a.login_id and a.id = b.art_id and b.status != 'cancel'";
$res = mysqli_query($con, $sql) or die("Error: ".mysqli_error($con));
$dataArray = array();
while( $row = mysqli_fetch_array($res) ) {


    $dataArray[] = $row["artname"];
    $dataArray[] = $row["buyername"];
    $dataArray[] = $row["sellername"];
    $dataArray[] = $row["total"];

}

echo json_encode($dataArray);
?>
