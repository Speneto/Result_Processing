
<?php
//session_start();
?>
<html>
<head>
<title>Print result</title>


<!-- Function to Set Class ID -->
<script  type="text/javascript">
function LoadClass(){

var e = document.getElementById("class");
var str = e.options[e.selectedIndex].value;
document.getElementById("class_id").value = str;
str +='&' + (new Date()).getTime();
if(str == "" || str=="Please Select Class"){
alert("Please Select Class");
return;
}
}
</script>


<!-- Function to get Session ID and Load Students Name -->
<script  type="text/javascript">
function ShowUp(){
var str1 = document.getElementById("class_id").value;
str1 +='&' + (new Date()).getTime();
var e = document.getElementById("lstSession");
var str = e.options[e.selectedIndex].value;
document.getElementById("session_id").value = str;
str +='&' + (new Date()).getTime();

var f = document.getElementById("term");
var str3 = f.options[f.selectedIndex].value;

var g = document.getElementById("department");
var str4 = g.options[g.selectedIndex].value;


if(str == "" || str=="Please Select Session"){
alert("Please Session Class");
return;
}
if(window.XMLHttpRequest){
xmlhttp = new XMLHttpRequest();
}else{
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange = function(){
if(xmlhttp.readyState == 4  && xmlhttp.status == 200){
// reference the name select list
var lstname = document.getElementById("lst_name");
//clear the list
while(lstname.options.length >= 1)
lstname.options.length = 0;
// populate student names into list

if(xmlhttp.responseText.length > 1){
var string = xmlhttp.responseText.split("xxx");
//document.getElementById("fca")value= string[4];
//alert(string);
//(string[0].split("-*-")[1]);
//alert(str1);
//alert(str);
//alert(str1);
   
var selectBoxOption = document.createElement("option");//create new option
selectBoxOption.value = "Please Select Name";//set option value
selectBoxOption.text = "Please Select Name";// set display text
try{
lstname.options.add(selectBoxOption,null);
}catch(err){
lstname.options.add(selectBoxOption); // IE browsers
}

var i;
for(i=0; i < string.length; i++){
selectBoxOption = document.createElement("option");//create new option
selectBoxOption.value = string[i].split("-*-")[0];//set option value
selectBoxOption.text = string[i].split("-*-")[1];// set display text
//alert the Element Created
try{
lstname.options.add(selectBoxOption,null);
}catch(err){
lstname.options.add(selectBoxOption); // IE browsers
}
}
}
}
}
//xmlhttp.open("GET","getStudentName_single.php?param1="+str,true);
xmlhttp.open("GET","getStudentName_single.php?param1="+str+"&param2="+str1+"&param3="+str3+"&param4="+str4,true);
xmlhttp.send();

}
</script>






</head>

<body background="1.gif" text="white" >
<br />
<br />
<br />

<blockquote>&nbsp;</blockquote>
<form action="result5.php"  method="post">
<Center>
<table border=0 CellPadding=5  border="black" background="AquaLoop Wallpaper Bk.jpg" WIDTH=10% text="blue" ><center>
<tr><td>
<table border=0 CellPadding=5  border="black" background="3438593196_e91fcc6316.jpg" WIDTH=10% text="blue" >

<tr  font face ="Britannic Bold" border="0" color="Red" size="500" ALIGN="CENTER">  <TH COLSPAN=4> <fieldset> <p font size=0>Print Student Results</fieldset></TH>
<th bgcolor="" colspan=2 align="right"><img src="indicator.GIF"  width="100" height="100" border="0"></th></TR>
        
		
<div align="center" style="color:#000000">
<tr><td>
Department </br>
<select name="department" id="department" size="1" onChange="LoadDepartment()">
	<option value="Please Select Department">Please Select Department</option>
	<option value="Basic Education">Basic Education</option>
	<option value="Humanities">Humanities</option>
	<option value="Commercial">Commercial</option>
	<option value="Science and Mathematics">Science and Mathematics</option>
</select>
</td></tr>


<tr><td>
Class </br>
<select name="class" id="class"  size="1" onChange="LoadClass()" >
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
Term </br>
<select name="term" id="term" >
<option value="Please Select Term">Please Select Term</option>
<option value="First Term">First Term</Option>
<option value="Second Term">Second Term</Option>
<option value="Third Term">Third Term</Option>
</select>
</td></tr>


<tr>
<td>
Academic Session

<select name="lstSession"  id="lstSession" onChange="ShowUp()" >
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
Name
<br />
<select name="lst_name" id="lst_name" >
<option>Please Select Name</option>
 </select>

<br>
</td></tr>
<input type="hidden" name="class_id" id="class_id" />
<input type="hidden" name="session_id" id="session_id" />


<tr><td>    
  <input name="submit" type="submit" value="CLICK PRINT"></td></tr>

  <tr><td>
  <center>
<a href="Admin.php"><img src="images/backred.png"></img></a>
</center>
<tr></td>
</form>
  </div> 
</body>
</html>