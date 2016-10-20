<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Promtion List</title>
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

<center><span class="style9">BRIGTH FUTURE SCHOOLS </span><br>
<div><?php echo (trim(htmlspecialchars(strtoupper($_POST['class'])))); echo '&nbsp;&nbsp;'; echo (trim(htmlspecialchars(strtoupper($_POST['term'])))); echo '&nbsp;&nbsp;'; echo(trim(htmlspecialchars(strtoupper($_POST['lstSession'])))); ?> PROMOTION LIST</div>
</br>

<?php 
include"DB_connection.php";
$class = trim(htmlspecialchars(strtoupper($_POST['class'])));
$term = trim(htmlspecialchars(strtoupper($_POST['term'])));
$session = trim(htmlspecialchars(strtoupper($_POST['lstSession'])));
$department = trim(htmlspecialchars(strtoupper($_POST['department'])));

//$class = "JSS1A";
//$term = "THIRD TERM";
//$session = "2015/2016";

//get first, second and third term averages into array
$first_term_average = mysql_query("Select ID_Number, Average, Num_Subj From final_score_sheet Where Session ='$session' AND Term ='FIRST TERM' AND Class='$class' AND Department='$department'");
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
$second_term_average = mysql_query("Select ID_Number, Average, Num_Subj From final_score_sheet Where Session ='$session' AND Term ='SECOND TERM' AND Class='$class' AND Department='$department'");
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
$third_term_average = mysql_query("Select ID_Number, Average, Num_Subj, Total From final_score_sheet Where Session ='$session' AND Term ='THIRD TERM' AND Class='$class' AND Department='$department'");
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
$name_id = mysql_query("Select DISTINCT score_sheet.ID_Number, students.Name From score_sheet JOIN students ON score_sheet.ID_Number=students.ID_Number WHERE score_sheet.Session='$session' AND score_sheet.Class='$class' AND score_sheet.Term='$term' AND score_sheet.Department='$department'");
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
?>

<table border="0" style="border-collapse:collapse;  " width="60%" >
<tr>
<td width="102px">Reg</td><td width="250px">Name</td><td width="50px">1stAve</td><td width="50px">2ndAve</td><td width="50px">3rdAve</td><td width="50px">CumAve</td><td width="80px">Comment</td></tr>

</table>
<hr color="#000000">


<?php
for($i=0; $i< $name_id_num_row; $i++){
$id = $id_number[$i];
?>
<table border="1" style="border-collapse:collapse;" width="60%">
<tr>
<td width="100px"><?php echo $id_number[$i]; ?></td><td width="250px"><?php echo $name[$i]; ?></td><td width="50px"><?php for($j=0; $j < $first_term_average_num_rows; $j++){if($id == $first_term_ID_Number[$j]){$first=$first_term_Average[$j]; echo $first_term_Average[$j];}}  ?></td><td width="50px"><?php for($k=0; $k < $second_term_average_num_rows; $k++){if($id == $second_term_ID_Number[$k]){$second=$second_term_Average[$k]; echo $second_term_Average[$k];}}  ?></td><td width="50px"><?php for($l=0; $l < $third_term_average_num_rows; $l++){if($id == $third_term_ID_Number[$l]){$third=$third_term_Average[$l]; echo $third_term_Average[$l];}}  ?></td>
<td width="50px"><?php if(empty($first) || $first == 0 && !empty($second) && $second !=0 && !empty($third) && $third !=0){$n = 2;}else if(empty($second) || $second == 0 && !empty($first) && $first !=0 && !empty($third) && $third !=0){$n=2;}else if(empty($third) || $third == 0 && !empty($first) && $first !=0 && !empty($second) && $second !=0){$n=2;}else{$n=3;}   $cum =($first + $second + $third)/$n; echo round($cum,2); ?></td>
<td width="90px">
<?php
$current_class = $class;
$end =  substr($class,4,1);
$promote_class = substr($class,0,4);

if($promote_class == "JSS3"){
$class = "SSS0";
}

$promoted_class = substr($class,3,1);
$promoted_class++;
$promoted_to = substr($class,0,3) . $promoted_class . $end;

//JSS1
if($promote_class =="JSS1" && $cum >= 35){
$answer = "promoted";
echo"Promoted" . " " . "to" . " " .  $promoted_to;
}elseif($promote_class =="JSS1" && $cum < 35){
$answer = "Not Promoted";
echo "Repeat" . " " . $current_class;
}
//JSS2
elseif($promote_class =="JSS2" && $cum >= 40){
$answer = "promoted";
echo"Promoted" . " " . "to" . " " .  $promoted_to;
}elseif($promote_class =="JSS2" && $cum < 40){
$answer = "Not Promoted";
echo "Repeat" . " " . $current_class;
}

//JSS3
/*
elseif($promote_class =="JSS3" && $cum >= 45){
$answer = "promoted";
echo"Promoted" . " " . "to" . " " .  $promoted_to;
}elseif($promote_class =="JSS3" && $cum < 45){
$answer = "Not Promoted";
echo "Repeat" . " " . $current_class;
}*/

//SSS1
elseif($promote_class =="SSS1" && $cum >= 45){
$answer = "promoted";
echo"Promoted" . " " . "to" . " " .  $promoted_to;
}elseif($promote_class =="SSS1" && $cum < 45){
$answer = "Not Promoted";
echo "Repeat" . " " . $current_class;
}
//SSS2
elseif($promote_class =="SSS2" && $cum >= 50){
$answer = "promoted";
echo"Promoted" . " " . "to" . " " .  $promoted_to;
}elseif($promote_class =="SSS2" && $cum < 50){
$answer = "Not Promoted";
echo "Repeat" . " " . $current_class;
}else{
// do nothing
}
?>
</td>
</tr>
<?php
// put promoted students into array and update current class
$promoted_session1 = substr($session,0,4);
$promoted_session2 = substr($session,5,4);
$promoted_session1++;
$promoted_session2++;
$promoted_session3 = $promoted_session1 . "/" . $promoted_session2;
if($answer == "promoted"){
$update_promoted = mysql_query("update current_class set Class='$promoted_to', Session='$promoted_session3', Term='FIRST TERM', Comment='$answer', Previous_Class='$current_class'  Where ID_Number='$id_number[$i]'");

}elseif($answer == "Not Promoted"){
$update_Not_promoted = mysql_query("update current_class set Class='$current_class', Session='$promoted_session3', Term='FIRST TERM',  Comment='$answer', Previous_Class='$current_class' Where ID_Number='$id_number[$i]'");

}
}
?>

</table>




</br></br>
 <a href="promotion.php"> <input type="button"  value="Print This Page" onClick="window.print()"  /> 
</div>
<?php

?>
</body>
</html>
