<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Untitled Document</title>
<style type="text/css">
<!--
.style9 {
	font-size: 46px;
	color: #000099;
}
-->
</style>
</head>

<body background="1.gif">

<center><span class="style9">BRIGHT FUTURE HIGH SCHOOL </span><br>
<div><?php echo (trim(htmlspecialchars(strtoupper($_POST['class'])))); echo '&nbsp;&nbsp;'; echo (trim(htmlspecialchars(strtoupper($_POST['term'])))); echo '&nbsp;&nbsp;'; echo(trim(htmlspecialchars(strtoupper($_POST['lstSession'])))); ?> STUDENT'S RESULT SUMMARY SHEET</div>
<!--<marquee direction="left" loop="-1"><font color="#FF0000">This Online E-School System is Designed for ECWA Academy Demsa .  Only Authorised Persons Are Allowed to Use This Software.  All Copy Right Reserved. Any UnAuthorised Access or usage of This Program is Prohibited</font></marquee> -->
</br>

<?php 
include"DB_connection.php";
$class = trim(htmlspecialchars(strtoupper($_POST['class'])));
$term = trim(htmlspecialchars(strtoupper($_POST['term'])));
$session = trim(htmlspecialchars(strtoupper($_POST['lstSession'])));
//$class = "SSS3A";
//term = "FIRST TERM";
//$session = "2015/2016";

