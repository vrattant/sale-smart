<?php
session_start();
require 'connection.inc.php';
?>
<br><br>
<?php
$no = $_SESSION['id'];
$rand = strtoupper(substr(uniqid(sha1(time())),0,5));
$result = mysqli_query($con,"select * from order_header where order_no = '$no'");
$row = mysqli_fetch_array($result);
?>
<div id="det_ship">
<font size="+1"><b>Delivery Challan No.</b> &nbsp&nbsp;<?php echo $rand ?></font><br /><br />
<font size="+1"><b>Shipment Date</b> &nbsp&nbsp;</font><input type="text" placeholder="dd-mm-yyyy" size="9" id="sd" name="sd" value="<?php echo $row['shipment_date'] ?>" />&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;
<font size="+1"><b>Transporter Name</b> &nbsp&nbsp;</font><input type="text" name="tn" id="tn" size="35"/><br /><br />
<br /><input type="submit" name="con" id="con" style="margin-left:14cm" value="Confirm Shipment" onClick="ship()">
</div>
  <script src = "https://code.jquery.com/jquery-1.9.1.js"></script>
    <script>function ship() {
		var w = '<?php echo $rand ?>'
		var x = document.getElementById("sd").value;
		var y = document.getElementById("tn").value;
		var z = '<?php echo $no ?>'
		if(x == "" || y == ""){
			window.alert("Enter shipment date and transporter name");
			}
		$.ajax({
			type: "post",
			url: "shipment_fill_query.php",
			data: {id1: x, id2: y, id3: z, id4: w},
			cache:false,
		});
		window.alert("Order no. '"+z+"' will be shipped on '"+x+"' by '"+y+"' ");
		location.href = "shipment_screen.php";
	return false;
}
$(document).ready(function() {
    $("#con").click(function(){
		$("#sch_det").hide();
		$("#det_ship").hide();
		})
});
</script>

