<?php
	//require_once('auth.php');
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>View total income</title>
<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script> 


<style type="text/css">
<!--
.style1 {color: #0000FF}
.style2 {color: #FF00FF}
-->
</style>
</head>

<body background="images/background.png">

</br> 
<center style="font: 'Courier New', Courier, mono;  font-size:xx-large; color:#FF0000; text-align:center; font-weight:bolder ">
  <span class="style1">BRIGHT FUTURE HIGH SCHOOL</span>
</center>
<center style="font: 'Courier New', Courier, mono;  font-size:x-large; color:#FF0000; text-align:center; font-weight:bolder ">P O. Box 224, Numan, Adamawa State, Nigeria </center>
<center style="font:'Courier New', Courier, mono; font-size:large; text-align:center; font-weight:bold; color:#FF0000 ">
  View Total Income Form </br> Version : 1.1 
</center>
</br></br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Today's date : <input type="text" value="<?php echo date("d-m-Y"); ?>" style="border:none; text-align:center " />
</br>

<!-- Query Goods Sold -->
<fieldset style="border-color:#000000 ">
<legend><em style="color:#0000CC ">Form to view total income/balance</em> </legend>
<form action="total_income2.php" method="post" name="total_income2"> 
</br>
<center>
<table>
 <tr><td>Term :</td><td>
 <select name="term" id="term" size="1">
 <option value="Please Select Term">Please Select Term</option>
 <option value="First Term">First Term</option>
 <option value="Second Term">Second Term</option>
 <option value="Third Term">Third Term</option>
 </select>
 </td></tr>
    <tr></tr><tr></tr>
	
	 <tr><td>Session :</td><td>
	<select name="session" id="session" size="1">
 <option value="Please Select Session">Please Select Session</option>
 <option value="2015/2016">2015/2016</option>
 <option value="2016/2017">2016/2017</option>
 <option value="2017/2018">2017/2018</option>
 <option value="2018/2019">2018/2019</option>
 <option value="2019/2020">2019/2020</option>
 <option value="2020/2021">2020/2021</option>
 </select>
	 </td></tr>
   <tr></tr><tr></tr>
<tr><td>Date1 :</td><td><input type="text" name="date" id="date" class="tcal" style="background-color:#D5EAF0 "   readonly="readonly"  /></td></tr>
<tr></tr><tr></tr>
<tr><td>Date2 :</td><td><input type="text" name="date2" id="date2" class="tcal" style="background-color:#D5EAF0 "   readonly="readonly"  /></td></tr>
</table>
</br/> </br>
<input type="submit" name="total_income" id="total_income" value="Click to View Total Income/Balance" />
</center>
</div>
</br>
<div></div>
</form>
</center>
</fieldset>


<center>
<div style="margin-top:120px ">
<a href="bursarwelcome.php">Click to go back</a></div>
</center>


<center>
<div style="margin-top:10px ">
  <span class="style2"><a href="index.php">Click to go to home page</a>  </span></div>
</center>

<div style="margin-top:20px ">
  <span style="color: #FF00FF">
  <marquee behavior="scroll">
  <font   size="+2" face="Times New Roman, Times, serif"><b>This Software Was Designed by SocketSystem For Bright Fututure Schools and Protected By Copy Right Law!!! Contact : +2347030097462, +2348062628486,</b></font>
  </marquee>
  </span> </div>
</body>
</html>
