<?php  
include'DB_connection.php';

$sql = mysql_query("Select * from reciept_no");
$num_row = mysql_num_rows($sql);
if($num_row > 0){
while($row=mysql_fetch_array($sql)){
 $reciept_no = $row['Reciept_No']; 
}

$reciept_no++;
echo "ok"; echo ","; echo $reciept_no;
}else{
$reciept_no = 1;
echo "ok"; echo ","; echo $reciept_no;
}
?>