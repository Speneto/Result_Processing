<?php
	//require_once('auth.php');
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Total income</title>
<link rel="stylesheet" href="tablescrolll.css" type="text/css" />
<link rel="stylesheet" href="table.css" type="text/css" />
</head>

<body>
</br>
<center style="font: 'Courier New', Courier, mono;  font-size:xx-large; color:#FF0000; text-align:center; font-weight:bolder ">BRIGHT FUTURE HIGH SCHOOL </center>
<center style="font: 'Courier New', Courier, mono;  font-size:x-large; color:#FF0000; text-align:center; font-weight:bolder ">P O. Box 224, Numan, Adamawa State, Nigeria </center>
<center style="font:'Courier New', Courier, mono; font-size:large; text-align:center; font-weight:bold; color:#FF0000 ">View Total Income </br> Version : 2.1 </center>
</br>
<div style="margin-left:900px ">
Date : <input type="text" value="<?php echo (date("Y-m-d"))?>"  style="border:none; text-align:left "/>
</div>

<fieldset  style="border-color:#000000 ">
<legend><em style="color:#0033FF ">Form display total income/balance </em></legend>
<center>

<div id="inventory" class="content" style="width:60% ">
<table width="80%">
 
<?php 
if(isset($_POST['total_income'])){
include ("DB_connection.php");
 $date = trim(htmlspecialchars(strtoupper($_POST['date'])));
  $date2 = trim(htmlspecialchars(strtoupper($_POST['date2'])));
  $term = trim(htmlspecialchars(strtoupper($_POST['term'])));
  $session = trim(htmlspecialchars(strtoupper($_POST['session'])));


if(empty($date2) && $term != "PLEASE SELECT TERM" && $session != "PLEASE SELECT SESSION"){
$sql_fees1 = @mysql_query("SELECT SUM(fees_sheet.First_Payment) AS First FROM fees_sheet WHERE fees_sheet.F_Date = '$date' AND fees_sheet.Term='$term' AND fees_sheet.Session='$session' ");
$sql_fees2 = @mysql_query("SELECT SUM(fees_sheet.Second_Payment) AS Second FROM fees_sheet WHERE fees_sheet.S_Date = '$date' AND fees_sheet.Term='$term' AND fees_sheet.Session='$session' ");
$sql_fees3 = @mysql_query("SELECT SUM(fees_sheet.Third_Payment) AS Third FROM fees_sheet WHERE fees_sheet.T_Date = '$date' AND fees_sheet.Term='$term' AND fees_sheet.Session='$session' ");
}else{
$sql_fees1 = @mysql_query("SELECT SUM(fees_sheet.First_Payment) AS First FROM fees_sheet WHERE fees_sheet.F_Date BETWEEN '$date' AND '$date2' AND fees_sheet.Term='$term' AND fees_sheet.Session='$session' ");
$sql_fees2 = @mysql_query("SELECT SUM(fees_sheet.Second_Payment) AS Second FROM fees_sheet WHERE fees_sheet.S_Date BETWEEN '$date' AND '$date2' AND fees_sheet.Term='$term' AND fees_sheet.Session='$session' ");
$sql_fees3 = @mysql_query("SELECT SUM(fees_sheet.Third_Payment) AS Third FROM fees_sheet WHERE fees_sheet.T_Date BETWEEN '$date' AND '$date2' AND fees_sheet.Term='$term' AND fees_sheet.Session='$session' ");
//$sql_fees = @mysql_query("SELECT SUM(expenses.Amount) AS Total FROM expenses WHERE expenses.Date BETWEEN '$date' AND '$date2' ");
}
 while($row_fees1=@mysql_fetch_array($sql_fees1)){
 $sum1 = abs($row_fees1['First']);
 }
 
 while($row_fees2=@mysql_fetch_array($sql_fees2)){
 $sum2 = abs($row_fees2['Second']);
 }

while($row_fees3=@mysql_fetch_array($sql_fees3)){
 $sum3 = abs($row_fees3['Third']);
 }
 
//$sql= @mysql_query("SELECT inventory.Description, sales.Quantity, sales.Rate, sales.Amount FROM sales JOIN inventory ON sales.ProductCode = inventory.ProductCode WHERE sales.CustomerId='$customerid' AND sales.Date = '$date' UNION ALL SELECT inventory.Description, debitsales.Quantity, debitsales.Rate, debitsales.Amount FROM debitsales JOIN inventory ON debitsales.ProductCode = inventory.ProductCode WHERE debitsales.CustomerId='$customerid' AND debitsales.Date = '$date' ");
 if(empty($date2) && $term != "PLEASE SELECT TERM" && $session != "PLEASE SELECT SESSION"){
 $sql_expenses = @mysql_query("SELECT * FROM expenses WHERE Date = '$date' AND Term ='$term' AND Session ='$session' ");
 }else{
 $sql_expenses = @mysql_query("SELECT * FROM expenses WHERE Date BETWEEN '$date' AND '$date2' AND Term ='$term' AND Session ='$session' ");
 } 
 while($row_expenses=@mysql_fetch_array($sql_expenses)){
  $amt=  $row_expenses['Amount'];
}
 
?>

</table>

<?php

 
if(empty($date2)){
  echo"*****************************************************************************************************************"; echo"</br>";
  echo("The Total School Fees Paid On " ." ". $date ." ". "Is" ." : ". ($sum1 + $sum2 + $sum3)); echo"</br>";
  echo("The Total Expenditure Made On " ." ". $date . " "."Is" ." : ". $amt); echo"</br>"; 
  echo("The Balance After Expenditure On " ." ". $date ." ". "Is" ." : ". (($sum1 + $sum2 + $sum3) - $amt) ); echo"</br>"; 
   echo"*****************************************************************************************************************"; echo"</br>";
}else{

  echo"*****************************************************************************************************************"; echo"</br>";
  echo("The Total School Fees Paid From " ." ". $date ." To " . $date2 . "=" ." : ".  ($sum1 + $sum2 + $sum3)); echo"</br>";
  echo("The Total Expenditure Made From " ." ". $date ." To ". $date2 . "=" ." : ". $amt); echo"</br>"; 
  echo("The Balance After Expenditure From " ." ". $date ." To ". $date2 . "=" ." : ". (($sum1 + $sum2 + $sum3) - $amt) ); echo"</br>"; 
  echo"*****************************************************************************************************************"; echo"</br>";
}
}
?>


</div>
</br>

</center>
</fieldset>


<div style="margin-top:45px ">
<center>
<a href="total_income.php">Click to go back</a>
</center>
</div>

<center>
<div style="margin-top:10px ">
<a href="bursarwelcome.php">Click Bursar Menu</a>	
	</div>
	</center>


<div style="margin-top:10px ">
<marquee behavior="scroll">
  <font   size="+2" face="Times New Roman, Times, serif"><b>This Software Was Designed by SocketSystem For Bright Fututure Schools and Protected By Copy Right Law!!! Contact : +2347030097462, +2348062628486,</b></font>
  </marquee>
</div>
</body>
</html>

