<?php
session_start();
require('connection.inc.php');
$sql = "SELECT * FROM order_header where order_status = 'CLRD'";
$result = mysqli_query($con,$sql)or die(mysqli_error());
if(mysqli_num_rows($result)==0){?>
	<u><h1 id="txt"> NO PENDING ORDERS TO SCHEDULE</h1></u>
    <style>
    #txt{
		margin-left:10cm;
		margin-top:6cm
		
		}
    </style>
    <?php
	}
else{	
echo "<h1 align='center'><u>Order Information</u></h1>";?>

<?php
echo "*click on Customer Name to view Customer Information";
echo "<table border='2'>";
echo "<form method = 'post' action = 'schedule_order.php'>";
echo "<tr><th></th><th>Sno.</th><th>Order no.</th><th>Order Creation Date</th><th>Order Status</th><th>Order Value</th><th>Customer Code</th><th>Customer Ref no</th><th>Customer Name</th>
</tr>";
$i=1;
while($row = mysqli_fetch_array($result)) {
    //$sno = $row['sno'];
	$no = $row['order_no'];
	$date = $row['order_create_date'];
	$status = $row['order_status'];
	$value = $row['order_value'];
    $cust_code = $row['customer_code'];
    $cust_ref_no = $row['customer_ref_no'];
	$cust_name = $row['cust_name'];
    echo "<tr><td><input type = 'radio' name = 'id' value = '".$no."'>";echo"</td><td style='width: 50px;'>".$i."</td><td style='width: 200px;'>".$no."</td><td style='width: 200px;'>".$date."</td><td style='width: 200px;'>".$status."</td><td style='width: 200px;'>₹ ".$value."</td><td style='width: 200px;'>".$cust_code."</td><td style='width: 200px;'>".$cust_ref_no."</td><td style='width: 200px;'><a target = _blank href='row_test.php?customer_code=$cust_code'>".$cust_name."</td></tr>";
	
	$i++;
}
echo"</table>";
echo "<br /><input style='margin-left:17cm' type = 'submit' name = 'go' value = 'View'>";

echo "</form>";
?>
<?php
	if (empty($_POST["id"])){
		}    
	else{
	echo '<h2 align="center"><u>Schedule Order</u></h2>';		
	echo "<table width = '100%'><tr><td><br><b>Order No. : </b>".$_POST['id']."</td>";
	$order_no_sch = $_POST['id'];
	$result5 = mysqli_query($con,"select * from order_header where order_no = '$order_no_sch'");
	$row5 = mysqli_fetch_array($result5);
	echo "<td><b>Customer Code</b>&nbsp&nbsp;</b>".$row5['customer_code']."</td>
	<td><b>Customer Ref No</b>&nbsp&nbsp;".$row5['customer_ref_no']."</td>
	<td><b>Order Value</b>&nbsp&nbsp;₹".$row5['order_value']."</td>
	</tr></table>";
	$result2 = mysqli_query($con,"select * from order_detail where order_no = '$order_no_sch'");
	echo"<br><table border=1 width='100%'><th>Sno.</th><th>Material Code</th><th>Material Price</th><th>Quantity</th><th>Value</th>";
	$j = 1;
	while($row2=mysqli_fetch_array($result2)){
		echo"<tr><td>".$j."</td><td>".$row2['mat_code']."</td><td>₹".$row2['mat_price']."</td><td>".$row2['item_qty']."pcs.</td><td>₹".$row2['item_value']."</td></tr>";
		$j++;
		
		}
	echo"</table>";

	?>
    <br /><br /><b><div align="center">Shipment Date</b>&nbsp&nbsp&nbsp;<input type="date" max="2017-12-31" id="ref_date" name="ref_date"><br /><br /><button onclick="schedule()">Schedule</button></div>
		
    
        <?php
	}
}
?>
<div id="ide"></div>	
<script src = "https://code.jquery.com/jquery-1.9.1.js"></script>
<script>
function schedule() {
    var x = '<?php echo $order_no_sch ?>'
	var y = document.getElementById("ref_date").value;
	var n = (new Date(y));
	if(y == ""){
	window.alert("please select Shipment date");
	return false;	
		}
	else{	
    if (confirm("Click OK to schdedule order or cancel to recheck") == true) {
		$.ajax({
			type: "post",
			url: "schedule_query.php",
			data: {id1: x,id2: y},
			cache:false,
			});
		window.alert("order no. '"+ x +"' scheduled successfully, shipment date is        '"+n+"' ");	
       location.href = "schedule_order.php";
	  // location.reload();
    	} else {
        //location.href = "copg.php";
    	}
    //document.getElementById("demo").innerHTML = x;
	
	
	return false;
	}
}
</script>
