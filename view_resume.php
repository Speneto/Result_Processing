<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Untitled Document</title>
</head>

<body>


<?php 
include"DB_connection.php";
if(isset($_GET['id'])){
$id = $_GET['id'];
echo $id;
$sql = mysql_query("SELECT Name, Type, Size, Content FROM upload WHERE ID_Number='$id'");
/*$row= mysql_fetch_array($sql);

 // Print headers
                header("Content-Type: ". $row['Type']);
                header("Content-Length: ". $row['Size']);
                header("Content-Disposition: attachment; filename=". $row['Name']);
 
                // Print data
                echo $row['Content'];*/

list($name, $type, $size, $content) = mysql_fetch_array($sql);
$content = stripslashes($content);
header("Content-length:  $size");
header("Content-Disposition: attachment; filename=$name");
header("Content-type:  $type");

header("Content-transfer-encoding: binary");
echo $content;
				
}else{
echo "Sorry Id Not Passed";
}

?>


</body>
</html>
