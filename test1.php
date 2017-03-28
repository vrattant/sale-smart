<?php
require 'connection.inc.php';
	global $a,$mat_code,$mat_desc,$mat_price;
   $a =isset($_POST['id1'])?$_POST['id1']:'not yet';
   $mat_code = isset($_POST['id2'])?$_POST['id2']:'not yet';
   $mat_desc = isset($_POST['id3'])?$_POST['id3']:'not yet';
   $mat_price = isset($_POST['id4'])?$_POST['id4']:'not yet';
	$value = $a*$mat_price;
?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script>

$(document).ready(function(){
   $("#ender").show();
});
$(document).ready(function(){
    $("#next").click(function(){
        $("#next").hide();		
    });
	
});
$(document).ready(function(){
    $("#del").click(function(){
        $("#idea").hide();
		$("#next").hide();
		$("#del").hide();
    });	
    
});
</script>
</head>
<body>
<table width="50%">
<td><div id="idea" style="margin-left:5cm"><?php echo '<table width="100%"><tr><td><b>'.$mat_desc. '</b></td><td>x</td><td><b>' .$a. 'pcs.</b></td><td>@</td><td><b>₹&nbsp'.$mat_price. '</b></td><td>=</td><td><b>₹&nbsp'.$value.'</b></td></tr></table>' ;?></div> </td>
<td>
<button id="next" onClick="chk2()">Next</button>
<?php mysqli_query($con, "insert into current_completeorder values('$mat_code','$mat_desc','$mat_price','$a','$value')");
?>
<td>
<button id="del" onClick="del()" >X</button>
</td>
</tr>
</table>
</div>
</body>
</html>
<script>

 function chk2(){
	 
	 $.ajax({
		 url:"entry3.php",
		 cache:false,
		 success: function(html){
			 $('#msg1').html(html);
			 }
		 });
	 return false;
	 }
			 
 </script>
 <script>
 function del(){
		var mat_code = '<?php echo $mat_code ?>';
		$.ajax({
		type: "post",	
		url: "test1del.php",
		data:{ mat: mat_code},
		 });
	 return false;
		
		
		}	 
 </script>


