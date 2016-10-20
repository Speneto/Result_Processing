<?php 
if(isset($_POST['studentid'])){
include'DB_connection.php';
$student_id = trim(htmlspecialchars(strtoupper($_POST['studentid'])));
$class = trim(htmlspecialchars(strtoupper($_POST['classid'])));
$term = trim(htmlspecialchars(strtoupper($_POST['termid'])));
$session = trim(htmlspecialchars(strtoupper($_POST['sessionid'])));
$fees1 = trim(htmlspecialchars(strtoupper($_POST['feesid'])));
$first = trim(htmlspecialchars(strtoupper($_POST['firstid'])));
$second = trim(htmlspecialchars(strtoupper($_POST['secondid'])));
$third = trim(htmlspecialchars(strtoupper($_POST['thirdid'])));
$reciept = trim(htmlspecialchars(strtoupper($_POST['recieptid'])));
$clas = trim(htmlspecialchars(strtoupper($_POST['clas_id'])));
$department = trim(htmlspecialchars(strtoupper($_POST['department'])));

$date =  date("Y-m-d");
$balance = $fees1 - ($first + $second + $third);


$sql1 = mysql_query("Select * from fees_sheet where ID_Number='$student_id' AND Class='$class' AND Term='$term' AND Session='$session'");
$num_row = mysql_num_rows($sql1);
if($num_row > 0){
while($row1=mysql_fetch_array($sql1)){
$first_payment = $row1['First_Payment'];
$second_payment = $row1['Second_Payment'];
$third_payment = $row1['Third_Payment'];
}
if(empty($second_payment) || $second_payment == null){
$update1 = mysql_query("Update fees_sheet set Second_Payment='$second', S_Reciept_No='$reciept', S_Date='$date', Balance='$balance' where ID_Number='$student_id' AND Class='$class' AND Term='$term' AND Session='$session'");
}else{
$update2 = mysql_query("Update fees_sheet set Third_Payment='$third', T_Reciept_No='$reciept', T_Date='$date',  Balance='$balance'  where ID_Number='$student_id' AND Class='$class' AND Term='$term' AND Session='$session'");
}


}else{
$insert = mysql_query("Insert into fees_sheet (ID_Number, First_Payment, F_Reciept_No, F_Date, Balance, Class, Term, Session, Clas, Department) VALUES ('$student_id', '$first', '$reciept', '$date', '$balance', '$class', '$term', '$session', '$clas', '$department') ");
}



$sql10 = mysql_query("Select * from reciept_no");
$num_row10 = mysql_num_rows($sql10);
if($num_row10 > 0){
$update10 = mysql_query("Update reciept_no set Reciept_no='$reciept'");
}else{
$insert10 = mysql_query("Insert into reciept_no (Reciept_No) VALUES ('$reciept')");
}
  
}

?> 