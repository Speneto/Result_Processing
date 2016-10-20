<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Fess Payment</title>
<script language="javascript" src="print.js?12345" > </script>
<script language="javascript" src="validation.js?12456" > </script>
<!-- load department    -->
<script type="text/javascript">
function LoadDepartment(department){
//department +='&' + (new Date()).getTime();
document.getElementById("department1").value = department;
}
</script>

<!-- load Class    -->
<script type="text/javascript">
function LoadClass(clas){
//clas +='&' + (new Date()).getTime();
document.getElementById("clas1").value = clas;
}
</script>

<!-- load Session    -->
<script type="text/javascript">
function LoadSession(session){
//session +='&' + (new Date()).getTime();
document.getElementById("session1").value = session;
}
</script>

<!-- load Term    -->
<script type="text/javascript">
function LoadTerm(term){
//term +='&' + (new Date()).getTime();
document.getElementById("term1").value = term;
}
</script>




<!-- Search for student record -->
<script  type="text/javascript">
function showUp(cat){

//cat +='&' + (new Date()).getTime();
document.getElementById("class1").value = cat;

var str3 = $('#class1').val();
var str1 = $('#term1').val();
var str2 = $('#session1').val();



//document.getElementById("term1").value = term;

/*var t = document.getElementById("term");
var str1 = t.options[t.selectedIndex].value;
document.getElementById("term1").value = str1;
str1 +='&' + (new Date()).getTime();

var s = document.getElementById("session");
var str2 = s.options[s.selectedIndex].value;
document.getElementById("session1").value = str2;
str2 +='&' + (new Date()).getTime();


var e = document.getElementById("class");
var str3 = e.options[e.selectedIndex].value;
document.getElementById("class1").value = str3;
str3 +='&' + (new Date()).getTime();

var y = document.getElementById("clas");
var str4 = y.options[y.selectedIndex].value;
document.getElementById("clas1").value = str4;
str4 +='&' + (new Date()).getTime();

var z = document.getElementById("department");
var str5 = z.options[z.selectedIndex].value;
document.getElementById("department1").value = str5;
str5 +='&' + (new Date()).getTime();
*/
if(str1 == "" || str1=="Please Select Term"){
alert("Please Select Term");
return;
}

if(str2 == "" || str2=="Please Select Session"){
alert("Please Select Session");
return;
}

if(str3 == "" || str3=="Please Select Category"){
alert("Please Select Category");
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
var array = string.split(',');
//document.getElementById("id").value = array[0];

var t = array[0];
if(t=="" || t==null){
document.getElementById("fees").value = 0;
}else{
document.getElementById("fees").value = array[1];
}

}
}
xmlhttp.open("GET","search_fees.php?param1="+str1+"&param2="+str2+"&param3="+str3,true);
xmlhttp.send();


}
</script>





<!--Get Student Details-->
<script type="text/javascript" src="jquery-1.9.1.min.js" ></script>
<script language="javascript">
$('document').ready(function(){
$('#search').click(function(){
if($('#student_id').val() == null || $('#student_id').val() == ""){
alert("Please Enter Student ID_Number");
stop;
}
var student_id = $('#student_id').val();
var class1 = $('#class1').val();
var term1 = $('#term1').val();
var session1 = $('#session1').val();
var fees1 = $('#fees').val();
//alert (fees1);
//alert class1;
//alert term1;
//alert session1;
//alert fees1;

$.post("search_fee_sheet.php",{ studentid : student_id, classid : class1, termid : term1, sessionid : session1, feesid : fees1},function(data, textStatus){
var array = data.split(',');
alert(data);
document.getElementById("student_name").value = array[1];
document.getElementById("first_payment").value = array[2];
document.getElementById("second_payment").value = array[3];
document.getElementById("third_payment").value = array[4];
document.getElementById("balance").value = array[5];


 }); });});
 </script>


<!--Save Student Fees-->
<script type="text/javascript" src="jquery-1.9.1.min.js" ></script>
<script language="javascript">
$('document').ready(function(){
$('#save').click(function(){
if($('#student_id').val() == null || $('#student_id').val() == ""){
alert("Please make sure all fields are filled");
stop;
}
var student_id = $('#student_id').val();
var class1 = $('#class1').val();
var term1 = $('#term1').val();
var session1 = $('#session1').val();
var fees1 = $('#fees').val();
var first1 = $('#first_payment').val();
var second1 = $('#second_payment').val();
var third1 = $('#third_payment').val();
var reciept = $('#reciept_no').val();
var department1 = $('#department1').val();
var clas1 = $('#clas1').val();

var ans = confirm("Are You Sure To Make This Payment? Please Check all Entries Before Payment!!!")
if(ans == false){
alert("Fees Payment Aborted Successfully!!!");
return ans;
stop;
}else{

$.post("save_school_fees.php",{ studentid : student_id, classid : class1, termid : term1, sessionid : session1, feesid : fees1, firstid : first1, secondid : second1, thirdid : third1, recieptid : reciept, clas_id : clas1, department : department1},function(data, textStatus){
var array = data.split(',');
 
      alert("Student School Fees Paid and Updated Successfully");

 });} });});
 </script>


<!--Generate Reciept No-->
<script type="text/javascript" src="jquery-1.9.1.min.js" ></script>
<script language="javascript">
$('document').ready(function(){
$('#generate_no').click(function(){


var reciept_no = $('#reciept_no').val();

$.post("generate_reciept_no.php",{ reciept : reciept_no},function(data, textStatus){
var array = data.split(',');
document.getElementById("reciept_no").value = array[1];

 }); });});
 </script>



