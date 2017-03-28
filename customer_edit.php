<script src = "https://code.jquery.com/jquery-1.9.1.js"></script>
<script>
$(document).ready(function() {
	$("#sub").click(function(){
		location.reload();
		})
    
});
</script>
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
$cust_code = $row['customer_code'];
$ref_no =  $row['customer_ref_no'];
$name = $row['cust_name'];
$add1 = $row['cust_add1'];
$add2 = $row['cust_add2'];
$add3 = $row['cust_add3'];
$city = $row['cust_city'];
$sc = $row['state_code'];
$pin = $row['cust_pincode'];
$pname = $row['contact_person_name'];
$no = $row['contact_person_number'];
$email = $row['email'];
echo "<form action='' method='POST' id = 'formm'><table border=2 cellpadding='10' width='80%'>";
echo "<tr><td><b>Customer Code &nbsp&nbsp;</b></td><td>".$cust_code."</td></tr>";
echo "<tr><td><b>Ref NO&nbsp&nbsp;</b></td><td>".$ref_no."</td></tr>"; 
echo "<tr><td><b>Name&nbsp&nbsp;</b></td><td><input type='text' value = '$name' id = 'cust_name' ></td></tr>"; 
echo "<tr><td><b>Address&nbsp&nbsp;</b></td><td>Address Line 1&nbsp&nbsp;<input type='text' id = 'add1' value = '$add1'><br><br>";
echo "Address line 2&nbsp&nbsp&nbsp;<input type='text' name = 'add2' value = '$add2'><br><br>";
echo "Address line 3&nbsp&nbsp&nbsp;<input type='text' name = 'add3' value = '$add3'><br></td></tr>";
echo "<tr><td><b>City&nbsp&nbsp;</b></td><td><input type='text' name = 'city' value = '$city'></td></tr>";
echo "<tr><td><b>State Code&nbsp&nbsp;</b></td><td><input type='text' name = 'sc' value = '$sc'></td></tr>";
echo "<tr><td><b>Pin Code&nbsp&nbsp;</b></td><td><input type='text' name = 'pin' value = '$pin'></td></tr>";
echo "<tr><td><b>Contact Person Name &nbsp&nbsp;</b></td><td><input type='text' name = 'pname' value = '$pname'></td></tr>";
echo "<tr><td><b>Contact No &nbsp&nbsp;</b></td><td><input type='text' name = 'no' value = '$no'></td></tr>";
echo "<tr><td><b>Email&nbsp&nbsp;</b></td><td><input type='text' size = '35' name = 'email' value = '$email'></td></tr></table>"; ?> 
<br />
<input style="margin-left:10cm" type="submit" value="Update" onClick="return validate()" id="submit">
</form>
<?php
} 
}
?>

</div>
<div id="inter">inter</div>
<script src = "https://code.jquery.com/jquery-1.9.1.js"></script>
<script>
function validate() {
	var a= document.getElementById('cust_name').value;
	var x = '<?php echo $cust_code ?>'
	var b= document.getElementById('add1').value;
	/*var c= document.getElementById('cust_name').value;
	var d= document.getElementById('cust_add1').value;
	var e= document.getElementById('cust_add2').value;
	var f= document.getElementById('cust_add3').value;
	var g= document.getElementById('cust_city').value;
	var h= document.getElementById('cust_pincode').value;
	var i= document.getElementById('scripts').value;
	var j= document.getElementById('mob').value;
	var k= document.getElementById('email').value;
	var l= document.getElementById('person').value;
	if(a==""){
		alert("Enter Customer code");
		return false;
		}
	if(b==""){
		alert("Enter Customer Ref No");
		return false;
		}	
	if(c==""){
		alert("Enter Customer Name");
		return false;
		}
	if(d==""){
		alert("Enter Customer Address");
		return false
		}
	if(g==""){
		alert("Enter Customer City");
		return false
		}
	if(h==""){
		alert("Enter Customer Pincode");
		return false
		}
	if(i==""){
		alert("Enter Customer State");
		return false
		}
	if(j==""){
		alert("Enter Customer Contact Number");
		return false
		}
	if(l==""){
		alert("Enter Contact Person Name");
		return false
		}							
	var atpos = k.indexOf("@");
    var dotpos = k.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=k.length) {
        alert("Not a valid e-mail address");
        return false;
    }*/
	window.alert("Customer Entry Successful");
	//$("#add").hide();
	$.ajax({
		 type: "post",
		 url:"customer_edit_query.php",
		 data:{ id1: a, id2: x, id3: b},
		 cache:false,
		 success: function(html){
			 $('#inter').html(html);
			 }
		 });
	//location.href = "customer.php";	 	 
	 return false;
}
</script>
