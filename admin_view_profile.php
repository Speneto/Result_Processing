<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Employee resume table</title>
</head>

<body>
<center>
<h1><font color="#FF0000">BRIGHT FUTURE HIGH SCHOOL</font></h1>
<h3>EMPLOYEE RESUME TABLE</h3>
</center>

<?php  
include"DB_connection.php";

$sql = mysql_query("Select * From upload");
echo'<center>';
echo'<table cellpadding="5" cellspacing="3" border="1" style="border-collapse:collapse " width="70%">';
while($row=mysql_fetch_array($sql)){
?>
<td class="blaaa"><b>Resume  </b></td> <td class="blaaa"><b><?php echo $row['ID_Number'];  ?> </b></td> <td class="blaaa"><a href="resume/<?php echo $row['New_Name']; ?>" target="_blank"><?php echo $row['Name']; ?> &nbsp;&nbsp; Click Here To View</a></td></tr>

<?php
}
echo'</table>';
echo'</center>';
?>


<br/><br/><br/>
<center>
<hr color="red" size="8"><br><a href="Admin.php"><img src="images/backred.png"></img><br>
</center>
</body>
</html>