<!--Code to Print Receipt-->
<script type="text/javascript" src="jquery-1.9.1.min.js" ></script>
<script language="javascript">
$('document').ready(function(){
$('#print').click(function(){

var reciept_no = $('#reciept_no').val();

$.post("print_reciept.php",{reciept : reciept_no},function(data, textStatus){
 
}); }); });
 </script>



</head>

<body background="images/background.png">
<center>
<div>

   <table>
   <tr>
   <td>Reciept No : </td> <td><input type="text" name="reciept_no" id="reciept_no" placeholder="Reciept No" disabled /></td> <td><input type="button" name="generate_no" id="generate_no" value="Generate reciept no"/></td>
   
   </tr>
    <tr></tr><tr></tr>
   
   <tr><td>
Department </td><td>
<select name="department" id="department" size="1" onChange="LoadDepartment(this.value)">
	<option value="Please Select Department">Please Select Department</option>
	<option value="Basic Education">Basic Education</option>
	<option value="Humanities">Humanities</option>
	<option value="Commercial">Commercial</option>
	<option value="Science and Mathematics">Science and Mathematics</option>
</select>
</td></tr>
   
    <tr></tr><tr></tr>
   
   <tr><td>
Class </td><td>
<select name="clas" id="clas"  size="1" onChange="LoadClass(this.value)">
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
   <tr></tr><tr></tr>
   <tr>
   <td>Term : </td><td>
   <select  name="term" id="term" size="1" onChange="LoadTerm(this.value)">
   <option value="Please Select Term">Please Select Term</option>
   <option value="First Term">First Term</option>
   <option value="Second Term">Second Term</option>
   <option value="Third Term">Third Term</option>
   </select>
   </td>
   </tr>
   <tr></tr><tr></tr>
   <tr>
   <td>Session : </td><td>
   <select  name="session" id="session" size="1" onChange="LoadSession(this.value)">
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
    <tr></tr><tr></tr>
   <tr>
   <td>Category : </td>
   <td>
   <select name="class" id="class" size="1" onChange="showUp(this.value)">
   <option value="Please Select Category">Please Select Category</option>
   <option value="JSS">JSS</option>
   <option value="SSS">SSS</option>
   </select>
   </td>
   </tr>
     <tr></tr><tr></tr>
   <tr>
   <td>School Fees :</td> <td><input type="text" name="fees" id="fees" placeholder="School Fees" disabled /></td>
   </tr>
     <tr></tr><tr></tr>
   <tr>
   <td>Student ID :</td><td> <input type="text" name="student_id" id="student_id"  placeholder="Enter Student ID" /> </td><td><input type="button" name="search" id="search"  value="Click to Search" /></td>
   </tr>
      <tr></tr><tr></tr>
   <tr>
   <td>Name : </td><td><input type="text" name="student_name" id="student_name" placeholder="Student Name" disabled /></td>
   </tr>
     <tr></tr><tr></tr>
   <tr>
   <td>First Payment :</td><td><input type="text"  name="first_payment" id="first_payment" onKeyUp="validateNumbers(this)"  /></td>
   </tr>
         <tr></tr><tr></tr>
   
   <tr>
   <td>Second Payment :</td><td><input type="text"  name="second_payment" id="second_payment"  onKeyUp="validateNumbers(this)" /></td>
   </tr>
         <tr></tr><tr></tr>
   
   <tr>
   <td>Third Payment :</td><td><input type="text"  name="third_payment" id="third_payment"  onKeyUp="validateNumbers(this)" /></td>
   </tr>
        <tr></tr><tr></tr>
   <tr>
   <td>Balance : </td> <td><input type="text" name="balance" id="balance"  placeholder="Student Balance" disabled /></td> 
   </tr>
   			<tr></tr><tr></tr>
   <tr>
   <td>Cash/Cheque No : </td> <td><input type="text" name="cheque_no" id="cheque_no"  placeholder="Cheque No/Cash " /></td> 
   </tr>
   
   
   <input type="hidden" name="class1" id="class1"/> <input type="hidden" name="term1" id="term1"/> <input type="hidden" name="session1" id="session1"/>
   <input type="hidden" name="clas1" id="clas1" /> <input type="hidden" name="department1" id="department1" />
   </table>
   <table>
   
    <tr>
   <td>The Sum of : </td> <td><input type="text" name="amount_in_words" id="amount_in_words"  placeholder="Enter Amount in Words" size="50"  onKeyUp="validateText(this)" /></td> 
   </tr>
   			<tr></tr><tr></tr>
   		<tr>
   <td>Being Payment For : </td> <td><input type="text" name="payment_for" id="payment_for"  placeholder="Being Payment For" size="50" /></td> 
   </tr>
   </table>
   
   
   </br> </br>
<center><input type="button" name="print" id="print" value="Click to Print Reciept" onClick="openPreview();" /> &nbsp;&nbsp;&nbsp; <input type="button" name="save" id="save" value="Click to Update Student Fees"/></center>
<br/><br/>
 <a href="bursarwelcome.php"><img src="images/backred.png"></img></a>

</div>
<input type="hidden" name="date_id" id="date_id" value="<?php echo date("d/m/Y");  ?>" />
</center>
</body>
</html>
