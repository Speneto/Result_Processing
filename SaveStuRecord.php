    <?php
//session_start();
?> 
    <?php  
      
    include("DB_connection.php");
	    if(isset($_POST['Submit'])){
	
	    $ID_Number= trim(htmlspecialchars(strtoupper($_POST['ID_Number'])));//same
        $Session= trim(htmlspecialchars(strtoupper($_POST['Session'])));//same  
        $Term= trim(htmlspecialchars(strtoupper($_POST['Term'])));//same  
        $Name= trim(htmlspecialchars(strtoupper($_POST['Name'])));//same
	    $Age= trim(htmlspecialchars(strtoupper($_POST['Age'])));//same
		$Class= trim(htmlspecialchars(strtoupper($_POST['Class'])));//same 
		$DOB= trim(htmlspecialchars(strtoupper($_POST['DOB'])));//same  
        $Nationality= trim(htmlspecialchars(strtoupper($_POST['Nationality'])));//same
	    $State_of_Origin= trim(htmlspecialchars(strtoupper($_POST['State_of_Origin'])));//same
        $LGA= trim(htmlspecialchars(strtoupper($_POST['LGA'])));//same 
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
		
		/*echo $ID_Number; echo $Session; echo $Term;  echo $Name; echo $Class; echo $DOB; echo $Nationality; echo $State_of_Origin;
		echo $LGA; echo $Parent_Address; echo $department; echo $place_of_birth; echo gender; echo $languages; echo $country_of_residence;
		echo $father_name; echo $religion; echo $occupation; echo $education_level; echo $no_wife; echo $mother_position; echo $sibling_no;
		echo $parent_status; echo $nursery; echo $primary; echo $junior; */
		
		
		//Codes for Junior Classs------------------------------------------------------------------------------------------>
		//Codes for Junior Classs------------------------------------------------------------------------------------------>
		//Codes for Junior Classs------------------------------------------------------------------------------------------>
		// Checking For Class JSS1A and JSS1B 2015/2016
		//tessting code
	
	
		  if(!empty($ID_Number) && $Session != "SELECT ACADEMIC SESSION" && $Term != "SELECT TERM PLEASE" && !empty($Name) && !empty($Age) && $Class !="SELECT CLASS PLEASE" && !empty($DOB) && !empty($Nationality) && !empty($State_of_Origin) && !empty($LGA) && !empty($Parent_Address) && !empty($Parent_Phone) ){
		
		    $search = mysql_query("Select * from students Where ID_Number ='$ID_Number'");
			if(mysql_num_rows($search) <= 0){
			 if ($Term == "SECOND TERM"){
			 
			 $student_id = $ID_Number;
			 $session_id = $Session ;
			 $class_id = $Class ;
			 $term_id = "FIRST TERM" ;
			 $subject_id = 20;
			 $subject_id1 = 10;
			 $fca_id =  0;
			 $sca_id = 0;
			 $tca_id = 0;
			 $frca_id = 0 ;
			 $ex_id = 0;

			$Insert = mysql_query("INSERT INTO score_sheet (ID_Number, First, Second, Third, Fourth, Exams, Session, Class, Term, Subj_ID, Department) VALUES ('$student_id', '$fca_id', '$sca_id', '$tca_id', '$frca_id', '$ex_id', '$session_id', '$class_id', '$term_id', '$subject_id', '$department')");
			$Insert1 = mysql_query("INSERT INTO score_sheet (ID_Number, First, Second, Third, Fourth, Exams, Session, Class, Term, Subj_ID, Department) VALUES ('$student_id', '$fca_id', '$sca_id', '$tca_id', '$frca_id', '$ex_id', '$session_id', '$class_id', '$term_id', '$subject_id1', '$department')");
			}
			
			
				 //Testing codes
			$query1= mysql_query("Insert into students (ID_Number, Session, Term, Name, State_of_Origin, LGA, DOB, Class, Parent_Address,  Parent_Phone,  Nationality, Age, Department, Place_of_Birth, Gender, Languages, Country_of_Residence, Father_Name, Religion, Occupation, Education_Level, No_Wife, Mother_Position, Sibling_No, Parent_Status, Nursery, Primary_School, Junior) VALUES ('$ID_Number', '$Session', '$Term', '$Name', '$State_of_Origin', '$LGA', '$DOB', '$Class', '$Parent_Address', '$Parent_Phone', '$Nationality', '$Age', '$department', '$place_of_birth', '$gender', '$languages', '$country_of_residence', '$father_name', '$religion', '$occupation', '$education_level', '$no_wife', '$mother_position', '$sibling_no', '$parent_status', '$nursery', '$primary_school', '$junior')");
				 //Testing codes	
	        
			$query2= mysql_query("Insert into current_class (ID_Number, Class, Session, Term, Department) VALUES ('$ID_Number', '$Class', '$Session', '$Term', '$department')");	
			
			
               
				 //end of tessting codes
				
		  if($query1 && $query2){
		  
		     echo("<script type='text/javascript'>\n");
          echo("alert('Registration Successfull!!!')");
			echo ("</script>");

		 
		  echo "<script> window.open('RegisterStudent.php','_self')</script>";
		 
		 
		 }else{
		    
			    echo("<script type='text/javascript'>\n");
          echo("alert('An unexpected error occured while saving the record, Please try again!!!')");
			echo ("</script>");

		 
		  echo "<script> window.open('RegisterStudent.php','_self')</script>";
		 
       
		  }

	   
	   
	      }else{
		         echo("<script type='text/javascript'>\n");
          echo("alert('Student ID_Number Already Exit, Registration not Successful!!!')");
			echo ("</script>");
			echo "<script> window.open('RegisterStudent.php','_self')</script>";
		  }  
		  
		  }else{
		  
		   echo("<script type='text/javascript'>\n");
          echo("alert('Please all fields are required, Registration not Successful!!!')");
			echo ("</script>");
			echo "<script> window.open('RegisterStudent.php','_self')</script>";
		  
		  } 
	   
          }  
      
	  
	     ?>  
	