<?php
	//require_once('auth.php');
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Expenses</title>
<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script> 


<script type="text/javascript">
// validate amount

function validateAmount(){
   var format =  /^[0-9]{1,}$/;//text
if(document.getElementById("amount").value == "" || document.getElementById("amount").value == null ){

return true;
}else if(document.getElementById("amount").value.match(format)){

//document.addnewstudent.studentname.focus();
return true;
}else{
alert("Please Amount Should be Only Numbers e.g 2000, 3500 E.T.C");
document.getElementById("amount").value = ""
document.expenses.amount.focus();
return false;
}
}

</script>


<style type="text/css">
<!--
.style1 {color: #FF00FF}
-->
</style>
</head>

<body background="images/background.png">

</br> 
<center style="font: 'Courier New', Courier, mono;  font-size:xx-large; color:#FF0000; text-align:center; font-weight:bolder ">BRIGHT FUTURE HIGH SCHOOL </center>
<center style="font: 'Courier New', Courier, mono;  font-size:x-large; color:#FF0000; text-align:center; font-weight:bolder ">P O. Box 224, Numan, Adamawa State, Nigeria </center>
<center style="font:'Courier New', Courier, mono; font-size:large; text-align:center; font-weight:bold; color:#FF0000 ">
  Expenses Form </br> Version : 1.1 
</center>
</br></br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Today's date : <input type="text" value="<?php echo date("d-m-Y"); ?>" style="border:none; text-align:center " />
</br>

<!-- Query Goods Sold -->
<fieldset style="border-color:#000000 ">
<legend><em style="color:#0000CC ">Form to post expenses</em> </legend>
<form action="<?php echo($_SERVER['PHP_SELF']) ?>" method="post" name="expenses"> 
</br> </br>
<center>
<table>
<tr><td> Description :</td><td><input type="text" name="description" id="description"  size="50" style="background-color:#D5EAF0 " placeholder="Enter the description of expenses made"/></td> </tr></br></br>
<tr></tr><tr></tr>
<tr><td>Amount :</td><td><input type="text" id="amount" name="amount" style="background-color:#D5EAF0 " placeholder="Enter the amount " onKeyUp="validateAmount()" /></td></tr>

 <tr></tr><tr></tr>
 
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
<tr><td>Date :</td><td><input type="text" name="date" id="date"  class="tcal" style="background-color:#D5EAF0 "   readonly="readonly" /></td> </tr>

</table>
</br></br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="submit" name="expenses" id="expenses" value="Click to Post Expenses" />
</center>
</div>
</br>
<div>



</div>







</form>
</center>
</fieldset>


<center>
<div style="margin-top:60px ">
<a href="bursarwelcome.php">Click to go back</a>

</div>

</center>


<center>
<div style="margin-top:10px ">
<a href="index.php">Click to go to home page</a>	
  </div>
</center>

<div style="margin-top:20px "> <span class="style1">
  <marquee behavior="scroll">
  <font   size="+2" face="Times New Roman, Times, serif"><b>This Software Was Designed by SocketSystems For Bright Future Schools.and Protected By Copy Right Law!!! Contact : +2347030097462, +2348062628486 </b></font>
  </marquee>
</span> </div>
<?php
include 'DB_connection.php';
if(isset($_POST['expenses'])){

 $description = trim(htmlspecialchars(strtoupper($_POST['description'])));
  $amount = trim(htmlspecialchars(strtoupper($_POST['amount'])));
	 $date = trim(htmlspecialchars(strtoupper($_POST['date'])));
	 $term = trim(htmlspecialchars(strtoupper($_POST['term'])));
  $session = trim(htmlspecialchars(strtoupper($_POST['session'])));
	 //check if input is entered
	 if(empty($description)){
	 echo("<script type = 'text/javascript'>\n");
	 echo("alert('Please Enter Expenses Made')");
	 echo("</script>");
	 exit();
	}else  if(empty($amount)){
	 echo("<script type = 'text/javascript'>\n");
	 echo("alert('Please Enter Amount')");
	 echo("</script>");
	 exit();
	}else if(empty($date)){
	 echo("<script type = 'text/javascript'>\n");
	 echo("alert('Please Select Date')");
	 echo("</script>");
	 exit();
	 }else if($term == "PLEASE SELECT TERM" || $term == ""){
	 echo("<script type = 'text/javascript'>\n");
	 echo("alert('Please Select Term')");
	 echo("</script>");
	 exit();
	 }else if($session == "PLEASE SELECT SESSION" || $session == ""){
	 echo("<script type = 'text/javascript'>\n");
	 echo("alert('Please Select Session')");
	 echo("</script>");
	 exit();
	 }else{
	 
	 $sql = @mysql_query("Insert into expenses (Expenses, Amount, Date, Term, Session  ) VALUES ('$description', '$amount', '$date', '$term', '$session' )");
	 if (@mysql_affected_rows() > 0) {
	 
	  echo '<script type="text/javascript"\n>';
	 echo '(alert("Expenses Posted Successfully"))';
	 echo '</script>';
	 exit;
   }else{
   // echo ("Customer Not Saved");
    echo '<script type="text/javascript"\n>';
	 echo '(alert("Expenses Not Posted"))';
	 echo '</script>';
	 exit;
   
   }
	 
	 }}
	 ?>


</body>
</html>

