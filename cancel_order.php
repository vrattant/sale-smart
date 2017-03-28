<?php
require 'connection.inc.php';
$no =isset($_POST['id'])?$_POST['id']:'not yet';
mysqli_query($con, "update order_header set order_status = 'CANC' where order_no = '$no'");
mysqli_query($con, "update order_header set shipment_date = 'NIL' where order_no = '$no'");
$result = mysqli_query($con,"select * from order_detail where order_no = '$no'");
while($row = mysqli_fetch_array($result)){
	$code = $row['mat_code'];
	$qty = $row['item_qty'];
	$result1 = mysqli_query($con,"select * from stock_master where mat_code = '$code'");
	$row1 = mysqli_fetch_array($result1);
	$current_qty = $row1['stock_qty'];
	mysqli_query($con, "update stock_master set stock_qty = ('$current_qty'+'$qty') where mat_code = '$code'");
	}
?>