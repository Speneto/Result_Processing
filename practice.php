<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Untitled Document</title>
</head>

<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<select name="color[]" size="2" multiple>
<option value="blue">Blue</option>
<option value="red">Red</option>
<option value="green">Green</option>
<option value="" selected>Select a Color</option>
<option value="white">White</option> 
</select>
</br>
<input type="submit" name="submit" id="submit" value="Submit" >
</br>

<?php 
if (isset($_POST['submit'])){
$con = "";
$color = $_POST['color'];
if(is_array($color)){
while(list($key, $val)= each($color)){
echo"$val </br>";
$con .= $val .",";
}
}else{

echo "Not Array";
}

echo $con;

}

?>
</form>



</body>
</html>
