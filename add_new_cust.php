<h2 align="center"><u> Add Customer </u></h2>
<style>
#sub{
	text-align:center
	}

</style>
<script>
$(document).ready(function(){
    $("#cancel").click(function(){
        $("#add").hide();		
    });
	
});

</script>
<script src = "https://code.jquery.com/jquery-1.9.1.js"></script>
<script>
function validate() {
	var a= document.getElementById('cust_code').value;
	var b= document.getElementById('cust_ref_no').value;
	var c= document.getElementById('cust_name').value;
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
    }
	window.alert("Customer Entry Successful");
	$("#add").hide();
	$.ajax({
		 type: "post",
		 url:"process.php",
		 data:{ id1: a, id2: b, id3: c, id4: d, id5: e, id6: f, id7: g, id8: h, id9: i, id10: j, id11: k, id12:l},
		 cache:false,
		 success: function(html){
			 $('#in').html(html);
			 }
		 });
	location.href = "customer.php";	 	 
	 return false;
}
</script>
<form action="" method="POST" id = "formm">
<table border="2" width="50%" align="center">
<tr><td>Customer Code  </td><td> <input type="text" id="cust_code" size="50"/></td></tr>
<tr><td>Ref no.  </td><td><input type="text" id="cust_ref_no" size="50" /></td></tr>
<tr><td>Name  </td><td><input type="text" id="cust_name" size="50" /></td></tr>
<tr><td>Add Line 1  </td><td><input type="text" id="cust_add1" size="50" /></td></tr>
<tr><td>Add Line 2  </td><td><input type="text" id="cust_add2" size="50"/></td></tr>
<tr><td>Add Line 3</td><td><input type="text" id="cust_add3" size="50" /></td></tr>
<tr><td>City  </td><td><input type="text" id="cust_city"  size="50"/></td></tr>
<tr><td>Pin Code  </td><td><input type="text" id="cust_pincode" size="50" /></td></tr>
<tr><td>State  </td><td><select id="scripts" name="scripts" style="width:383px">
<option value="">select</option>
<option value="AP">Andhra Pradesh</option>
<option value="AR">Arunachal Pradesh</option>
<option value="AS">Assam</option>
<option value="BR">Bihar</option>
<option value="CH">Chhattisgarh</option>
<option value="GA">Goa</option>
<option value="GU">Gujarat</option>
<option value="HR">Haryana</option>
<option value="HP">Himachal Pradesh</option>
<option value="JK">Jammu and Kashmir</option>
<option value="JH">Jharkhand</option>
<option value="KA">Karnataka</option>
<option value="KE">Kerala</option>
<option value="MP">Madhya Pradesh</option>
<option value="MH">Maharashtra</option>
<option value="MN">Manipur</option>
<option value="MG">Meghalaya</option>
<option value="MI">Mizoram</option>
<option value="NG">Nagaland</option>
<option value="OR">Odisha(Orissa)</option>
<option value="PB">Punjab</option>
<option value="RJ">Rajasthan</option>
<option value="SK">Sikkim</option>
<option value="TN">Tamil Nadu</option>
<option value="TR">Tripura</option>
<option value="UP">Uttar Pradesh</option>
<option value="UK">Uttarakhand</option>
<option value="WB">West Bengal</option>

            </select></td></tr>
<tr><td>Contact Person Name  </td><td><input type="text" id="person" size="50" /></td></tr>
<tr><td>Contact No.  </td><td><input type="text" id="mob" size="50" /></td></tr>
<tr><td>Email ID  </td><td><input type="text" id="email" size="50" /></td></tr>
</table>
<br />
<div id="sub">
<input type="submit" value="Submit" onClick="return validate()" id="submit">
<button id="cancel">Cancel</button>
</div>
</form>
<p id = "in"></p>