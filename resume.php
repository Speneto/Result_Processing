<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Upload resume</title>
</head>

<body>
<center><font color="#FF0000">
<h1>BRIGHT FUTURE HIGH SCHOOL<br> Upload/Update Resume </h1>
</font>
</center>

<div style="margin-top:70px; margin-left:500px ">

<form action="<?php echo ($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data" >
Enter Employee ID_Number : <br/>
<input type="text" name="id_number" id="id_number"/>  <br/><br/>
Select Resume : <br/>
<input type="file" name="file" /> <br/><br/>
<input type="submit" name="submit" value="Upload/Update Resume" />
</form>

</div>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) == 'Upload/Update Resume')
{
include'DB_connection.php';
$id_number = $_POST['id_number'];
//var_export($_POST); 
$allowedExts = array("pdf", "doc", "docx");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

$filename = $_FILES["file"]["name"];
$file_ext = substr($filename, strripos($filename, '.')); // get file name
$newfilename = $id_number.$file_ext;

if ((($_FILES["file"]["type"] == "application/pdf") || ($_FILES["file"]["type"] == "application/msword") || ($_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")) && ($_FILES["file"]["size"] < 2000000) && in_array($extension, $allowedExts) && !empty($id_number))
  
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
	echo"<div  style='margin-top:20px; margin-left:500px'>";
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
	echo"</div>";
    
    if (file_exists("resume/" . $_FILES["file"]["name"]))
      {
	  echo"<div  style='margin-top:20px; margin-left:500px'>";
      echo $_FILES["file"]["name"] . " already exists. ";
	   move_uploaded_file($_FILES["file"]["tmp_name"], "resume/" . $newfilename);
      echo "Resume Updated, Stored in: " . "resume/" . $_FILES["file"]["name"];
	  echo"</div>";
	  
      $sql = mysql_query("update upload set Name='".$_FILES["file"]["name"]."', New_Name='$newfilename' where ID_Number ='$id_number'");
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"], "resume/" . $newfilename);
	  echo"<div  style='margin-top:20px; margin-left:500px'>";
      echo "Stored in: " . "resume/" . $_FILES["file"]["name"];
	   echo"</div>";
      $sql = mysql_query("Insert Into upload (ID_Number, Name, New_Name) VALUES ('$id_number', '".$_FILES["file"]["name"]."', '$newfilename')");
      }
    }
  }
else
  {
  echo "<div  style='margin-top:20px; margin-left:500px'> <font color='red'> Please Enter Employee ID_Number and Choose a File to Upload </font></div>";
  }
}
?>

<br/><br/><br/><br/><br/>
<center>
<hr color="red" size="8"><br><a href="staffwelcome.php"><img src="images/backred.png"></img><br>
</center>
</body>
</html>
