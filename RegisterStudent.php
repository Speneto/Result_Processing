
<html>
<?php
session_start();
?>

<head>

<title></title>
<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script> 


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
document.RegisterStudent.Name.focus();
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
document.RegisterStudent.Age.focus();
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
document.RegisterStudent.LGA.focus();
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



</head>


<body background="images/background.png">
<hr size="50" color="Red" text="Welcome"/>
<center>
<table border="0">
<tr>
<td>&nbsp;</td>
<td><h1><font color="Green"></font><font color="Green">
  </font>
  <div align="center"><font color="Green" size="+7"><blink>BRIGTH <font color="#FF00CC">FUTURE </font>SCHOOLS</blink> </font></div>
  </h1></td>
<td>&nbsp;</td>
</tr>
</table>
</center>
<form method="Post" action="SaveStuRecord.php">
<center>
<table width="597" border="1" background="images/1.gif">
<tr><td><font color="#FF00FF" size="6"><strong><marquee direction="right" loop="-1">WELCOME TO BFIS REGISTRATION REGISTRATION PORTAL</marquee></strong></font></td>
</tr>
<tr>
<td><font color="#CC3300" size="5">Academic Session : </font>
 
  <select name="Session"  > 
          <option >Select Academic Session</option>
          <option >2015/2016</option>
          <option >2016/2017</option>
		  <option >2017/2018</option>
          <option >2018/2019</option>
		  <option >2019/2020</option>
   </select> 
   </td>
   <td><font color="#CC3300" size="5"> Term : </font>
    <select name="Term" >
	      <option >Slect Term Please</option> 
          <option >First Term</option>
          <option >Second Term</option>
		  <option >Third Term</option>
       </select>
    </td>
</tr>
<tr>
<td><font color="#CC3300" size="5">Student's Name</font></td>
   <td> <input type="text" size="50" name="Name" id="Name" onKeyUp="validateName()"></td>
</tr>
<tr>
<td><font color="#CC3300" size="5">Admission Number</font></td>
   <td> <input type="text" name="ID_Number" size="50">
  </td>
</tr>
<tr>
<td><font color="#CC3300" size="5">Age</font>
  </td>
  <td><input type="text" name="Age" id="Age" size="50" /></td>
</tr>
<tr>
  <td><font color="#CC3300" size="5">Date of Birth</font></td>
        
<td>
<input type="text"  name="DOB" id="DOB" class="tcal" />
    </td>
</tr>
<tr>
<td><font color="#CC3300" size="5">Nationality</font>
  </td>
  <td><input type="text" name="Nationality" id="Nationality" size="50" /></td>
</tr>
<tr>
<td><font color="#CC3300" size="5">State of Origin</font>
  </td>
  <td><input type="text" name="State_of_Origin" id="State_of_Origin" size="50" /></td>
</tr>
<tr>
<td>
<font color="#CC3300" size="5">L.G.A </font></td>
<td>
<input type="text" name="LGA" size="50" id="LGA" onKeyUp="validateLga()">
</td>
</tr>


<tr>
<td>
<font color="#CC3300" size="5">Department</font></td>
<td>
<select name="department" id="department" size="1">
<option value="Please Select Department">Please Select Department</option>
<option value="Basic Education">Basic Education</option>
<option value="Humanities">Humanities</option>
<option value="Commercial">Commercial</option>
<option value="Science and Mathematics">Science and Mathematics</option>

</select>
</td>
</tr>

<tr>
  <td><font color="#CC3300" size="5">Class Admitted</font> </td>
  <td>
   
    <select name="Class">
	        <option >Select Class Please</option>
            <option value="JSS1A">JSS1A</option>
		    <option value="JSS1B">JSS1B</option>
			    <option value="JSS1C">JSS1C</option>
		    <option value="JSS2A">JSS2A</option>
		    <option value="JSS2B">JSS2B</option>
			<option value="JSS2C">JSS2C</option>
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
      </select></td>
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
<tr><td><center><font color="blue" size="5"></font><input type="SUBMIT" value="Submit Registration" name="Submit" id="Submit">
</center></td>
</tr>
</table>
</form>
<center>
<hr color="red" size="8"><br><a href="Admin.php"><img src="images/backred.png"></img><br>
</center>
</body>
</html> 
