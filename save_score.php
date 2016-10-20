<?php 
include "DB_connection.php";

if(isset($_GET['studentid'])){

$student_id = trim(htmlspecialchars(strtoupper($_GET['studentid'])));
$session_id = trim(htmlspecialchars(strtoupper($_GET['sessionid'])));
$class_id = trim(htmlspecialchars(strtoupper($_GET['classid'])));
$term_id = trim(htmlspecialchars(strtoupper($_GET['termid'])));
$subject_id = trim(htmlspecialchars(strtoupper($_GET['subjectid'])));
$fca_id = trim(htmlspecialchars(strtoupper($_GET['fca'])));
$sca_id = trim(htmlspecialchars(strtoupper($_GET['sca'])));
//$tca_id = trim(htmlspecialchars(strtoupper($_GET['tca'])));
//frca_id = trim(htmlspecialchars(strtoupper($_GET['frca'])));
$ex_id = trim(htmlspecialchars(strtoupper($_GET['ex'])));
$comment_id = trim(htmlspecialchars(strtoupper($_GET['comment'])));
$department_id = trim(htmlspecialchars(strtoupper($_GET['department'])));

//echo $student_id; echo $session_id; echo $class_id; 
//echo $term_id; echo $subject_id; echo $fca_id; echo $sca_id; echo $ex_id; echo $comment_id; 
//echo $department_id;

if($fca_id == "" || $fca_id == null){
$fca_id = "0";
}

if($sca_id == "" || $sca_id == null){
$sca_id = "0";
}

if($tca_id == "" || $tca_id == null){
$tca_id = "0";
}

if($frca_id == "" || $frca_id == null){
$frca_id = "0";
}

if($ex_id == "" || $ex_id == null){
$ex_id = "0";
}

$total = $fca_id + $sca_id + $ex_id ;

$search = mysql_query("Select * From score_sheet WHERE ID_Number='$student_id' AND Session='$session_id' AND Class='$class_id' AND Term='$term_id' AND Subj_ID='$subject_id' AND Department='$department_id'");
$test = mysql_num_rows($search);
//if(mysql_num_rows($search) > 0){
if($test > 0){
while($row=mysql_fetch_array($search)){
$grand_total = $row['Total'];
}

if($grand_total >= 0 && $total != 0){
//Update Record
$update = mysql_query("Update score_sheet Set First='$fca_id', Second='$sca_id', Exams='$ex_id', Total='$total', Comment='$comment_id' WHERE ID_Number='$student_id' AND Session='$session_id' AND Class='$class_id' AND Term='$term_id' AND Subj_ID='$subject_id' AND Department='$department_id'");
echo "Student Record Updated Successfully";
}else{
echo "Student record is greater than zero /n You can not Update with all Zero records";
}


}else{
//Insert New Record
$Insert = mysql_query("INSERT INTO score_sheet (ID_Number, First, Second, Exams, Session, Class, Term, Subj_ID, Total, Comment, Department) VALUES ('$student_id', '$fca_id', '$sca_id', '$ex_id', '$session_id', '$class_id', '$term_id', '$subject_id', '$total', '$comment_id', '$department_id')");

echo "Student Record Inserted Successfully";
}


// Insert into final score sheet

$search1 = mysql_query("Select * From final_score_sheet WHERE ID_Number='$student_id' AND Session='$session_id' AND Class='$class_id' AND Term='$term_id' AND Department='$department_id'");
$test1 = mysql_num_rows($search1);
if($test1 > 0){
//Update Record
//$update1 = mysql_query("Update final_score_sheet Set(ID_Number, Total, Average, Num_Subj, Session, Class, Term) Select ID_Number, SUM(Total), AVG(Total), COUNT(Subj_ID), Session, Class, Term FROM score_sheet WHERE score_sheet.ID_Number = '$student_id'  AND score_sheet.Term='$term_id' AND score_sheet.Session='$session_id' AND score_sheet.Class='$class_id' GROUP BY score_sheet.ID_Number ");


$insert0 = mysql_query(" SELECT ID_Number, Total, Session, Class, Term, Department FROM score_sheet WHERE ID_Number = '$student_id'  AND Term='$term_id' AND Session='$session_id' AND Class='$class_id' AND Department='$department_id' ");
$sum0 =0;
$count0 = 0;
while($row0= mysql_fetch_array($insert0)){
$sum0 = $sum0 + $row0['Total'];
$count0 = $count0 + 1;
}
$avg0 = $sum0/$count0;
$Insert0 = mysql_query("Update final_score_sheet Set ID_Number='$student_id', Total='$sum0', Average='$avg0', Num_Subj='$count0', Session='$session_id', Class= '$class_id', Term='$term_id', Department='$department_id'  WHERE ID_Number = '$student_id'  AND Term='$term_id' AND Session='$session_id' AND Class='$class_id' AND Department='$department_id'");


}else{
//Insert New Record
//$Insert1 = "INSERT INTO final_score_sheet(ID_Number, Total, Average, Num_Subj, Session, Class, Term) SELECT ID_Number, SUM(Total), AVG(Total), COUNT(Subj_ID), Session, Class, Term FROM score_sheet WHERE score_sheet.ID_Number = '$student_id'  AND score_sheet.Term='$term_id' AND score_sheet.Session='$session_id' AND score_sheet.Class='$class_id' GROUP BY score_sheet.ID_Number ";
//mysql_query($Insert1) or die("Error" . mysql_error());

$insert1 = mysql_query(" SELECT ID_Number, Total, Session, Class, Term, Department FROM score_sheet WHERE ID_Number = '$student_id'  AND Term='$term_id' AND Session='$session_id' AND Class='$class_id' AND Department='$department_id' ");
$sum =0;
$count = 0;
while($row1= mysql_fetch_array($insert1)){
$sum = $sum + $row1['Total'];
$count = $count + 1;
}
$avg = $sum/$count;
$Insert2 = mysql_query("INSERT INTO final_score_sheet (ID_Number, Total, Average, Num_Subj,  Session, Class, Term, Department) VALUES ('$student_id', '$sum', '$avg', '$count', '$session_id', '$class_id', '$term_id', '$department_id')");
}

}
?>