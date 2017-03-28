<?php
require 'connection.inc.php';
//$x =isset($_POST['id0'])?$_POST['id0']:'not yet';
$a =isset($_POST['id1'])?$_POST['id1']:'not yet';
$b = $_POST['id2'];
$c = $_POST['id3'];
/*$d = $_POST['id4'];
$e = $_POST['id5'];
$f = $_POST['id6'];
$g = $_POST['id7'];
$h = $_POST['id8'];
$i = $_POST['id9'];
$j = $_POST['id10'];*/


echo $a;
echo $b;
echo $c;
mysqli_query($con, "update customer_master set cust_name = '$a' where customer_code = '$b'");
/*mysqli_query($con, "update customer_master set cust_add1 = '$add1_set' where customer_code = '$cust_code'");
mysqli_query($con, "update customer_master set cust_add2 = '$add2_set' where customer_code = '$cust_code'");
mysqli_query($con, "update customer_master set cust_add3 = '$add3_set' where customer_code = '$cust_code'");
mysqli_query($con, "update customer_master set cust_city = '$city_set' where customer_code = '$cust_code'");
mysqli_query($con, "update customer_master set state_code = '$sc_set' where customer_code = '$cust_code'");
mysqli_query($con, "update customer_master set cust_pincode = '$pin_set' where customer_code = '$cust_code'");
mysqli_query($con, "update customer_master set contact_person_name = '$pname_set' where customer_code = '$cust_code'");
mysqli_query($con, "update customer_master set contact_person_number = '$no_set' where customer_code = '$cust_code'");
mysqli_query($con, "update customer_master set email = '$email_set' where customer_code = '$cust_code'");*/