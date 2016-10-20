
 <?php 
	// $id=$_POST['id'];
	
	  include"DB_connection.php";
	  
	 $username= trim($_POST['user_name']); 
	 $Password= trim($_POST['pass']);
	 $Email= trim(strtoupper($_POST['email'])); 
	 $Phone_number= trim(htmlspecialchars(strtoupper($_POST['phone'])));
	 $State_of_Origin= trim(htmlspecialchars(strtoupper($_POST['state']))); 
	 $Address= trim(htmlspecialchars(strtoupper($_POST['address'])));
	 $Full_name= trim(htmlspecialchars(strtoupper($_POST['name'])));
	  $registration_no= trim(htmlspecialchars(strtoupper($_POST['registration_no'])));
	   $DOB= trim(htmlspecialchars(strtoupper($_POST['DOB'])));
	    $place_of_birth= trim(htmlspecialchars(strtoupper($_POST['place_of_birth'])));
		 $gender= trim(htmlspecialchars(strtoupper($_POST['gender'])));
		  $lga= trim(htmlspecialchars(strtoupper($_POST['lga'])));
		   $languages= trim(htmlspecialchars(strtoupper($_POST['languages'])));
		    $religion= trim(htmlspecialchars(strtoupper($_POST['religion'])));
			 $nationality= trim(htmlspecialchars(strtoupper($_POST['nationality'])));
			  $country_of_residence= trim(htmlspecialchars(strtoupper($_POST['country_of_residence'])));
			   $qualification= trim(htmlspecialchars(strtoupper($_POST['qualification'])));
			    $years_of_experience= trim(htmlspecialchars(strtoupper($_POST['years_of_experience'])));
				 $starting_salary= trim(htmlspecialchars(strtoupper($_POST['starting_salary'])));
				  $present_salary= trim(htmlspecialchars(strtoupper($_POST['present_salary'])));
	  $subject1=$_POST['subject1']; 
	  $subject2= $_POST['subject2'];
	  $subject3= $_POST['subject3'];
	  
	  if(!empty($username) && !empty($Password) && !empty($Email) && !empty($Phone_number) && !empty($State_of_Origin) && !empty($Address) && !empty($Full_name)  ){
	  
     
	
	 $search = mysql_query("Select * from teacher_login Where Password ='$Password'");
	 if(mysql_num_rows($search) <= 0){
	 
	$query= mysql_query("INSERT INTO teacher_login (User_name, Password, Email, Phone_number, State_of_Origin, Address, Full_name, Subject1, Subject2, Subject3, Registration_No, DOB, Place_of_Birth, Gender, LGA, Languages, Religion, Nationality, Country_of_Residence, Qualification, Years_of_Experience, Starting_Salary, Present_Salary) VALUES ('".$username."','".$Password."','".$Email."','".$Phone_number."','". $State_of_Origin."','".$Address."','".$Full_name."','".$subject1."','".$subject2."','".$subject3."','".$registration_no."','".$DOB."','".$place_of_birth."','".$gender."','".$lga."','".$languages."','".$religion."','".$nationality."','".$country_of_residence."','".$qualification."','".$years_of_experience."','".$starting_salary."','".$present_salary."')");
				
		
		  if(!$query)
		  {
		  echo(mysql_error());
		  die;
		  //die ("An unexpected error occured while saving the record, Please try again!");
		  } else{
		 
		  echo("<script type='text/javascript'>\n");
echo("alert('Registration Successfull!!!')");
echo ("</script>");

	     echo "<script> window.open('Registration.html','_self')</script>";
}		 
		 
   }else{
      
		         echo("<script type='text/javascript'>\n");
          echo("alert('User PassWord Already Exit, Registration not Successful!!!')");
			echo ("</script>");
			echo "<script> window.open('Registration.html','_self')</script>";
   }
   }else{
    
      echo("<script type='text/javascript'>\n");
          echo("alert('Please All Fields are required, Registration not Successful!!!')");
			echo ("</script>");
			echo "<script> window.open('Registration.html','_self')</script>";
   }		 
	 ?>
