
<?php
//session_start();
?>
<html>
<head>
<title>Promotion</title>
</head>

<body background="1.gif" text="white" >
<br />
<br />
<br />

<blockquote>&nbsp;</blockquote>
<form action="promotion_list.php" method="post">
<Center>
<table border=0 CellPadding=5  border="black" background="AquaLoop Wallpaper Bk.jpg" WIDTH=10% text="blue" ><center>
<tr><td>
<table border=0 CellPadding=5  border="black" background="3438593196_e91fcc6316.jpg" WIDTH=10% text="blue" >

<tr  font face ="Britannic Bold" border="0" color="Red" size="500" ALIGN="CENTER">  <TH COLSPAN=4> <fieldset> <p font size=0>Promotion</fieldset></TH>
<th bgcolor="" colspan=2 align="right"><img src="indicator.GIF"  width="100" height="100" border="0"></th></TR>
        
		
<div align="center" style="color:#000000">
<tr><td>
Department
<select name="department" id="department" size="1" onChange="LoadDepartment()">
	<option value="Please Select Department">Please Select Department</option>
	<option value="Basic Education">Basic Education</option>
	<option value="Humanities">Humanities</option>
	<option value="Commercial">Commercial</option>
	<option value="Science and Mathematics">Science and Mathematics</option>
</select>
</td></tr>
<tr><td>
Class
<select name="class" id="class"  size="1" onChange="LoadClass()">
<option  value="Please Select Class">Please Select Class</option>
            <option value="JSS1A">JSS1A</option>
		    <option value="JSS1B">JSS1B</option>
			<option value="JSS1C">JSS1C</option>
		    <option value="JSS2A">JSS2A</option>
		    <option value="JSS2B">JSS2B</option>
			<option value="JSS2C">JSS1C</option>
		    <option value="JSS3A">JSS3A</option>
		    <option value="JSS3B">JSS3B</option>
			<option value="JSS3C">JSS3C</option>
			<option value="SSS1A">SSS1A</option>
		    <option value="SSS1B">SSS1B</option>
			<option value="SSS1C">SSS1C</option>
		    <option value="SSS2A">SSS2A</option>
		    <option value="SSS2B">SSS2B</option>
			<option value="SSS2C">SSS2C</option>
		    <option value="SSS3A">SSS3A</option>
		    <option value="SSS3B">SSS3B</option>
			<option value="SSS3C">SSS3C</option>
</select>
</td></tr>
<tr>
<td>
Term
<select name="term" id="term" onChange="LoadTerm()">
<option value="Please Select Term">Please Select Term</option>
<option value="First Term">First Term</Option>
<option value="Second Term">Second Term</Option>
<option value="Third Term">Third Term</Option>
</select>
</td>
<tr>
<td>
Academic Session

<select name="lstSession"  id="lstSession" onChange="ShowUp()">
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
  <input name="submit"  type="submit" value="CLICK PRINT"></td></tr>

  <tr><td>
  <center>
<a href="Admin.php"><img src="images/backred.png"></img></a>
</center>
<tr></td>
</form>
  </div> 

<?php  
/*if(isset($_POST['submit'])){
$class = trim(htmlspecialchars(strtoupper($_POST['class'])));
$term = trim(htmlspecialchars(strtoupper($_POST['term'])));
$session = trim(htmlspecialchars(strtoupper($_POST['lstSession'])));
  if($term == "FIRST TERM"){
   echo "OK";
  echo' <a href="./master_list.php?class=$class&term=$term&session=$session">Click here</a>';
  
  }


}*/

?>


</body>
</html>