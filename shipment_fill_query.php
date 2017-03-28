<?php
require 'connection.inc.php';
$date =isset($_POST['id1'])?$_POST['id1']:'not yet';
$name =isset($_POST['id2'])?$_POST['id2']:'not yet';
$no =isset($_POST['id3'])?$_POST['id3']:'not yet';
$cno =isset($_POST['id4'])?$_POST['id4']:'not yet';
mysqli_query($con, "update order_header set order_status = 'SHIP', transporter_name = '$name', shipment_date = '$date', delivery_challan_no = '$cno' where order_no = '$no'");

?>