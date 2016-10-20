<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Display Fees</title>
<style type="text/css">
<!--
.style1 {
	font-size: 36px;
	font-weight: bold;
	color: #0000FF;
}
.style2 {
	color: #FF0000;
	font-size: 18px;
}
-->
</style>
</head>

<body background="images/background.png">
<center>
  <span class="style1">BRIGHT FUTURE HIGH SCHOOL</span><br>
  <span class="style2">School Fees Payment Ledger  </span>
</center>
<?php 
include 'DB_connection.php';
$class = trim(htmlspecialchars(strtoupper($_POST['class'])));
$term = trim(htmlspecialchars(strtoupper($_POST['term'])));
$session = trim(htmlspecialchars(strtoupper($_POST['session'])));
?>
<center>
<table border="1"  style="border-collapse:collapse ">
<tr><th>S/NO</th><th>ID_NUMBER</th><th width="280">NAME</th><th width="30">1ST INSTAL AMOUNT PAID</th><th>RECEIPT NO</th><th>DATE</th><th width="30">2ND INSTAL AMOUNT PAID</th><th>RECEIPT NO</th><th>DATE</th><th width="30">3RD INSTAL AMOUNT PAID</th><th>RECEIPT NO</th><th>DATE</th><th>BALANCE</th></tr>

<?php 
$sql= mysql_query("Select fees_sheet.ID_Number, fees_sheet.First_Payment, fees_sheet.F_Reciept_No, fees_sheet.F_Date, fees_sheet.Second_Payment, fees_sheet.S_Reciept_No, fees_sheet.S_Date, fees_sheet.Third_Payment, fees_sheet.T_Reciept_No, fees_sheet.T_Date, fees_sheet.Balance, students.Name From fees_sheet JOIN students ON fees_sheet.ID_Number=students.ID_Number WHERE fees_sheet.Session='$session' AND fees_sheet.Class='$class' AND fees_sheet.Term='$term'  ");
$sn =1;
while($row=mysql_fetch_array($sql)){
 ?>
 <tr><td><?php echo $sn; ?></td><td> <?php echo $row['ID_Number'];?></td><td> <?php echo $row['Name'];?></td><td> <?php echo $row['First_Payment'];?></td><td> <?php echo $row['F_Reciept_No'];?></td><td> <?php echo $row['F_Date'];?></td><td> <?php echo $row['Second_Payment'];?></td><td> <?php echo $row['S_Reciept_No'];?></td><td> <?php echo $row['S_Date'];?></td><td> <?php echo $row['Third_Payment'];?></td><td> <?php echo $row['T_Reciept_No'];?></td><td> <?php echo $row['T_Date'];?></td><td> <?php echo $row['Balance'];?></td></tr>
 
 <?php
 $sn++;
}
?>


</table>
<br/><br/>
 <input type="button"  value="Print This Page" onClick="window.print()"  />  
 <br/><br/>  
  <a href="view_fees.php"><img src="images/backred.png"></img></a> 
</center>
</body>
</html>
