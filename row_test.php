
<?php 
require 'connection.inc.php';

if(isset($_GET['customer_code'])) {
$txt= $_GET['customer_code'];
$result = mysqli_query($con,"SELECT * FROM customer_master where customer_code=" . $txt);
while($row = mysqli_fetch_array($result)) 
{?> 
<h1 align="center"><u>Customer Information</u></h1>
<div style="margin-left:9cm">
<?php 
echo "<table border=2 cellpadding='10' width='80%'>";
echo "<tr><td><b>Customer Code &nbsp&nbsp;</b></td><td>".$row['customer_code']."</td></tr>";
echo "<tr><td><b>Ref NO&nbsp&nbsp;</b></td><td>".$row['customer_ref_no']."</td></tr>"; 
echo "<tr><td><b>Name&nbsp&nbsp;</b></td><td>".$row['cust_name'] ."</td></tr>"; 
echo "<tr><td><b>Address&nbsp&nbsp;</b></td><td>".$row['cust_add1'] .",";
echo $row['cust_add2'] .",";
echo $row['cust_add3'] ."</td></tr>";
echo "<tr><td><b>City&nbsp&nbsp;</b></td><td>".$row['cust_city'] ."</td></tr>";
echo "<tr><td><b>State Code&nbsp&nbsp;</b></td><td>".$row['state_code'] ."</td></tr>";
echo "<tr><td><b>Pin Code&nbsp&nbsp;</b></td><td>".$row['cust_pincode'] ."</td></tr>";
echo "<tr><td><b>Contact Person Name &nbsp&nbsp;</b></td><td>".$row['contact_person_name'] ."</td></tr>";
echo "<tr><td><b>Contact No &nbsp&nbsp;</b></td><td>".$row['contact_person_number'] ."</td></tr>";
echo "<tr><td><b>Email&nbsp&nbsp;</b></td><td>".$row['email'] ."</td></tr></table>";
} 
} 
?>
</div>