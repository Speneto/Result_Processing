 <?php
session_start();

?>
<html>	 
<head>
<title>view fees</title>
</head>

<body background="1.gif" text="white" >
<br />
<br />
<br />

<blockquote>&nbsp;</blockquote>
<form action="display_fees.php" method="post">
<Center>
<table border=0 CellPadding=5  border="black" background="AquaLoop Wallpaper Bk.jpg" WIDTH=10% text="blue" ><center>
<tr><td>
               <table border=0 CellPadding=5  border="black" background="3438593196_e91fcc6316.jpg" WIDTH=10% text="blue" >

        <tr  font face ="Britannic Bold" border="0" color="Red" size="500" ALIGN="CENTER">  <TH COLSPAN=4> <fieldset> View Student School Fees </fieldset></TH>
<th bgcolor="" colspan=2 align="right"><img src="indicator.GIF"  width="100" height="100" border="0"></th></TR>
        
		
  <div align="center" style="color:#000000">
  <tr>
 <td> Class	: <select name="class" id="class" size="1" >
    <option value="Please Select Class">Please Select Class</option>
    <option value="JSS">JSS</option>
	 <option value="SSS">SSS</option>
 </select>
 </td>
 </tr>
 <tr>
 <td>
    Term	: <select name="term" id="term" size="1" >
    <option value="Please Select Term">Please Select Term</option>
    <option value="First Term">First Term</option>
	 <option value="Second Term">Second Term</option>
	 <option value="Third Term">Third Term</option>
 </select>
  </td>
  </tr>
  
  <tr>
 <td>
    Session	: <select name="session" id="session" size="1" >
    <option value="Please Select Session">Please Select Session</option>
    <option value="2015/2016">2015/2016</option>
	 <option value="2016/2017">2016/2017</option>
	 <option value="2017/2018">2017/2018</option>
	 <option value="2018/2019">2018/2019</option>
	 <option value="2019/2020">2019/2020</option>
	 <option value="2020/2021">2020/2021</option>
 </select>
  </td>
  </tr>
  
  <tr><td colspan="2">
  <input name="submit" type="submit" value="Click to View"></br></br> 
  <a href="bursarwelcome.php"><img src="images/backred.png"></img></a>
  
  </td> </tr> 
  
  
  </div> 
 <!--<td&nbsp;&nbsp&nbsp;<a href="logInForm.php">Click here to Log-Out</a>&nbsp;&nbsp;&bull;&nbsp;&nbsp;  </td>-->
 
  </td></tr>
   
</form>

</body>
</html>
