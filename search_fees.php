<?php 
include 'DB_connection.php';

if (isset($_GET['param1'])){
$term = trim(htmlspecialchars(strtoupper($_GET['param1'])));
$session = trim(htmlspecialchars(strtoupper($_GET['param2'])));
$class = trim(htmlspecialchars(strtoupper($_GET['param3'])));
	
$sql = mysql_query("Select Fees from school_fees where Term='$term' AND Session='$session' AND Class='$class'");
$num_rows = mysql_num_rows($sql);
if($num_rows > 0){
 while($row=mysql_fetch_array($sql)){
 $fees = $row['Fees'];
 }
 
echo"ok"; echo","; echo $fees; 

}else{
//
}

}


?>