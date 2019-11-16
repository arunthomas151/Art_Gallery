<?php
require("dbconfig.php");



$artid = $_POST['artid'];
$sql = "select * from art where id='$artid'";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_object($result)) {
    $data['artid'] = $row->id;
    $data['artname'] = $row->artname;
    $data['specification'] = $row->specification;
    $data['price'] = $row->price;
}
echo json_encode($data);
