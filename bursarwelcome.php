<?php
session_start();
?>
<html">
<head>
  <title></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
  <style type="text/css">
<!--
.style10 {
	font-size: 18px;
	color: #FF00FF;
}
.style13 {font-size: 12px}
.style14 {font-size: 36px}
.style17 {
	font-size: 16px;
	color: #FF3399;
	font-weight: bold;
}
.style18 {font-weight: bold; color: #000066;}
.style24 {font-size: 15.5px}
.style26 {font-size: 16px}
.style28 {color: #FFFF00}
.style29 {color: #FF00FF}
-->
  </style>
</head>

<body>
<?php
ob_start();
?>
  <div id="wrapper">
      <h1 align="center"><span class="style14"><span class="style18"><span class="style29">BRIGHT FUTURE SCHOOLS </span></span></span></h1>
      <p align="center" class="style17"><blink>Bursar Only</blink> </p>
      <ul id="nav">
          <li class="first"><a href="school_fees.php" class="style26">Enter School Fees</a></li>
          <li><a href="expenses.php" class="style26">Enter Expenses Made </a></li>
          <li><a href="view_expenses.php" class="style26">View Expenses Made </a></li>
          <li><a href="view_fees.php" class="style24">View School Fees/Balance</a></li>
          <li><a href="Logout.php" class="style26"><span class="style28"><blink>>&gt;&gt;&gt;&gt;Click</blink></span> LOG OUT </a></li>
      </ul>
      <div class="clear"></div>
      <!-- end searches -->
      <div id="body">
          <div id="highlights"><!-- end .green -->
            <!-- end .purple -->
            <!-- end .orange -->
<div id="topspot">
                  <h2 class="style13"><marquee direction="left" loop="-1">
                  WELCOME TO OUR SCHOOL
                  </marquee> </h2>
                <div class="faceotweek"><img src="images/1.gif" width="303" height="109" alt="Sintama" /> </div>
				<div class="faceotweek"><img src="images/1.gif" width="303" height="109" alt="Sintama" /> </div>
                  <!-- end .faceotweek -->
            </div><!-- end topspot -->
        </div><!-- end highlights -->
          <div id="right">
            <!-- end products -->
            <!-- end news -->
</div>
        <!-- end right -->
		   </br></br>
          <div id="beauty">
            <div>
              <h2 align="center" class="style10"><b>OTHER LINKS</b></h2>		
			  <h2 align="center" class="style10"><a href="total_income.php"><u>Total Income/Balance</u></a> </h2>		
			  <h2 align="center" class="style10"><a href="#"><u>Check For Notice Here</u></a> </h2>				
				
              <p>&nbsp; </p>
            </div>
          </div><!-- end beauty -->
          <div class="clear"></div>
      </div><!-- end body -->
      <div id="footer">
       <marquee behavior="alternate"> Web powerd by Socketsystems , E-mail:systemsockets@gmail.com , Tel : +2347030097462, +2348062628486</marquee> </div>
      <!-- end footer -->
  </div><!-- end wrapper -->
</body>
<?php
ob_end_flush();
?>
</html>