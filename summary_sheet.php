<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Summart sheet</title>

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
<center>
<span class="style9">BRIGHT FUTURE HIGH SCHOOL </span><br>
<b  style="size:100px; color:#FF6666 ">STUDENT'S RESULT SUMMARY  SHEET</b>
<div>
Session : <?php  echo  $_POST['lstSession']; ?> &nbsp; &nbsp; &nbsp; Term : <?php  echo  $_POST['term']; ?> &nbsp; &nbsp; &nbsp; Class : <?php  echo  $_POST['class']; ?> &nbsp; &nbsp; &nbsp; Department : <?php  echo  $_POST['department']; ?> 
</div>
</center>



<?php 
include "DB_connection.php";

$class = $_POST['class'];
$session = $_POST['lstSession'];
$term = $_POST['term'];
$department = $_POST['department'];


//$generate = "SELECT students.ID_Number, students.Name, subject.Subjects, subject.Subj_ID, score_sheet.First, score_sheet.Second, score_sheet.Third, score_sheet.Fourth, score_sheet.Exams FROM score_sheet JOIN students ON students.ID_Number = score_sheet.ID_Number JOIN subject ON score_sheet.Subj_ID = subject.Subj_ID ";

//$generate = "SELECT students.ID_Number, students.Name, subject.Subjects, score_sheet.First, score_sheet.Second, score_sheet.Third, score_sheet.Fourth, score_sheet.Exams FROM students JOIN score_sheet ON students.ID_Number = score_sheet.ID_Number JOIN subject ON subject.Subj_ID = score_sheet.Subj_ID ";

//$generate = "SELECT students.ID_Number, students.Name, score_sheet.First, score_sheet.Second, score_sheet.Third, score_sheet.Fourth, score_sheet.Exams, subject.Subjects, subject.Subj_ID FROM students JOIN score_sheet ON students.ID_Number = score_sheet.ID_Number JOIN subject ON subject.Subj_ID = score_sheet.Subj_ID GROUP BY students.ID_Number, score_sheet.Subj_ID";



//$generate = "SELECT students.ID_Number, students.Name, score_sheet.First, score_sheet.Second, score_sheet.Third, score_sheet.Fourth, score_sheet.Exams, score_sheet.Class, score_sheet.Term, score_sheet.Session, subject.Subjects, subject.Subj_ID FROM students JOIN score_sheet ON students.ID_Number = score_sheet.ID_Number JOIN subject ON subject.Subj_ID = score_sheet.Subj_ID Where score_sheet.Session='$session' And score_sheet.Term='$term' And score_sheet.Class='$class' GROUP BY students.ID_Number, score_sheet.Subj_ID ORDER BY students.Name ASC";
$generate = "SELECT students.ID_Number, students.Name, score_sheet.First, score_sheet.Second, score_sheet.Exams, score_sheet.Class, score_sheet.Term, score_sheet.Session, subject.Subjects, subject.Subj_ID FROM students JOIN score_sheet ON students.ID_Number = score_sheet.ID_Number JOIN subject ON subject.Subj_ID = score_sheet.Subj_ID Where score_sheet.Session='$session' And score_sheet.Term='$term' And score_sheet.Class='$class'  And score_sheet.Department='$department' GROUP BY students.ID_Number, score_sheet.Subj_ID ORDER BY students.Name ASC";
$fetch = mysql_query($generate);
$sn = mysql_num_rows($fetch);

$previousId = -1;
while($row = mysql_fetch_array($fetch) or die(mysql_error())){
//echo $previousId;
//echo "</br>";
if($row['ID_Number'] != $previousId ){



// New Student Show Name and other Info

?>


<div style="margin-left:350px ">

<table border="1" cellpadding="0" cellspacing="0" >
</br></br>
<tr>
<td> <?php echo "***" . $row['Name'] . "***"; ?> </td>
</tr>
<tr>
<td> <?php echo "***" . $row['ID_Number'] . "***"; ?> </td>
</tr>

<?php 
//$previousId = $row['ID_Number'];

 ?>


</table>
 
 <table border="1" width="70%" cellpadding="0" cellspacing="0">
    <tr><th width="50%">SUBJECT</th><th width="10%">FIRST</th><th width="10%">SECOND</th><th width="10%">EXAMS</th></tr>
 
 <?php
 $previousId = $row['ID_Number'];
}
?>

 
 <tr><td width="50%" > <?php echo $row['Subjects']; ?> </td>
<td width="10%"><?php echo $row['First']; ?> </td>
<td width="10%"><?php echo $row['Second']; ?> </td>
<td width="10%"><?php echo $row['Exams']; ?> </td>
</tr>



<?php



$sn = $sn - 1;
if($sn == 0){
echo'</table>';
echo'</br></br></br>';
echo'<div  style="margin-left:400px "><a href="print_summary_sheet.php"> <input type="button" name="print" id="print" value="Click to print"  onClick="window.print()" /></a> </div>';
echo'</div>';
}
}


?>





</body>
</html>
