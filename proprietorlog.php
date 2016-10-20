<?php
ob_start();

//include("config.php"); 

// connect to the mysql server 
    $username=$_POST['username'];
	$password=$_POST['password'];
	$destination = $_POST['destination'];

 $link=mysql_connect("localhost","root","") or die("Cannot Connect to the database!");
	
 mysql_select_db("bright_future",$link) or die ("Cannot select the database!");

$match = "select id from director where username = '".$_POST['username']."' and password = '".$_POST['password']."';"; 

$qry = mysql_query($match) or die ("Could not match data because ".mysql_error()); 
$num_rows = mysql_num_rows($qry); 

if ($num_rows <= 0) { 

		
echo  '<span style="color:#000000;text-align:center;"><b>Sorry, there is no username with the specified password.<br></span>'; 
echo "<a href=proprietor_login.php><b>Try again</a>"; 
exit; 
} else { 

setcookie("loggedin", "TRUE", time()+(3600 * 24));
//setcookie("mysite_username", "$username");
if($destination == "bursar"){
 echo "<script> window.open('bursarwelcome.php','_self')</script>";
 }else if($destination == "admin"){
   echo "<script> window.open('Admin.php','_self')</script>";
 }else{
    echo  '<span style="color:#000000;text-align:center;"><b>Sorry, Please Select Destination.<br></span>'; 
echo "<a href=proprietor_login.php><b>Try again</a>"; 
exit;  
 }
 }
	   exit();  
ob_end_flush();
?>