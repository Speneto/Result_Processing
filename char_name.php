<?php 
include'DB_connection.php';
$department = trim(htmlspecialchars(strtoupper($_GET['departmentid'])));
$class = trim(htmlspecialchars(strtoupper($_GET['classid'])));
$term = trim(htmlspecialchars(strtoupper($_GET['termid'])));
$session = trim(htmlspecialchars(strtoupper($_GET['sessionid'])));
//echo $department; echo $class; echo $term; echo $session;
$sql = mysql_query("Select students.Name, current_class.ID_Number From students JOIN current_class ON students.ID_Number=current_class.ID_Number Where current_class.Department='$department' AND current_class.Class='$class' AND current_class.Term='$term' AND current_class.session='$session' ORDER BY students.Name ASC");

echo '<select name="student_name" id="student_name"  size="1" width="200" onChange="LoadScore(this.value)" >';
	echo '<option value="">';
	echo 'Please Select Subject ';
	echo '</option>';
	 while($row= mysql_fetch_array($sql))
	{
	echo '<option value="'.$row['ID_Number'].'">';
	echo $row['Name'];
	echo'</option>';
	}
	echo'</select>';

?>