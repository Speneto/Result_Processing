<?Php 
include"DB_connection.php";
$term = trim(htmlspecialchars(strtoupper($_POST['term'])));
$session = trim(htmlspecialchars(strtoupper($_POST['lstSession'])));
$class = trim(htmlspecialchars(strtoupper($_POST['class'])));

//Average

$average1 = mysql_query("Select * from final_score_sheet Where Session='$session' AND Class='$class' AND Term ='FIRST TERM'");
$num_average1 = mysql_num_rows($average1);
if($num_average1 > 0){
while($row1=mysql_fetch_array($average1)){
$average_1[] = $row1['Average'];
$id_average1[] = $row1['ID_Number'];
}
}


$average2 = mysql_query("Select * from final_score_sheet Where Session='$session' AND Class='$class' AND Term ='SECOND TERM'");
$num_average2 = mysql_num_rows($average2);
if($num_average2 > 0){
while($row2=mysql_fetch_array($average2)){
$average_2[] = $row2['Average'];
$id_average2[] = $row2['ID_Number'];
}
}else{
// do nothing
}


$average3 = mysql_query("Select * from final_score_sheet Where Session='$session' AND Class='$class' AND Term ='THIRD TERM'");
$num_average3 = mysql_num_rows($average3);
if($num_average3 > 0){
while($row3=mysql_fetch_array($average3)){
$average_3[] = $row3['Average'];
$id_average3[] = $row3['ID_Number'];
}
}else{
// do nothing
}




