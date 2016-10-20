
<?php
//session_start();
?>

<html>
<head>
<title>Next Term Fess</title>
<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script> 
</head>

<body background="1.gif" text="white" >
<br />


<blockquote>&nbsp;</blockquote>
<form action="<?php echo($_SERVER['PHP_SELF']); ?>"  method="post">
<Center>
<table border=0 CellPadding=5  border="black" background="AquaLoop Wallpaper Bk.jpg" WIDTH=10% text="blue" ><center>
<tr><td>
<table border=0 CellPadding=5  border="black" background="3438593196_e91fcc6316.jpg" WIDTH=10% text="blue" >

<tr  font face ="Britannic Bold" border="0" color="Red" size="500" ALIGN="CENTER">  <TH COLSPAN=4> <fieldset> <p font size=0>Enter Next Term's Fees</fieldset></TH>
<th bgcolor="" colspan=2 align="right"><img src="indicator.GIF"  width="100" height="100" border="0"></th></TR>
        
		
<div align="center" style="color:#000000">
<tr><td>
Class
<select name="class" id="class"  size="1" >
<option  value="Please Select Category">Please Select Category</option>
            <option value="JSS">JSS</option>
			<option value="SSS">SSS</option>
</select>
</td></tr>
<tr>
<td>
Next Term
<select name="term" id="term" >
<option value="Please Select Term">Please Select Term</option>
<option value="First Term">First Term</Option>
<option value="Second Term">Second Term</Option>
<option value="Third Term">Third Term</Option>
</select>
</td>
<tr>
<td>
Academic Session

<select name="lstSession"  id="lstSession" >
<option value="Please Select Session">Please Select Session</option>
<option value="2015/2016">2015/2016</option>
<option value="2016/2017">2016/2017</option>
<option value="2017/2018">2017/2018</option>
<option value="2018/2019">2018/2019</option>
<option value="2019/2020">2019/2020</option>
</select>
</td>
</tr>

<tr><td> 
Next Term Total Fees
<input type="text" name="fees" id="fees" />   
</td></tr>

<tr><td>    
Next Term Begins
<input type="text" name="nextTerm" id="nextTerm" class="tcal"/>
</td></tr>

<tr><td>    
  <input name="submit" type="submit" value="CLICK TO SAVE"></td></tr>

  <tr><td>
  <center>
<a href="Admin.php"><img src="images/backred.png"></img></a>
</center>
<tr></td>
</form>
  </div> 
  
  
  <?php
//Code to save Customers Information to dataBase
include ("DB_connection.php");
  if(isset($_POST['submit'])){
 
     $class = trim(htmlspecialchars(strtoupper($_POST['class'])));
	 $term = trim(htmlspecialchars(strtoupper($_POST['term'])));
	 $session = trim(htmlspecialchars(strtoupper($_POST['lstSession'])));
	 $fees = trim(htmlspecialchars(strtoupper($_POST['fees'])));
	 $nextTerm = trim(htmlspecialchars(strtoupper($_POST['nextTerm'])));
	 
	 
	 //check if input is entered
	 if(empty($class) || $class == "PLEASE SELECT CATEGORY"){
	 echo("<script type = 'text/javascript'>\n");
	 echo("alert('Please Select Category')");
	 echo("</script>");
	 exit();
	 }else if(empty($term) || $term == "PLEASE SELECT TERM"){
	 echo("<script type = 'text/javascript'>\n");
	 echo("alert('Please Select Term')");
	 echo("</script>");
	 exit();
	 }else if(empty($session) || $session == "PLEASE SELECT SESSION"){
	 echo("<script type = 'text/javascript'>\n");
	 echo("alert('Please Select Session')");
	 echo("</script>");
	 exit();
	 }else if(empty($fees)){
	 echo("<script type = 'text/javascript'>\n");
	 echo("alert('Please Enter Next Terms Fees')");
	 echo("</script>");
	 exit();
	 }else if(empty($nextTerm)){
	 echo("<script type = 'text/javascript'>\n");
	 echo("alert('Please Enter Date of Resumption')");
	 echo("</script>");
	 exit();
	 }else{
	 $confirm = mysql_query("Select * From school_fees Where Resumption='$nextTerm' AND Class='$class' AND Session='$session' ");
	 $num_rows = mysql_num_rows($confirm);
	 if($num_rows == 0){
	 $Insert = mysql_query("INSERT INTO school_fees (Fees, Resumption, Class, Term, Session) VALUES ('$fees', '$nextTerm', '$class', '$term', '$session')");
	  echo("<script type = 'text/javascript'>\n");
	 echo("alert('Information saved Sucessfully')");
	 echo("</script>");
	 exit();
	 }else{
	 echo("<script type = 'text/javascript'>\n");
	 echo("alert('Record Already Exist')");
	 echo("</script>");
	 exit();
	 }
	 }
	 }
?>	 
  
  
</body>
</html>