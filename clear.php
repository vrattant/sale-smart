<?php
require 'connection.inc.php';
$no =isset($_POST['id'])?$_POST['id']:'not yet';
mysqli_query($con, "update order_header set order_status = 'CLRD' where order_no = '$no'");

?>