
<script>
$(document).ready(function() {
    location.reload();
});
</script>
<?php
session_start();
require('connection.inc.php');
$sql = "SELECT * FROM order_header where order_status = 'SCHD'";
$result = mysqli_query($con,$sql)or die(mysqli_error());
if(mysqli_num_rows($result) == 0){?>
	<u><h1 id="txt2"> NO PENDING ORDERS TO SHIP</h1></u>
    <style>
    #txt2{
		margin-left:10cm;
		margin-top:6cm
		
		}
    </style>
    
	<?php }
else{	
echo "<h1 align='center'><u>Order Information</u></h1>";?>

<?php
echo "*click on Customer Name to view Customer Information";
echo "<table border='2'>";
echo "<form method = 'post' action = 'shipment_screen.php'>";
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
<div id="sch_det">
<?php
	if (empty($_POST["id"])){
		}    
	else{
	echo '<h2 align="center"><u>Order Details</u></h2>';		
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
	$_SESSION['id'] = $order_no_sch;	
	echo"</table>";
	?>
    <script src = "https://code.jquery.com/jquery-1.9.1.js"></script>
    <script>function details() {
		window.scrollTo(0, 100);
		$.ajax({
			type: "post",
			url: "shipment_fill.php",
			cache:false,
			success: function(html){
			 $('#ider').html(html);
			 }
			});
		//window.alert("order no. '"+x+"' cleared successfully");	
       //location.href = "shipment_screen.php";
	  // location.reload();
    //document.getElementById("demo").innerHTML = x;
	return false;
}
</script>
	<div id="btns">
   <br /><button style="margin-left:13cm" onclick="return details()" id="enter_det">Enter Shipment Details</button> <button id="can" style="margin-left:1cm">Cancel</button>
   </div>
   
   </div> 
        <?php
	}
}
?>	
<div id="ider"></div>


<script>
$(document).ready(function() {
    $("#can").click(function(){
		$("#sch_det").hide();
		})
});
$(document).ready(function() {
    $("#enter_det").click(function(){
		$("#btns").hide();
		})
});
</script>
