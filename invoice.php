<div id="1">
<img src="images/logoinfosystems.png" style="margin-left:22cm" width="170" height="97" />
<hr width="50%" />
<p style="margin-left:8.8cm; font-size:14px">
<b>Corporate Office:</b> HCL Infosystems Ltd. (Corporate Office) ,E-4,5 & 6, Sector 11,
NOIDA 201 301, UP<br />
<b>Tel:</b> +91 120 2526518/19, 2520977
<b>&nbsp&nbsp;Fax:</b> 2550923<br />
</p>
<h3 style="margin-left:16cm; font-size:16px"><u>INVOICE</u></h3>
<?php
session_start();
require 'connection.inc.php';
$order_no = $_SESSION['order_no'];
$cust_code = $_SESSION['customer_code'];
$result = mysqli_query($con,"select * from customer_master where customer_code = '$cust_code'");
$row = mysqli_fetch_array($result);
$result1 = mysqli_query($con,"select * from order_header where order_no = '$order_no'");
$row1 = mysqli_fetch_array($result1);
$rand = strtoupper(substr(uniqid(sha1(time())),0,9));
$date = date("d-m-Y");
mysqli_query($con, "update order_header set order_status = 'INVG' where order_no = '$order_no'");
mysqli_query($con, "update order_header set invoice_no = '$rand' where order_no = '$order_no'");
mysqli_query($con, "update order_header set invoice_date = '$date' where order_no = '$order_no'");
?>
<table border="1" style="margin-left:8.8cm;border-collapse: collapse">
<tr style="height:50px"><td width="400">
<p style="font-size:12px">
<b>Customer Name & Address</b><br /><br />
<b><?php echo $row['cust_name']  ?></b><br />
<?php echo $row['cust_add1']  ?>,&nbsp;<?php echo $row['cust_add2']  ?><br />
<?php echo $row['cust_add3']  ?><br />
<?php echo $row['cust_city']  ?><br />
PIN-<?php echo $row['cust_pincode']  ?>
</p>
</td>
<td width="270"><p style="font-size:12px">
<b>Order No.&nbsp;</b><?php echo $order_no  ?><br />
<b>Invoice No.&nbsp;</b><?php echo $rand  ?><br />
<b>Delivery Challan No.&nbsp;</b><?php echo $row1['delivery_challan_no']  ?><br />
<b>Date&nbsp;</b><?php echo $date  ?>
</p></td>
</tr>
</table>
<?php
error_reporting(0);
$result2 = mysqli_query($con,"select * from order_detail where order_no = '$order_no'");
	echo"<br><table border=1 width='50.3%' style='margin-left:8.8cm;border-collapse: collapse;'><th>Sno.</th><th>Material Code</th><th>Material Price</th><th>Quantity</th><th>Value</th>";
	$j = 1;
	while($row2=mysqli_fetch_array($result2)){
		echo"<tr><td>".$j."</td><td>".$row2['mat_code']."</td><td>₹".$row2['mat_price']."</td><td>".$row2['item_qty']."pcs.</td><td>₹".$row2['item_value']."</td></tr>";
		$j++;
		
		}
	//echo "<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td><b>Total:</b>".$row1['order_value']."</td></tr>";	
	echo"</table>";
function convertNumber($number)
{
    list($integer, $fraction) = explode(".", (string) $number);

    $output = "";

    if ($integer{0} == "-")
    {
        $output = "negative ";
        $integer    = ltrim($integer, "-");
    }
    else if ($integer{0} == "+")
    {
        $output = "positive ";
        $integer    = ltrim($integer, "+");
    }

    if ($integer{0} == "0")
    {
        $output .= "zero";
    }
    else
    {
        $integer = str_pad($integer, 36, "0", STR_PAD_LEFT);
        $group   = rtrim(chunk_split($integer, 3, " "), " ");
        $groups  = explode(" ", $group);

        $groups2 = array();
        foreach ($groups as $g)
        {
            $groups2[] = convertThreeDigit($g{0}, $g{1}, $g{2});
        }

        for ($z = 0; $z < count($groups2); $z++)
        {
            if ($groups2[$z] != "")
            {
                $output .= $groups2[$z] . convertGroup(11 - $z) . (
                        $z < 11
                        && !array_search('', array_slice($groups2, $z + 1, -1))
                        && $groups2[11] != ''
                        && $groups[11]{0} == '0'
                            ? " and "
                            : ", "
                    );
            }
        }

        $output = rtrim($output, ", ");
    }

    if ($fraction > 0)
    {
        $output .= " point";
        for ($i = 0; $i < strlen($fraction); $i++)
        {
            $output .= " " . convertDigit($fraction{$i});
        }
    }

    return $output;
}

