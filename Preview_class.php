
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
	                                  <span class="style3">BRIGTH FUTURE SCHOOLS </span>
	                                </center> 
		            <center>
		               WEBSITE: www.brightfutureschools.edu.ng |||| Email: info@brightfutureschools.edu.ng 
		            </center>
        <h3 align="center">List Of Online Registered Students <?php echo $_POST['lstSession'];  ?> &nbsp;&nbsp; Session  </h3>
		
		 <h3 align="center">Department : <?php echo(strtoupper($_POST['department']));  ?>  &nbsp;&nbsp; Class :  <?php echo(strtoupper($_POST['class']));  ?>  &nbsp;&nbsp; Term :  <?php echo(strtoupper($_POST['term']));  ?> </h3>
      
    <div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->  
      
      <center>
	
       <!-- <table class="table table-bordered table-hover table-striped" style="table-layout: fixed" background="images/1.gif" border="1" > -->
	   <table border="1" style="border-collapse:collapse "> 
            <thead>  
      
            <tr>  
      
                <th>ID_Number&nbsp;&nbsp;</th>
                <th>Name&nbsp;&nbsp </th> 
                <th>State Of Origin&nbsp;&nbsp </th>
				 <th>LGA&nbsp;&nbsp </th>
				<th>Session&nbsp;&nbsp </th>  
                <th>Term&nbsp;&nbsp </th> 
				<th>Class&nbsp;&nbsp </th>
				
            </tr>  
            </thead>  
      
            <?php 
			
           // $lstSession=$_POST['lstSession'];//same  
           // $term=$_POST['term'];//same 
		   // $class=$_POST['class'];//same 
           
		   
			 
    include("DB_connection.php");  
	$view = "SELECT students.ID_Number, students.Name, students.State_of_Origin, students.LGA, current_class.Class, current_class.Session, current_class.Term FROM students JOIN current_class ON students.ID_Number = current_class.ID_Number where  current_class.Session = '".$_POST['lstSession']."' and current_class.Class = '".$_POST['class']."' and current_class.Term = '".$_POST['term']."' and current_class.Department = '".$_POST['department']."' ORDER BY students.Name ASC ";
  // $view="select * from students ORDER BY Name ASC"; 
            $run=mysql_query($view);//here run the sql query. 
      
            while($row=mysql_fetch_array($run))//while look to fetch the result and store in a array $row.  
            {  
                $ID_Number=$row['ID_Number'];  
                $Name=$row['Name'];   
                $State_of_Origin=$row['State_of_Origin'];  
                $LGA=$row['LGA'];  
                $Session=$row['Session'];  
				$Term=$row['Term'];  
                $Class=$row['Class'];  
                 
      
            ?>  
      
            <tr>  
    <!--here showing results in the table -->  
                <td><?php echo $ID_Number;  ?></td>  
                <td><?php  echo $Name;  ?></td>    
                <td><?php  echo $State_of_Origin;  ?></td>
				<td><?php echo $LGA;  ?></td>  
                <td><?php echo $Session;  ?></td> 
				<td><?php echo $Term;  ?></td>  
                <td><?php echo $Class;  ?></td>
	
            </tr>  
      
            <?php } ?>  
      
        </table> 

		
		
		
		
		
		
		
		</br> </br>
	 <input type="button"  value="Print This Page" onClick="window.print()"  /> 
  </form> 
  <br/><br/>
   <a href="Admin.php"><img src="images/backred.png"></img></a>
	  </center>
      </div>  
    </div>  
      
      
    </body>  
      
    </html>  