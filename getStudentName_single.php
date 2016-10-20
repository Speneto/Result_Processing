
<?php 
include_once 'DB_connection.php';
if(isset($_GET['param1'])){

$session = $_GET['param1'];
$class = $_GET['param2'];
$department = $_GET['param4'];
$term = $_GET['param3'];


$result = mysql_query("SELECT DISTINCT students.Name, score_sheet.ID_Number FROM students JOIN score_sheet ON students.ID_Number = score_sheet.ID_Number WHERE score_sheet.Session ='$session' AND score_sheet.Class='$class' AND score_sheet.Department='$department' AND score_sheet.Term='$term' ORDER BY students.Name ASC ");
//$generate = "SELECT students.ID_Number, students.Name, subject.Subjects, score_sheet.First, score_sheet.Second, score_sheet.Third, score_sheet.Fourth, score_sheet.Exams, score_sheet.Class FROM students JOIN score_sheet ON students.ID_Number = score_sheet.ID_Number JOIN subject ON subject.Subj_ID = score_sheet.Subj_ID WHERE score_sheet.Term ='FIRST TERM' ";
//$result = mysql_query("SELECT * FROM students WHERE Session ='$session' AND Class='$class' ORDER BY Name ASC ");

$textresult ="";
while($row = mysql_fetch_array($result)){
if($textresult ==""){
$textresult = $row['ID_Number']."-*-".$row['Name'];
}else{
$textresult .="xxx".$row['ID_Number']."-*-".$row['Name'];
}
}
echo $textresult;
}
?>