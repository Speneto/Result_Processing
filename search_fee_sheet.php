<?php 
if(isset($_POST['studentid'])){
include'DB_connection.php';
$student_id = trim(htmlspecialchars(strtoupper($_POST['studentid'])));
$class = trim(htmlspecialchars(strtoupper($_POST['classid'])));
$term = trim(htmlspecialchars(strtoupper($_POST['termid'])));
$session = trim(htmlspecialchars(strtoupper($_POST['sessionid'])));
$fees1 = trim(htmlspecialchars(strtoupper($_POST['feesid'])));
$sql1 = mysql_query("Select Name from students where ID_Number='$student_id'");
while ($row=mysql_fetch_array($sql1)){
$name = $row['Name'];
}

//echo $student_id; 
//echo $class; 
//echo $term; echo $session;

$sql2 = mysql_query("Select * from fees_sheet where ID_Number='$student_id' AND Class='$class' AND Term='$term' AND Session='$session'");
$num_row = mysql_num_rows($sql2);
if($num_row > 0){
while($row2=mysql_fetch_array($sql2)){
$first_payment = $row2['First_Payment'];
$second_payment = $row2['Second_Payment'];
$third_payment = $row2['Third_Payment'];
$balance = $row2['Balance'];

if(empty($second_payment)){
$second_payment = 0;
}
 
if(empty($third_payment)){
$third_payment = 0;
} 
 
 
}
}else{
$first_payment = 0;
$second_payment = 0;
$third_payment = 0;
$balance = $fees1;
}

echo "ok"; echo ","; echo $name; echo ","; echo $first_payment; echo ","; echo $second_payment; echo ","; echo $third_payment; echo ","; echo $balance;   
}


?>