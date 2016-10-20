 <?php
//session_start();

?>
<html>	 
<head>
<title>New Users</title>
</head>

<body background="1.gif" text="white" >
<br />
<br />

<blockquote>&nbsp;</blockquote>
<form action="<?php echo($_SERVER['PHP_SELF']); ?>"  method="post">
<Center>
<table border=0 CellPadding=5  border="black" background="AquaLoop Wallpaper Bk.jpg" WIDTH=10% text="blue" ><center>
<tr><td>
               <table border=0 CellPadding=5  border="black" background="3438593196_e91fcc6316.jpg" WIDTH=10% text="blue" >

        <tr  font face ="Britannic Bold" border="0" color="Red" size="500" ALIGN="CENTER">  <TH COLSPAN=4> <fieldset> Create New Users </fieldset></TH>
<th bgcolor="" colspan=2 align="right"><img src="indicator.GIF"  width="100" height="100" border="0"></th></TR>
        
		
  <div align="center" style="color:#000000">
  <tr>
 <td> Username	: <input type="text"  id="username" name="username" size="30" value=""></td></tr>
 <tr>
 <td>
  Password	:<input type="password" name="password" id="password" size="30"></td></tr>
  
  <tr>
 <td>
  Comfirm Password	:<input type="password" name="password2" id="password2" size="30"></td></tr>
  
  <tr><td colspan="2">
  <input type="submit" name="submit" id="submit" value="Create User"></br></br> 
  <a href="Admin.php"><img src="images/backred.png"></img></a>
  
  </td> </tr> 
  
  
  </div> 
 <!--<td&nbsp;&nbsp&nbsp;<a href="logInForm.php">Click here to Log-Out</a>&nbsp;&nbsp;&bull;&nbsp;&nbsp;  </td>-->
 
  </td></tr>
   
</form>
<?php 
include"DB_connection.php";
if(isset($_POST['submit'])){

	$username = htmlspecialchars(trim($_POST['username']));
	$password = htmlspecialchars(trim($_POST['password']));
	$password2 = htmlspecialchars(trim($_POST['password2']));
	
	//checking password exist
	$check = mysql_query("Select * From admin Where username='$username' AND password='$password'");
	$num_row = mysql_num_rows($check);
	if ($num_row > 0){
	  echo("<script type='text/javascript'>\n");
	  echo("alert('User Exist Please Use Different Credentials')");
	  echo("</script>");
	  exit();
	}
	
	
	if(empty($username) || empty($password) || empty($password2)){
	  echo("<script type='text/javascript'>\n");
	  echo("alert('All Fields Are Required')");
	  echo("</script>");
	  exit();
	}else if($password != $password2){
	  echo("<script type='text/javascript'>\n");
	  echo("alert('Password MissMatch Try Again')");
	  echo("</script>");
	  exit();
	}else{
		$sql = mysql_query("Insert into admin (username, password) VALUES ('".$username."', '".$password."')");
		if($sql){
	  echo("<script type='text/javascript'>\n");
	  echo("alert('User Added Succesfully')");
	  echo("</script>");
	  exit();
		}else{
	  echo("<script type='text/javascript'>\n");
	  echo("alert(' Error Occured Try Again')");
	  echo("</script>");
	  exit();
		}
	}
}


?>



</body>
</html>