$verify = mysql_query("Select * from score_sheet Where score_sheet.Session='$session' AND score_sheet.Class='$class' AND score_sheet.Term='$term'");
$num_verify = mysql_num_rows($verify);
if($num_verify > 0){
// Asign positions
$query = mysql_query("SELECT t1.ID_Number, Average, Total, Num_Subj, (SELECT COUNT(*) FROM final_score_sheet t2 WHERE t2.Average > t1.Average AND t2.Session='$session' AND t2.Class='$class' AND t2.Term='$term') +1 AS rank FROM final_score_sheet t1 WHERE t1.Session='$session' AND t1.Class='$class' AND t1.Term='$term' ORDER BY rank ");
//$query = mysql_query("SELECT COUNT(*)+1 AS rank FROM (SELECT Average FROM final_score_sheet ORDER BY Average) AS sc WHERE Average < (SELECT Average FROM final_score_sheet WHERE ID_Number='EAD/0902' )");
$num_pos= mysql_num_rows($query);
while($row2=mysql_fetch_array($query)){
$pos[] = $row2['rank'];
$id[] = $row2['ID_Number'];
$tot[] = $row2['Total'];
$ave[] = $row2['Average'];
$ns[] = $row2['Num_Subj'];

$idn[] = $row2['ID_Number'];

}

$sql = mysql_query("Select ID_Number, SUM(Total) AS Gtotal, AVG(Total) AS Gaverage, COUNT(Subj_ID) AS Subj FROM score_sheet WHERE score_sheet.Session='$session' AND score_sheet.Class='$class' AND score_sheet.Term='$term' GROUP BY ID_Number ORDER BY ID_Number DESC");
$numrows = mysql_num_rows($sql);
$counter = 0;
while($row1=mysql_fetch_assoc($sql)){
$array1[] = $row1['Gtotal'];
$array2[] = $row1['Gaverage'];
$array3[] = $row1['Subj'];

}




?>




<html>
<head>

  <title>Bright Future  E- School System Online Result Slip</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
  
  <script language="javascript" src="validate.js" > </script>
  <style type="text/css">
<!--
.style39 {
	color: #FF0066;
	font-size: 18px;
	font-family: "Times New Roman", Times, serif;
	font-weight: bold;
}
.style42 {font-size: 12px}
.style54 {font-size: 14px}
-->
  </style>
</head>
  <style type="text/css">
<!--
.style14 {font-size: 36px}
.style18 {
	font-weight: bold;
	color: #000066;
	font-family: "Times New Roman", Times, serif;
}
.style19 {color: #993300}
.style38 {color: #0000FF}
.style40 {color: #000033}
.style44 {color: #000033; font-weight: bold; }
.style45 {
	font-size: 12px;
	font-weight: bold;
}
.style46 {
	color: #000033;
	font-size: 12px;
	font-weight: bold;
}
.style49 {
	font-size: 14px;
	font-weight: bold;
	color: #000033;
}
.style52 {
	font-size: 14px;
	font-weight: bold;
}
.style55 {font-size: 12}
-->
  </style>
  
<body background="images/1.gif">
<div id="wrapper">
<?php include("DB_connection.php");
//$counter = 0;

//doGrade();
//$generate = "SELECT students.ID_Number, students.Name, subject.Subjects, score_sheet.First, score_sheet.Second, score_sheet.Third, score_sheet.Fourth, score_sheet.Exams, score_sheet.Class FROM students JOIN score_sheet ON students.ID_Number = score_sheet.ID_Number JOIN subject ON subject.Subj_ID = score_sheet.Subj_ID Where score_sheet.Class ='JSS1A'";
$generate = "SELECT students.ID_Number, students.Name, students.DOB, subject.Subjects, score_sheet.First, score_sheet.Second, score_sheet.Third, score_sheet.Fourth, score_sheet.Exams, score_sheet.Class, score_sheet.Session, score_sheet.Term FROM students JOIN score_sheet ON students.ID_Number = score_sheet.ID_Number JOIN subject ON subject.Subj_ID = score_sheet.Subj_ID WHERE score_sheet.Session='$session' AND score_sheet.Class='$class' AND score_sheet.Term='$term' GROUP BY students.ID_Number, score_sheet.Subj_ID ";
//$generate = "SELECT students.ID_Number, students.Name, score_sheet.First, score_sheet.Second, score_sheet.Third, score_sheet.Fourth, score_sheet.Exams, subject.Subjects, subject.Subj_ID FROM students JOIN score_sheet ON students.ID_Number = score_sheet.ID_Number JOIN subject ON subject.Subj_ID = score_sheet.Subj_ID GROUP BY students.ID_Number, score_sheet.Subj_ID";
$num = mysql_query("Select DISTINCT ID_Number from score_sheet");
$numr = mysql_num_rows($num);
$numrc = 0;
$fetch = mysql_query($generate);
$num_rows =  mysql_num_rows($fetch);
$previousId = -1;


$d_id = 0;
$g_id = 1;


while($row = mysql_fetch_array($fetch) or die(mysql_error())){
$idno1[] = $row['ID_Number'];
$idno[] = $row['ID_Number'];
$session = $row['Session'];
$term = $row['Term'];
$class = $row['Class'];
$class = substr($class,0,4);
$first = $row['First'];
$second = $row['Second'];
$third = $row['Third'];
$fourth = $row['Fourth'];
$exams = $row['Exams'];
$ca_total = $first + $second + $third + $fourth;
$total = $ca_total + $exams;


// JSS1
$r1 = range(0, 39); // F
$r2 = range(40, 49); 
$r3 = range(50, 59); 
$r4 = range(60, 69); 
$r5 = range(70, 100); 

// JSS2 and JSS3
$r6 = range(0, 44); // F
$r7 = range(45, 49); // P
$r8 = range(50, 59); // C
$r9 = range(60, 69); // V Good
$r10 = range(70, 100); // A 

//SS Class
$r11 = range(0, 49); // F fail
$r12 = range(50, 59); // C
$r13 = range(60, 69); // B
$r14 = range(70, 100); // A Excellent

$total = round($total);
if($class == "JSS1"){

switch (true){
	case in_array($total, $r1) :
	
	$grade = "F";
	$remark = "Fail";
	break;
	case in_array($total, $r2) :
	$grade = "P";
	$remark = "Pass";
	break;
	case in_array($total, $r3) :
	$grade = "C";
	$remark = "Good";
	break;
	case in_array($total, $r4) :
	$grade = "B";
	$remark = "V Good";
	break;
	case in_array($total, $r5):
	$grade = "A";
	$remark = "Excellent";
	break;
}


}else if($class == "JSS2" || $class == "JSS3"){


switch (true){
	case in_array($total, $r6) :
	$grade = "F";
	$remark = "Fail";
	break;
	case in_array($total, $r7) :
	$grade = "P";
	$remark = "Pass";
	break;
	case in_array($total, $r8) :
	$grade = "C";
	$remark = "Good";
	break;
	case in_array($total, $r9) :
	$grade = "B";
	$remark = "V Good";
	break;
	case in_array($total, $r10):
	$grade = "A";
	$remark = "Excellent";
	break;
}


}else{


switch (true){
	case in_array($total, $r11) :
	$grade = "F";
	$remark = "Fail";
	break;
	case in_array($total, $r12) :
	$grade = "C";
	$remark = "Good";
	break;
	case in_array($total, $r13) :
	$grade = "B";
	$remark = "V Good";
	break;
	case in_array($total, $r14) :
	$grade = "A";
	$remark = "Excellent";
	break;
	
}


}




if($row['ID_Number'] != $previousId ){


for($p=0; $p < $num_pos; $p++){
if ($id[$p] == $row['ID_Number']){
$no_subj = $ns[$p];
} 
}

?>


<table>

      <h1 align="center"><span class="style14"><span class="style18">BRIGHT FUTURE <span class="style19">HIGH</span> <span class="style38">SCHOOL</span></span></span></h1>
      <center>
        <span class="style39 style40"><strong></strong>P.O.BOX 22,NUMAN, ADAMAWA STATE </span><BR>
        <span class="style39">SCHOOL CONTINUOUS ASSESSMENT DOSSIER</span>
      </center>
	</table>
	
	
	
  <center>

<table width="697" border="0">
<tr><td><hr color="#990000" size="2"></td></tr>
<tr>
<td width="691"><span class="style42">Session : </span>&nbsp; <?php echo $row['Session'];?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="style42">Term : </span>&nbsp; <?php echo $row['Term']; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="style42">Date Of Birth : </span>&nbsp; <?php echo $row['DOB'];  ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style42">&nbsp;House</span>______________________________</td>
</tr>
<tr><td><hr color="#990000" size="2"></td></tr>
<tr>
<td><span class="style42">Name</span>&nbsp;  <?php echo "_________________________" . $row['Name'] . "_______________________"; ?> &nbsp;Gender______________<span class="style55">ID.Number : </span>&nbsp; <?php echo $row['ID_Number']; ?> &nbsp;&nbsp;&nbsp; </td>
</tr>
<tr><td><hr color="#990000" size="2"></td></tr>
        <TD width="691"><span class="style42">Class : </span>&nbsp; <?php echo $row['Class']; ?> &nbsp;&nbsp;&nbsp;<span class="style42">Number in Class : </span> &nbsp; <?php echo $numrows; ?> &nbsp;&nbsp; <span class="style42">Attendance </span>&nbsp;_________________&nbsp;<span class="style42">Days</span>_________________ <span class="style42">Out of</span> ________________  </TD>
<tr><td><hr color="#990000" size="2"></td></tr>
    <TD width="691">Total : <?php  for($p=0; $p < $num_pos; $p++){if ($id[$p] == $row['ID_Number']){echo $tot[$p];} }   //echo $array1[$counter]; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style42">Numberof Sybjects : </span> &nbsp;<?php    for($p=0; $p < $num_pos; $p++){if ($id[$p] == $row['ID_Number']){echo $ns[$p];} } //echo $array3[$counter]; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="style42">Average : </span> &nbsp;<?php  for($p=0; $p < $num_pos; $p++){if ($id[$p] == $row['ID_Number']){echo(round( $ave[$p],2));} }  //echo(round($array2[$counter],2)); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style42">Position : </span>&nbsp; <?php  for($p=0; $p < $num_pos; $p++){if ($id[$p] == $row['ID_Number']){echo $pos[$p];} }?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style42">Out of : </span> &nbsp; <?php echo $num_pos; ?> &nbsp;&nbsp;  </TD>
<tr><td><hr color="#990000" size="2"></td></tr>
</TR>
<?php 
//$previousId = $row['ID_Number'];

 ?>

</table>


<table width="696" border="0">
<tr>
<td width="78" class="style40" ><strong><font size="2">SUBJECT</font></strong></td>
<td width="32"><span class="style44"><font size="2">CA1</font></span> </td>
<td width="31" class="style40"><strong><font size="2">CA2</font></strong></td>
<td width="32" class="style40"><strong><font size="2">CA3</font></strong></td>
<td width="30" class="style40"><strong><font size="2">CA4</font></strong></td>
<td width="65" class="style40" ><strong><font size="2">Total CA</font></strong></td>
<td width="49" class="style40" ><strong><font size="2">EXAMS</font></strong></td>
<td width="40" class="style40" ><strong><font size="2">TOTAL</font></strong></td> 
<td width="59" class="style44" ><font size="2">GRADE</font></td> 
<td width="86" class="style40" ><strong><font size="2"> REMARK</font></strong></td>
<td width="148" class="style40" ><strong><font size="2">SIGNATURE</font></strong></td>  
</tr>
</table>

<tr>
  <td>&nbsp;</td>
</tr>

 <?php
 
 $previousId = $row['ID_Number'];
 $counter =  $counter + 1;
}
?>
<?php
//$counter =  $counter + 1;
?>

<table width="696" border="1">
<tr>
<td width="82" ><font size="2"> <?php echo $row['Subjects']; ?> </font></td>
<td width="33"><font size="2"> <?php echo $row['First']; ?> </font> </td>
<td width="30"><font size="2"> <?php echo $row['Second']; ?> </font></td>
<td width="35"><font size="2"> <?php echo $row['Third']; ?> </font></td>
<td width="33"><font size="2"> <?php echo $row['Fourth']; ?> </font></td>
<td width="34"><font size="2">   <?php echo $ca_total; ?> </font>  </td>
<td width="39" ><font size="2"> <?php echo $row['Exams']; ?>  </font></td>
<td width="39" ><font size="2">   <?php echo $total;  ?> </font> </td>
<td width="51" ><font size="2"> <?php echo $grade; ?> </font></td> 
<td width="100" ><font size="2">  <?php echo $remark; ?>  </font></td> 
<td width="150" ><font size="2"></font></td> 
</tr>



<?php
$no_subj = $no_subj - 1;
if($no_subj == 0){

?>

<table width="100%">
<tr>
<td width="100" ><font size="2"> 
  <?php 
  if($class == "JSS1"){
  echo'<center> <span class="style45 style42">GRADE: (0-39 Fail=F), (40-49 Pass=P),(50-59 Good=C),(60-69 V.Good=B),(70-100 Excellent=A) </span> </center>';
  }else if($class == "JSS2" || $class == "JSS3"){
  echo'<center> <span class="style45 style42">GRADE: (0-44 Fail=F), (45-49 Pass=P),(50-59 Good=C),(60-69 V.Good=B),(70-100 Excellent=A) </span> </center>';
  }else{
  echo'<center> <span class="style45 style42">GRADE: (0-49 Fail=F), (50-59 Good=C),(60-69 V.Good=B),(70-100 Excellent=A) </span> </center>';
  }
  ?>
  </font> 
 </td> 
 </tr>
 <tr><td><hr color="#990000" size="2"></td></tr>
 </table>
 
 
 <table width="505" border="0">
<tr>
<td width="125" ><strong><font size="2">First Term Average</font></strong></td> 
<td width="125" ><strong><font size="2">Second Term Average</font></strong></td> 
<td width="125" ><strong><font size="2"> Third Term Average</font></strong></td>
<td width="125" ><strong><font size="2"> Cumulative Average</font></strong></td>
</tr>
</table>
<table border="0.5">
<tr>
<td width="125" ><strong><font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php  if($num_average1 > 0){for($p=0; $p < $num_average1; $p++){if ($id_average1[$p] == $row['ID_Number']){echo(round( $average_1[$p],2)); $s_average_1=$average_1[$p];} }}else{echo ("0"); $s_average_1=0;} ?></font></strong></td> 
<td width="125" ><strong><font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php if($num_average2 > 0){ for($p=0; $p < $num_average2; $p++){if ($id_average2[$p] == $row['ID_Number']){echo(round( $average_2[$p],2)); $s_average_2=$average_3[$p];} }}else{echo ("0"); $s_average_2=0;} ?> </font></strong></td> 
<td width="125" ><strong><font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if($num_average3 > 0){ for($p=0; $p < $num_average3; $p++){if ($id_average3[$p] == $row['ID_Number']){echo(round( $average_3[$p],2)); $s_average_3=$average_3[$p];} }}else{echo ("0"); $s_average_3=0;} ?> </font></strong></td>
<td width="125" ><strong><font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<?php 
if($s_average_1 !=0 && $s_average_2 == 0 && $s_average_3 == 0 ){
$d =1;
}else if($s_average_1 ==0 && $s_average_2 != 0 && $s_average_3 == 0){
$d=1;
}else if($s_average_1 ==0 && $s_average_2 == 0 && $s_average_3 != 0){
$d=1;
}else if($s_average_1 !=0 && $s_average_2 != 0 && $s_average_3 == 0){
$d=2;
}else if($s_average_1 !=0 && $s_average_2 == 0 && $s_average_3 != 0){ 
$d=2;
}else if($s_average_1 ==0 && $s_average_2 != 0 && $s_average_3 != 0){
$d=2;
}else{
$d=3;
}
$t_average = ($s_average_1 + $s_average_2 + $s_average_3)/$d;
echo round($t_average,2);
 ?> 
 </font></strong></td>
</tr>
</table>
<tr>
  <td>&nbsp;</td>
</tr>
 

<table width="568" height="167" border="1">
<td width="181" class="style42 style40"><strong>Character Development[A-E] </strong></td>
<td width="80" class="style42 style40"><strong>Grade Level</strong></td>
<td width="121" class="style46">Practical Skill Grade</td>
<td width="73" class="style40"><strong>Grade Level</strong></td>
<td width="79" class="style46">Signature</td>
<tr><td>Attendance </td>
<td>&nbsp;</td><td>Music </td><td>&nbsp;</td><td> </td>
</tr>
<tr><td>Attentivenes </td>
<td>&nbsp;</td><td>Drama </td><td>&nbsp;</td><td> </td>
</tr>
<tr><td>Punctuality </td>
<td>&nbsp;</td><td>Hand Writing</td><td>&nbsp;</td><td></td>
</tr>
<tr><td>Politeness </td>
<td>&nbsp;</td><td>Clubs </td><td>&nbsp;</td><td></td>
</tr>
<tr><td>Neatnesss</td>
<td>&nbsp;</td><td>Craft</td><td>&nbsp;</td><td></td>
</tr>
<tr><td>Self Control</td>
<td>&nbsp;</td><td>Hobbies</td><td>&nbsp;</td><td></td>
</tr>
<tr><td>Relationship with others</td>
<td>&nbsp;</td><td>Sports</td><td>&nbsp;</td><td></td>
</tr>
</table>
<tr><td><hr color="#990000" size="2"></td></tr> 

<table width="685" height="102" border="1">
<tr><td width="250"> <div align="center" class="style42 style40"><strong>Form Master's Remark and Signature</strong></div></td><td width="122" class="style46">Next Term Begins</td>
<td width="156" class="style42 style40"><strong>Outstanding School Fees</strong></td>
<td width="139" class="style46">Next Term School Fees</td>
<tr><td><br><br><br><br></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
</table>
<div align="left"><br>
    <span class="style49"><span class="style54">Promoted To</span>&nbsp;&nbsp;</span>&nbsp;_____________________<span class="style49">&nbsp;</span><span class="style49">&nbsp;</span> <span class="style49"><span class="style42">To Repeat</span>&nbsp;&nbsp;</span>&nbsp;______________________ <span class="style49">&nbsp;&nbsp;<span class="style42">To Withdraw&nbsp;</span>&nbsp;&nbsp;</span>________________<span class="style49"><br><BR>
Reason For Advice</span>_______________________________________________________________________________<span class="style52"><br><BR>
<span class="style40">Principal's Comment</span></span>_____________________________________________________________________________</div>
 
 </br> </br> </br> </br> </br> </br>
 
<?php
}
?>



<?php
$num_rows = $num_rows - 1;
if($num_rows == 0){

echo '<a href="print_result.php"> <input type="button"  value="Print This Page" onClick="window.print()"  /> </a>';
}

}


?>


 </center>  
</div><!-- end wrapper --> 
<?php
}else{
echo'<a href="print_result.php"><font color="#CC3300" size="+1"><b> No Student In This Class, Click Here To Go Back</b></font> </a>';
} 
?>                             
</body>
</html>