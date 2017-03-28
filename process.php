<?php
require 'connection.inc.php';
$a =isset($_POST['id1'])?$_POST['id1']:'not yet';
$c = $_POST['id2'];
$d = $_POST['id3'];
$e = $_POST['id4'];
$f = $_POST['id5'];
$g = $_POST['id6'];
$h = $_POST['id7'];
$i = $_POST['id8'];
$j = $_POST['id9'];
$k = $_POST['id10'];
$l = $_POST['id11'];
$m = $_POST['id12'];
mysqli_query($con,"INSERT INTO customer_master(customer_code,customer_ref_no,cust_name,cust_add1,cust_add2,cust_add3,cust_city,cust_pincode,state_code,contact_person_name,contact_person_number,email) VALUES ('$a','$c','$d','$e','$f','$g','$h','$i','$j','$m','$k','$l')");
?>