function convertGroup($index)
{
    switch ($index)
    {
        case 11:
            return " decillion";
        case 10:
            return " nonillion";
        case 9:
            return " octillion";
        case 8:
            return " septillion";
        case 7:
            return " sextillion";
        case 6:
            return " quintrillion";
        case 5:
            return " quadrillion";
        case 4:
            return " trillion";
        case 3:
            return " billion";
        case 2:
            return " million";
        case 1:
            return " Thousand";
        case 0:
            return "";
    }
}

function convertThreeDigit($digit1, $digit2, $digit3)
{
    $buffer = "";

    if ($digit1 == "0" && $digit2 == "0" && $digit3 == "0")
    {
        return "";
    }

    if ($digit1 != "0")
    {
        $buffer .= convertDigit($digit1) . " Hundered";
        if ($digit2 != "0" || $digit3 != "0")
        {
            $buffer .= " and ";
        }
    }

    if ($digit2 != "0")
    {
        $buffer .= convertTwoDigit($digit2, $digit3);
    }
    else if ($digit3 != "0")
    {
        $buffer .= convertDigit($digit3);
    }

    return $buffer;
}

function convertTwoDigit($digit1, $digit2)
{
    if ($digit2 == "0")
    {
        switch ($digit1)
        {
            case "1":
                return "Ten";
            case "2":
                return "Twenty";
            case "3":
                return "Thirty";
            case "4":
                return "Forty";
            case "5":
                return "Fifty";
            case "6":
                return "Sixty";
            case "7":
                return "Seventy";
            case "8":
                return "Eighty";
            case "9":
                return "Ninety";
        }
    } else if ($digit1 == "1")
    {
        switch ($digit2)
        {
            case "1":
                return "Eleven";
            case "2":
                return "Twelve";
            case "3":
                return "Thirteen";
            case "4":
                return "Fourteen";
            case "5":
                return "Fifteen";
            case "6":
                return "Sixteen";
            case "7":
                return "Seventeen";
            case "8":
                return "Eighteen";
            case "9":
                return "Nineteen";
        }
    } else
    {
        $temp = convertDigit($digit2);
        switch ($digit1)
        {
            case "2":
                return "Twenty-$temp";
            case "3":
                return "Thirty-$temp";
            case "4":
                return "Forty-$temp";
            case "5":
                return "Fifty-$temp";
            case "6":
                return "Sixty-$temp";
            case "7":
                return "Seventy-$temp";
            case "8":
                return "Eighty-$temp";
            case "9":
                return "Ninety-$temp";
        }
    }
}

function convertDigit($digit)
{
    switch ($digit)
    {
        case "0":
            return "Zero";
        case "1":
            return "One";
        case "2":
            return "Two";
        case "3":
            return "Three";
        case "4":
            return "Four";
        case "5":
            return "Five";
        case "6":
            return "Six";
        case "7":
            return "Seven";
        case "8":
            return "Eight";
        case "9":
            return "Nine";
    }
}		
?>
<br /><br /><br />
<table border="1" style="border-collapse:collapse; margin-left:8.8cm">
<tr><td width="300" rowspan="3"><p>
<b>Amount in words</b><br /><br />
<?php echo convertNumber($row1['grand_total']); ?></p></td>
<td width="243"><b>Total</b></td>
<td width="126"><?php echo "₹".$row1['order_value']; ?> </td>
</tr>
<tr>
<td><b>Vat @ 4%</b></td>
<td><?php echo "₹" .$row1['vat']; ?></td>
</tr>
<tr>
<td><b>Grand Total</b></td>
<td><?php echo "₹" .$row1['grand_total']; ?></td>
</tr>
</table>
<table border="1" style="border-collapse:collapse; margin-left:8.8cm">
<td>
<p style="font-size:12px">
<b>Terms & Conditions</b><br />
<ul style="font-size:12px">
<li>Total Payment Due in 30 days</li>
<li>Please Include Invoice no. on your cheque</li>
<li>Any clain in respect of bill will be made within 7 days after receipt of goods</li>
</ul>
</p>
</td>
<td width="274" style="vertical-align:top">
<font style="font-size:12px; margin-left:2cm; margin-top:1cm">For HCL Infosystems</font><br /><br /><br /><br /><br />
<font style="font-size:12px; margin-left:2.4cm">Auth. Signatory</font>
</td>
</table>
<br />
</div>
<button onclick="PrintElem('#1')" id="print" style="margin-left:16cm">Print</button>

<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.1.min.js" > </script> 
<script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', '1', 'height=400,width=600');
        mywindow.document.write('<html><head><title>my div</title>');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();
        mywindow.close();

        return true;
    }

</script>