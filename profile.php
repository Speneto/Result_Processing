<?php 
session_start();
$user_name = $_SESSION["user_name"];
$pass_word = $_SESSION["pass_word"]; 
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Emplyee Profile</title>
</head>

<body background="images/background.png">

<?php 
include"DB_connection.php";

$sql = mysql_query("Select * from teacher_login Where User_Name='$user_name' AND Password='$pass_word'");
while($row = mysql_fetch_array($sql)){
$reg_no = $row['Registration_No'];
$user_name = $row['User_Name'];
$email = $row['Email'];
$state = $row['State_of_Origin'];
$address = $row['Address'];
$phone = $row['Phone_number'];
$name = $row['Full_name'];
$dob =  $row['DOB'];
$place = $row['Place_of_Birth'];
$gender = $row['Gender'];
$lga = $row['LGA'];
$languages = $row['Languages'];
$religion = $row['Religion'];
$nationality = $row['Nationality'];
$country = $row['Country_of_Residence'];
$qualification = $row['Qualification'];
$years = $row['Years_of_Experience'];
$s_salary = $row['Starting_Salary'];
$p_salary = $row['Present_Salary'];
}
$reg_no = "00006";
?>




<center><h1><font color="#FF0000">BRIGHT FUTURE HIGH SCHOOL</font></h1>
<h3>EMPLOYEE PROFILE</h3>
</center>
<center>
<div style="margin-top:40px ">
<table cellpadding="5" cellspacing="3" border="1" style="border-collapse:collapse " width="70%">
<tr><td width="25%">Employee No :</td><td width="45%"><?php echo $reg_no ;?> </td> </tr>
<tr><td>User-Name :</td><td><?php echo $user_name; ?></td></tr>
<tr><td>Email :</td><td><?php echo $email ; ?></td></tr>
<tr><td>State :</td><td><?php echo $state ; ?></td></tr>
<tr><td>Address :</td><td> <?php echo $address; ?></td></tr>
<tr><td>Phone-Number :</td><td> <?php echo $phone; ?></td></tr>
<tr><td>Name :</td><td> <?php echo $name; ?></td></tr>
<tr><td>DOB :</td><td> <?php echo $dob ; ?></td></tr>
<tr><td>Place of Birth :</td><td> <?php echo $place; ?></td></tr>
<tr><td>Gender :</td><td> <?php echo $gender; ?></td></tr>
<tr><td>LGA :</td><td> <?php echo $lga; ?></td></tr>
<tr><td>Languages :</td><td> <?php echo $languages; ?></td></tr>
<tr><td>Religion :</td><td> <?php echo $religion; ?></td></tr>
<tr><td>Nationality :</td><td> <?php echo $nationality; ?></td></tr>
<tr><td>Country of Residence :</td><td> <?php echo $country ; ?></td></tr>
<tr><td>Qualification :</td><td> <?php echo $qualification; ?></td></tr>
<tr><td>Years :</td><td> <?php echo $years; ?></td></tr>
<tr><td>Starting Salary :</td><td> <?php echo $s_salary; ?></td></tr>
<tr><td>Present Salary :</td><td> <?php echo $p_salary; ?></td></tr>
</table>
</div>
</center>

<?php 
$sql1 = mysql_query("Select * from upload Where ID_Number= '$reg_no' ");
while($row1 = mysql_fetch_array($sql1)){
?>

<br/>
<center>
<table cellpadding="5" cellspacing="3" style="border:1px solid #808080;" width="70%">
<tr>
<td class="blaaa"><b>Resume</b></td><td class="blaaa"><a href="resume/<?php echo $row1['New_Name']; ?>" target="_blank">Click Here To View</a></td></tr>
<?php
}
?>
</table>
</center>
</body>
</html>
