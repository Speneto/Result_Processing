
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Admin Panel</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
  <script src="jquery-1.9.1.min.js" ></script>

  <script  language="javascript">
$(document).ready(function() {
        function disableBack() { window.history.forward() }

        window.onload = disableBack();
        window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
    });


</script>


  <style type="text/css">
<!--
.style13 {font-size: 12px}
.style14 {font-size: 36px}
.style17 {
	font-size: 24px;
	color: #FF0000;
	font-weight: bold;
	font-family: "Times New Roman", Times, serif;
}
.style18 {
	font-weight: bold;
	color: #000066;
	font-family: "Times New Roman", Times, serif;
}
.style19 {color: #993300}
.style20 {color: #336600}
.style22 {
	font-size: 18px;
	color: #006600;
	font-family: "Times New Roman", Times, serif;
}
.style24 {color: #CC9966}
.style28 {
	color: #CC3300;
	font-family: "Times New Roman", Times, serif;
}
.style32 {
	font-size: 12px;
	color: #CC3300;
	font-family: "Times New Roman", Times, serif;
}
.style33 {
	color: #CC0000;
	font-family: "Times New Roman", Times, serif;
}
.style34 {font-size: 16px}
.style35 {font-size: 14px}
.style37 {font-size: 12px; color: #330099; font-family: "Times New Roman", Times, serif; }
.style38 {color: #FF00FF; font-family: "Times New Roman", Times, serif; font-size: 18px;}
-->
  </style>
</head>

<body>
  <div id="wrapper">
      <h1 align="center"><span class="style14"><span class="style18">BRIGHT FUTURE SCHOOLS</span></span></h1>
      <p align="center" class="style17"><blink>ADMINISTRATOR'S PANEL</blink> </p>
      <marquee direction="left" loop="-1">
      <div align="center" class="style22">Be warned! Only Authorized Persons are Allowered to Access this Section</div>
      </marquee>
      <ul id="nav">
          <li class="first style34"><a href="Registration.html" class="style13">ADD NEW STAFF RECORD </a></li>
          <li><a href="view_users.php" class="style13">VIEW REGISTERED STAFF </a></li>
          <li class="style35"><a href="RegisterStudent.php" class="style13">REGISTER NEW STUDENT </a></li>
          <li><a href="print_result.php" class="style13">PRINT STUDENT RESULT </a></li>
		  <li><a href="admin_enter_score.php" class="style13">ENTER STUDENT'S SCORES</a></li>
      </ul>
      <div class="clear"></div>
      <!-- end searches -->
      <div id="body">
          <div id="highlights"><!-- end .green -->
            <!-- end .purple -->
            <!-- end .orange -->
<div id="topspot">
        <h2 class="style13">
          <marquee direction="left" loop="-1">
        </marquee>
         <span class="style28"><a href="form_master.php">Register Form Teachers</a> </span> </span></a>
        <span class="style24"> <br/> <span class="style33"><a href="Preview_students.php">Print Registered Students</a></span></span>
		<br/> <span class="style33"><a href="newuser.php">Add Busar, Admin, Proprietor.</a></span></span>
		<br/> <span class="style33"><a href="enterschoolfees.php">Enter Next Term's Fees</a></span></span>
		<br/> <span class="style33"><a href="admin_view_profile.php">View/download Employee Resume</a></span></span>
		</h2>
    


        <div class="faceotweek"><img src="images/1.gif" width="686" height="85" alt="Sintama" /></div>
                  <!-- end .faceotweek -->
            </div><!-- end topspot -->
        </div><!-- end highlights -->
          <div id="right">
            <!-- end products -->
            <!-- end news -->
</div>
          <!-- end right -->
          <div id="beauty">
            <div>
              <h2 align="center" class="style38"><u>OTHER LINKS </u></h2>
			   <h2 align="center"><span class="style32"><a href="print_result_single.php">Print Single Student Result</a> </span></h2>
              <h2 align="center"><span class="style32"><a href="print_summary_sheet.php">Print Summary Sheet</a> </span></h2>
			   <h2 align="center"><span class="style32"><a href="score_sheet.php">Print Score Sheet</a> </span></h2>
			    <h2 align="center"><span class="style32"><a href="print_master_list.php">Print Master List</a> </span></h2>
			   <h2  align="center"><span class="style32"><a href="Update_student_info.php">Search/Update Students Record</a></span></h2>
			    <h2  align="center"><span class="style32"><a href="promotion.php">Print Promotion List/Update Student Class</a></span></h2>
				 <h2 align="center"><span class="style32"><a href="resume.php">Upload Employee Resume</a> </span></h2>
			    </h3>
              <h2 align="center"><strong><span class="style37"><u><a href="index.php">LOG OUT</a></u></span></strong></h2>
            </div>
          </div><!-- end beauty -->
          <div class="clear"></div>
      </div><!-- end body -->
      <div id="footer">
       <marquee behavior="alternate">
        This softaware is powerd by Socketsystems &lt;&gt; E-mail:abarecplussplus@gmail.com , Tel : 08062628486, +2347030097462
       </marquee> </div>
      <!-- end footer -->
  </div><!-- end wrapper -->
</body>

</html>