//select category
$cat = substr($class,0,3);
if($cat =="JSS"){

if($term == "THIRD TERM"){

// get subject and subject id into arrays
$subjects = mysql_query("Select DISTINCT score_sheet.Subj_ID, subject.Subjects From score_sheet JOIN subject ON score_sheet.Subj_ID = subject.Subj_ID WHERE score_sheet.Session='$session' AND score_sheet.Class='$class' AND score_sheet.Term='$term' ");
$subj_num_rows = mysql_num_rows($subjects);
if($subj_num_rows >0){
while($subj_row = mysql_fetch_array($subjects)){
 $subject_array[] = $subj_row['Subjects'];
 $subj_ID_array[] = $subj_row['Subj_ID'];
}
}else{
echo"No Subjects Yet In Score Sheet For This Term";
exit();
}

//get first, second and third term averages into array
$first_term_average = mysql_query("Select ID_Number, Average, Num_Subj From final_score_sheet Where Session ='$session' AND Term ='FIRST TERM' AND Class='$class'");
$first_term_average_num_rows = mysql_num_rows($first_term_average);
if($first_term_average_num_rows  > 0){
while($first_term_average_row = mysql_fetch_array($first_term_average)){
$first_term_ID_Number[] = $first_term_average_row['ID_Number']; 
$first_term_Average[] = round($first_term_average_row['Average'],2); 
$first_term_Num_Subj[] = $first_term_average_row['Num_Subj']; 
}
}else{
echo "No First Term Average";
exit();
}
//second term average
$second_term_average = mysql_query("Select ID_Number, Average, Num_Subj From final_score_sheet Where Session ='$session' AND Term ='SECOND TERM' AND Class='$class'");
$second_term_average_num_rows = mysql_num_rows($second_term_average);
if($second_term_average_num_rows  > 0){
while($second_term_average_row = mysql_fetch_array($second_term_average)){
$second_term_ID_Number[] = $second_term_average_row['ID_Number']; 
$second_term_Average[] = round($second_term_average_row['Average'],2); 
$second_term_Num_Subj[] = $second_term_average_row['Num_Subj']; 
}
}else{
echo "No Second Term Average";
exit();
}
//third term average
$third_term_average = mysql_query("Select ID_Number, Average, Num_Subj, Total From final_score_sheet Where Session ='$session' AND Term ='THIRD TERM' AND Class='$class'");
$third_term_average_num_rows = mysql_num_rows($third_term_average);
if($third_term_average_num_rows  > 0){
while($third_term_average_row = mysql_fetch_array($third_term_average)){
$third_term_ID_Number[] = $third_term_average_row['ID_Number']; 
$third_term_Average[] = round($third_term_average_row['Average'],2); 
$third_term_Num_Subj[] = $third_term_average_row['Num_Subj']; 
$third_term_total[] =  $third_term_average_row['Total'];
}
}else{
echo "No Third Term Average";
exit();
}

//get distinct id number and names into array
$name_id = mysql_query("Select DISTINCT score_sheet.ID_Number, students.Name From score_sheet JOIN students ON score_sheet.ID_Number=students.ID_Number WHERE score_sheet.Session='$session' AND score_sheet.Class='$class' AND score_sheet.Term='$term'");
$name_id_num_row = mysql_num_rows($name_id);
if($name_id_num_row > 0){
while($name_id_row = mysql_fetch_array($name_id)){
$id_number[] = $name_id_row['ID_Number'];
$name[] = $name_id_row['Name'];
}
}else{
echo"No student name";
exit();
}

//make query to score sheet table
$generate = mysql_query("SELECT students.ID_Number, students.Name, score_sheet.Total, score_sheet.Subj_ID,  subject.Subjects FROM students JOIN score_sheet ON students.ID_Number = score_sheet.ID_Number JOIN subject ON subject.Subj_ID = score_sheet.Subj_ID WHERE score_sheet.Session='$session' AND score_sheet.Class='$class' AND score_sheet.Term='$term' GROUP BY students.ID_Number, score_sheet.Subj_ID ");
$generate_num_row = mysql_num_rows($generate);
if($generate_num_row > 0){
while($row=mysql_fetch_array($generate)){
$ID_Number[] = $row['ID_Number'];
$Name[] = $row['Name'];
$Subject[] = $row['Subjects'];
$Subject_ID[] = $row['Subj_ID'];
$Total[] = $row['Total'];
}

}else{
echo"No";
exit();
}
?>

<table border="0" style="border-collapse:collapse;  " width="90%" >
<tr>
<td width="102px">Reg</td><td width="250px">Name</td><td width="30">N/s</td><td width="50px">1stAve</td><td width="50px">2ndAve</td><td width="50px">3rdAve</td><td width="50px">Cum</td><td width="20px">Trm</td><td width="50px">Total</td>
<td width="40px">Agric</td><td width="40px">B/Sci</td><td width="40px">B/T</td><td width="40px">B/S</td><td width="40px">CRS</td><td width="40px">C/E</td><td width="40px">Comp</td><td width="40px">Eng</td><td width="40px">F/Art</td><td width="40px">Fren</td><td width="40px">Hau</td>
<td width="40px">H/E</td><td width="40px">Math</td><td width="40px">PHE</td><td width="40px">S/S</td>
</tr>
</table>
<hr color="#000000">




<?php
for($i=0; $i< $name_id_num_row; $i++){
$id = $id_number[$i];
?>
<table border="1" style="border-collapse:collapse;" width="90%">


<tr>
<td width="100px"><?php echo $id_number[$i]; ?></td><td width="250px"><?php echo $name[$i]; ?></td><td width="30"><?php for($m=0; $m < $third_term_average_num_rows; $m++){if($id == $third_term_ID_Number[$m]){$num_subj=$third_term_Num_Subj[$m]; echo $num_subj;}}  ?></td><td width="50px"><?php for($j=0; $j < $first_term_average_num_rows; $j++){if($id == $first_term_ID_Number[$j]){$first=$first_term_Average[$j]; echo $first_term_Average[$j];}}  ?></td><td width="50px"><?php for($k=0; $k < $second_term_average_num_rows; $k++){if($id == $second_term_ID_Number[$k]){$second=$second_term_Average[$k]; echo $second_term_Average[$k];}}  ?></td><td width="50px"><?php for($l=0; $l < $third_term_average_num_rows; $l++){if($id == $third_term_ID_Number[$l]){$third=$third_term_Average[$l]; echo $third_term_Average[$l];}}  ?></td><td width="50px"><?php $cum =($first + $second + $third)/3; echo round($cum,2); ?></td><td width="20px"><?php $term ="3rd"; echo $term;  ?></td><td width="50px"><?php for($m=0; $m < $third_term_average_num_rows; $m++){if($id == $third_term_ID_Number[$m]){$total=$third_term_total[$m]; echo round($total,2);}}  ?></td>
<td width="40px"> <?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 1 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 2 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 3 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 4 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 5 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 8 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 6 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td>
<td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 10 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 12 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 13 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 17 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td>
<td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 18 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 20 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 21 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 24 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td>
</tr>

<?php
}
?>

</table>

</br></br>
 <a href="print_master_list.php"> <input type="button"  value="Print This Page" onClick="window.print()"  /> 
</div>


<?php
}else if ($term == "SECOND TERM"){

// code for second term
// get subject and subject id into arrays
$subjects = mysql_query("Select DISTINCT score_sheet.Subj_ID, subject.Subjects From score_sheet JOIN subject ON score_sheet.Subj_ID = subject.Subj_ID WHERE score_sheet.Session='$session' AND score_sheet.Class='$class' AND score_sheet.Term='$term' ");
$subj_num_rows = mysql_num_rows($subjects);
if($subj_num_rows >0){
while($subj_row = mysql_fetch_array($subjects)){
 $subject_array[] = $subj_row['Subjects'];
 $subj_ID_array[] = $subj_row['Subj_ID'];
}
}else{
echo"No Subjects In Score Sheet";
exit();
}

//get first, second and third term averages into array
$first_term_average = mysql_query("Select ID_Number, Average, Num_Subj, Total From final_score_sheet Where Session ='$session' AND Term ='FIRST TERM' AND Class='$class'");
$first_term_average_num_rows = mysql_num_rows($first_term_average);
if($first_term_average_num_rows  > 0){
while($first_term_average_row = mysql_fetch_array($first_term_average)){
$first_term_ID_Number[] = $first_term_average_row['ID_Number']; 
$first_term_Average[] = round($first_term_average_row['Average'],2); 
$first_term_Num_Subj[] = $first_term_average_row['Num_Subj']; 
$first_term_total[] =  $first_term_average_row['Total'];
}
}else{
echo "No First Term Average";
exit();
}
//second term average
$second_term_average = mysql_query("Select ID_Number, Average, Num_Subj, Total From final_score_sheet Where Session ='$session' AND Term ='SECOND TERM' AND Class='$class'");
$second_term_average_num_rows = mysql_num_rows($second_term_average);
if($second_term_average_num_rows  > 0){
while($second_term_average_row = mysql_fetch_array($second_term_average)){
$second_term_ID_Number[] = $second_term_average_row['ID_Number']; 
$second_term_Average[] = round($second_term_average_row['Average'],2); 
$second_term_Num_Subj[] = $second_term_average_row['Num_Subj'];
$second_term_total[] =  $second_term_average_row['Total']; 
}
}else{
echo "No Second Term Average";
exit();
}
/*
//third term average
$third_term_average = mysql_query("Select ID_Number, Average, Num_Subj, Total From final_score_sheet Where Session ='$session' AND Term ='THIRD TERM' AND Class='$class'");
$third_term_average_num_rows = mysql_num_rows($third_term_average);
if($third_term_average_num_rows  > 0){
while($third_term_average_row = mysql_fetch_array($third_term_average)){
$third_term_ID_Number[] = $third_term_average_row['ID_Number']; 
$third_term_Average[] = round($third_term_average_row['Average'],2); 
$third_term_Num_Subj[] = $third_term_average_row['Num_Subj']; 
$third_term_total[] =  $third_term_average_row['Total'];
}
}else{
echo "No Third Term Average";
exit();
}*/

//get distinct id number and names into array
$name_id = mysql_query("Select DISTINCT score_sheet.ID_Number, students.Name From score_sheet JOIN students ON score_sheet.ID_Number=students.ID_Number WHERE score_sheet.Session='$session' AND score_sheet.Class='$class' AND score_sheet.Term='$term'");
$name_id_num_row = mysql_num_rows($name_id);
if($name_id_num_row > 0){
while($name_id_row = mysql_fetch_array($name_id)){
$id_number[] = $name_id_row['ID_Number'];
$name[] = $name_id_row['Name'];
}
}else{
echo"No student name";
exit();
}

//make query to score sheet table
$generate = mysql_query("SELECT students.ID_Number, students.Name, score_sheet.Total, score_sheet.Subj_ID,  subject.Subjects FROM students JOIN score_sheet ON students.ID_Number = score_sheet.ID_Number JOIN subject ON subject.Subj_ID = score_sheet.Subj_ID WHERE score_sheet.Session='$session' AND score_sheet.Class='$class' AND score_sheet.Term='$term' GROUP BY students.ID_Number, score_sheet.Subj_ID ");
$generate_num_row = mysql_num_rows($generate);
if($generate_num_row > 0){
while($row=mysql_fetch_array($generate)){
$ID_Number[] = $row['ID_Number'];
$Name[] = $row['Name'];
$Subject[] = $row['Subjects'];
$Subject_ID[] = $row['Subj_ID'];
$Total[] = $row['Total'];
}

}else{
echo"No";
exit();
}
?>

<table border="0" style="border-collapse:collapse;  " width="90%" >
<tr>
<td width="102px">Reg</td><td width="250px">Name</td><td width="30">N/s</td><td width="50px">1stAve</td><td width="50px">2ndAve</td><td width="50px">Cum</td><td width="20px">Trm</td><td width="50px">Total</td>
<td width="40px">Agric</td><td width="40px">B/Sci</td><td width="40px">B/T</td><td width="40px">B/S</td><td width="40px">CRS</td><td width="40px">C/E</td><td width="40px">Comp</td><td width="40px">Eng</td><td width="40px">F/Art</td><td width="40px">Fren</td><td width="40px">Hau</td>
<td width="40px">H/E</td><td width="40px">Math</td><td width="40px">PHE</td><td width="40px">S/S</td>
</tr>
</table>
<hr color="#000000">




<?php
for($i=0; $i< $name_id_num_row; $i++){
$id = $id_number[$i];
?>
<table border="1" style="border-collapse:collapse;" width="90%">


<tr>
<td width="100px"><?php echo $id_number[$i]; ?></td><td width="250px"><?php echo $name[$i]; ?></td><td width="30"><?php for($m=0; $m < $second_term_average_num_rows; $m++){if($id == $second_term_ID_Number[$m]){$num_subj=$second_term_Num_Subj[$m]; echo $num_subj;}}  ?></td><td width="50px"><?php for($j=0; $j < $first_term_average_num_rows; $j++){if($id == $first_term_ID_Number[$j]){$first=$first_term_Average[$j]; echo $first_term_Average[$j];}}  ?></td><td width="50px"><?php for($k=0; $k < $second_term_average_num_rows; $k++){if($id == $second_term_ID_Number[$k]){$second=$second_term_Average[$k]; echo $second_term_Average[$k];}}  ?></td><td width="50px"><?php $cum =($first + $second)/2; echo round($cum,2); ?></td><td width="20px"><?php $term ="2nd"; echo $term;  ?></td><td width="50px"><?php for($m=0; $m < $second_term_average_num_rows; $m++){if($id == $second_term_ID_Number[$m]){$total=$second_term_total[$m]; echo round($total,2);}}  ?></td>
<td width="40px"> <?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 1 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 2 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 3 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 4 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 5 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 8 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 6 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td>
<td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 10 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 12 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 13 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 17 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td>
<td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 18 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 20 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 21 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 24 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td>
</tr>

<?php
}
?>

</table>

</br></br>
 <a href="print_master_list.php"> <input type="button"  value="Print This Page" onClick="window.print()"  /> 
</div>

<?php

}else if ($term == "FIRST TERM"){

// code for first term
// get subject and subject id into arrays
$subjects = mysql_query("Select DISTINCT score_sheet.Subj_ID, subject.Subjects From score_sheet JOIN subject ON score_sheet.Subj_ID = subject.Subj_ID WHERE score_sheet.Session='$session' AND score_sheet.Class='$class' AND score_sheet.Term='$term' ");
$subj_num_rows = mysql_num_rows($subjects);
if($subj_num_rows >0){
while($subj_row = mysql_fetch_array($subjects)){
 $subject_array[] = $subj_row['Subjects'];
 $subj_ID_array[] = $subj_row['Subj_ID'];
}
}else{
echo"No Subjects In Score Sheet";
exit();
}

//get first, second and third term averages into array
$first_term_average = mysql_query("Select ID_Number, Average, Num_Subj, Total From final_score_sheet Where Session ='$session' AND Term ='FIRST TERM' AND Class='$class'");
$first_term_average_num_rows = mysql_num_rows($first_term_average);
if($first_term_average_num_rows  > 0){
while($first_term_average_row = mysql_fetch_array($first_term_average)){
$first_term_ID_Number[] = $first_term_average_row['ID_Number']; 
$first_term_Average[] = round($first_term_average_row['Average'],2); 
$first_term_Num_Subj[] = $first_term_average_row['Num_Subj']; 
$first_term_total[] =  $first_term_average_row['Total'];
}
}else{
echo "No First Term Average";
exit();
}
/*
//second term average
$second_term_average = mysql_query("Select ID_Number, Average, Num_Subj, Total From final_score_sheet Where Session ='$session' AND Term ='SECOND TERM' AND Class='$class'");
$second_term_average_num_rows = mysql_num_rows($second_term_average);
if($second_term_average_num_rows  > 0){
while($second_term_average_row = mysql_fetch_array($second_term_average)){
$second_term_ID_Number[] = $second_term_average_row['ID_Number']; 
$second_term_Average[] = round($second_term_average_row['Average'],2); 
$second_term_Num_Subj[] = $second_term_average_row['Num_Subj'];
$second_term_total[] =  $second_term_average_row['Total']; 
}
}else{
echo "No Second Term Average";
exit();
}*/
/*
//third term average
$third_term_average = mysql_query("Select ID_Number, Average, Num_Subj, Total From final_score_sheet Where Session ='$session' AND Term ='THIRD TERM' AND Class='$class'");
$third_term_average_num_rows = mysql_num_rows($third_term_average);
if($third_term_average_num_rows  > 0){
while($third_term_average_row = mysql_fetch_array($third_term_average)){
$third_term_ID_Number[] = $third_term_average_row['ID_Number']; 
$third_term_Average[] = round($third_term_average_row['Average'],2); 
$third_term_Num_Subj[] = $third_term_average_row['Num_Subj']; 
$third_term_total[] =  $third_term_average_row['Total'];
}
}else{
echo "No Third Term Average";
exit();
}*/

//get distinct id number and names into array
$name_id = mysql_query("Select DISTINCT score_sheet.ID_Number, students.Name From score_sheet JOIN students ON score_sheet.ID_Number=students.ID_Number WHERE score_sheet.Session='$session' AND score_sheet.Class='$class' AND score_sheet.Term='$term'");
$name_id_num_row = mysql_num_rows($name_id);
if($name_id_num_row > 0){
while($name_id_row = mysql_fetch_array($name_id)){
$id_number[] = $name_id_row['ID_Number'];
$name[] = $name_id_row['Name'];
}
}else{
echo"No student name";
exit();
}

//make query to score sheet table
$generate = mysql_query("SELECT students.ID_Number, students.Name, score_sheet.Total, score_sheet.Subj_ID,  subject.Subjects FROM students JOIN score_sheet ON students.ID_Number = score_sheet.ID_Number JOIN subject ON subject.Subj_ID = score_sheet.Subj_ID WHERE score_sheet.Session='$session' AND score_sheet.Class='$class' AND score_sheet.Term='$term' GROUP BY students.ID_Number, score_sheet.Subj_ID ");
$generate_num_row = mysql_num_rows($generate);
if($generate_num_row > 0){
while($row=mysql_fetch_array($generate)){
$ID_Number[] = $row['ID_Number'];
$Name[] = $row['Name'];
$Subject[] = $row['Subjects'];
$Subject_ID[] = $row['Subj_ID'];
$Total[] = $row['Total'];
}

}else{
echo"No";
exit();
}
?>

<table border="0" style="border-collapse:collapse;  " width="90%" >
<tr>
<td width="102px">Reg</td><td width="250px">Name</td><td width="30">N/s</td><td width="50px">1stAve</td><td width="50px">Cum</td><td width="20px">Trm</td><td width="50px">Total</td>
<td width="40px">Agric</td><td width="40px">B/Sci</td><td width="40px">B/T</td><td width="40px">B/S</td><td width="40px">CRS</td><td width="40px">C/E</td><td width="40px">Comp</td><td width="40px">Eng</td><td width="40px">F/Art</td><td width="40px">Fren</td><td width="40px">Hau</td>
<td width="40px">H/E</td><td width="40px">Math</td><td width="40px">PHE</td><td width="40px">S/S</td>
</tr>
</table>
<hr color="#000000">




<?php
for($i=0; $i< $name_id_num_row; $i++){
$id = $id_number[$i];
?>
<table border="1" style="border-collapse:collapse;" width="90%">


<tr>
<td width="100px"><?php echo $id_number[$i]; ?></td><td width="250px"><?php echo $name[$i]; ?></td><td width="30"><?php for($m=0; $m < $first_term_average_num_rows; $m++){if($id == $first_term_ID_Number[$m]){$num_subj=$first_term_Num_Subj[$m]; echo $num_subj;}}  ?></td><td width="50px"><?php for($j=0; $j < $first_term_average_num_rows; $j++){if($id == $first_term_ID_Number[$j]){$first=$first_term_Average[$j]; echo $first_term_Average[$j];}}  ?></td><td width="50px"><?php for($j=0; $j < $first_term_average_num_rows; $j++){if($id == $first_term_ID_Number[$j]){$first=$first_term_Average[$j]; echo round($first_term_Average[$j],2);}}?></td><td width="20px"><?php for($m=0; $m < $first_term_average_num_rows; $m++){if($id == $first_term_ID_Number[$m]){$total=$first_term_total[$m]; if($total != " "){echo "1st";}}}  ?></td><td width="50px"><?php for($m=0; $m < $first_term_average_num_rows; $m++){if($id == $first_term_ID_Number[$m]){$total=$first_term_total[$m]; echo round($total,2);}}  ?></td>
<td width="40px"> <?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 1 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 2 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 3 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 4 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 5 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 8 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 6 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td>
<td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 10 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 12 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 13 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 17 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td>
<td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 18 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 20 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 21 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 24 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td>
</tr>

<?php
}
?>

</table>

</br></br>
 <a href="print_master_list.php"> <input type="button"  value="Print This Page" onClick="window.print()"  /> 
</div>

<?php
}

}else{


//category SSS
if($term == "THIRD TERM"){

// get subject and subject id into arrays
$subjects = mysql_query("Select DISTINCT score_sheet.Subj_ID, subject.Subjects From score_sheet JOIN subject ON score_sheet.Subj_ID = subject.Subj_ID WHERE score_sheet.Session='$session' AND score_sheet.Class='$class' AND score_sheet.Term='$term' ");
$subj_num_rows = mysql_num_rows($subjects);
if($subj_num_rows >0){
while($subj_row = mysql_fetch_array($subjects)){
 $subject_array[] = $subj_row['Subjects'];
 $subj_ID_array[] = $subj_row['Subj_ID'];
}
}else{
echo"No Subjects Yet In Score Sheet For This Term";
exit();
}

//get first, second and third term averages into array
$first_term_average = mysql_query("Select ID_Number, Average, Num_Subj From final_score_sheet Where Session ='$session' AND Term ='FIRST TERM' AND Class='$class'");
$first_term_average_num_rows = mysql_num_rows($first_term_average);
if($first_term_average_num_rows  > 0){
while($first_term_average_row = mysql_fetch_array($first_term_average)){
$first_term_ID_Number[] = $first_term_average_row['ID_Number']; 
$first_term_Average[] = round($first_term_average_row['Average'],2); 
$first_term_Num_Subj[] = $first_term_average_row['Num_Subj']; 
}
}else{
echo "No First Term Average";
exit();
}
//second term average
$second_term_average = mysql_query("Select ID_Number, Average, Num_Subj From final_score_sheet Where Session ='$session' AND Term ='SECOND TERM' AND Class='$class'");
$second_term_average_num_rows = mysql_num_rows($second_term_average);
if($second_term_average_num_rows  > 0){
while($second_term_average_row = mysql_fetch_array($second_term_average)){
$second_term_ID_Number[] = $second_term_average_row['ID_Number']; 
$second_term_Average[] = round($second_term_average_row['Average'],2); 
$second_term_Num_Subj[] = $second_term_average_row['Num_Subj']; 
}
}else{
echo "No Second Term Average";
exit();
}
//third term average
$third_term_average = mysql_query("Select ID_Number, Average, Num_Subj, Total From final_score_sheet Where Session ='$session' AND Term ='THIRD TERM' AND Class='$class'");
$third_term_average_num_rows = mysql_num_rows($third_term_average);
if($third_term_average_num_rows  > 0){
while($third_term_average_row = mysql_fetch_array($third_term_average)){
$third_term_ID_Number[] = $third_term_average_row['ID_Number']; 
$third_term_Average[] = round($third_term_average_row['Average'],2); 
$third_term_Num_Subj[] = $third_term_average_row['Num_Subj']; 
$third_term_total[] =  $third_term_average_row['Total'];
}
}else{
echo "No Third Term Average";
exit();
}

//get distinct id number and names into array
$name_id = mysql_query("Select DISTINCT score_sheet.ID_Number, students.Name From score_sheet JOIN students ON score_sheet.ID_Number=students.ID_Number WHERE score_sheet.Session='$session' AND score_sheet.Class='$class' AND score_sheet.Term='$term'");
$name_id_num_row = mysql_num_rows($name_id);
if($name_id_num_row > 0){
while($name_id_row = mysql_fetch_array($name_id)){
$id_number[] = $name_id_row['ID_Number'];
$name[] = $name_id_row['Name'];
}
}else{
echo"No student name";
exit();
}

//make query to score sheet table
$generate = mysql_query("SELECT students.ID_Number, students.Name, score_sheet.Total, score_sheet.Subj_ID,  subject.Subjects FROM students JOIN score_sheet ON students.ID_Number = score_sheet.ID_Number JOIN subject ON subject.Subj_ID = score_sheet.Subj_ID WHERE score_sheet.Session='$session' AND score_sheet.Class='$class' AND score_sheet.Term='$term' GROUP BY students.ID_Number, score_sheet.Subj_ID ");
$generate_num_row = mysql_num_rows($generate);
if($generate_num_row > 0){
while($row=mysql_fetch_array($generate)){
$ID_Number[] = $row['ID_Number'];
$Name[] = $row['Name'];
$Subject[] = $row['Subjects'];
$Subject_ID[] = $row['Subj_ID'];
$Total[] = $row['Total'];
}

}else{
echo"No";
exit();
}

// test for science class or art class

if($class =="SSS1A" || $class =="SSS1B" || $class =="SSS2A" || $class =="SSS3A"){
?>

<table border="0" style="border-collapse:collapse;  " width="90%" >
<tr>
<td width="102px">Reg</td><td width="250px">Name</td><td width="30">N/s</td><td width="50px">1stAve</td><td width="50px">2ndAve</td><td width="50px">3rdAve</td><td width="50px">Cum</td><td width="20px">Trm</td><td width="50px">Total</td>
<td width="40px">Agric</td><td width="40px">Crs</td><td width="40px">C/s</td><td width="40px">C/Ed</td><td width="40px">Eng.</td><td width="40px">Econs</td><td width="40px">F/m</td><td width="40px">Geo</td><td width="40px">Hau</td><td width="40px">Maths</td><td width="40px">Phys</td>
<td width="40px">Bio</td><td width="40px">Eimw</td>
<td width="40px">Chem</td>
<!--<td width="40px">S/S</td>-->
</tr>
</table>
<hr color="#000000">


<?php
for($i=0; $i< $name_id_num_row; $i++){
$id = $id_number[$i];
?>
<table border="1" style="border-collapse:collapse;" width="90%">
<tr>
<td width="100px"><?php echo $id_number[$i]; ?></td><td width="250px"><?php echo $name[$i]; ?></td><td width="30"><?php for($m=0; $m < $third_term_average_num_rows; $m++){if($id == $third_term_ID_Number[$m]){$num_subj=$third_term_Num_Subj[$m]; echo $num_subj;}}  ?></td><td width="50px"><?php for($j=0; $j < $first_term_average_num_rows; $j++){if($id == $first_term_ID_Number[$j]){$first=$first_term_Average[$j]; echo $first_term_Average[$j];}}  ?></td><td width="50px"><?php for($k=0; $k < $second_term_average_num_rows; $k++){if($id == $second_term_ID_Number[$k]){$second=$second_term_Average[$k]; echo $second_term_Average[$k];}}  ?></td><td width="50px"><?php for($l=0; $l < $third_term_average_num_rows; $l++){if($id == $third_term_ID_Number[$l]){$third=$third_term_Average[$l]; echo $third_term_Average[$l];}}  ?></td><td width="50px"><?php $cum =($first + $second + $third)/3; echo round($cum,2); ?></td><td width="20px"><?php $term ="3rd"; echo $term;  ?></td>
<td width="50px"><?php for($m=0; $m < $third_term_aveage_num_rows; $m++){if($id == $third_term_ID_Number[$m]){$total=$third_term_total[$m]; echo round($total,2);}}  ?></td>
<td width="40px"> <?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 1 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 5 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 6 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 8 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 10 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 11 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 14 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td>
<td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 15 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 17 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 20 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 22 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td>
<td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 26 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 27 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td>
<td width="40px"><?php  for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 7 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td>
<!--<td width="40px"><?php //for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 24 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td>-->
</tr>
<?php
}
?>
</table>

<?php
}else{
// Art Class
?>

<table border="0" style="border-collapse:collapse;  " width="90%" >
<tr>
<td width="102px">Reg</td><td width="250px">Name</td><td width="30">N/s</td><td width="50px">1stAve</td><td width="50px">2ndAve</td><td width="50px">3rdAve</td><td width="50px">Cum</td><td width="20px">Trm</td><td width="50px">Total</td>
<td width="40px">Agric</td><td width="40px">Crs</td><td width="40px">C/s</td><td width="40px">C/Ed</td><td width="40px">Eng.</td><td width="40px">Econs</td><td width="40px">F/m</td><td width="40px">Geo</td><td width="40px">Gov</td><td width="40px">Haus</td><td width="40px">L/Eng</td>
<td width="40px">Maths</td><td width="40px">F/Acc</td>
<td width="40px">Bio</td>
<!--<td width="40px">S/S</td>-->
</tr>
</table>
<hr color="#000000">


<?php
for($i=0; $i< $name_id_num_row; $i++){
$id = $id_number[$i];
?>
<table border="1" style="border-collapse:collapse;" width="90%">
<tr>
<td width="100px"><?php echo $id_number[$i]; ?></td><td width="250px"><?php echo $name[$i]; ?></td><td width="30"><?php for($m=0; $m < $third_term_average_num_rows; $m++){if($id == $third_term_ID_Number[$m]){$num_subj=$third_term_Num_Subj[$m]; echo $num_subj;}}  ?></td><td width="50px"><?php for($j=0; $j < $first_term_average_num_rows; $j++){if($id == $first_term_ID_Number[$j]){$first=$first_term_Average[$j]; echo $first_term_Average[$j];}}  ?></td><td width="50px"><?php for($k=0; $k < $second_term_average_num_rows; $k++){if($id == $second_term_ID_Number[$k]){$second=$second_term_Average[$k]; echo $second_term_Average[$k];}}  ?></td><td width="50px"><?php for($l=0; $l < $third_term_average_num_rows; $l++){if($id == $third_term_ID_Number[$l]){$third=$third_term_Average[$l]; echo $third_term_Average[$l];}}  ?></td><td width="50px"><?php $cum =($first + $second + $third)/3; echo round($cum,2); ?></td><td width="20px"><?php $term ="3rd"; echo $term;  ?></td>
<td width="50px"><?php for($m=0; $m < $third_term_aveage_num_rows; $m++){if($id == $third_term_ID_Number[$m]){$total=$third_term_total[$m]; echo round($total,2);}}  ?></td>
<td width="40px"> <?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 1 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 5 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 6 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 8 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 10 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 11 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 14 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td>
<td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 15 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 16 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 17 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 19 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td>
<td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 20 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 25 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td>
<td width="40px"><?php  for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 26 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td>
<!--<td width="40px"><?php //for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 24 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td>-->
</tr>
<?php
}
?>
</table>
<?php
}
?>


</br></br>
 <a href="print_master_list.php"> <input type="button"  value="Print This Page" onClick="window.print()"  /> 
</div>

<?php
}else if ($term == "SECOND TERM"){

// code for second term
// get subject and subject id into arrays
$subjects = mysql_query("Select DISTINCT score_sheet.Subj_ID, subject.Subjects From score_sheet JOIN subject ON score_sheet.Subj_ID = subject.Subj_ID WHERE score_sheet.Session='$session' AND score_sheet.Class='$class' AND score_sheet.Term='$term' ");
$subj_num_rows = mysql_num_rows($subjects);
if($subj_num_rows >0){
while($subj_row = mysql_fetch_array($subjects)){
 $subject_array[] = $subj_row['Subjects'];
 $subj_ID_array[] = $subj_row['Subj_ID'];
}
}else{
echo"No Subjects In Score Sheet";
exit();
}

//get first, second and third term averages into array
$first_term_average = mysql_query("Select ID_Number, Average, Num_Subj, Total From final_score_sheet Where Session ='$session' AND Term ='FIRST TERM' AND Class='$class'");
$first_term_average_num_rows = mysql_num_rows($first_term_average);
if($first_term_average_num_rows  > 0){
while($first_term_average_row = mysql_fetch_array($first_term_average)){
$first_term_ID_Number[] = $first_term_average_row['ID_Number']; 
$first_term_Average[] = round($first_term_average_row['Average'],2); 
$first_term_Num_Subj[] = $first_term_average_row['Num_Subj']; 
$first_term_total[] =  $first_term_average_row['Total'];
}
}else{
echo "No First Term Average";
exit();
}
//second term average
$second_term_average = mysql_query("Select ID_Number, Average, Num_Subj, Total From final_score_sheet Where Session ='$session' AND Term ='SECOND TERM' AND Class='$class'");
$second_term_average_num_rows = mysql_num_rows($second_term_average);
if($second_term_average_num_rows  > 0){
while($second_term_average_row = mysql_fetch_array($second_term_average)){
$second_term_ID_Number[] = $second_term_average_row['ID_Number']; 
$second_term_Average[] = round($second_term_average_row['Average'],2); 
$second_term_Num_Subj[] = $second_term_average_row['Num_Subj'];
$second_term_total[] =  $second_term_average_row['Total']; 
}
}else{
echo "No Second Term Average";
exit();
}
/*
//third term average
$third_term_average = mysql_query("Select ID_Number, Average, Num_Subj, Total From final_score_sheet Where Session ='$session' AND Term ='THIRD TERM' AND Class='$class'");
$third_term_average_num_rows = mysql_num_rows($third_term_average);
if($third_term_average_num_rows  > 0){
while($third_term_average_row = mysql_fetch_array($third_term_average)){
$third_term_ID_Number[] = $third_term_average_row['ID_Number']; 
$third_term_Average[] = round($third_term_average_row['Average'],2); 
$third_term_Num_Subj[] = $third_term_average_row['Num_Subj']; 
$third_term_total[] =  $third_term_average_row['Total'];
}
}else{
echo "No Third Term Average";
exit();
}*/

//get distinct id number and names into array
$name_id = mysql_query("Select DISTINCT score_sheet.ID_Number, students.Name From score_sheet JOIN students ON score_sheet.ID_Number=students.ID_Number WHERE score_sheet.Session='$session' AND score_sheet.Class='$class' AND score_sheet.Term='$term'");
$name_id_num_row = mysql_num_rows($name_id);
if($name_id_num_row > 0){
while($name_id_row = mysql_fetch_array($name_id)){
$id_number[] = $name_id_row['ID_Number'];
$name[] = $name_id_row['Name'];
}
}else{
echo"No student name";
exit();
}

//make query to score sheet table
$generate = mysql_query("SELECT students.ID_Number, students.Name, score_sheet.Total, score_sheet.Subj_ID,  subject.Subjects FROM students JOIN score_sheet ON students.ID_Number = score_sheet.ID_Number JOIN subject ON subject.Subj_ID = score_sheet.Subj_ID WHERE score_sheet.Session='$session' AND score_sheet.Class='$class' AND score_sheet.Term='$term' GROUP BY students.ID_Number, score_sheet.Subj_ID ");
$generate_num_row = mysql_num_rows($generate);
if($generate_num_row > 0){
while($row=mysql_fetch_array($generate)){
$ID_Number[] = $row['ID_Number'];
$Name[] = $row['Name'];
$Subject[] = $row['Subjects'];
$Subject_ID[] = $row['Subj_ID'];
$Total[] = $row['Total'];
}

}else{
echo"No";
exit();
}
// test for science class or art class

if($class =="SSS1A" || $class =="SSS1B" || $class =="SSS2A" || $class =="SSS3A"){
?>

<table border="0" style="border-collapse:collapse;  " width="90%" >
<tr>
<td width="102px">Reg</td><td width="250px">Name</td><td width="30">N/s</td><td width="50px">1stAve</td><td width="50px">2ndAve</td><td width="50px">Cum</td><td width="20px">Trm</td><td width="50px">Total</td>
<td width="40px">Agric</td><td width="40px">Crs</td><td width="40px">C/s</td><td width="40px">C/Ed</td><td width="40px">Eng.</td><td width="40px">Econs</td><td width="40px">F/m</td><td width="40px">Geo</td><td width="40px">Hau</td><td width="40px">Maths</td><td width="40px">Phys</td>
<td width="40px">Bio</td><td width="40px">Eimw</td>
<td width="40px">Chem</td>
<!--<td width="40px">S/S</td>-->
</tr>
</table>
<hr color="#000000">



<?php
for($i=0; $i< $name_id_num_row; $i++){
$id = $id_number[$i];
?>
<table border="1" style="border-collapse:collapse;" width="90%">


<tr>
<td width="100px"><?php echo $id_number[$i]; ?></td><td width="250px"><?php echo $name[$i]; ?></td><td width="30"><?php for($m=0; $m < $second_term_average_num_rows; $m++){if($id == $second_term_ID_Number[$m]){$num_subj=$second_term_Num_Subj[$m]; echo $num_subj;}}  ?></td><td width="50px"><?php for($j=0; $j < $first_term_average_num_rows; $j++){if($id == $first_term_ID_Number[$j]){$first=$first_term_Average[$j]; echo $first_term_Average[$j];}}  ?></td><td width="50px"><?php for($k=0; $k < $second_term_average_num_rows; $k++){if($id == $second_term_ID_Number[$k]){$second=$second_term_Average[$k]; echo $second_term_Average[$k];}}  ?></td><td width="50px"><?php $cum =($first + $second)/2; echo round($cum,2); ?></td><td width="20px"><?php $term ="2nd"; echo $term;  ?></td><td width="50px"><?php for($m=0; $m < $second_term_average_num_rows; $m++){if($id == $second_term_ID_Number[$m]){$total=$second_term_total[$m]; echo round($total,2);}}  ?></td>
<td width="40px"> <?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 1 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 5 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 6 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 8 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 10 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 11 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 14 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td>
<td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 15 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 17 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 20 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 22 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td>
<td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 26 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 27 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td>
<td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 7 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td>
<!--<td width="40px"><?php //for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 24 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td>-->
</tr>

<?php
}
?>
</table>
<?php
}else{
//Art Class
?>
<table border="0" style="border-collapse:collapse;  " width="90%" >
<tr>
<td width="102px">Reg</td><td width="250px">Name</td><td width="30">N/s</td><td width="50px">1stAve</td><td width="50px">2ndAve</td><td width="50px">Cum</td><td width="20px">Trm</td><td width="50px">Total</td>
<td width="40px">Agric</td><td width="40px">Crs</td><td width="40px">C/s</td><td width="40px">C/Ed</td><td width="40px">Eng.</td><td width="40px">Econs</td><td width="40px">F/m</td><td width="40px">Geo</td><td width="40px">Gov</td><td width="40px">Haus</td><td width="40px">L/Eng.</td>
<td width="40px">Mathso</td><td width="40px">F/Acc</td>
<td width="40px">Bio</td>
<!--<td width="40px">S/S</td>-->
</tr>
</table>
<hr color="#000000">



<?php
for($i=0; $i< $name_id_num_row; $i++){
$id = $id_number[$i];
?>
<table border="1" style="border-collapse:collapse;" width="90%">


<tr>
<td width="100px"><?php echo $id_number[$i]; ?></td><td width="250px"><?php echo $name[$i]; ?></td><td width="30"><?php for($m=0; $m < $second_term_average_num_rows; $m++){if($id == $second_term_ID_Number[$m]){$num_subj=$second_term_Num_Subj[$m]; echo $num_subj;}}  ?></td><td width="50px"><?php for($j=0; $j < $first_term_average_num_rows; $j++){if($id == $first_term_ID_Number[$j]){$first=$first_term_Average[$j]; echo $first_term_Average[$j];}}  ?></td><td width="50px"><?php for($k=0; $k < $second_term_average_num_rows; $k++){if($id == $second_term_ID_Number[$k]){$second=$second_term_Average[$k]; echo $second_term_Average[$k];}}  ?></td><td width="50px"><?php $cum =($first + $second)/2; echo round($cum,2); ?></td><td width="20px"><?php $term ="2nd"; echo $term;  ?></td><td width="50px"><?php for($m=0; $m < $second_term_average_num_rows; $m++){if($id == $second_term_ID_Number[$m]){$total=$second_term_total[$m]; echo round($total,2);}}  ?></td>
<td width="40px"> <?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 1 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 5 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 6 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 8 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 10 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 11 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 14 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td>
<td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 15 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 16 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 17 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 19 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td>
<td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 20 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 25 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td>
<td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 26 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td>
<!--<td width="40px"><?php //for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 24 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td>-->
</tr>

<?php
}
?>
</table>
<?php
}
?>
</br></br>
 <a href="print_master_list.php"> <input type="button"  value="Print This Page" onClick="window.print()"  /> 
</div>
<?php
}else if ($term == "FIRST TERM"){

// code for first term
// get subject and subject id into arrays
$subjects = mysql_query("Select DISTINCT score_sheet.Subj_ID, subject.Subjects From score_sheet JOIN subject ON score_sheet.Subj_ID = subject.Subj_ID WHERE score_sheet.Session='$session' AND score_sheet.Class='$class' AND score_sheet.Term='$term' ");
$subj_num_rows = mysql_num_rows($subjects);
if($subj_num_rows >0){
while($subj_row = mysql_fetch_array($subjects)){
 $subject_array[] = $subj_row['Subjects'];
 $subj_ID_array[] = $subj_row['Subj_ID'];
}
}else{
echo"No Subjects In Score Sheet";
exit();
}

//get first, second and third term averages into array
$first_term_average = mysql_query("Select ID_Number, Average, Num_Subj, Total From final_score_sheet Where Session ='$session' AND Term ='FIRST TERM' AND Class='$class'");
$first_term_average_num_rows = mysql_num_rows($first_term_average);
if($first_term_average_num_rows  > 0){
while($first_term_average_row = mysql_fetch_array($first_term_average)){
$first_term_ID_Number[] = $first_term_average_row['ID_Number']; 
$first_term_Average[] = round($first_term_average_row['Average'],2); 
$first_term_Num_Subj[] = $first_term_average_row['Num_Subj']; 
$first_term_total[] =  $first_term_average_row['Total'];
}
}else{
echo "No First Term Average";
exit();
}
/*
//second term average
$second_term_average = mysql_query("Select ID_Number, Average, Num_Subj, Total From final_score_sheet Where Session ='$session' AND Term ='SECOND TERM' AND Class='$class'");
$second_term_average_num_rows = mysql_num_rows($second_term_average);
if($second_term_average_num_rows  > 0){
while($second_term_average_row = mysql_fetch_array($second_term_average)){
$second_term_ID_Number[] = $second_term_average_row['ID_Number']; 
$second_term_Average[] = round($second_term_average_row['Average'],2); 
$second_term_Num_Subj[] = $second_term_average_row['Num_Subj'];
$second_term_total[] =  $second_term_average_row['Total']; 
}
}else{
echo "No Second Term Average";
exit();
}*/
/*
//third term average
$third_term_average = mysql_query("Select ID_Number, Average, Num_Subj, Total From final_score_sheet Where Session ='$session' AND Term ='THIRD TERM' AND Class='$class'");
$third_term_average_num_rows = mysql_num_rows($third_term_average);
if($third_term_average_num_rows  > 0){
while($third_term_average_row = mysql_fetch_array($third_term_average)){
$third_term_ID_Number[] = $third_term_average_row['ID_Number']; 
$third_term_Average[] = round($third_term_average_row['Average'],2); 
$third_term_Num_Subj[] = $third_term_average_row['Num_Subj']; 
$third_term_total[] =  $third_term_average_row['Total'];
}
}else{
echo "No Third Term Average";
exit();
}*/

//get distinct id number and names into array
$name_id = mysql_query("Select DISTINCT score_sheet.ID_Number, students.Name From score_sheet JOIN students ON score_sheet.ID_Number=students.ID_Number WHERE score_sheet.Session='$session' AND score_sheet.Class='$class' AND score_sheet.Term='$term'");
$name_id_num_row = mysql_num_rows($name_id);
if($name_id_num_row > 0){
while($name_id_row = mysql_fetch_array($name_id)){
$id_number[] = $name_id_row['ID_Number'];
$name[] = $name_id_row['Name'];
}
}else{
echo"No student name";
exit();
}

//make query to score sheet table
$generate = mysql_query("SELECT students.ID_Number, students.Name, score_sheet.Total, score_sheet.Subj_ID,  subject.Subjects FROM students JOIN score_sheet ON students.ID_Number = score_sheet.ID_Number JOIN subject ON subject.Subj_ID = score_sheet.Subj_ID WHERE score_sheet.Session='$session' AND score_sheet.Class='$class' AND score_sheet.Term='$term' GROUP BY students.ID_Number, score_sheet.Subj_ID ");
$generate_num_row = mysql_num_rows($generate);
if($generate_num_row > 0){
while($row=mysql_fetch_array($generate)){
$ID_Number[] = $row['ID_Number'];
$Name[] = $row['Name'];
$Subject[] = $row['Subjects'];
$Subject_ID[] = $row['Subj_ID'];
$Total[] = $row['Total'];
}

}else{
echo"No";
exit();
}
// test for science class or art class

if($class =="SSS1A" || $class =="SSS1B" || $class =="SSS2A" || $class =="SSS3A"){
?>

<table border="0" style="border-collapse:collapse;  " width="90%" >
<tr>
<td width="102px">Reg</td><td width="250px">Name</td><td width="30">N/s</td><td width="50px">1stAve</td><td width="50px">Cum</td><td width="20px">Trm</td><td width="50px">Total</td>
<td width="40px">Agric</td><td width="40px">Crs</td><td width="40px">C/s</td><td width="40px">C/Ed</td><td width="40px">Eng.</td><td width="40px">Econs</td><td width="40px">F/m</td><td width="40px">Geo</td><td width="40px">Hau</td><td width="40px">Maths</td><td width="40px">Phys</td>
<td width="40px">Bio</td><td width="40px">Eimw</td>
<td width="40px">Chem</td>
<!--<td width="40px">S/S</td>-->
</tr>
</table>
<hr color="#000000">




<?php
for($i=0; $i< $name_id_num_row; $i++){
$id = $id_number[$i];
?>
<table border="1" style="border-collapse:collapse;" width="90%">


<tr>
<td width="100px"><?php echo $id_number[$i]; ?></td><td width="250px"><?php echo $name[$i]; ?></td><td width="30"><?php for($m=0; $m < $first_term_average_num_rows; $m++){if($id == $first_term_ID_Number[$m]){$num_subj=$first_term_Num_Subj[$m]; echo $num_subj;}}  ?></td><td width="50px"><?php for($j=0; $j < $first_term_average_num_rows; $j++){if($id == $first_term_ID_Number[$j]){$first=$first_term_Average[$j]; echo $first_term_Average[$j];}}  ?></td><td width="50px"><?php $cum = $first; echo round($cum,2); ?></td><td width="20px"><?php //Note  ?></td><td width="50px"><?php for($m=0; $m < $first_term_average_num_rows; $m++){if($id == $first_term_ID_Number[$m]){$total=$first_term_total[$m]; echo round($total,2);}}  ?></td>
<td width="40px"> <?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 1 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 5 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 6 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 8 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 10 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 11 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 14 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td>
<td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 15 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 17 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 20 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 22 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td>
<td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 26 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 27 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td>
<td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 7 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td>
<!--<td width="40px"><?php //for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 24 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td>-->
</tr>

<?php
}
?>
</table>
<?php
}else{
// Act Class
?>
<table border="0" style="border-collapse:collapse;  " width="90%" >
<tr>
<td width="102px">Reg</td><td width="250px">Name</td><td width="30">N/s</td><td width="50px">1stAve</td><td width="50px">Cum</td><td width="20px">Trm</td><td width="50px">Total</td>
<td width="40px">Agric</td><td width="40px">Crs</td><td width="40px">C/s</td><td width="40px">C/Ed</td><td width="40px">Eng.</td><td width="40px">Econs</td><td width="40px">F/m</td><td width="40px">Geo</td><td width="40px">Gov</td><td width="40px">Haus</td><td width="40px">L/Eng.</td>
<td width="40px">Maths</td><td width="40px">F/Acc</td>
<td width="40px">Bio</td>
<!--<td width="40px">S/S</td>-->
</tr>
</table>
<hr color="#000000">




<?php
for($i=0; $i< $name_id_num_row; $i++){
$id = $id_number[$i];
?>
<table border="1" style="border-collapse:collapse;" width="90%">


<tr>
<td width="100px"><?php echo $id_number[$i]; ?></td><td width="250px"><?php echo $name[$i]; ?></td><td width="30"><?php for($m=0; $m < $first_term_average_num_rows; $m++){if($id == $first_term_ID_Number[$m]){$num_subj=$first_term_Num_Subj[$m]; echo $num_subj;}}  ?></td><td width="50px"><?php for($j=0; $j < $first_term_average_num_rows; $j++){if($id == $first_term_ID_Number[$j]){$first=$first_term_Average[$j]; echo $first_term_Average[$j];}}  ?></td><td width="50px"><?php $cum = $first; echo round($cum,2); ?></td><td width="20px"><?php $term ="1st"; echo $term;  ?></td><td width="50px"><?php for($m=0; $m < $first_term_average_num_rows; $m++){if($id == $first_term_ID_Number[$m]){$total=$first_term_total[$m]; echo round($total,2);}}  ?></td>
<td width="40px"> <?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 1 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 5 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 6 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 8 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 10 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 11 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 14 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td>
<td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 15 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 16 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 17 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 19 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td>
<td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 20 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td><td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 25 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td>
<td width="40px"><?php for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 26 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td>
<!--<td width="40px"><?php //for($x = 0; $x < $generate_num_row; $x++){if($Subject_ID[$x] == 24 && $id == $ID_Number[$x]){echo $Total[$x];}} ?></td>-->
</tr>

<?php
}
?>

</table>
<?php
}
?>
</br></br>
 <a href="print_master_list.php"> <input type="button"  value="Print This Page" onClick="window.print()"  /> 
</div>
<?php

}
}
?>

</body>
</html>

