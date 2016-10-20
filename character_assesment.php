
<?php
   include'DB_connection.php';
   $user_name = trim(htmlspecialchars($_POST['username']));
   $pass_word = md5(trim(htmlspecialchars($_POST['password'])));
   
   $sql = mysql_query("Select * From form_master_login Where User_Name='$user_name' AND Pass_Word='$pass_word'");
   $num_row = mysql_num_rows($sql);
   if($num_row > 0){
   	while($row=mysql_fetch_array($sql)){
	    $department = $row['Department'];
		$class = $row['Class'];
	}
}else{
// To Do

}
?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title></title>


<!--Save Character Assessment-->
<script type="text/javascript" src="jquery-1.9.1.min.js" ></script>
<script language="javascript">
$('document').ready(function(){
$('#save').click(function(){
if($('#idnumber').val() == null || $('#idnumber').val() == ""){
alert("Please Enter Student ID_Number");
stop;
}
var idnumber = $('#idnumber').val();
var class_id = $('#class_id').val();
var term = $('#term').val();
var session = $('#session').val();
var department = $('#department').val();
var attendance = $('#attendance').val();
var attentiveness = $('#attentiveness').val();
var punctuality = $('#punctuality').val();
var neatness = $('#neatness').val();
var politeness = $('#politeness').val();
var self_control = $('#self_control').val();
var relationship = $('#relationship').val();
var responsibility = $('#responsibility').val();
var initiative = $('#initiative').val();
var perseverance = $('#perseverance').val();
var honesty = $('#honesty').val();
var handwriting = $('#handwriting').val();
var drama = $('#drama').val();
var music = $('#music').val();
var crafts = $('#crafts').val();
var clubs = $('#clubs').val();
var hobbies = $('#hobbies').val();
var sports = $('#sports').val();
var remark = $('#remark').val();

//alert(idnumber); alert(class_id); alert(term); alert(session); alert(department); alert(attendance); alert(attentiveness); alert(punctuality); alert(neatness);
//alert(politeness); alert(self_control); alert(relationship); alert(responsibility); alert(initiative); alert(perseverance); alert(honesty); alert(handwriting);
//alert (drama); alert(music); alert(crafts); alert(clubs); alert(hobbies); alert(sports); alert(remark);

$.post("save_character_assessment.php",{ idnumberid : idnumber, classid : class_id, termid : term, sessionid : session, departmentid : department, attendanceid : attendance, attentivenessid : attentiveness, punctualityid : punctuality, neatnessid : neatness, politenessid : politeness, self_controlid : self_control, relationshipid : relationship, responsibilityid : responsibility, initiativeid : initiative, perseveranceid : perseverance, honestyid : honesty, handwritingid : handwriting, dramaid : drama, musicid : music, craftsid : crafts, clubsid : clubs, hobbiesid : hobbies, sportsid : sports, remarkid : remark},function(data, textStatus){
alert(data);
//var array = data.split(',');
document.getElementById("attendance").value = "";
document.getElementById("attentiveness").value = "";
document.getElementById("punctuality").value = "";
document.getElementById("neatness").value = "";
document.getElementById("politeness").value = "";
document.getElementById("self_control").value = "";
document.getElementById("relationship").value = ""; 
document.getElementById("responsibility").value = "";
document.getElementById("initiative").value = "";
document.getElementById("perseverance").value = "";
document.getElementById("honesty").value = "";
document.getElementById("handwriting").value = "";
document.getElementById("drama").value = "";
document.getElementById("music").value = "";
document.getElementById("crafts").value = "";
document.getElementById("clubs").value = "";
document.getElementById("hobbies").value = "";
document.getElementById("sports").value = "";
document.getElementById("idnumber").value = "";
document.getElementById("total").value = "";
document.getElementById("average").value = "";
document.getElementById("remark").value = "";


 }); });});
 </script>





