
    <html>  
    <head lang="en">  
        <meta charset="UTF-8">  
        <link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css"> <!--css file link in bootstrap folder-->  
        <title>View Students</title>
    </head>  
    <style>  
        .login-panel {  
            margin-top: 150px;  
        }  
        .table {  
            margin-top: 50px;  
      
        }  
.style3 {
	font-size: xx-large;
	font-weight: bold;
}
    </style>  
      
    <body bgcolor="#CCFF99">  
      
    <div class="table-scrol"> 
	                                <center>
	                                  <span class="style3">BRIGHT FUTURE SCHOOLS</span>
	                                </center> 
		            <center>
		               WEBSITE:www.brightfutureschools.edu.ng  
		             |||| Email: info@brightfutureschools.edu.ng  
		            </center>
        <h3 align="center">List Of Online Remidial Students <?php echo  trim(htmlspecialchars(strtoupper($_POST['lstSession']))); ?>  Session</h3> Date Printed <?php echo date("m/d/y"); ?> 
		<div>Class : <?php echo  trim(htmlspecialchars(strtoupper($_POST['class']))); ?> </div>
		<div>Session : <?php echo  trim(htmlspecialchars(strtoupper($_POST['lstSession']))); ?> </div>
      
    <div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->  
      
      <center>
	
        
      
            <?php 
			
           // $lstSession=$_POST['lstSession'];//same  
           // $term=$_POST['term'];//same 
		   // $class=$_POST['class'];//same 
           
		   
			 
    include("DB_connection.php"); 
	$class = trim(htmlspecialchars(strtoupper($_POST['class'])));
	$session = $_POST['lstSession'];
	$subject = $_POST['subject']; 
	//$view = "SELECT students.ID_Number, students.Name, score_sheet.First, score_sheet.Second, score_sheet.Third, score_sheet.Fourth, score_sheet.Exams, score_sheet.Class, score_sheet.Term, score_sheet.Session, subject.Subjects, subject.Subj_ID FROM students JOIN score_sheet ON students.ID_Number = score_sheet.ID_Number JOIN subject ON subject.Subj_ID = score_sheet.Subj_ID Where score_sheet.Session='$session' And score_sheet.Term='$term' And score_sheet.Class='$class' GROUP BY students.ID_Number, score_sheet.Subj_ID ORDER BY students.Name ASC";
	$view1 = mysql_query("SELECT students.ID_Number, students.Name, score_sheet.First, score_sheet.Second, score_sheet.Third, score_sheet.Fourth, score_sheet.Exams, score_sheet.Class, score_sheet.Term, score_sheet.Session, subject.Subjects, subject.Subj_ID FROM students JOIN score_sheet ON students.ID_Number = score_sheet.ID_Number JOIN subject ON subject.Subj_ID = score_sheet.Subj_ID Where score_sheet.Term ='FIRST TERM' And score_sheet.Subj_ID='$subject' And score_sheet.Class='$class' And score_sheet.Session='$session' GROUP BY score_sheet.ID_Number ");
	$view2 = mysql_query("SELECT students.ID_Number, students.Name, score_sheet.First, score_sheet.Second, score_sheet.Third, score_sheet.Fourth, score_sheet.Exams, score_sheet.Class, score_sheet.Term, score_sheet.Session, subject.Subjects, subject.Subj_ID FROM students JOIN score_sheet ON students.ID_Number = score_sheet.ID_Number JOIN subject ON subject.Subj_ID = score_sheet.Subj_ID Where score_sheet.Term ='SECOND TERM' And score_sheet.Subj_ID='$subject' And score_sheet.Class='$class' And score_sheet.Session='$session' GROUP BY score_sheet.ID_Number");
	$view3 = mysql_query("SELECT students.ID_Number, students.Name, score_sheet.First, score_sheet.Second, score_sheet.Third, score_sheet.Fourth, score_sheet.Exams, score_sheet.Class, score_sheet.Term, score_sheet.Session, subject.Subjects, subject.Subj_ID FROM students JOIN score_sheet ON students.ID_Number = score_sheet.ID_Number JOIN subject ON subject.Subj_ID = score_sheet.Subj_ID Where score_sheet.Term ='THIRD TERM' And score_sheet.Subj_ID='$subject' And score_sheet.Class='$class' And score_sheet.Session='$session' GROUP BY score_sheet.ID_Number");
	//$view = "SELECT students.ID_Number, students.Name, students.State_of_Origin, students.LGA, current_class.Class, current_class.Session, current_class.Term FROM students JOIN current_class ON students.ID_Number = current_class.ID_Number where  current_class.Session = '".$_POST['lstSession']."' and current_class.Class = '".$_POST['class']."' and current_class.Term = '".$_POST['term']."' ORDER BY students.Name ASC ";
  // $view="select * from students ORDER BY Name ASC"; 
           // $run=mysql_query($view);//here run the sql query. 
		   //echo mysql_num_rows($view1);
		   if(mysql_num_rows($view1) > 0 && mysql_num_rows($view2) > 0 && mysql_num_rows($view3) > 0){
		  /* if(mysql_num_rows($view1) <= 0 || mysql_num_rows($view2) <= 0 || mysql_num_rows($view3) <= 0){
		    echo("<script type='text/javascript'>\n");
              echo("alert('Error Selecting Remidial Students!!!')");
			  echo ("</script>");
			 
		      echo "<script> window.open('print_remidial.php','_self')</script>";
			   exit();
		   
		   }*/
		  
      $count =0;
            while($row1= mysql_fetch_array($view1))//while look to fetch the result and store in a array $row.  
            {  
			    $class1[] = $row1['Class'];
               // $class1[] = substr($class,0,4);
                $ID_Number1[]=$row1['ID_Number'];  
                $Name1[]=$row1['Name'];   
                $first1=$row1['First'];  
                $second1=$row1['Second'];  
                $third1=$row1['Third'];  
				$fourth1=$row1['Fourth'];  
                $exams1=$row1['Exams']; 
				$total1[] = $first1 + $second1 + $third1 + $fourth1 + $exams1;  
				$count = $count + 1;
				}
				
			while($row2=mysql_fetch_array($view2))//while look to fetch the result and store in a array $row.  
            {  
                $ID_Number2[]=$row2['ID_Number'];  
                $Name2[]=$row2['Name'];   
                $first2=$row2['First'];  
                $second2=$row2['Second'];  
                $third2=$row2['Third'];  
				$fourth2=$row2['Fourth'];  
                $exams2=$row2['Exams']; 
				$total2[] = $first2 + $second2 + $third2 + $fourth2 + $exams2; 
				} 
				
				
			while($row3=mysql_fetch_array($view3))//while look to fetch the result and store in a array $row.  
            {  
                $ID_Number3[]=$row3['ID_Number'];  
                $Name3[]=$row3['Name'];   
                $first3=$row3['First'];  
                $second3=$row3['Second'];  
                $third3=$row3['Third'];  
				$fourth3=$row3['Fourth'];  
                $exams3=$row3['Exams'];  
				$total3[] = $first3 + $second3 + $third3 + $fourth3 + $exams3;
				} 		
				
				
            ?>  
                <table class="table table-bordered table-hover table-striped" style="table-layout: fixed" background="images/1.gif" border="1" >  
            <thead>  
      
            <tr>  
      
                <th>ID_Number&nbsp;&nbsp;</th>
                <th>Name&nbsp;&nbsp </th> 
                <th>First Term &nbsp;&nbsp </th>
				 <th>Sesond Term &nbsp;&nbsp </th>
				<th>Third Term &nbsp;&nbsp </th>  
                <th>Total &nbsp;&nbsp </th> 
				<th>Average &nbsp;&nbsp </th>
				
            </tr>  
            </thead>  
            <tr>  
    <!--here showing results in the table -->  
	           <?php
			   for($i=0; $i < $count; $i++){
			   
			   if($total1[$i] > 0 && $total2[$i] == 0 && $total3[$i] == 0){
				$n = 1;
				}else if($total1[$i] == 0 && $total2[$i] > 0  && $total3[$i] == 0 ){
				$n = 1;
				}else if($total1[$i] == 0 && $total2[$i] == 0  && $total3[$i] > 0){
				$n = 1;
				}else if($total1[$i] > 0 && $total2[$i] > 0 && $total3[$i] == 0){  
				$n = 2;
				}else if($total1[$i] > 0 && $total2[$i] = 0 && $total3[$i] > 0){  
				$n = 2;
				}else if($total1[$i] == 0 && $total2[$i] > 0 && $total3[$i] > 0){  
				$n = 2;
				}else if($total1[$i] > 0 && $total2[$i] > 0 && $total3[$i] > 0){  
				$n = 3;
				}
				
				
			   
			   $compare = ($total1[$i] + $total2[$i] + $total3[$i])/$n;
			   
			  // echo $class1[$i];
			   if ($compare <= 39 && $class1[$i] == "JSS1A"){
			   ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php  echo $total2[$i];  ?></td>  
                <td><?php echo $total3[$i];  ?></td> 
				<td><?php echo ($total1[$i] + $total2[$i] + $total3[$i]);  ?></td>  
                <td><?php echo ($total1[$i] + $total2[$i] + $total3[$i])/$n; ?></td>
            </tr>  
      
	         <?php
			 }else  if($compare <= 39 && $class1[$i] == "JSS1B" ){
			  ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php  echo $total2[$i];  ?></td>  
                <td><?php echo $total3[$i];  ?></td> 
				<td><?php echo ($total1[$i] + $total2[$i] + $total3[$i]);  ?></td>  
                <td><?php echo ($total1[$i] + $total2[$i] + $total3[$i])/$n;  ?></td>
	
            </tr>  
			 <?php
			 }else  if($compare <= 39 && $class1[$i] == "JSS1C" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php  echo $total2[$i];  ?></td>  
                <td><?php echo $total3[$i];  ?></td> 
				<td><?php echo ($total1[$i] + $total2[$i] + $total3[$i]);  ?></td>  
                <td><?php echo ($total1[$i] + $total2[$i] + $total3[$i])/$n;  ?></td>
	
            </tr>  
			<?php
			 }else if($compare <= 44 && $class1[$i] == "JSS2A" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php  echo $total2[$i];  ?></td>  
                <td><?php echo $total3[$i];  ?></td> 
				<td><?php echo ($total1[$i] + $total2[$i] + $total3[$i]);  ?></td>  
                <td><?php echo ($total1[$i] + $total2[$i] + $total3[$i])/$n;  ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 44 && $class1[$i] == "JSS2B" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php  echo $total2[$i];  ?></td>  
                <td><?php echo $total3[$i];  ?></td> 
				<td><?php echo ($total1[$i] + $total2[$i] + $total3[$i]);  ?></td>  
                <td><?php echo ($total1[$i] + $total2[$i] + $total3[$i])/$n;  ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 44 && $class1[$i] == "JSS2C" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php  echo $total2[$i];  ?></td>  
                <td><?php echo $total3[$i];  ?></td> 
				<td><?php echo ($total1[$i] + $total2[$i] + $total3[$i]);  ?></td>  
                <td><?php echo ($total1[$i] + $total2[$i] + $total3[$i])/$n;  ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 44 && $class1[$i] == "JSS3A" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php  echo $total2[$i];  ?></td>  
                <td><?php echo $total3[$i];  ?></td> 
				<td><?php echo ($total1[$i] + $total2[$i] + $total3[$i]);  ?></td>  
                <td><?php echo ($total1[$i] + $total2[$i] + $total3[$i])/$n;  ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 44 && $class1[$i] == "JSS3B" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php  echo $total2[$i];  ?></td>  
                <td><?php echo $total3[$i];  ?></td> 
				<td><?php echo ($total1[$i] + $total2[$i] + $total3[$i]);  ?></td>  
                <td><?php echo ($total1[$i] + $total2[$i] + $total3[$i])/$n;  ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 44 && $class1[$i] == "JSS3C" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php  echo $total2[$i];  ?></td>  
                <td><?php echo $total3[$i];  ?></td> 
				<td><?php echo ($total1[$i] + $total2[$i] + $total3[$i]);  ?></td>  
                <td><?php echo ($total1[$i] + $total2[$i] + $total3[$i])/$n;  ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 49 && $class1[$i] == "SSS1A" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php  echo $total2[$i];  ?></td>  
                <td><?php echo $total3[$i];  ?></td> 
				<td><?php echo ($total1[$i] + $total2[$i] + $total3[$i]);  ?></td>  
                <td><?php echo ($total1[$i] + $total2[$i] + $total3[$i])/$n;  ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 49 && $class1[$i] == "SSS1B" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php  echo $total2[$i];  ?></td>  
                <td><?php echo $total3[$i];  ?></td> 
				<td><?php echo ($total1[$i] + $total2[$i] + $total3[$i]);  ?></td>  
                <td><?php echo ($total1[$i] + $total2[$i] + $total3[$i])/$n;  ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 49 && $class1[$i] == "SSS1C" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php  echo $total2[$i];  ?></td>  
                <td><?php echo $total3[$i];  ?></td> 
				<td><?php echo ($total1[$i] + $total2[$i] + $total3[$i]);  ?></td>  
                <td><?php echo ($total1[$i] + $total2[$i] + $total3[$i])/$n;  ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 49 && $class1[$i] == "SSS2A" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php  echo $total2[$i];  ?></td>  
                <td><?php echo $total3[$i];  ?></td> 
				<td><?php echo ($total1[$i] + $total2[$i] + $total3[$i]);  ?></td>  
                <td><?php echo ($total1[$i] + $total2[$i] + $total3[$i])/$n;  ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 49 && $class1[$i] == "SSS2B" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php  echo $total2[$i];  ?></td>  
                <td><?php echo $total3[$i];  ?></td> 
				<td><?php echo ($total1[$i] + $total2[$i] + $total3[$i]);  ?></td>  
                <td><?php echo ($total1[$i] + $total2[$i] + $total3[$i])/$n;  ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 49 && $class1[$i] == "SSS2C" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php  echo $total2[$i];  ?></td>  
                <td><?php echo $total3[$i];  ?></td> 
				<td><?php echo ($total1[$i] + $total2[$i] + $total3[$i]);  ?></td>  
                <td><?php echo ($total1[$i] + $total2[$i] + $total3[$i])/$n;  ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 49 && $class1[$i] == "SSS3A" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php  echo $total2[$i];  ?></td>  
                <td><?php echo $total3[$i];  ?></td> 
				<td><?php echo ($total1[$i] + $total2[$i] + $total3[$i]);  ?></td>  
                <td><?php echo ($total1[$i] + $total2[$i] + $total3[$i])/$n;  ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 49 && $class1[$i] == "SSS3B" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php  echo $total2[$i];  ?></td>  
                <td><?php echo $total3[$i];  ?></td> 
				<td><?php echo ($total1[$i] + $total2[$i] + $total3[$i]);  ?></td>  
                <td><?php echo ($total1[$i] + $total2[$i] + $total3[$i])/$n;  ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 49 && $class1[$i] == "SSS3C" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php  echo $total2[$i];  ?></td>  
                <td><?php echo $total3[$i];  ?></td> 
				<td><?php echo ($total1[$i] + $total2[$i] + $total3[$i]);  ?></td>  
                <td><?php echo ($total1[$i] + $total2[$i] + $total3[$i])/$n;  ?></td>
	
            </tr>  
			  <?php
			  }
		
			 }
			
			 ?>
			   
        </table> 
		
		

		<?php
		 }else if(mysql_num_rows($view1) > 0 && mysql_num_rows($view2) <= 0 && mysql_num_rows($view3) <= 0){
			 
			 $count =0;
            while($row1= mysql_fetch_array($view1))//while look to fetch the result and store in a array $row.  
            {  
			    $class1[] = $row1['Class'];
               // $class1[] = substr($class,0,4);
                $ID_Number1[]=$row1['ID_Number'];  
                $Name1[]=$row1['Name'];   
                $first1=$row1['First'];  
                $second1=$row1['Second'];  
                $third1=$row1['Third'];  
				$fourth1=$row1['Fourth'];  
                $exams1=$row1['Exams']; 
				$total1[] = $first1 + $second1 + $third1 + $fourth1 + $exams1;  
				$count = $count + 1;
				}
				
						
            ?>  
                <table class="table table-bordered table-hover table-striped" style="table-layout: fixed" background="images/1.gif" border="1" >  
            <thead>  
      
            <tr>  
      
                <th>ID_Number&nbsp;&nbsp;</th>
                <th>Name&nbsp;&nbsp </th> 
                <th>First Term &nbsp;&nbsp </th>  
                <th>Total &nbsp;&nbsp </th> 
				<th>Average &nbsp;&nbsp </th>
				
            </tr>  
            </thead>  
            <tr>  
    <!--here showing results in the table -->  
	           <?php
			   for($i=0; $i < $count; $i++){
			   
			   
			   
			   $compare = $total1[$i]; 
			   
			  // echo $class1[$i];
			   if ($compare <= 39 && $class1[$i] == "JSS1A"){
			   ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td> 
				<td><?php echo $total1[$i];  ?></td>  
                <td><?php echo $total1[$i]; ?></td>
            </tr>  
      
	         <?php
			 }else  if($compare <= 39 && $class1[$i] == "JSS1B" ){
			  ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td> 
				<td><?php echo $total1[$i];  ?></td>  
                <td><?php echo $total1[$i];  ?></td>
	
            </tr>  
			 <?php
			 }else  if($compare <= 39 && $class1[$i] == "JSS1C" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>   
				<td><?php echo $total1[$i] ;  ?></td>  
                <td><?php echo $total1[$i];  ?></td>
	
            </tr>  
			<?php
			 }else if($compare <= 44 && $class1[$i] == "JSS2A" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>                 
				<td><?php echo $total1[$i];  ?></td>  
                <td><?php echo $total1[$i];   ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 44 && $class1[$i] == "JSS2B" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td> 
				<td><?php echo $total1[$i] ;  ?></td>  
                <td><?php echo $total1[$i];  ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 44 && $class1[$i] == "JSS2C" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>                 
				<td><?php echo $total1[$i];  ?></td>  
                <td><?php echo $total1[$i];  ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 44 && $class1[$i] == "JSS3A" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td> 
				<td><?php echo $total1[$i] ;  ?></td>  
                <td><?php echo $total1[$i];  ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 44 && $class1[$i] == "JSS3B" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php echo $total1[$i];  ?></td>  
                <td><?php echo $total1[$i];  ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 44 && $class1[$i] == "JSS3C" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php echo $total1[$i] ;  ?></td>  
                <td><?php echo $total1[$i] ;  ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 49 && $class1[$i] == "SSS1A" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php echo $total1[$i];  ?></td>  
                <td><?php echo $total1[$i];  ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 49 && $class1[$i] == "SSS1B" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php echo $total1[$i];  ?></td>  
                <td><?php echo $total1[$i] ;  ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 49 && $class1[$i] == "SSS1C" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php echo $total1[$i];  ?></td>  
                <td><?php echo $total1[$i];  ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 49 && $class1[$i] == "SSS2A" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php echo $total1[$i] ; ?></td>  
                <td><?php echo $total1[$i];  ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 49 && $class1[$i] == "SSS2B" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php echo $total1[$i];  ?></td>  
                <td><?php echo $total1[$i];  ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 49 && $class1[$i] == "SSS2C" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php echo $total1[$i];  ?></td>  
                <td><?php echo $total1[$i];  ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 49 && $class1[$i] == "SSS3A" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php echo $total1[$i];  ?></td>  
                <td><?php echo $total1[$i] ;  ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 49 && $class1[$i] == "SSS3B" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php echo $total1[$i] ;  ?></td>  
                <td><?php echo $total1[$i] ;  ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 49 && $class1[$i] == "SSS3C" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php echo $total1[$i];  ?></td>  
                <td><?php echo $total1[$i];  ?></td>
	
            </tr>  
			  <?php
			  }
		
			 }
			
			 ?>
			 </table> 
			 <?php
			 
			 }else if(mysql_num_rows($view1) > 0 && mysql_num_rows($view2) > 0 && mysql_num_rows($view3) <= 0){
			 
			 $count =0;
            while($row1= mysql_fetch_array($view1))//while look to fetch the result and store in a array $row.  
            {  
			    $class1[] = $row1['Class'];
               // $class1[] = substr($class,0,4);
                $ID_Number1[]=$row1['ID_Number'];  
                $Name1[]=$row1['Name'];   
                $first1=$row1['First'];  
                $second1=$row1['Second'];  
                $third1=$row1['Third'];  
				$fourth1=$row1['Fourth'];  
                $exams1=$row1['Exams']; 
				$total1[] = $first1 + $second1 + $third1 + $fourth1 + $exams1;  
				$count = $count + 1;
				}
				
			while($row2=mysql_fetch_array($view2))//while look to fetch the result and store in a array $row.  
            {  
                $ID_Number2[]=$row2['ID_Number'];  
                $Name2[]=$row2['Name'];   
                $first2=$row2['First'];  
                $second2=$row2['Second'];  
                $third2=$row2['Third'];  
				$fourth2=$row2['Fourth'];  
                $exams2=$row2['Exams']; 
				$total2[] = $first2 + $second2 + $third2 + $fourth2 + $exams2; 
				} 
				
				
            ?>  
                <table class="table table-bordered table-hover table-striped" style="table-layout: fixed" background="images/1.gif" border="1" >  
            <thead>  
      
            <tr>  
      
                <th>ID_Number&nbsp;&nbsp;</th>
                <th>Name&nbsp;&nbsp </th> 
                <th>First Term &nbsp;&nbsp </th>
				 <th>Sesond Term &nbsp;&nbsp </th>				  
                <th>Total &nbsp;&nbsp </th> 
				<th>Average &nbsp;&nbsp </th>
				
            </tr>  
            </thead>  
            <tr>  
    <!--here showing results in the table -->  
	           <?php
			    for($i=0; $i < $count; $i++){
				
				if($total1[$i] == 0 && $total2[$i] > 0){
				$n = 1;
				}else if($total1[$i] > 0 && $total2[$i] > 0){
				$n = 2;
				}
				
			   $compare = ($total1[$i] + $total2[$i])/$n;
			   
			  // echo $class1[$i];
			   if ($compare <= 39 && $class1[$i] == "JSS1A"){
			   ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php  echo $total2[$i];  ?></td>                  
				<td><?php echo ($total1[$i] + $total2[$i]);  ?></td>  
                <td><?php echo ($total1[$i] + $total2[$i])/$n; ?></td>
            </tr>  
      
	         <?php
			 }else  if($compare <= 39 && $class1[$i] == "JSS1B" ){
			  ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php  echo $total2[$i];  ?></td>                  
				<td><?php echo ($total1[$i] + $total2[$i]);  ?></td>  
                <td><?php echo ($total1[$i] + $total2[$i])/$n;  ?></td>
	
            </tr>  
			 <?php
			 }else  if($compare <= 39 && $class1[$i] == "JSS1C" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php  echo $total2[$i];  ?></td>   
				<td><?php echo ($total1[$i] + $total2[$i]) ;  ?></td>  
                <td><?php echo ($total1[$i] + $total2[$i])/$n;  ?></td>
	
            </tr>  
			<?php
			 }else if($compare <= 44 && $class1[$i] == "JSS2A" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php  echo $total2[$i];  ?></td>                 
				<td><?php echo ($total1[$i] + $total2[$i]);  ?></td>  
                <td><?php echo ($total1[$i] + $total2[$i])/$n;  ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 44 && $class1[$i] == "JSS2B" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php  echo $total2[$i];  ?></td>                  
				<td><?php echo ($total1[$i] + $total2[$i]) ;  ?></td>  
                <td><?php echo ($total1[$i] + $total2[$i] )/$n;  ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 44 && $class1[$i] == "JSS2C" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php  echo $total2[$i];  ?></td>                  
				<td><?php echo ($total1[$i] + $total2[$i]) ;  ?></td>  
                <td><?php echo ($total1[$i] + $total2[$i])/$n;  ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 44 && $class1[$i] == "JSS3A" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php  echo $total2[$i];  ?></td>                  
				<td><?php echo ($total1[$i] + $total2[$i] );  ?></td>  
                <td><?php echo ($total1[$i] + $total2[$i] )/$n;  ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 44 && $class1[$i] == "JSS3B" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php  echo $total2[$i];  ?></td>   
				<td><?php echo ($total1[$i] + $total2[$i] );  ?></td>  
                <td><?php echo ($total1[$i] + $total2[$i] )/$n;  ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 44 && $class1[$i] == "JSS3C" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php  echo $total2[$i];  ?></td>   
				<td><?php echo ($total1[$i] + $total2[$i] );  ?></td>  
                <td><?php echo ($total1[$i] + $total2[$i])/$n;  ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 49 && $class1[$i] == "SSS1A" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php  echo $total2[$i];  ?></td>                
				<td><?php echo ($total1[$i] + $total2[$i] );  ?></td>  
                <td><?php echo ($total1[$i] + $total2[$i] )/$n;  ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 49 && $class1[$i] == "SSS1B" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php  echo $total2[$i];  ?></td>                  
				<td><?php echo ($total1[$i] + $total2[$i]);  ?></td>  
                <td><?php echo ($total1[$i] + $total2[$i] )/$n;  ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 49 && $class1[$i] == "SSS1C" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php  echo $total2[$i];  ?></td>                 
				<td><?php echo ($total1[$i] + $total2[$i] );  ?></td>  
                <td><?php echo ($total1[$i] + $total2[$i])/$n;  ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 49 && $class1[$i] == "SSS2A" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php  echo $total2[$i];  ?></td>                 
				<td><?php echo ($total1[$i] + $total2[$i] );  ?></td>  
                <td><?php echo ($total1[$i] + $total2[$i])/$n;  ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 49 && $class1[$i] == "SSS2B" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php  echo $total2[$i];  ?></td>   
				<td><?php echo ($total1[$i] + $total2[$i] );  ?></td>  
                <td><?php echo ($total1[$i] + $total2[$i])/$n;  ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 49 && $class1[$i] == "SSS2C" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php  echo $total2[$i];  ?></td>                   
				<td><?php echo ($total1[$i] + $total2[$i] );  ?></td>  
                <td><?php echo ($total1[$i] + $total2[$i] )/$n;  ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 49 && $class1[$i] == "SSS3A" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php  echo $total2[$i];  ?></td>                  
				<td><?php echo ($total1[$i] + $total2[$i]);  ?></td>  
                <td><?php echo ($total1[$i] + $total2[$i])/$n;  ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 49 && $class1[$i] == "SSS3B" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php  echo $total2[$i];  ?></td>                  
				<td><?php echo ($total1[$i] + $total2[$i]);  ?></td>  
                <td><?php echo ($total1[$i] + $total2[$i])/$n;  ?></td>
	
            </tr>  
			  <?php
			  }else if($compare <= 49 && $class1[$i] == "SSS3C" ){
			 
			 ?>
                <td><?php echo $ID_Number1[$i];  ?></td>  
                <td><?php  echo $Name1[$i];  ?></td>    
                <td><?php  echo $total1[$i];  ?></td>
				<td><?php  echo $total2[$i];  ?></td>   
				<td><?php echo ($total1[$i] + $total2[$i]);  ?></td>  
                <td><?php echo ($total1[$i] + $total2[$i])/$n;  ?></td>
	
            </tr>  
			  <?php
			  }
		
			 }
			
			 ?>
			 </table> 
			 <?php
			 }
			 ?>
			 
		
		</br> </br>
	<a href="print_remidial.php"> <input type="button"  value="Print This Page" onClick="window.print()"  /> </a>
  </form> 
  
	  </center>
      </div>  
    </div>  
      
      
    </body>  
      
    </html>  