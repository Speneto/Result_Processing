   <?php
session_start();
?> 
    <?php  
      
    include("DB_connection.php");
	    if(isset($_POST['Submit'])){
	    $S_ID_Number = trim(htmlspecialchars(strtoupper($_POST['S_ID_Number'])));//same 
	    $ID_Number= trim(htmlspecialchars(strtoupper($_POST['ID_Number'])));//same
        $Session= trim(htmlspecialchars(strtoupper($_POST['Session'])));//same  
        $Term= trim(htmlspecialchars(strtoupper($_POST['Term'])));//same  
        $Name= trim(htmlspecialchars(strtoupper($_POST['Name'])));//same
	    $Age= trim(htmlspecialchars(strtoupper($_POST['Age'])));//same
		$Class= trim(htmlspecialchars(strtoupper($_POST['Class'])));//same 
		$DOB= trim(htmlspecialchars(strtoupper($_POST['DOB'])));//same  
        $Nationality= trim(htmlspecialchars(strtoupper($_POST['Nationality'])));//same
	    $State_of_Origin = trim(htmlspecialchars(strtoupper($_POST['State'])));//same
        $LGA = trim(htmlspecialchars(strtoupper($_POST['LGA'])));//same 
        $Parent_Address= trim(htmlspecialchars(strtoupper($_POST['Parent_Address'])));//same
	    $Parent_Phone= trim(htmlspecialchars(strtoupper($_POST['Parent_Phone'])));//same
		
		$department= trim(htmlspecialchars(strtoupper($_POST['department'])));//same
		$place_of_birth = trim(htmlspecialchars(strtoupper($_POST['place_of_birth'])));//same
		$gender = trim(htmlspecialchars(strtoupper($_POST['gender'])));//same
		$languages = trim(htmlspecialchars(strtoupper($_POST['languages'])));//same
		$country_of_residence = trim(htmlspecialchars(strtoupper($_POST['country_of_residence'])));//same
		$father_name = trim(htmlspecialchars(strtoupper($_POST['father_name'])));//same
		$religion = trim(htmlspecialchars(strtoupper($_POST['religion'])));//same
		$occupation = trim(htmlspecialchars(strtoupper($_POST['occupation'])));//same
		$education_level = trim(htmlspecialchars(strtoupper($_POST['education_level'])));//same
		$no_wife = trim(htmlspecialchars(strtoupper($_POST['no_wife'])));//same
		$mother_position = trim(htmlspecialchars(strtoupper($_POST['mother_position'])));//same
		$sibling_no = trim(htmlspecialchars(strtoupper($_POST['sibling_no'])));//same
		$parent_status = trim(htmlspecialchars(strtoupper($_POST['parent_status'])));//same
		$nursery = trim(htmlspecialchars(strtoupper($_POST['nursery'])));//same
		$primary_school = trim(htmlspecialchars(strtoupper($_POST['primary'])));//same
		$junior = trim(htmlspecialchars(strtoupper($_POST['junior'])));//same
		//Codes for Junior Classs------------------------------------------------------------------------------------------>
		//Codes for Junior Classs------------------------------------------------------------------------------------------>
		//Codes for Junior Classs------------------------------------------------------------------------------------------>
		// Checking For Class JSS1A and JSS1B 2015/2016
		//tessting code
	
	
		   if(!empty($ID_Number) && !empty($Session) && !empty($Term) && !empty($Name) && !empty($Age) && !empty($Class) && !empty($DOB) && !empty($Nationality) && !empty($State_of_Origin) && !empty($LGA) && !empty($Parent_Address) && !empty($Parent_Phone) ){
		
		    $search = mysql_query("Select * from students Where ID_Number ='$ID_Number'");
			
			if(mysql_num_rows($search) > 0){
			
			$query1= "Update students Set ID_Number='$ID_Number', Name='$Name', Age='$Age', DOB='$DOB', Nationality='$Nationality', State_of_Origin='$State_of_Origin', LGA='$LGA', Parent_Address='$Parent_Address', Parent_Phone='$Parent_Phone', Place_of_Birth='$place_of_birth', Gender='$gender', Languages='$languages', Country_of_Residence='$country_of_residence', Father_Name='$father_name', Religion='$religion', Occupation='$occupation', Education_Level='$education_level', No_Wife='$no_wife', Mother_Position='$mother_position', Sibling_No='$sibling_no', Parent_Status='$parent_status', Nursery='$nursery', Primary_School='$primary_school', Junior='$junior' Where ID_Number='$S_ID_Number'";                                                                                                                                                                                         
				 
				 //Testing codes
			$query2= "Update current_class Set ID_Number='$ID_Number', Class='$Class', Session='$Session', Term='$Term', Department='$department' Where ID_Number='$S_ID_Number'";	
			 
               
				 //end of tessting codes
				
		  if( mysql_query($query1) && mysql_query($query2) ){
		    
			echo("<script type='text/javascript'>\n");
          echo("alert('Student Record Updated Successfull!!!')");
			echo ("</script>");

		 
		  echo "<script> window.open('Update_student_info.php','_self')</script>";
			
		 
		 }else{
		 
	        echo(mysql_error());
			/*echo("<script type='text/javascript'>\n");
          echo("alert('An unexpected error occured while saving the record, Please try again!!!')");
			echo ("</script>");

		  echo "<script> window.open('Update_student_info.php','_self')</script>";*/
       
		  }

	   
	   
	      }else{
		         echo("<script type='text/javascript'>\n");
          echo("alert('Student Record Do Not Exits, Update not Successful!!!')");
			echo ("</script>");
			echo "<script> window.open('Update_student_info.php','_self')</script>";
		  }  
		  
		  }else{
		  
		   echo("<script type='text/javascript'>\n");
          echo("alert('Please all fields are required, Student Update not Successful!!!')");
			echo ("</script>");
			echo "<script> window.open('Update_student_info.php','_self')</script>";
		  
		  } 
	   
          }  
      
	  
	     ?>  