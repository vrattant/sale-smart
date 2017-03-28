<html
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script>
var submit_button = $('#submit_button');

submit_button.click(function() {

    var start_date = $('firstdate').val();
    var end_date = $('seconddate').val();

    var data = 'start_date=' + start_date + '&end_date=' + end_date;

    var update_div = $('#update_div');

    $.ajax({
        type: 'GET',
        url: 'proccess_form.php',
        data: data,   
        success:function(html){
           update_div.html(html);
        }
    });
});

</script>
<body>
<form id="my_form">
    Start date: <br/> <input name="idate" id="firstdate" type="text" /><br />
    End date: <br /> <input name="fdate" id="seconddate" type="text" /><br />
    <input id="submit_form" type="submit" value="Submit">
</form>

<div id="update_div"></div>
</body>

</html>

<?php
    $date1 = $_GET['start_date'];
    $date2 = $_GET['end_date'];
echo $date1;
    
?>

