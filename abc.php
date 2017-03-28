<?php
require 'connection.inc.php';
$result1 = mysqli_query($con,"select mat_code from current_completeorder");
$row1 = mysqli_fetch_array($result1);
$checker = $row1['mat_code'];
echo $checker;
 ?>