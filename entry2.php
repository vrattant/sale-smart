<?php
require 'connection.inc.php';
//require 'test1.php';
$sql = "SELECT * FROM material_master ";
$aResult = mysqli_query($con,$sql);
if(isset($_REQUEST['frm_action']))
{
if ($_REQUEST['cust_id'] == 0)
{
$id = $_REQUEST['cust_id'];
$sqlCustomer = "SELECT * FROM material_master ";
}
else
{
$id = $_REQUEST['cust_id'];
$sqlCustomer = "SELECT * FROM material_master WHERE id ='$id'";
}
$aCustomer = mysqli_query($con,$sqlCustomer);
}
?>
<?php

$sqla = "SELECT * FROM material_master ";
$aResulta = mysqli_query($con,$sqla);
if(isset($_REQUEST['frm_action']))
{
if ($_REQUEST['cust_id'] == 0)
{
$ida = $_REQUEST['cust_id'];
$sqlCustomera = "SELECT * FROM material_master ";
}
else
{
$ida = $_REQUEST['cust_id'];
$sqlCustomera = "SELECT * FROM material_master WHERE id ='$id'";
}
$aCustomera = mysqli_query($con,$sqlCustomera);
}
?>

<html>
<head>
<link rel="stylesheet" href="styles.css">
<script type="text/javascript">
function changeSID()
{
var oForm       = eval(document.getElementById("frmForm"));
var iCustomerId = document.getElementById("sid").value;
//document.write(iCustomerId);
 
	 if(iCustomerId == ""){
		 $.ajax({
		// type: "post",
		 url:"entry2.php",
		 //data:dataString,
		 cache:false,
		 success: function(html){
			 $('#msg1').html(html);
			 }
		 });
		 
		 }
		 else{
			 $.ajax({
		// type: "post",
		 url:"entry2.php?frm_action&cust_id="+iCustomerId,
		 //data:dataString,
		 cache:false,
		 success: function(html){
			 $('#msg1').html(html);
			 }
		 });
			 }
		 return  false;
	 }
	 
//url         = "entry3.php?frm_action&cust_id=" +iCustomerId;
//document.location = url;

</script>

</head>

<body>
<form name="frmForm" id="frmForm" >
<table border="1" cellspacing="10" cellpadding="10" width="70%" style="margin-left:5cm">

<tr>

<td> Material Code </td>
<td> Material Description </td>
<td> Material Price </td>
<td> Quantity </td>

</tr>
<tr>


<td><select name="sid" id="sid" onchange="changeSID();">
<option value="">Select</option> 

<?php

$sid1 = $_REQUEST['cust_id'];

while($rows=mysqli_fetch_array($aResult))
{
$id  = $rows['id'];
$sid = $rows['mat_code'];
if($sid1 == $id)
{
$chkselect = 'selected';

}
else
{
$chkselect ='';
}
?>
<option value="<?php echo  $id;?>"<?php echo $chkselect;?>><?php echo $sid;?></option>
<?php } ?>
</td>
<?php if(isset($_REQUEST['frm_action'])) { ?>

<?php while($row1 = mysqli_fetch_array($aCustomer))
{
$sid   = $row1['mat_code'];
$desc = $row1['mat_desc'];
$price  = $row1['mat_price'];
?>
<?php
$result18 = mysqli_query($con,"select stock_qty from stock_master where mat_code = '$sid'");
$row18 = mysqli_fetch_assoc($result18);
$stock = $row18['stock_qty'];
//echo $stock;
?>
<td><?php echo $desc;?></td>
<td><?php echo "₹".$price;
mysqli_query($con,"INSERT INTO current_order (mat_code, mat_desc, mat_price) VALUES ('$sid', '$desc', '$price')");?></td>
<td width="60%"> <form id='myform' method='POST' action='#'>
    <input type='button' value='-' class='qtyminus' field='quantity' />
    <input type='text' id="qty" name='quantity' value='0' class='qty' />
    <input type='button' value='+' class='qtyplus' field='quantity' />
    
    
</form>
<script src = "https://code.jquery.com/jquery-1.9.1.js"></script>
<script>
 var printer;
 var stock = '<?php echo $stock ?>';
 
 $(document).ready(function(){
    // This button will increment the value
    $('.qtyplus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
		
		 printer = currentVal+1;
		 //console.log(printer);
		 
        // If is not undefined
		if(printer <= stock){
        	if (!isNaN(currentVal)) {
            	// Increment
			
           	 $('input[name='+fieldName+']').val(currentVal + 1);
				if(printer == stock){
					window.alert("stock empty! cannot increment further");
					}
			
        	} else {
           		 // Otherwise put a 0 there
           			 $('input[name='+fieldName+']').val(0);
        		}
			
		}
		if(stock == 0){
			window.alert("stock empty! cannot increment further");
			}
    });
    // This button will decrement the value till 0
    $(".qtyminus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
			printer = currentVal-1;
		
		 //console.log(printer_dec);
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name='+fieldName+']').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });
	 
	
	
});</script>
</td>
<td><input type="submit" value="add" onClick="return chk1()"></td>


<?php } 

} ?>


</form>
<script src = "https://code.jquery.com/jquery-1.9.1.js"></script>
<script>
 
function chk1(){
	 //var code = document.getElementById('code').value;
	 //var ref_no = document.getElementById('ref_no').value;
	 //var dataString ='code='+ code + '&ref_no='+ref_no;
	 var input = parseInt(document.getElementById('qty').value);
	 var mat_code = '<?php echo $sid ?>';
	 var mat_desc = '<?php echo $desc ?>';
	 var mat_price = '<?php echo $price ?>';
	 if(input > stock){
		 window.alert("Input Value greater than stock available.Stock left = "+stock+"pcs");
		 }
	else if(stock == 0){
		window.alert("No stock left cant add this Item");
		}
	else if(input == 0){
		window.alert("Item Quantity must be greater than 0");
		}			 
	 else{
	 window.scrollTo(0, 300);
	 
	 $.ajax({
		 type: "post",
		 url:"test1.php",
		 data:{ id1: parseInt(document.getElementById('qty').value), id2: mat_code, id3: mat_desc, id4: mat_price},
		 cache:false,
		 success: function(html){
			 $('#msg2').html(html);
			 }
		 });
	 }
	 return false;
	 }
</script>


</body>
</html>

	
	
	
