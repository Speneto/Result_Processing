<?php
include("DB_connection.php");
if(isset($_GET['studentid'])){
$student_id = $_GET['studentid'];
//echo $student_id;
//echo ("OK");
// $link=mysql_connect("localhost","root","") or die("Cannot Connect to the database!");
	
// mysql_select_db("ecwa",$link) or die ("Cannot select the database!");
//$result = mysql_query("select * from students Where ID_Number = '".$_GET['studentid']."' ");
$result = mysql_query("SELECT students.ID_Number, students.Name, students.State_of_Origin, students.LGA, students.Age, students.DOB, students.Nationality, students.Parent_Address, students.Parent_Phone, students.Place_of_Birth, students.Gender, students.Languages, students.Country_of_Residence, students.Father_Name, students.Religion, students.Occupation, students.Education_Level, students.No_Wife, students.Mother_Position, students.Sibling_No, students.Parent_Status, students.Nursery, students.Primary_School, students.Junior, current_class.Department, current_class.Class, current_class.Session, current_class.Term FROM students JOIN current_class ON students.ID_Number = current_class.ID_Number where  current_class.ID_Number = '".$_GET['studentid']."' ");

while($row = mysql_fetch_array($result)){

$ID_Number = $row['ID_Number'];
$Term = $row['Term'];
$Session = $row['Session'];
$Name = $row['Name'];
$Age = $row['Age'];
$DOB = $row['DOB'];
$Nationality = $row['Nationality'];
$State = $row['State_of_Origin'];
$LGA = $row['LGA'];
$Class = $row['Class'];
$department = $row['Department'];

$place_of_birth = $row['Place_of_Birth'];
$gender = $row['Gender'];
$languages = $row['Languages'];
$country_of_residence = $row['Country_of_Residence'];
$father_name = $row['Father_Name'];
$parent_address = $row['Parent_Address'];
$parent_phone = $row['Parent_Phone'];
$religion = $row['Religion'];
$occupation = $row['Occupation'];
$education_level = $row['Education_Level'];
$no_wife = $row['No_Wife'];
$mother_position = $row['Mother_Position'];
$sibling_no = $row['Sibling_No'];
$parent_status = $row['Parent_Status'];
$nursery = $row['Nursery'];
$primary = $row['Primary_School'];
$junior = $row['Junior'];


echo $ID_Number; echo "*"; echo $Term; echo"*"; echo $Session; echo "*"; echo $Name; echo"*"; echo $Age; echo"*"; echo $DOB; echo"*"; echo $Nationality; echo"*"; echo $State; echo"*"; echo $LGA; echo"*"; echo $Class; echo"*"; echo $department; echo"*"; echo $place_of_birth; echo "*"; echo $gender; echo"*"; echo $languages; echo "*"; echo $country_of_residence; echo"*"; echo $father_name; echo"*"; echo $parent_address; echo"*"; echo $parent_phone; echo"*"; echo $religion; echo"*"; echo $occupation; echo"*"; echo $education_level; echo"*"; echo $no_wife; echo"*"; echo $mother_position; echo"*"; echo $sibling_no; echo "*"; echo $parent_status; echo"*"; echo $nursery; echo "*"; echo $primary; echo"*"; echo $junior; 
}

}
mysql_close();
?>