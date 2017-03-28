<div>
<?php

require('connection.inc.php');
$sql = "SELECT * FROM customer_master order by cust_name";
$result = mysqli_query($con,$sql)or die(mysqli_error());
echo "<h1 align='center'><u>Customer Information</u></h1>";
echo "<table border='2'>";
echo "<tr><th>Sno.</th><th>Custmer Code</th><th>Customer Ref No.</th><th>Customer Name</th><th>Address</th><th>Contact No.</th><th>Email</th>
</tr>";
$i=1;
while($row = mysqli_fetch_array($result)) {
    //$sno = $row['sno'];
    $cust_code = $row['customer_code'];
    $cust_ref_no = $row['customer_ref_no'];
	$cust_name = $row['cust_name'];
	$cust_add1 = $row['cust_add1'];
	$cust_add2 = $row['cust_add2'];
	$cust_add3 = $row['cust_add3'];
	$cust_pin = $row['cust_pincode'];
	$cust_city = $row['cust_city'];
	$cust_phn = $row['contact_person_number'];
	$state_code = $row['state_code'];
	$result1 = mysqli_query($con,"select state_desc from state_master where state_code = '$state_code'");
	$row1 = mysqli_fetch_array($result1);
	$state_desc = $row1['state_desc'];
    echo "<tr><td style='width: 50px;'>".$i."</td><td style='width: 200px;'>".$cust_code."</td><td style='width: 200px;'>".$cust_ref_no."</td><td style='width: 200px;'><a href = 'customer_edit.php?customer_code=$cust_code' target = '_blank'>".$cust_name."</a></td><td style='width: 300px;'>".$cust_add1.",".$cust_add2.",".$cust_add3.",<br>".$cust_city.",<br>".$state_desc.",<br>Pin:&nbsp;	".$cust_pin."</td><td style='width: 200px;'>".$cust_phn."</td><td>".$row['email']."</td></tr>";
	$i++;
}
?>

</div>
<div>
<b>Click To Add New Customer</b>&nbsp&nbsp&nbsp&nbsp&nbsp;<button onclick="return add()">Add Customer</button><br /><br />
*click on Customer name to edit customer Info.
<br /><br /><br /><br />
</div>
<div id="add"></div>
<div id="edit"></div>
<script src = "https://code.jquery.com/jquery-1.9.1.js"></script>
<script>
function add(){
	$.ajax({
		 url:"add_new_cust.php",
		 cache:false,
		 success: function(html){
			 $('#add').html(html);
			 }
		 });
	 return false;
	
	}


</script>