<!-- Function to get Students Names -->
<script  type="text/javascript">
function LoadName(session){
//alert(session);
if (session == "") {
document.getElementById("txtName").innerHTML = "";
return;
}
var department = document.getElementById("department").value;
var class_id = document.getElementById("class_id").value;
var e = document.getElementById("term");
var term = e.options[e.selectedIndex].value;
term +='&' + (new Date()).getTime();

if(term == "" || term=="Please Select Term"){
alert("Please Select Term");
return;
}
if(window.XMLHttpRequest){
xmlhttp = new XMLHttpRequest();
}else{
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange = function(){
if(xmlhttp.readyState == 4  && xmlhttp.status == 200){
var string = xmlhttp.responseText;
//alert(string);
//var array = string.split(',');
document.getElementById("txtName").innerHTML = xmlhttp.responseText;
}
}

xmlhttp.open("GET","char_name.php?departmentid="+department+"&classid="+class_id+"&termid="+term+"&sessionid="+session,true);
xmlhttp.send();

}
</script>



<!-- Function to get Students Score -->
<script  type="text/javascript">
function LoadScore(id_number){
//alert(id_number);
if (id_number == "") {
document.getElementById("txtName").innerHTML = "";
return;
}
var department = document.getElementById("department").value;
var class_id = document.getElementById("class_id").value;
var e = document.getElementById("term");
var term = e.options[e.selectedIndex].value;
term +='&' + (new Date()).getTime();
if(term == "" || term =="Please Select Term"){
alert("Please Select Term");
return;
}

var t = document.getElementById("session");
var session = t.options[e.selectedIndex].value;
session +='&' + (new Date()).getTime();
if(session == "" || session =="Please Select Session"){
alert("Please Select Session");
return;
}
if(window.XMLHttpRequest){
xmlhttp = new XMLHttpRequest();
}else{
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange = function(){
if(xmlhttp.readyState == 4  && xmlhttp.status == 200){
var string = xmlhttp.responseText;
//alert(string);
var array = string.split(',');
//document.getElementById("txtName").innerHTML = xmlhttp.responseText;
if(array[1] == "Nill" || array[1] ==""){
alert("You Can not Assess Students Untill Marks Are Entered");
document.getElementById("attendance").value = "";
document.getElementById("attentiveness").value = "";
document.getElementById("punctuality").value = "";
document.getElementById("neatness").value = "";
document.getElementById("politeness").value = "";
document.getElementById("self_control").value = "";
document.getElementById("relationship").value = ""; 
document.getElementById("responsibility").value = "";
document.getElementById("initiative").value = "";
document.getElementById("perseverance").value = "";
document.getElementById("honesty").value = "";
document.getElementById("handwriting").value = "";
document.getElementById("drama").value = "";
document.getElementById("music").value = "";
document.getElementById("crafts").value = "";
document.getElementById("clubs").value = "";
document.getElementById("hobbies").value = "";
document.getElementById("sports").value = "";
document.getElementById("idnumber").value = "";
document.getElementById("total").value = "";
document.getElementById("average").value = "";
document.getElementById("remark").value = "";


}else{
document.getElementById("idnumber").value = array[1];
document.getElementById("total").value = array[2];
document.getElementById("average").value = array[3];
document.getElementById("attendance").value = array[4];
document.getElementById("attentiveness").value = array[5];
document.getElementById("punctuality").value = array[6];
document.getElementById("neatness").value = array[7];
document.getElementById("politeness").value = array[8];
document.getElementById("self_control").value = array[9];
document.getElementById("relationship").value = array[10]; 
document.getElementById("responsibility").value = array[11];
document.getElementById("initiative").value = array[12];
document.getElementById("perseverance").value = array[13];
document.getElementById("honesty").value = array[14];
document.getElementById("handwriting").value = array[15];
document.getElementById("drama").value = array[16];
document.getElementById("music").value = array[17];
document.getElementById("crafts").value = array[18];
document.getElementById("clubs").value = array[19];
document.getElementById("hobbies").value = array[20];
document.getElementById("sports").value = array[21];
document.getElementById("remark").value = array[22];
document.getElementById("position").value = array[23];
}
}
}

xmlhttp.open("GET","char_score.php?departmentid="+department+"&classid="+class_id+"&termid="+term+"&sessionid="+session+"&idnumber="+id_number,true);
xmlhttp.send();

}
</script>


<style type="text/css">
<!--
.style1 {
	color: #0000FF;
	font-size: 36px;
}
.style2 {color: #FF0000}
-->
</style>
</head>

<body background="images/background.png">
<center>
<span class="style1">BRIGHT FUTURE HIGH SCHOOL</span><BR>
<span class="style2">FORM TEACHER'S PANEL</span>
  <form action="" method="">
<table>
<tr><td>Department</td><td><input type="text" name="department" id="department" value="<?php echo $department; ?>"   readonly="true" /></td>
<td>Class</td><td><input type="text" name="class_id" id="class_id" value="<?php echo $class; ?>"   readonly="true" /></td>

<td>Term</td>

<td>
<select name="term" id="term" >
<option value="Please Select Term">Please Select Term</option>
<option value="First Term">First Term</Option>
<option value="Second Term">Second Term</Option>
<option value="Third Term">Third Term</Option>
</select>
</td>

<td>Session</td>
<td>
<select name="session"  id="session" onChange="LoadName(this.value)">
<option value="Please Select Session">Please Select Session</option>
<option value="2015/2016">2015/2016</option>
<option value="2016/2017">2016/2017</option>
<option value="2017/2018">2017/2018</option>
<option value="2018/2019">2018/2019</option>
<option value="2019/2020">2019/2020</option>
</select>
</td>
</tr>

<tr><td>Name</td><td><div id="txtName"></div></td></tr>



<tr><td>ID_Number</td><td><input type="text" name="idnumber" id="idnumber"  readonly="true"/></td>
<td>Total</td><td><input type="text" name="total" id="total"  readonly="true"/></td>
<td>Average</td><td><input type="text" name="average" id="average" readonly="true" /></td>
<td>Position</td><td><input type="text" name="position" id="position" readonly="true" /></td></tr>
</table>

<div style="float:left; margin-left:350px ">
<table border="1" style="border-collapse:collapse ">
<tr><th>Character Development</th><th>Ratings(A-E)</th></tr>
<tr><td>Attendance</td><td><input type="text" name="attendance" id="attendance" /></td></tr>
<tr><td>Attentiveness</td><td><input type="text" name="attentiveness" id="attentiveness" /></td></tr>
<tr><td>Punctuality</td><td><input type="text" name="punctuality" id="punctuality" /></td></tr>
<tr><td>Neatness</td><td><input type="text" name="neatness" id="neatness" /></td></tr>
<tr><td>Politeness</td><td><input type="text" name="politeness" id="politeness" /></td></tr>
<tr><td>Self Control</td><td><input type="text" name="self_control" id="self_control" /></td></tr>
<tr><td>Relationship With Others</td><td><input type="text" name="relationship" id="relationship" /></td></tr>
<tr><td>Sense of Responsibility</td><td><input type="text" name="responsibility" id="responsibility" /></td></tr>
<tr><td>Initiative</td><td><input type="text" name="initiative" id="initiative" /></td></tr>
<tr><td>Perseverance</td><td><input type="text" name="perseverance" id="perseverance" /></td></tr>
<tr><td>Honesty</td><td><input type="text" name="honesty" id="honesty" /></td></tr>
</table>
</div>


<div style="float:right; margin-right:350px ">
<table border="1" style="border-collapse:collapse ">
<tr><th>Practical Skills</th><th>Ratings(5-1)</th></tr>
<tr><td>Handwriting</td><td><input type="text" name="handwriting" id="handwriting" /></td></tr>
<tr><td>Drama</td><td><input type="text" name="drama" id="drama" /></td></tr>
<tr><td>Music</td><td><input type="text" name="music" id="music" /></td></tr>
<tr><td>Crafts</td><td><input type="text" name="crafts" id="crafts" /></td></tr>
<tr><td>Clubs</td><td><input type="text" name="clubs" id="clubs" /></td></tr>
<tr><td>Hobbies</td><td><input type="text" name="hobbies" id="hobbies" /></td></tr>
<tr><td>Sports</td><td><input type="text" name="sports" id="sports" /></td></tr>
</table>
</div>

</form>
</center>

 <input  type="text" name="" id=""  style="border:none " />
 
 
<br/><br/><br/><br/><br/><br/>
<div style="margin-left:225px ">
Class Teacher Remark <input type="text" name="remark" id="remark" size="50" maxlength="35" />
</div>
<br/><br/><br/>
<center>
<input type="button" name="save" id="save" value="Click to Save Records" /> <br/><br/>
 <a href="index.php"><img src="images/backred.png"></img></a>

</center>
</body>
</html>
