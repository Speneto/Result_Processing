
<?php 
include'DB_connection.php';
if(isset($_GET['param1'])){

$session =  trim(htmlspecialchars(strtoupper($_GET['param1'])));
$class =  trim(htmlspecialchars(strtoupper($_GET['param2'])));
$department = trim(htmlspecialchars(strtoupper($_GET['param3'])));

//$result = mysql_query("SELECT students.ID_Number, students.Name, FROM students JOIN current_class ON students.ID_Number = current_class.ID_Number WHERE current_class.Session ='$session' AND current_class.Class='$class' ORDER BY students.Name ASC ");
//$generate = "SELECT students.ID_Number, students.Name, subject.Subjects, score_sheet.First, score_sheet.Second, score_sheet.Third, score_sheet.Fourth, score_sheet.Exams, score_sheet.Class FROM students JOIN score_sheet ON students.ID_Number = score_sheet.ID_Number JOIN subject ON subject.Subj_ID = score_sheet.Subj_ID WHERE score_sheet.Term ='FIRST TERM' ";
$result = mysql_query("SELECT students.Name, current_class.ID_Number FROM students JOIN current_class ON students.ID_Number = current_class.ID_Number WHERE current_class.Session ='$session' AND current_class.Class='$class' AND current_class.Department='$department' ORDER BY students.Name ASC ");
//$result = mysql_query("SELECT students.Name, current_class.ID_Number FROM students JOIN current_class ON students.ID_Number = current_class.ID_Number WHERE current_class.Class = '$class'");
$textresult ="";
while($row = mysql_fetch_array($result)){
if($textresult == ""){
$textresult = $row['ID_Number']."-*-".$row['Name'];
}else{
$textresult .="xxx".$row['ID_Number']."-*-".$row['Name'];
}
}
echo $textresult;
}
?>