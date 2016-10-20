<?php
//include("DB_connection.php");
if(isset($_GET['studentid'])){
$student_id = trim(htmlspecialchars(strtoupper($_GET['studentid'])));
$session_id = trim(htmlspecialchars(strtoupper($_GET['sessionid'])));
$class_id = trim(htmlspecialchars(strtoupper($_GET['classid'])));
$subject_id = trim(htmlspecialchars(strtoupper($_GET['subjectid'])));
$term_id = trim(htmlspecialchars(strtoupper($_GET['termid'])));
$department_id = trim(htmlspecialchars(strtoupper($_GET['departmentid'])));

 $link=mysql_connect("localhost","root","") or die("Cannot Connect to the database!");
	
 mysql_select_db("bright_future",$link) or die ("Cannot select the database!");
//echo $student_id;
//echo $session_id; echo $class_id; echo $subject_id; echo $term_id;
$result= mysql_query("SELECT * FROM score_sheet WHERE ID_Number = '$student_id' AND Session = '$session_id' AND Class = '$class_id' AND Subj_ID = '$subject_id' AND Term = '$term_id' AND Department='$department_id'");
//$result= mysql_query("SELECT * FROM score_sheet WHERE ID_Number = '$student_id'");
//$result = mysql_query("Select * From score_sheet Where ID_Number = '".$_GET['studentid']."'") or die("Could Not Select". mysql_error());
$num_rows = mysql_num_rows($result);
//echo $num_rows;
if ($num_rows > 0){
while($row = mysql_fetch_assoc($result)){

$first = $row['First'];
$second = $row['Second'];
$third = $row['Third'];
$fourth = $row['Fourth'];
$exams = $row['Exams'];
$comment = $row['Comment'];
}
}else{

$first = "";
$second = "";
$third = "";
$fourth = "";
$exams = "";
$comment = "No";
}
echo $first; echo ","; echo $second; echo","; echo $exams; echo","; echo $comment; 

}
//mysql_close();
?>