<?php 
require 'connection.inc.php';
global $mat_code;
$mat_code = isset($_POST['mat'])?$_POST['mat']:'not yet';
//echo $mat_code;
mysqli_query($con,"DELETE FROM current_completeorder WHERE mat_code = '$mat_code'");

?>