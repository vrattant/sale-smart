<?php
require 'connection.inc.php';
$no =isset($_POST['id1'])?$_POST['id1']:'not yet';
$date =isset($_POST['id2'])?$_POST['id2']:'not yet';
$time = strtotime($date);
$newformat = date('d-m-Y',$time);
//echo $newformat;
mysqli_query($con, "update order_header set shipment_date = '$newformat' where order_no = '$no'");
mysqli_query($con, "update order_header set order_status = 'SCHD' where order_no = '$no'");
?>
