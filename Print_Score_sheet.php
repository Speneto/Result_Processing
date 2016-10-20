
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
	                                  <span class="style3">BRIGHT FUTURE SCHOOLS </span>
	                                </center> 
		            <center>
		               WEBSITE:www.brightfutureschools.edu.ng |||| Email: info@brigthfutureschools.edu.ng 
                         <h3 align="center">Score Sheet <?php echo $_POST['lstSession'];?> Session Subject_________________________________ </h3> 
                      </center>
   
        <div style="margin-left:350px ">                                                                                               
		<div> Term : <?php echo $_POST['term'];  ?> </div>
		<div> Class : <?php echo $_POST['class'];  ?>	</div>
	    <div> Department : <?php echo $_POST['department'];  ?>	</div>
	    </div>
		<br/>   
																										
    <div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->  
      
      <center>
	
         <!-- <table class="table table-bordered table-hover table-striped" style="table-layout: fixed" background="images/1.gif" border="1" >  -->
	   <table border="1"  style="border-collapse:collapse " width="55%">
            <thead>  
      
            <tr>  
      
                <th>ID_Number&nbsp;&nbsp;</th>
                <th>Name&nbsp;&nbsp </th> 
                <th>1st CA&nbsp;&nbsp </th>
				 <th>2nd CA&nbsp;&nbsp </th>
				<th>Exams &nbsp;&nbsp </th>
				
            </tr>  
            </thead>  
      
            <?php 
			//$ID_Number=$_POST['ID_Number'];//same
            $lstSession=$_POST['lstSession'];//same  
            $term=$_POST['term'];//same 
		    $class=$_POST['class'];//same 
           // $Name=$_POST['Name'];//sam
		   // $Subject=$_POST['Subject'];//sam
			 
    include("DB_connection.php");  
   /*$view="select * from current_class where  Session = '".$_POST['lstSession']."' and Class = '".$_POST['class']."' "; 
            $run=mysql_query($view);//here run the sql query. 
      
            while($row=mysql_fetch_array($run))//while look to fetch the result and store in a array $row.  
            {  
                $ID_Number=$row[1];  */
              
            ?>  
			
			<?php
			 //$view1="select * from students where  Session = '".$_POST['lstSession']."' and Class = '".$_POST['class']."' ORDER BY Name ASC "; 
			 $view1="select * from students JOIN current_class ON students.ID_Number=current_class.ID_Number  where  current_class.Session = '".$_POST['lstSession']."' and current_class.Class = '".$_POST['class']."' and current_class.Department = '".$_POST['department']."' ORDER BY students.Name ASC "; 
            $run1=mysql_query($view1);//here run the sql query. 
      
            while($row1=mysql_fetch_array($run1))//while look to fetch the result and store in a array $row.  
            {  
                $ID_Number1=$row1['ID_Number'];  
                $Name1=$row1['Name'];   
               
            ?>  
      
            <tr>  
    <!--here showing results in the table -->  
                <td><?php echo $ID_Number1;  ?></td>    
                <td><?php echo $Name1;  ?></td>
				<td></td>  
                <td></td> 
				<td></td>  
                
				
	
            </tr>  
      
            <?php }//} ?>  
      
        </table> 	
		</br> </br>
	<a href="preview_students.php"> <input type="button"  value="Print This Page" onClick="window.print()"  /> </a>
  </form> 
  
	  </center>
      </div>  
    </div>  
      
      
    </body>  
      
    </html>  