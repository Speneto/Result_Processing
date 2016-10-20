
<html>
<?php
session_start();
?>

<head>

<title></title>
<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script> 


<!-- Function to get Students Infomation -->

<script  type="text/javascript">
function LoadInfo(){
var S_ID_Number = document.getElementById("S_ID_Number").value;
if(S_ID_Number == "" || S_ID_Number == null){
alert("Please Enter Student ID_Number");
document.Update_student_info.S_ID_Number.focus();
return false;
}

S_ID_Number +='&' + (new Date()).getTime();


if(window.XMLHttpRequest){
xmlhttp = new XMLHttpRequest();

}else{
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange = function(){
if(xmlhttp.readyState == 4  && xmlhttp.status == 200){
var string = xmlhttp.responseText;
var array = string.split('*');
//alert(string);
//alert(array);
//document.getElementById("id").value = array[0];
var t = array[0];
//alert(t);
//alert(array[1]);
//var t = string;
if( string == "" || string == null){
alert("Record Not Found, Please Check The Student ID_Number");
//document.getElementById("fca").value = 0;
//document.getElementById("sca").value = 0;
//document.getElementById("tca").value = 0;
//document.getElementById("frca").value = 0;
//document.getElementById("ex").value = 0;
}else{
document.getElementById("ID_Number").value = array[0];
document.getElementById("Term").value = array[1];
document.getElementById("Session").value = array[2];
document.getElementById("Name").value = array[3];
document.getElementById("Age").value = array[4];
document.getElementById("DOB").value = array[5];
document.getElementById("Nationality").value = array[6];
document.getElementById("State").value = array[7];
document.getElementById("LGA").value = array[8];
document.getElementById("Class").value = array[9];
document.getElementById("department").value = array[10];


document.getElementById("place_of_birth").value = array[11];
document.getElementById("gender").value = array[12];
document.getElementById("languages").value = array[13];
document.getElementById("country_of_residence").value = array[14];
document.getElementById("father_name").value = array[15];
document.getElementById("Parent_Address").value = array[16];
document.getElementById("Parent_Phone").value = array[17];
document.getElementById("religion").value = array[18];
document.getElementById("occupation").value = array[19];
document.getElementById("education_level").value = array[20];
document.getElementById("no_wife").value = array[21];
document.getElementById("mother_position").value = array[22];
document.getElementById("sibling_no").value = array[23];
document.getElementById("parent_status").value = array[24];
document.getElementById("nursery").value = array[25];
document.getElementById("primary").value = array[26];
document.getElementById("junior").value = array[27];

}

}
}

xmlhttp.open("GET","getStudentInfo.php?studentid="+S_ID_Number,true);
xmlhttp.send();


}
</script>






 <script type="text/javascript">
 // Validate Name
 function validateName(){
var format =  /^[A-Za-z ]{1,}$/;//text
if(document.getElementById("Name").value == "" || document.getElementById("Name").value == null){
return true;
}else if(document.getElementById("Name").value.match(format)){
//document.addnewstudent.studentname.focus();
return true;
}else{
alert("Please Student Name Should be Only Letters e.g IBRAHIM D \n LANTI GANYE OR IBRAHIM KABIRU IDRIS E.T.C");
document.getElementById("Name").value = "";
document.Update_student_info.Name.focus();
return false;
}
}
 
 </script>

<script type="text/javascript">
function validateAge(){
   var format =  /^[0-9]{1,}$/;//text
if(document.getElementById("Age").value == "" || document.getElementById("Age").value == null ){

return true;
}else if(document.getElementById("Age").value.match(format)){
//document.addnewstudent.studentname.focus();
return true;
}else{
alert("Please Age Should be Only Numbers e.g 12, 24, 16 E.T.C");
document.getElementById("Age").value = ""
document.Update_student_info.Age.focus();
return false;
}
}

</script>



<script type="text/javascript">
 // Validate LGA
 function validateLga(){
var format =  /^[A-Za-z ]{1,}$/;//text
if(document.getElementById("LGA").value == "" || document.getElementById("LGA").value == null){
return true;
}else if(document.getElementById("LGA").value.match(format)){
//document.addnewstudent.studentname.focus();
return true;
}else{
alert("Please LGA Should be Only Letters e.g DEMSA D \n NUMAN YOLA-NORTH E.T.C");
document.getElementById("LGA").value = "";
document.Update_student_info.LGA.focus();
return false;
}
}
 
 </script>

<script type="text/javascript">
//validate Phone number
function validatePhoneNumber(){
   var format =  /^[0-9]{1,}$/;//text
if(document.getElementById("Parent_Phone").value == "" || document.getElementById("Parent_Phone").value == null ){

return true;
}else if(document.getElementById("Parent_Phone").value.match(format)){
//document.addnewstudent.studentname.focus();
return true;
}else{
alert("Please Phone Number Should be Only Numbers e.g 08052127352 E.T.C");
document.getElementById("Parent_Phone").value = ""
document.Registration.Parent_Phone.focus();
return false;
}
}

</script>


<script type="text/javascript">
function validateNationality(){
var format =  /^[A-Za-z ]{1,}$/;//text
if(document.getElementById("Nationality").value == "" || document.getElementById("Nationality").value == null){
return true;
}else if(document.getElementById("Nationality").value.match(format)){
//document.addnewstudent.studentname.focus();
return true;
}else{
alert("Please Nationality Should be Only Letters e.g NIGERIAN\n NON NIGERIAN E.T.C");
document.getElementById("Nationality").value = "";
document.Update_student_info.Nationality.focus();
return false;
}
}

</script>


<script type="text/javascript">
function validateState(){
var format =  /^[A-Za-z ]{1,}$/;//text
if(document.getElementById("State").value == "" || document.getElementById("State").value == null){
return true;
}else if(document.getElementById("State").value.match(format)){
//document.addnewstudent.studentname.focus();
return true;
}else{
alert("Please State Should be Only Letters e.g ADAMAWA, TARABA\n GOMBE, BAUCHI E.T.C");
document.getElementById("State").value = "";
document.Update_student_info.State.focus();
return false;
}
}

</script>



</head>


<body background="images/background.png"  >
<hr size="50" color="Red" text="Welcome"/>
<center>
<table border="0">
<tr>
<td>&nbsp;</td>
<td><h1><font color="Green"></font><font color="Green">
  </font>
<div align="center"><font color="Green" size="+7"><blink>BRIGTH <font color="#FF00CC">FUTURE</font> SCHOOLS</blink> </font></div>
  </h1></td>
<td>&nbsp;</td>
</tr>
</table>
</center>
<form method="Post" action="save_updated_student_info.php" id="Update_student_info" name="Update_student_info" >
<center>
<table width="597" border="1" background="images/1.gif">
<tr><td><font color="#FF00FF" size="6"><strong><marquee direction="right" loop="-1">
WELCOME TO BFIS REGISTRATION REGISTRATION PORTAL
</marquee></strong></font></td>
</tr>
<tr>
<td><font color="#CC3300" size="5">Search Admission Number </font></td>
<td>
  <input type="text" size="30" name="S_ID_Number" id="S_ID_Number" autofocus   /> <input type="button" id="search" value="search " onClick="LoadInfo()" /></td>
</tr>

<tr>
<td><font color="#CC3300" size="5">Admission Number </font></td>
<td>
  <input type="text" size="40" name="ID_Number" id="ID_Number"    /> </td>
</tr>

<tr>
<td><font color="#CC3300" size="5">Term</font></td>
<td>
    <input type="text" size="50" name="Term" id="Term"></td>
<tr>
<td><font color="#CC3300" size="5">Academic Session</font></td>
<td>
    <input type="text" size="50" name="Session" id="Session"></td>
</tr>
<tr>
<td><font color="#CC3300" size="5">Student Name </font></td> 
    <td>
    <input type="text" name="Name" size="50" id="Name" onKeyUp="validateName()" />
  </td>
</tr>
<tr>
<td><font color="#CC3300" size="5">Age</font></td>
<td>
    <input type="text" name="Age" size="50" id="Age" onKeyUp="validateAge()" />
  </td>
</tr>
<tr>
  <td><font color="#CC3300" size="5">Date of Birth </font></td> 
   <td>
<input type="text"  name="DOB" id="DOB" />
    </td>
</tr>
<tr>
  <td><font color="#CC3300" size="5">NATIONALITY</font> </td>
  <td>
    <input type="text" name="Nationality" size="50" id="Nationality" onKeyUp="validateNationality()">
    </td>
</tr>
<tr>
<td>
<font color="#CC3300" size="5">State Of Origin</font> </td>
<td>
      <input type="text" name="State" size="50" id="State" onKeyUp="validateState()" />
</td>
</tr>
<tr>
<td>
<font color="#CC3300" size="5">L.G.A </font></td>
<td>
<input type="text" name="LGA" size="50" id="LGA" onKeyUp="validateLga()">
</td>
</tr>
<tr>
  <td><font color="#CC3300" size="5">Class</font> </td>
    <td> 
    <input type="text" name="Class" size="50" id="Class"></td>
</tr>

<tr>
<td><font color="#CC3300" size="5">Department</font></td>
<td><input type="text" id="department" name="department" size="50" /></td>
</tr>
	
	
<tr>
  <td><font color="#CC3300" size="5">Place of Birth:</font></td>
  <td>

    <input type="text" size="50" name="place_of_birth" id="place_of_birth" ></td>
<tr>
  <td><font color="#CC3300" size="5">Gender:</font></td>
<td>
    <input type="text" size="50" name="gender" id="gender" ></td>
<tr>
  <td><font color="#CC3300" size="5">Languages Spoken:</font></td>
  <td>
    <input type="text" size="50" name="languages" id="languages" ></td>			
<tr>
  <td><font color="#CC3300" size="5">County of Residence:</font></td>
<td>
    <input type="text" size="50" name="country_of_residence" id="country_of_residence" ></td>	
	
	
<tr>
  <td><font color="#CC3300" size="5">Fathers Name:</font></td>
<td>
    <input type="text" size="50" name="father_name" id="father_name" onKeyUp="Father_Name()"></td></tr>
	
	
<tr>
<td>
<font color="#CC3300" size="5">Parent Address:</font></td>
  <td>
<input type="text" size="50" name="Parent_Address" id="Parent_Address">
</td>
</tr>
<tr>
  <td><font color="#CC3300" size="5">Parent Phone:</font></td>
<td>
    <input type="text" size="50" name="Parent_Phone" id="Parent_Phone" onKeyUp="validatePhoneNumber()"></td>
	
	</tr>	
<tr>
  <td><font color="#CC3300" size="5">Religion</font></td>
  <td>
    <input type="text" size="50" name="religion" id="religion" onKeyUp="Religion()"></td>
<tr>
  <td><font color="#CC3300" size="5">Occupation:</font></td>
<td>
    <input type="text" size="50" name="occupation" id="occupation"></td>
<tr>
  <td><font color="#CC3300" size="5">Educational Level:</font></td>
<td>
    <input type="text" size="50" name="education_level" id="education_level" ></td>
<tr>
  <td><font color="#CC3300" size="5">No of Wifes:</font></td>
<td>
    <input type="text" size="50" name="no_wife" id="no_wife" ></td>		
<tr>
  <td><font color="#CC3300" size="5">Mothers Position:</font></td>
<td>
    <input type="text" size="50" name="mother_position" id="mother_position" ></td>
<tr>
  <td><font color="#CC3300" size="5">Siblings Number:</font></td>
<td>
    <input type="text" size="50" name="sibling_no" id="sibling_no" ></td>
<tr>
  <td><font color="#CC3300" size="5">Parents Divorce/Living Apart/Separated:</font></td>
<td>
    <input type="text" size="50" name="parent_status" id="parent_status" ></td>				
<tr>
  <td><font color="#CC3300" size="5">Nursery School/Duration:</font></td>
<td>
    <input type="text" size="50" name="nursery" id="nursery" ></td>
<tr>
  <td><font color="#CC3300" size="5">Primary School/Duration:</font></td>
  <td>
    <input type="text" size="50" name="primary" id="primary" ></td>
<tr>
  <td><font color="#CC3300" size="5">Junior School/Duration:</font></td>
<td>
    <input type="text" size="50" name="junior" id="junior" ></td>		
	
	
	
<tr><td><center><font color="blue" size="5"></font><input type="SUBMIT" value="Update Student Info" name="Submit" id="Submit">
</center></td>
</tr>
</table>
</form>
<center>
<hr color="red" size="8"><br><a href="Admin.php"><img src="images/backred.png"></img><br>
</center>



</body>


</html> 
