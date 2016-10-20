
<?php
//session_start();
?>
<html>
<head>
<title>Login</title>
</head>

<body background="1.gif" text="white" >
<br />
<br />
<br />

<blockquote>&nbsp;</blockquote>
<form action="remidial.php" method="post">
<Center>
<table border=0 CellPadding=5  border="black" background="AquaLoop Wallpaper Bk.jpg" WIDTH=10% text="blue" ><center>
<tr><td>
<table border=0 CellPadding=5  border="black" background="3438593196_e91fcc6316.jpg" WIDTH=10% text="blue" >

<tr  font face ="Britannic Bold" border="0" color="Red" size="500" ALIGN="CENTER">  <TH COLSPAN=4> <fieldset> <p font size=0>Printing Remidial Students</fieldset></TH>
<th bgcolor="" colspan=2 align="right"><img src="indicator.GIF"  width="100" height="100" border="0"></th></TR>
        
		
<div align="center" style="color:#000000">
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
<?php
/*include'DB_connection.php';
echo "Subject";
$result= mysql_query("SELECT subject.Subj_ID, subject.Subjects FROM subject ");	
	
	echo '<select name="subject" id="subject"  size="1" width="200" onChange="LoadSubject()">';
	echo '<option value="">';
	echo 'Please Select Subject ';
	echo '</option>';
	 while($row= mysql_fetch_array($result))
	{
	echo '<option value="'.$row['Subj_ID'].'">';
	echo $row['Subjects'];
	echo'</option>';
	}
	echo'</select>'; */
?>

Subject 
<select name="subject" id="subject" size="1" width="200" >
<option value="">Please Select Subject</option>
<option value="20">Mathematics</option>
<option value="10">English Language</option>
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
  <input name="submit" type="submit" value="CLICK PRINT"></td></tr>
  <tr><td><a href="Admin.php">Back</a><tr></td>
</form>
  </div> 

</body>
</html>
