<h2 align="center"><u> Order Details</u></h2>

<?php
require('connection.inc.php');
$result2 = mysqli_query($con,"select * from current_orderno");
$row2 = mysqli_fetch_array($result2);
$order_no = $row2['order_no'];
$cust_code = $row2['customer_code'];
$ref_no = $row2['customer_ref_no'];
$name = $row2['cust_name'];
echo "<b><font style='margin-left:10cm'>Order No.&nbsp;</b></font>".$order_no;
$sql = "SELECT * FROM current_completeorder";
$result = mysqli_query($con,$sql)or die(mysqli_error());
echo "<br><table border='2' style='margin-left:5cm'>";
echo "<tr><th>Sno.</th><th>Material Code</th><th>Material Description</th><th>Material Price</th><th>Quantity</th><th>Value</th></tr>";
$i=1;
while($row = mysqli_fetch_array($result)) {
    $mat_code = $row['mat_code'];
    $mat_desc = $row['mat_desc'];
    $mat_price = $row['mat_price'];
	$quant = $row['quant'];
	$val = $row['value'];
    echo "<tr><td style='width: 50px;'>".$i."</td><td style='width: 200px;'>".$mat_code."</td><td style='width: 200px;'>".$mat_desc."</td><td style='width: 200px;'>₹".$mat_price."</td><td style='width: 100px;'>".$quant." pcs.</td><td style='width: 200px;'>₹".$val."</td></tr>";
	$i++;
	$result12= mysqli_query($con,"select stock_qty from stock_master where mat_code = '$mat_code'");
	$row12=mysqli_fetch_array($result12);
	$currentstock = $row12['stock_qty'];
	mysqli_query($con,"insert into order_detail (order_no,mat_code,mat_price,item_qty,item_value) values ('$order_no','$mat_code','$mat_price','$quant','$val')");	
	mysqli_query($con,"update stock_master set stock_qty = ('$currentstock'-'$quant') where mat_code = '$mat_code'");
} 
$result1 = mysqli_query($con,"select SUM(value) as total from current_completeorder");
$row1 = mysqli_fetch_array($result1);
$total = $row1['total'];
$vat = 0.04 * $total;
$grand_total = $vat + $total;
echo "<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td><b>Total&nbsp&nbsp:&nbsp</b>₹".$total."</td></tr>";
echo "</table>";
$date = date('d-m-Y');

mysqli_query($con,"insert into order_header(order_no,order_create_date,order_status,customer_ref_no,order_value,customer_code,cust_name,shipment_date,vat,grand_total) values ('$order_no','$date','BLOC','$ref_no','$total','$cust_code','$name','NIL','$vat','$grand_total') ");
//
?>
<html>
<body>

<p></p>

<button onClick="myFunction()" style="margin-left:16cm">Finish</button>

<p id="demo"></p>

<script>
function myFunction() {
   // var x;
    if (confirm("Click OK for new entry or cancel for home") == true) {
        location.href = "entry.php";
    } else {
        location.href = "copg.php";
    }
    //document.getElementById("demo").innerHTML = x;
}
</script>

</body>
</html>
<?php
mysqli_query($con, "truncate current_orderno");
 mysqli_query($con, "truncate current_completeorder");
 ?>