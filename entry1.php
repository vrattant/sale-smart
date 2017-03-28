<html>
<body>
<?php
session_start();
require 'connection.inc.php';
mysqli_query($con, "truncate current_completeorder");
if(isset($_POST['code']))
{
$code = $_POST['code'];
$ref_no = $_POST['ref_no'];
$order_no = $_POST['order_no'];

//echo $order_no;
 
if(!empty($code))
{
	
$query = mysqli_query($con,"SELECT * FROM customer_master WHERE customer_code ='".$code."' AND customer_ref_no ='".$ref_no."'") or die(mysqli_error($con)); 
 
$data = mysqli_fetch_array($query);
 
//$test=$data['password'];
 
$query_run=$query;
$query_num_rows = mysqli_num_rows($query_run);
if($query_num_rows==0)
{
echo 'Invalid customer code ,ref no.,or date';
}
else if($query_num_rows==1)
{
//echo'<br><br><br><br><br><br><br><br><br><br><br><br>';	
//echo 'ok';
$result = mysqli_query($con,"SELECT * FROM customer_master WHERE customer_code = '$code'");
while($rowval = mysqli_fetch_array($result))
 {

$name= $rowval['cust_name'];
$add1= $rowval['cust_add1'];
$add2= $rowval['cust_add2'];
$add3= $rowval['cust_add3'];
$city= $rowval['cust_city'];
$pin= $rowval['cust_pincode'];
}
mysqli_query($con,"insert into current_orderno(order_no,customer_code,customer_ref_no,cust_name) values ('$order_no','$code','$ref_no','$name')");

$lists = mysqli_query($con,"SELECT mat_code FROM material_master");

echo"
<form>
<table style= 'margin-left:13cm'>
        <tr>
           
            <td style= font-family:Copperplate Gothic Bold>&nbsp;</td>
        </tr>
        <tr>
            <td style=color:red;background-color:aqua; class=auto-style3>Customer Name:</td>
            <td class= auto-style4>
                <input id=Text1 type= text value= '$name'></td>
        </tr>
		<tr>
            <td style=color:red;background-color:aqua; class=auto-style3>Address Line 1:</td>
            <td class= auto-style4>
                <input id=Text1 type= text value= '$add1'></td>
        </tr>
		<tr>
            <td style=color:red;background-color:aqua; class=auto-style3>Address Line 2:</td>
            <td class= auto-style4>
                <input id=Text1 type= text value= '$add2'></td>
        </tr>
		<tr>
            <td style=color:red;background-color:aqua; class=auto-style3>Address Line 3:</td>
            <td class= auto-style4>
                <input id=Text1 type= text value= '$add3'></td>
        </tr>
		<tr>
            <td style=color:red;background-color:aqua; class=auto-style3>City:</td>
            <td class= auto-style4>
                <input id=Text1 type= text value= '$city'></td>
        </tr>
		<tr>
            <td style=color:red;background-color:aqua; class=auto-style3>Pin Code:</td>
            <td class= auto-style4>
                <input id=Text1 type= text value= '$pin'></td>
        </tr>
		
</table>

</form>
<br>";
?>

<html>
<head>
<script src = "https://code.jquery.com/jquery-1.9.1.js"></script>
 <script>
 function chk1(){
	 //var code = document.getElementById('code').value;
	 //var ref_no = document.getElementById('ref_no').value;
	 //var dataString ='code='+ code + '&ref_no='+ref_no;
	 window.scrollTo(0, 200);
	 $.ajax({
		// type: "post",
		 url:"entry2.php",
		 //data:dataString,
		 cache:false,
		 success: function(html){
			 $('#msg1').html(html);
			 }
		 });
		 
	 return false;
	 }
 </script>
</head>

<body>
<form action="" method="POST" id = "formm">
<input type="submit" value="Enter Order Details" onClick="return chk1()" id="enter_details" style="margin-left:15cm">

</form>

<div id = "msg1"></div>
<div id = "msg2"></div>
<div id = "msg3"></div>
<div id = "msg4"></div>
<div id = "msg5"></div>
<div id="ender">
<br><br><br><button id = "end" onClick="finishadd()" style="margin-left:16cm">End</button>
</div>
</td>
<script>
$(document).ready(function(){
   $("#ender").hide();
});
$(document).ready(function() {
    $("#end").click(function(){
		
		$("#msg1").hide();
		$("#msg2").hide();
		$("#msg3").hide();
		$("#msg4").hide();
		$("#msg5").hide();
		$("#ender").hide();
		})
});
function finishadd(){
	
	if (confirm("Finish Order Entry?") == true){
		window.scrollTo(0, 200);
		window.alert("Order Entry Successful");
		$.ajax({
			url: "finishentry.php",
			cache:false,
			success: function(html){
				$('#finish').html(html);
				}
			
			})
		}
	else{
		
		}
	}
</script>
<div id = "finish"></div>
</body>
</html>

<?php


} 
}
else
{
echo 'Enter Customer Code';
}
 
}
//mysqli_query($con,"INSERT INTO order_header (order_no) VALUES ('$unique')");




?>
</body>
</html>
