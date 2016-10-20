<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Register Form Teacher</title>
<style type="text/css">
<!--
.style1 {
	font-size: 36px;
	font-weight: bold;
	color: #0000FF;
}
-->
</style>
</head>

<body background="images/background.png">
<center>
  <span class="style1">Form Master Registration Panel</span>
</center>

<div style="margin-top:200px ">
<center>
<form action="<?php echo($_SERVER['PHP_SELF']) ?>" method="post">
  <table>
  <tr>
  <td>Full Name</td>
  <td><input type="text" name="name" id="name" placeholder="Please Enter Name" size="26"/></td>
  </tr>
  <tr>
  <td>User Name</td>
  <td><input type="text" name="username" id="username" placeholder="Please Enter User name" size="26" /></td>
  </tr>
  <tr>
  <td>User PassWord</td>
  <td><input type="password" name="userpassword" id="userpassword" placeholder="Please Enter User Pass word" size="26" /></td>
  </tr>
  <tr>
  <td>Department</td>
  <td>
  <select name="department" id="department" size="1">
  <option value="Please Select Department">Please Select Department</option>
  <option value="Basic Education">Basic Education</option>
  <option value="Commercial">Commercial</option>
  <option value="Humanities">Humanities</option>
  <option value="Science And Mathematics">Science And Mathematics</option>
  </select>
  </td>
  </tr>
  <tr>
  <td>Class</td>
  <td>
  <select name="class" id="class"  size="1"  onChange="LoadClass()">
<option  value="Please Select Class">Please Select Class</option>
            <option value="JSS1A">JSS1A</option>
		    <option value="JSS1B">JSS1B</option>
			<option value="JSS1C">JSS1C</option>
		    <option value="JSS2A">JSS2A</option>
		    <option value="JSS2B">JSS2B</option>
			<option value="JSS2C">JSS2C</option>
		    <option value="JSS3A">JSS3A</option>
		    <option value="JSS3B">JSS3B</option>
			<option value="JSS3C">JSS3C</option>
			<option value="SSS1A">SSS1A</option>
		    <option value="SSS1B">SSS1B</option>
			<option value="SSS1C">SSS1C</option>
		    <option value="SSS2A">SSS2A</option>
		    <option value="SSS2B">SSS2B</option>
			<option value="SSS2C">SSS2C</option>
		    <option value="SSS3A">SSS3A</option>
		    <option value="SSS3B">SSS3B</option>
			<option value="SSS3C">SSS3C</option>
</select>
  </td>
  </tr>
  <tr>
  <td>E-mail</td>
  <td><input type="text" name="email" id="email" placeholder="Please Enter E-mail"  size="26"/></td>
  </tr>
  </table>
  
  </br></br>
  <input type="submit" name="save" id="save" value="Click to Save Record"/>
  </form>
  <br/><br/>
   <a href="Admin.php"><img src="images/backred.png"></img></a>
  </center>
</div> 
 
 <?php 
 
 include'DB_connection.php';
if(isset($_POST['save'])){

    $full_name = trim(htmlspecialchars(strtoupper($_POST['name'])));
	$user_name = trim(htmlspecialchars($_POST['username']));
	$pass_word = md5(trim(htmlspecialchars($_POST['userpassword'])));
	$department =  trim(htmlspecialchars(strtoupper($_POST['department'])));
	$class =  trim(htmlspecialchars(strtoupper($_POST['class'])));
	$email =  trim(htmlspecialchars(strtoupper($_POST['email'])));
	
 
	
	if(empty($full_name)){
	   echo("<script type='text/javascript'>\n");
	  echo("alert('Please Enter Full Name')");
	  echo("</script>");
	  exit;
	}else if(empty($user_name)){
	   echo("<script type='text/javascript'>\n");
	   echo("alert('Please Enter User Name')");
	   echo("</script>");
	   exit;
	}else if(empty($pass_word)){
	   echo("<script type='text/javascript'>\n");
	   echo("alert('Please Enter User PassWord')");
	   echo("</script>");
	   exit;
	}else if($department == "PLEASE SELECT DEPARTMENT"){
	   echo("<script type='text/javascript'>\n");
	   echo("alert('Please Select Department')");
	   echo("</script>");
	   exit;
	 }else if($class == "PLEASE SELECT CLASS"){
	   echo("<script type='text/javascript'>\n");
	   echo("alert('Please Select Department')");
	   echo("</script>");
	   exit; 
	  }else if(empty($email)){
	   echo("<script type='text/javascript'>\n");
	   echo("alert('Please Enter E-mail')");
	   echo("</script>");
	   exit;
	  }else{
	  
	      $confirm = mysql_query("Select * From form_master_login Where User_Name='$user_name' AND Pass_Word='$pass_word'");
		   $num_row = mysql_num_rows($confirm);
		   echo $num_row;
		   if($num_row == 0){
		      $insert = mysql_query("Insert into form_master_login (Name, User_Name, Pass_Word, Department, Class, Email) VALUES ('$full_name', '$user_name', '$pass_word', '$department', '$class', '$email') ");
		       echo("<script type='text/javascript'>\n");
	   		  echo("alert('Record Saved Successfully !!!')");
	   		  echo("</script>");
	  		  exit;
		   }else{
		       echo("<script type='text/javascript'>\n");
	   		  echo("alert('User Name or PassWord Exits !!!')");
	   		  echo("</script>");
	  		  exit;
		   }   
	  
	  
	  }   

} 
 
 ?>
 
 
 
</body>
</html>
