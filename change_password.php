 <?php
session_start();

?>
<html>	 
<head>
<title>Change Access</title>
</head>

<body background="1.gif" text="white" >
<br />
<br />
<br />

<blockquote>&nbsp;</blockquote>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<Center>
<table border=0 CellPadding=5  border="black" background="AquaLoop Wallpaper Bk.jpg" WIDTH=10% text="blue" ><center>
<tr><td>
               <table border=0 CellPadding=5  border="black" background="3438593196_e91fcc6316.jpg" WIDTH=10% text="blue" >

        <tr  font face ="Britannic Bold" border="0" color="Red" size="500" ALIGN="CENTER">  <TH COLSPAN=4> <fieldset> Change Users Access </fieldset></TH>
<th bgcolor="" colspan=2 align="right"><img src="indicator.GIF"  width="100" height="100" border="0"></th></TR>
        
		
  <div align="center" style="color:#000000">
  
  <tr>
 <td> Category	: 
    <select id="category" name="category" size="1" >
	<option value="">Please Select Category</option>
	<option value="admin">Change Admin Access</option>
	<option value="bursar">Change Bursar Access</option>
	<option value="staff">Change Staff Access</option>
	<option value="form master">Change Form Master Access</option>
	<option value="proprietor">Change Proprietor Access</option>
	</select>
 </td>
 </tr>
  
  <tr>
 <td> Old PassWord	: <input type="text" name="old_pass" id="old_pass" size="30"  placeholder="Enter Old PassWord"></td></tr>
 <tr>
 <td>
  New Password	:<input type="password" name="new_pass" id="new_pass" size="30" placeholder="Enter New PassWord"></td></tr>
  <td>
  Confirm New Password	:<input type="password" name="confirm_pass" id="confirm_pass" size="30" placeholder="Confirm New PassWord"></td></tr>
  <tr><td colspan="2">
  <input name="submit" type="submit" value="Change Access"></br></br> 
  <a href="index.php"><img src="images/backred.png"></img></a>
  
  </td> </tr> 
  
  
  </div> 
 <!--<td&nbsp;&nbsp&nbsp;<a href="logInForm.php">Click here to Log-Out</a>&nbsp;&nbsp;&bull;&nbsp;&nbsp;  </td>-->
 
  </td></tr>
   
</form>

<?php 
if(isset($_POST['submit']) && !empty($_POST['category']) && !empty($_POST['old_pass']) && !empty($_POST['new_pass']) && !empty($_POST['confirm_pass'])){
include'DB_connection.php';
$category = $_POST['category'];
$old_pass =  $_POST['old_pass'];
$new_pass =  $_POST['new_pass'];
$confirm_pass =  $_POST['confirm_pass'];
//echo $new_pass;
//echo $confirm_pass;
 if($new_pass == $confirm_pass){ 

if($category == "admin" || $category == "bursar" || $category == "proprietor"){


	$check1 = mysql_query("Select * From admin Where password ='$old_pass'");
	$num_row = mysql_num_rows($check1);
	if($num_row <=0){
	  echo"<script type='text/javascript'>\n";
	  echo"alert('Old PassWord Not Found In DataBase')";
	  echo"</script>";
      exit;
	}else{
		$update1 = mysql_query("Update admin Set password = '$new_pass' Where password ='$old_pass'");
		echo"<script type='text/javascript'>\n";
		echo"alert('PassWord Changed Successfully')";
		echo"</script>";
		exit;
	}
	
}else if($category == "form master"){
	$check1 = mysql_query("Select * From form_master_login Where Pass_Word ='$old_pass' ");
	$num_row = mysql_num_rows($check1);
	if($num_row <=0){
	  echo"<script type='text/javascript'>\n";
	  echo"alert('Old PassWord Not Found In DataBase')";
	  echo"</script>";
      exit;
	}else{
		$update1 = mysql_query("Update form_master_login Set Pass_Word = '$new_pass' Where Pass_Word ='$old_pass'");
		echo"<script type='text/javascript'>\n";
		echo"alert('PassWord Changed Successfully')";
		echo"</script>";
		exit;
	}

}else if($category == "staff"){
    $check1 = mysql_query("Select * From teacher_login Where Password ='$old_pass'");
	$num_row = mysql_num_rows($check1);
	if($num_row <=0){
	  echo"<script type='text/javascript'>\n";
	  echo"alert('Old PassWord Not Found In DataBase')";
	  echo"</script>";
      exit;
	}else{
		$update1 = mysql_query("Update teacher_login Set Password = '$new_pass' Where Password ='$old_pass'");
		echo"<script type='text/javascript'>\n";
		echo"alert('PassWord Changed Successfully')";
		echo"</script>";
		exit;
	}


}else{
// Do Nothing
}

}else{
echo"<script type='text/javascript'>\n";
echo"alert('PassWord MissMatch!!!')";
echo"</script>";
exit;
}
		
		
}else{
/*echo"<script type='text/javascript'>\n";
echo"alert('All fields are required!!!')";
echo"</script>";
exit;
*/
}


?>


</body>
</html>
