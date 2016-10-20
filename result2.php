<?Php 
include"DB_connection.php";
$term = trim(htmlspecialchars(strtoupper($_POST['term'])));
$session = trim(htmlspecialchars(strtoupper($_POST['lstSession'])));
$class = trim(htmlspecialchars(strtoupper($_POST['class'])));
$department = trim(htmlspecialchars(strtoupper($_POST['department'])));


//Outsanding Fess

$out_standing_fees = mysql_query("Select ID_Number, Balance From fees_sheet Where Term='$term' AND Session='$session' AND Clas='$class' AND Department='$department' ");
$num_out_standing_fees = mysql_num_rows($out_standing_fees);
while($row_out_standing_fees=mysql_fetch_array($out_standing_fees)){
 $out_standing_fees_id[] = $row_out_standing_fees['ID_Number'];
 $out_standing_fees_amount[] = $row_out_standing_fees['Balance'];
}


//Class Average in Subject
$class_average_s = mysql_query("Select DISTINCT Subj_ID From score_sheet Where Session='$session' AND Class='$class' AND Term ='$term' AND Department='$department' ORDER BY Subj_ID ASC");
$num_class_average_s = mysql_num_rows($class_average_s);
while($row_class_average_s = mysql_fetch_array($class_average_s)){
  $class_subj_id[] = $row_class_average_s['Subj_ID'];
}


//first subject  
 $class_average1 = mysql_query("Select AVG(Total) AS Subj_Avg From score_sheet Where Session='$session' AND Class='$class' AND Term ='$term' AND Department='$department' AND Subj_ID='$class_subj_id[0]' ");
 while($row_class_average1 = mysql_fetch_array($class_average1)){
   $array_class_average1[] = $row_class_average1['Subj_Avg']; 
   //echo $array_class_average1[0];
  // echo"</br>";
 } 
 
 //first subject  
 $class_average2 = mysql_query("Select AVG(Total) AS Subj_Avg From score_sheet Where Session='$session' AND Class='$class' AND Term ='$term' AND Department='$department' AND Subj_ID='$class_subj_id[1]' ");
 while($row_class_average2 = mysql_fetch_array($class_average2)){
   $array_class_average1[] = $row_class_average2['Subj_Avg']; 
  // echo $array_class_average1[1];
   //echo"</br>";
 }
 
 //first subject  
 $class_average3 = mysql_query("Select AVG(Total) AS Subj_Avg From score_sheet Where Session='$session' AND Class='$class' AND Term ='$term' AND Department='$department' AND Subj_ID='$class_subj_id[2]' ");
 while($row_class_average3 = mysql_fetch_array($class_average3)){
   $array_class_average1[] = $row_class_average3['Subj_Avg']; 
   //echo $array_class_average1[2];
   //echo"</br>";
 }
 
 //first subject  
 $class_average4 = mysql_query("Select AVG(Total) AS Subj_Avg From score_sheet Where Session='$session' AND Class='$class' AND Term ='$term' AND Department='$department' AND Subj_ID='$class_subj_id[3]' ");
 while($row_class_average4 = mysql_fetch_array($class_average4)){
   $array_class_average1[] = $row_class_average4['Subj_Avg']; 
   //echo $array_class_average1[3];
   //echo"</br>";
 }
 
 //first subject  
 $class_average5 = mysql_query("Select AVG(Total) AS Subj_Avg From score_sheet Where Session='$session' AND Class='$class' AND Term ='$term' AND Department='$department' AND Subj_ID='$class_subj_id[4]' ");
 while($row_class_average5 = mysql_fetch_array($class_average5)){
   $array_class_average1[] = $row_class_average5['Subj_Avg']; 
   //echo $array_class_average1[4];
   //echo"</br>";
 }
 
 //first subject  
 $class_average6= mysql_query("Select AVG(Total) AS Subj_Avg From score_sheet Where Session='$session' AND Class='$class' AND Term ='$term' AND Department='$department' AND Subj_ID='$class_subj_id[5]' ");
 while($row_class_average6 = mysql_fetch_array($class_average6)){
   $array_class_average1[] = $row_class_average6['Subj_Avg']; 
   //echo $array_class_average1[5];
   //echo"</br>";
 }
 
 //first subject  
 $class_average7 = mysql_query("Select AVG(Total) AS Subj_Avg From score_sheet Where Session='$session' AND Class='$class' AND Term ='$term' AND Department='$department' AND Subj_ID='$class_subj_id[6]' ");
 while($row_class_average7 = mysql_fetch_array($class_average7)){
   $array_class_average1[] = $row_class_average7['Subj_Avg']; 
   //echo $array_class_average1[6];
   //echo"</br>";
 }
 
 //first subject  
 $class_average8 = mysql_query("Select AVG(Total) AS Subj_Avg From score_sheet Where Session='$session' AND Class='$class' AND Term ='$term' AND Department='$department' AND Subj_ID='$class_subj_id[7]' ");
 while($row_class_average8 = mysql_fetch_array($class_average8)){
   $array_class_average1[] = $row_class_average8['Subj_Avg']; 
   //echo $array_class_average1[7];
   //echo"</br>";
 }
 
 //first subject  
 $class_average9 = mysql_query("Select AVG(Total) AS Subj_Avg From score_sheet Where Session='$session' AND Class='$class' AND Term ='$term' AND Department='$department' AND Subj_ID='$class_subj_id[8]' ");
 while($row_class_average9 = mysql_fetch_array($class_average9)){
   $array_class_average1[] = $row_class_average9['Subj_Avg']; 
   //echo $array_class_average1[8];
   //echo"</br>";
   
 }
 
 //first subject  
 $class_average10 = mysql_query("Select AVG(Total) AS Subj_Avg From score_sheet Where Session='$session' AND Class='$class' AND Term ='$term' AND Department='$department' AND Subj_ID='$class_subj_id[9]' ");
 while($row_class_average10 = mysql_fetch_array($class_average10)){
   $array_class_average1[] = $row_class_average10['Subj_Avg']; 
   //echo $array_class_average1[9];
   //echo"</br>";
 }
 
 //first subject  
 $class_average11 = mysql_query("Select AVG(Total) AS Subj_Avg From score_sheet Where Session='$session' AND Class='$class' AND Term ='$term' AND Department='$department' AND Subj_ID='$class_subj_id[10]' ");
 while($row_class_average11 = mysql_fetch_array($class_average11)){
   $array_class_average1[] = $row_class_average11['Subj_Avg']; 
   //echo $array_class_average1[10];
   //echo"</br>";
 }
 
 //first subject  
 $class_average12 = mysql_query("Select AVG(Total) AS Subj_Avg From score_sheet Where Session='$session' AND Class='$class' AND Term ='$term' AND Department='$department' AND Subj_ID='$class_subj_id[11]' ");
 while($row_class_average12 = mysql_fetch_array($class_average12)){
   $array_class_average1[] = $row_class_average12['Subj_Avg']; 
   //echo $array_class_average1[11];
   //echo"</br>";
 }
 
 //first subject  
 $class_average13 = mysql_query("Select AVG(Total) AS Subj_Avg From score_sheet Where Session='$session' AND Class='$class' AND Term ='$term' AND Department='$department' AND Subj_ID='$class_subj_id[12]' ");
 while($row_class_average13 = mysql_fetch_array($class_average13)){
   $array_class_average1[] = $row_class_average13['Subj_Avg']; 
   //echo $array_class_average1[12];
   //echo"</br>";
 }
 
 //first subject  
 $class_average14 = mysql_query("Select AVG(Total) AS Subj_Avg From score_sheet Where Session='$session' AND Class='$class' AND Term ='$term' AND Department='$department' AND Subj_ID='$class_subj_id[13]' ");
 while($row_class_average14 = mysql_fetch_array($class_average14)){
   $array_class_average1[] = $row_class_average14['Subj_Avg']; 
   //echo $array_class_average1[13];
   //echo"</br>";
 }
 
 //first subject  
 $class_average15 = mysql_query("Select AVG(Total) AS Subj_Avg From score_sheet Where Session='$session' AND Class='$class' AND Term ='$term' AND Department='$department' AND Subj_ID='$class_subj_id[14]' ");
 while($row_class_average15 = mysql_fetch_array($class_average15)){
   $array_class_average1[] = $row_class_average15['Subj_Avg']; 
   //echo $array_class_average1[14];

 }



// Assign position in Subjects

//first subject  
 $class_average1p = mysql_query("SELECT s1.ID_Number, Total, Subj_ID, (SELECT COUNT(*) FROM score_sheet s2 WHERE s2.Total > s1.Total AND s2.Session='$session' AND s2.Class='$class' AND s2.Term='$term' AND s2.Department='$department' AND s2.Subj_ID='$class_subj_id[0]' ) +1 AS level FROM score_sheet s1 WHERE s1.Session='$session' AND s1.Class='$class' AND s1.Term='$term' AND s1.Department='$department' AND s1.Subj_ID='$class_subj_id[0]' ");
 while($row_class_average1p = mysql_fetch_array($class_average1p)){
   $array_class_average1p[] = $row_class_average1p['level'];
   $array_class_id1p[] = $row_class_average1p['ID_Number'];
   $array_class_subj1p[] = $row_class_average1p['Subj_ID'];
   //echo $array_class_average1[0];
  // echo"</br>";
 } 
 
 //first subject  
 $class_average2p = mysql_query("SELECT s1.ID_Number, Total, Subj_ID, (SELECT COUNT(*) FROM score_sheet s2 WHERE s2.Total > s1.Total AND s2.Session='$session' AND s2.Class='$class' AND s2.Term='$term' AND s2.Department='$department' AND s2.Subj_ID='$class_subj_id[1]' ) +1 AS level FROM score_sheet s1 WHERE s1.Session='$session' AND s1.Class='$class' AND s1.Term='$term' AND s1.Department='$department' AND s1.Subj_ID='$class_subj_id[1]' ");
 while($row_class_average2p = mysql_fetch_array($class_average2p)){
   $array_class_average2p[] = $row_class_average2p['level']; 
   $array_class_id2p[] = $row_class_average2p['ID_Number'];
   $array_class_subj2p[] = $row_class_average2p['Subj_ID'];
  // echo $array_class_average1[1];
   //echo"</br>";
 }
 
 //first subject  
 $class_average3p = mysql_query("SELECT s1.ID_Number, Total, Subj_ID, (SELECT COUNT(*) FROM score_sheet s2 WHERE s2.Total > s1.Total AND s2.Session='$session' AND s2.Class='$class' AND s2.Term='$term' AND s2.Department='$department' AND s2.Subj_ID='$class_subj_id[2]' ) +1 AS level FROM score_sheet s1 WHERE s1.Session='$session' AND s1.Class='$class' AND s1.Term='$term' AND s1.Department='$department' AND s1.Subj_ID='$class_subj_id[2]' ");
 while($row_class_average3p = mysql_fetch_array($class_average3p)){
   $array_class_average3p[] = $row_class_average3p['level'];
   $array_class_id3p[] = $row_class_average3p['ID_Number'];
   $array_class_subj3p[] = $row_class_average3p['Subj_ID']; 
   //echo $array_class_average1[2];
   //echo"</br>";
 }
 
 //first subject  
 $class_average4p = mysql_query("SELECT s1.ID_Number, Total, Subj_ID, (SELECT COUNT(*) FROM score_sheet s2 WHERE s2.Total > s1.Total AND s2.Session='$session' AND s2.Class='$class' AND s2.Term='$term' AND s2.Department='$department' AND s2.Subj_ID='$class_subj_id[3]' ) +1 AS level FROM score_sheet s1 WHERE s1.Session='$session' AND s1.Class='$class' AND s1.Term='$term' AND s1.Department='$department' AND s1.Subj_ID='$class_subj_id[3]' ");
 while($row_class_average4p = mysql_fetch_array($class_average4p)){
   $array_class_average4p[] = $row_class_average4p['level'];
   $array_class_id4p[] = $row_class_average4p['ID_Number'];
   $array_class_subj4p[] = $row_class_average4p['Subj_ID']; 
   //echo $array_class_average1[3];
   //echo"</br>";
 }
 
 //first subject  
 $class_average5p = mysql_query("SELECT s1.ID_Number, Total, Subj_ID, (SELECT COUNT(*) FROM score_sheet s2 WHERE s2.Total > s1.Total AND s2.Session='$session' AND s2.Class='$class' AND s2.Term='$term' AND s2.Department='$department' AND s2.Subj_ID='$class_subj_id[4]' ) +1 AS level FROM score_sheet s1 WHERE s1.Session='$session' AND s1.Class='$class' AND s1.Term='$term' AND s1.Department='$department' AND s1.Subj_ID='$class_subj_id[4]' ");
 while($row_class_average5p = mysql_fetch_array($class_average5p)){
   $array_class_average5p[] = $row_class_average5p['level'];
   $array_class_id5p[] = $row_class_average5p['ID_Number'];
   $array_class_subj5p[] = $row_class_average5p['Subj_ID']; 
   //echo $array_class_average1[4];
   //echo"</br>";
 }
 
 //first subject  
 $class_average6p= mysql_query("SELECT s1.ID_Number, Total, Subj_ID, (SELECT COUNT(*) FROM score_sheet s2 WHERE s2.Total > s1.Total AND s2.Session='$session' AND s2.Class='$class' AND s2.Term='$term' AND s2.Department='$department' AND s2.Subj_ID='$class_subj_id[5]') +1 AS level FROM score_sheet s1 WHERE s1.Session='$session' AND s1.Class='$class' AND s1.Term='$term' AND s1.Department='$department' AND s1.Subj_ID='$class_subj_id[5]' ");
 while($row_class_average6p = mysql_fetch_array($class_average6p)){
   $array_class_average6p[] = $row_class_average6p['level']; 
   $array_class_id6p[] = $row_class_average6p['ID_Number'];
   $array_class_subj6p[] = $row_class_average6p['Subj_ID'];
   //echo $array_class_average1[5];
   //echo"</br>";
 }
 
 //first subject  
 $class_average7p = mysql_query("SELECT s1.ID_Number, Total, Subj_ID, (SELECT COUNT(*) FROM score_sheet s2 WHERE s2.Total > s1.Total AND s2.Session='$session' AND s2.Class='$class' AND s2.Term='$term' AND s2.Department='$department' AND s2.Subj_ID='$class_subj_id[6]' ) +1 AS level FROM score_sheet s1 WHERE s1.Session='$session' AND s1.Class='$class' AND s1.Term='$term' AND s1.Department='$department' AND s1.Subj_ID='$class_subj_id[6]' ");
 while($row_class_average7p = mysql_fetch_array($class_average7p)){
   $array_class_average7p[] = $row_class_average7p['level'];
   $array_class_id7p[] = $row_class_average7p['ID_Number'];
   $array_class_subj7p[] = $row_class_average7p['Subj_ID']; 
   //echo $array_class_average1[6];
   //echo"</br>";
 }
 
 //first subject  
 $class_average8p = mysql_query("SELECT s1.ID_Number, Total, Subj_ID, (SELECT COUNT(*) FROM score_sheet s2 WHERE s2.Total > s1.Total AND s2.Session='$session' AND s2.Class='$class' AND s2.Term='$term' AND s2.Department='$department' AND s2.Subj_ID='$class_subj_id[7]' ) +1 AS level FROM score_sheet s1 WHERE s1.Session='$session' AND s1.Class='$class' AND s1.Term='$term' AND s1.Department='$department' AND s1.Subj_ID='$class_subj_id[7]' ");
 while($row_class_average8p = mysql_fetch_array($class_average8p)){
   $array_class_average8p[] = $row_class_average8p['level'];
   $array_class_id8p[] = $row_class_average8p['ID_Number'];
   $array_class_subj8p[] = $row_class_average8p['Subj_ID']; 
   //echo $array_class_average1[7];
   //echo"</br>";
 }
 
 //first subject  
 $class_average9p = mysql_query("SELECT s1.ID_Number, Total, Subj_ID, (SELECT COUNT(*) FROM score_sheet s2 WHERE s2.Total > s1.Total AND s2.Session='$session' AND s2.Class='$class' AND s2.Term='$term' AND s2.Department='$department' AND s2.Subj_ID='$class_subj_id[8]' ) +1 AS level FROM score_sheet s1 WHERE s1.Session='$session' AND s1.Class='$class' AND s1.Term='$term' AND s1.Department='$department' AND s1.Subj_ID='$class_subj_id[8]' ");
 while($row_class_average9p = mysql_fetch_array($class_average9p)){
   $array_class_average9p[] = $row_class_average9p['level'];
   $array_class_id9p[] = $row_class_average9p['ID_Number'];
   $array_class_subj9p[] = $row_class_average9p['Subj_ID']; 
   //echo $array_class_average1[8];
   //echo"</br>";
   
 }
 
 //first subject  
 $class_average10p = mysql_query("SELECT s1.ID_Number, Total, Subj_ID, (SELECT COUNT(*) FROM score_sheet s2 WHERE s2.Total > s1.Total AND s2.Session='$session' AND s2.Class='$class' AND s2.Term='$term' AND s2.Department='$department' AND s2.Subj_ID='$class_subj_id[9]' ) +1 AS level FROM score_sheet s1 WHERE s1.Session='$session' AND s1.Class='$class' AND s1.Term='$term' AND s1.Department='$department' AND s1.Subj_ID='$class_subj_id[9]' ");
 while($row_class_average10p = mysql_fetch_array($class_average10p)){
   $array_class_average10p[] = $row_class_average10p['level']; 
   $array_class_id10p[] = $row_class_average10p['ID_Number'];
   $array_class_subj10p[] = $row_class_average10p['Subj_ID'];
   //echo $array_class_average1[9];
   //echo"</br>";
 }
 
 //first subject  
 $class_average11p = mysql_query("SELECT s1.ID_Number, Total, Subj_ID, (SELECT COUNT(*) FROM score_sheet s2 WHERE s2.Total > s1.Total AND s2.Session='$session' AND s2.Class='$class' AND s2.Term='$term' AND s2.Department='$department' AND s2.Subj_ID='$class_subj_id[10]' ) +1 AS level FROM score_sheet s1 WHERE s1.Session='$session' AND s1.Class='$class' AND s1.Term='$term' AND s1.Department='$department' AND s1.Subj_ID='$class_subj_id[10]' ");
 while($row_class_average11p = mysql_fetch_array($class_average11p)){
   $array_class_average11p[] = $row_class_average11p['level'];
   $array_class_id11p[] = $row_class_average11p['ID_Number'];
   $array_class_subj11p[] = $row_class_average11p['Subj_ID']; 
   //echo $array_class_average1[10];
   //echo"</br>";
 }
 
 //first subject  
 $class_average12p = mysql_query("SELECT s1.ID_Number, Total, Subj_ID, (SELECT COUNT(*) FROM score_sheet s2 WHERE s2.Total > s1.Total AND s2.Session='$session' AND s2.Class='$class' AND s2.Term='$term' AND s2.Department='$department' AND s2.Subj_ID='$class_subj_id[11]' ) +1 AS level FROM score_sheet s1 WHERE s1.Session='$session' AND s1.Class='$class' AND s1.Term='$term' AND s1.Department='$department' AND s1.Subj_ID='$class_subj_id[11]' ");
 while($row_class_average12p = mysql_fetch_array($class_average12p)){
   $array_class_average12p[] = $row_class_average12p['level'];
   $array_class_id12p[] = $row_class_average12p['ID_Number'];
   $array_class_subj12p[] = $row_class_average12p['Subj_ID']; 
   //echo $array_class_average1[11];
   //echo"</br>";
 }
 
 //first subject  
 $class_average13p = mysql_query("SELECT s1.ID_Number, Total, Subj_ID, (SELECT COUNT(*) FROM score_sheet s2 WHERE s2.Total > s1.Total AND s2.Session='$session' AND s2.Class='$class' AND s2.Term='$term' AND s2.Department='$department' AND s2.Subj_ID='$class_subj_id[12]' ) +1 AS level FROM score_sheet s1 WHERE s1.Session='$session' AND s1.Class='$class' AND s1.Term='$term' AND s1.Department='$department' AND s1.Subj_ID='$class_subj_id[12]' ");
 while($row_class_average13p = mysql_fetch_array($class_average13p)){
   $array_class_average13p[] = $row_class_average13p['level'];
   $array_class_id13p[] = $row_class_average13p['ID_Number'];
   $array_class_subj13p[] = $row_class_average13p['Subj_ID']; 
   //echo $array_class_average1[12];
   //echo"</br>";
 }
 
 //first subject  
 $class_average14p = mysql_query("SELECT s1.ID_Number, Total, Subj_ID, (SELECT COUNT(*) FROM score_sheet s2 WHERE s2.Total > s1.Total AND s2.Session='$session' AND s2.Class='$class' AND s2.Term='$term' AND s2.Department='$department' AND s2.Subj_ID='$class_subj_id[13]') +1 AS level FROM score_sheet s1 WHERE s1.Session='$session' AND s1.Class='$class' AND s1.Term='$term' AND s1.Department='$department' AND s1.Subj_ID='$class_subj_id[13]' ");
 while($row_class_average14p = mysql_fetch_array($class_average14p)){
   $array_class_average14p[] = $row_class_average14p['level']; 
   $array_class_id14p[] = $row_class_average14p['ID_Number'];
   $array_class_subj14p[] = $row_class_average14p['Subj_ID'];
   //echo $array_class_average1[13];
   //echo"</br>";
 }
 
 //first subject  
 $class_average15p = mysql_query("SELECT s1.ID_Number, Total, Subj_ID, (SELECT COUNT(*) FROM score_sheet s2 WHERE s2.Total > s1.Total AND s2.Session='$session' AND s2.Class='$class' AND s2.Term='$term' AND s2.Department='$department' AND s2.Subj_ID='$class_subj_id[14]' ) +1 AS level FROM score_sheet s1 WHERE s1.Session='$session' AND s1.Class='$class' AND s1.Term='$term' AND s1.Department='$department' AND s1.Subj_ID='$class_subj_id[14]' ");
 while($row_class_average15p = mysql_fetch_array($class_average15p)){
   $array_class_average15p[] = $row_class_average15p['level'];
   $array_class_id15p[] = $row_class_average15p['ID_Number'];
   $array_class_subj15p[] = $row_class_average15p['Subj_ID']; 
   //echo $array_class_average1[14];

 }





// Character assessment
$character = mysql_query("Select * from final_score_sheet Where Session='$session' AND Class='$class' AND Term ='$term' AND Department='$department' ");
$num_character = mysql_num_rows($character);
//echo $num_character;
while($row_character = mysql_fetch_array($character)){
$attendance1[] = $row_character['Attendance'];
$attentiveness1[] = $row_character['Attentiveness'];
$punctuality1[] = $row_character['Punctuality'];
$neatness1[]	= $row_character['Neatness'];
$politeness1[] = $row_character['Politeness'];
$self_control1[] = $row_character['Self_Control'];
$relationship1[] = $row_character['Relationships'];
$responsibility1[] = $row_character['Responsibility'];
$initiative1[]= $row_character['Initiative'];
$perseverance1[] = $row_character['Perseverance'];
$honesty1[] = $row_character['Honesty'];
$hand_writing1[] = $row_character['Hand_Writing'];
$drama1[] = $row_character['Drama'];
$music1[] = $row_character['Music'];
$crafts1[] = $row_character['Crafts'];
$clubs1[] = $row_character['Clubs'];
$hobbies1[] = $row_character['Hobbies'];
$sports1[] = $row_character['Sports'];
$id_character1[] = $row_character['ID_Number'];
$form_master_remark[] =  $row_character['Remark'];
}






$class1 = $class;
$class1 = substr($class1,0,3);
if($term == "FIRST TERM"){
$term1 = "SECOND TERM";
}else if($term == "SECOND TERM"){
$term1 = "THIRD TERM";
}else if($term == "THIRD TERM"){
$term1 = "FIRST TERM";
}

$info = mysql_query("Select * from school_fees Where Term='$term1' AND Session='$session' AND Class='$class1'");
while($row_class = mysql_fetch_array($info)){
$fees = $row_class['Fees'];
$nextTerm = $row_class['Resumption']; 
}


// Promotion
$promotion = mysql_query("Select * from current_class Where Previous_Class='$class' ");
$num_promotion = mysql_num_rows($promotion);
while($row_promotion = mysql_fetch_array($promotion)){
$promotion_id[] = $row_promotion['ID_Number'];
$promotion_comment[] = $row_promotion['Comment'];
$promotion_class[] = $row_promotion['Class'];
}


//Average

$average1 = mysql_query("Select * from final_score_sheet Where Session='$session' AND Class='$class' AND Term ='FIRST TERM' AND Department='$department'");
$num_average1 = mysql_num_rows($average1);
if($num_average1 > 0){
while($row1=mysql_fetch_array($average1)){
$average_1[] = $row1['Average'];
$id_average1[] = $row1['ID_Number'];
}
}


$average2 = mysql_query("Select * from final_score_sheet Where Session='$session' AND Class='$class' AND Term ='SECOND TERM' AND Department='$department'");
$num_average2 = mysql_num_rows($average2);
if($num_average2 > 0){
while($row2=mysql_fetch_array($average2)){
$average_2[] = $row2['Average'];
$id_average2[] = $row2['ID_Number'];
}
}else{
// do nothing
}


$average3 = mysql_query("Select * from final_score_sheet Where Session='$session' AND Class='$class' AND Term ='THIRD TERM' AND Department='$department'");
$num_average3 = mysql_num_rows($average3);
if($num_average3 > 0){
while($row3=mysql_fetch_array($average3)){
$average_3[] = $row3['Average'];
$id_average3[] = $row3['ID_Number'];
}
}else{
// do nothing
}


$verify = mysql_query("Select * from score_sheet Where score_sheet.Session='$session' AND score_sheet.Class='$class' AND score_sheet.Term='$term' AND score_sheet.Department='$department'");
$num_verify = mysql_num_rows($verify);
if($num_verify > 0){

// Asign positions
$query = mysql_query("SELECT t1.ID_Number, Average, Total, Num_Subj, (SELECT COUNT(*) FROM final_score_sheet t2 WHERE t2.Average > t1.Average AND t2.Session='$session' AND t2.Class='$class' AND t2.Term='$term' AND t2.Department='$department') +1 AS rank FROM final_score_sheet t1 WHERE t1.Session='$session' AND t1.Class='$class' AND t1.Term='$term' AND t1.Department='$department' ORDER BY rank ");
//$query = mysql_query("SELECT COUNT(*)+1 AS rank FROM (SELECT Average FROM final_score_sheet ORDER BY Average) AS sc WHERE Average < (SELECT Average FROM final_score_sheet WHERE ID_Number='EAD/0902' )");
$num_pos= mysql_num_rows($query);
while($row2=mysql_fetch_array($query)){
$pos[] = $row2['rank'];
$id[] = $row2['ID_Number'];
$tot[] = $row2['Total'];
$ave[] = $row2['Average'];
$ns[] = $row2['Num_Subj'];

$idn[] = $row2['ID_Number'];

}

//for($z=0; $z < $num_pos; $z++){
//echo $pos[$z];
//}
echo'</br>';

$sql = mysql_query("Select ID_Number, SUM(Total) AS Gtotal, AVG(Total) AS Gaverage, COUNT(Subj_ID) AS Subj FROM score_sheet WHERE score_sheet.Session='$session' AND score_sheet.Class='$class' AND score_sheet.Term='$term'  AND score_sheet.Department='$department' GROUP BY ID_Number ORDER BY ID_Number DESC");
$numrows = mysql_num_rows($sql);
$counter = 0;
while($row1=mysql_fetch_assoc($sql)){
$array1[] = $row1['Gtotal'];
$array2[] = $row1['Gaverage'];
$array3[] = $row1['Subj'];

}

$generate_pos = mysql_query("Select DISTINCT Subj_ID From score_sheet");
//$generate_pos = mysql_query("SELECT students.ID_Number, students.Name, students.DOB, subject.Subjects, subject.Subj_ID, score_sheet.First, score_sheet.Second, score_sheet.Third, score_sheet.Fourth, score_sheet.Exams, score_sheet.Class, score_sheet.Session, score_sheet.Term, score_sheet.Department FROM students JOIN score_sheet ON students.ID_Number = score_sheet.ID_Number JOIN subject ON subject.Subj_ID = score_sheet.Subj_ID WHERE score_sheet.Session='$session' AND score_sheet.Class='$class' AND score_sheet.Term='$term' AND score_sheet.Department='$department' GROUP BY students.ID_Number, score_sheet.Subj_ID ");
$generate_num_row = mysql_num_rows($generate_pos);
while($generate_row = mysql_fetch_array($generate_pos)){
$generate_subj_id[] = $generate_row['Subj_ID'];

//echo $generate_subj_id;
}

?>




<html>
<head>

  <title>Bright Future  E- School System Online Result Slip</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
  
  <script language="javascript" src="validate.js" > </script>
  <style type="text/css">
<!--
.style39 {
	color: #FF0066;
	font-size: 18px;
	font-family: "Times New Roman", Times, serif;
	font-weight: bold;
}
.style42 {font-size: 12px}
.style54 {font-size: 14px}
-->
  </style>
</head>
  <style type="text/css">
<!--
.style14 {font-size: 36px}
.style18 {
	font-weight: bold;
	color: #000066;
	font-family: "Times New Roman", Times, serif;
}
.style19 {color: #993300}
.style38 {color: #0000FF}
.style40 {color: #000033}
.style44 {color: #000033; font-weight: bold; }
.style45 {
	font-size: 12px;
	font-weight: bold;
}
.style46 {
	color: #000033;
	font-size: 12px;
	font-weight: bold;
}
.style49 {
	font-size: 14px;
	font-weight: bold;
	color: #000033;
}
.style52 {
	font-size: 14px;
	font-weight: bold;
}
.style55 {font-size: 12}
-->
  </style>
  
<body background="images/1.gif">
<div id="wrapper">
<?php include("DB_connection.php");
//$counter = 0;

//doGrade();
//$generate = "SELECT students.ID_Number, students.Name, subject.Subjects, score_sheet.First, score_sheet.Second, score_sheet.Third, score_sheet.Fourth, score_sheet.Exams, score_sheet.Class FROM students JOIN score_sheet ON students.ID_Number = score_sheet.ID_Number JOIN subject ON subject.Subj_ID = score_sheet.Subj_ID Where score_sheet.Class ='JSS1A'";
$generate = "SELECT students.ID_Number, students.Name, students.DOB, students.Gender, subject.Subjects, subject.Subj_ID, score_sheet.First, score_sheet.Second, score_sheet.Third, score_sheet.Fourth, score_sheet.Exams, score_sheet.Class, score_sheet.Session, score_sheet.Term, score_sheet.Department, score_sheet.Comment FROM students JOIN score_sheet ON students.ID_Number = score_sheet.ID_Number JOIN subject ON subject.Subj_ID = score_sheet.Subj_ID WHERE score_sheet.Session='$session' AND score_sheet.Class='$class' AND score_sheet.Term='$term' AND score_sheet.Department='$department' GROUP BY students.ID_Number, score_sheet.Subj_ID ";
//$generate = "SELECT students.ID_Number, students.Name, score_sheet.First, score_sheet.Second, score_sheet.Third, score_sheet.Fourth, score_sheet.Exams, subject.Subjects, subject.Subj_ID FROM students JOIN score_sheet ON students.ID_Number = score_sheet.ID_Number JOIN subject ON subject.Subj_ID = score_sheet.Subj_ID GROUP BY students.ID_Number, score_sheet.Subj_ID";
$num = mysql_query("Select DISTINCT ID_Number from score_sheet");
$numr = mysql_num_rows($num);
$numrc = 0;
$fetch = mysql_query($generate);
$num_rows =  mysql_num_rows($fetch);
$previousId = -1;


$d_id = 0;
$g_id = 1;


while($row = mysql_fetch_array($fetch) or die(mysql_error())){
$idno1[] = $row['ID_Number'];
$idno[] = $row['ID_Number'];
$department = $row['Department'];
$subj_comment = $row['Comment'];
$subj[] = $row['Subj_ID'];
$session = $row['Session'];
$gender = $row['Gender'];
$term = $row['Term'];
$class = $row['Class'];
$class = substr($class,0,4);
$first = $row['First'];
$second = $row['Second'];
$third = $row['Third'];
$fourth = $row['Fourth'];
$exams = $row['Exams'];
$ca_total = $first + $second + $third + $fourth;
$total = $ca_total + $exams;


// JSS1 - JSS3
$r1 = range(0, 39); // F-fail
$r2 = range(40, 59); // P-pass
$r3 = range(60, 69); // C-credit
$r4 = range(70, 100); // A-distinction
//$r5 = range(70, 100); 

// JSS2 and JSS3
/*$r6 = range(0, 44); // F
$r7 = range(45, 49); // P
$r8 = range(50, 59); // C
$r9 = range(60, 69); // V Good
$r10 = range(70, 100); // A */

//SS Class SS1 - SS2
$r11 = range(0, 39); // F fail
$r12 = range(40, 44); // E-poor
$r13 = range(45, 49); // D-below average
$r14 = range(50, 59); // C-credit
$r15 = range(60, 69); // B-good
$r16 = range(70, 100); // A-excellent

// SS3
$r17 = range(0, 39); // F9-fail
$r18 = range(40, 44); // E8-pass
$r19 = range(45, 53); // D7-pass
$r20 = range(54, 58); // C6-credit
$r21 = range(59, 63); // C5-credit
$r22 = range(64, 68); // C4-credit
$r23 = range(69, 74); // B3-good
$r24 = range(75, 99); // B2-v.good
$r25 = range(80, 100); // A1-excellent


$total = round($total);
if($department == "BASIC EDUCATION"){

switch (true){
	case in_array($total, $r1) :
	
	$grade = "F";
	$remark = "Fail";
	break;
	case in_array($total, $r2) :
	$grade = "P";
	$remark = "Pass";
	break;
	case in_array($total, $r3) :
	$grade = "C";
	$remark = "Credit";
	break;
	case in_array($total, $r4) :
	$grade = "A";
	$remark = "Distinction";
	break;
	/*case in_array($total, $r5):
	$grade = "A";
	$remark = "Excellent";
	break;*/
}


}else if($class == "SSS1" || $class == "SSS2"){


switch (true){
	case in_array($total, $r11) :
	$grade = "F";
	$remark = "Fail";
	break;
	case in_array($total, $r12) :
	$grade = "E";
	$remark = "Poor";
	break;
	case in_array($total, $r13) :
	$grade = "D";
	$remark = "Below Average";
	break;
	case in_array($total, $r14) :
	$grade = "C";
	$remark = "Credit";
	break;
	case in_array($total, $r15):
	$grade = "B";
	$remark = "Good";
	break;
	case in_array($total, $r16):
	$grade = "A";
	$remark = "Excellent";
	break;
}


}else if($class == "SSS3"){


switch (true){
	case in_array($total, $r17) :
	$grade = "F9";
	$remark = "Fail";
	break;
	case in_array($total, $r18) :
	$grade = "E8";
	$remark = "Pass";
	break;
	case in_array($total, $r19) :
	$grade = "D7";
	$remark = "Pass";
	break;
	case in_array($total, $r20) :
	$grade = "C6";
	$remark = "Credit";
	break;
	case in_array($total, $r21):
	$grade = "C5";
	$remark = "Credit";
	break;
	case in_array($total, $r22):
	$grade = "C4";
	$remark = "Credit";
	break;
	case in_array($total, $r23):
	$grade = "B3";
	$remark = "Good";
	break;
	case in_array($total, $r24):
	$grade = "B2";
	$remark = "V.Good";
	break;
	case in_array($total, $r25):
	$grade = "A";
	$remark = "Excellent";
	break;
	
}


}




if($row['ID_Number'] != $previousId ){


for($p=0; $p < $num_pos; $p++){
if ($id[$p] == $row['ID_Number']){
$no_subj = $ns[$p];
} 
}

?>


<table>

      <h1 align="center"><span class="style14"><span class="style18">BRIGHT FUTURE <span class="style19">HIGH</span> <span class="style38">SCHOOL</span></span></span></h1>
      <center>
        <span class="style39 style40"><strong></strong>P.O.BOX 22,NUMAN, ADAMAWA STATE </span><BR>
        <span class="style39">SCHOOL CONTINUOUS ASSESSMENT DOSSIER</span>
      </center>
	</table>
	
	
	
  <center>
<hr color="#990000" size="1">
<table width="697" border="0">

<tr>
<td width="691"><span class="style42">Session : </span>&nbsp; <?php echo $row['Session'];?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="style42">Term : </span>&nbsp; <?php echo $row['Term']; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="style42">Date Of Birth : </span>&nbsp; <?php echo $row['DOB'];  ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style42">&nbsp;House :</span></td>
</tr>
<tr><td><hr color="#990000" size="1"></td></tr>
<tr>
<td><span class="style42">Name :</span>&nbsp;&nbsp;&nbsp;  <?php echo  $row['Name'] ; ?> &nbsp;&nbsp;&nbsp;&nbsp;Gender :&nbsp;&nbsp; <?php echo  $row['Gender'] ; ?> <span class="style55">&nbsp;&nbsp;&nbsp;&nbsp;ID_Number : </span>&nbsp; <?php echo $row['ID_Number']; ?> &nbsp;&nbsp;&nbsp; </td>
</tr>
<tr><td><hr color="#990000" size="1"></td></tr>
        <TD width="691"><span class="style42">Class : </span>&nbsp; <?php echo $row['Class']; ?> &nbsp;&nbsp;&nbsp;<span class="style42">Number in Class : </span> &nbsp; <?php echo $numrows; ?> &nbsp;&nbsp; <span class="style42">Attendance </span>&nbsp;_______________&nbsp;<span class="style42">Days</span>__________ <span class="style42">Out of</span> __________  </TD>
<tr><td><hr color="#990000" size="1"></td></tr>
    <TD width="691">Total : <?php  for($p=0; $p < $num_pos; $p++){if ($id[$p] == $row['ID_Number']){echo $tot[$p];} }   //echo $array1[$counter]; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style42">Numberof Sybjects : </span> &nbsp;<?php    for($p=0; $p < $num_pos; $p++){if ($id[$p] == $row['ID_Number']){echo $ns[$p];} } //echo $array3[$counter]; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="style42">Average : </span> &nbsp;<?php  for($p=0; $p < $num_pos; $p++){if ($id[$p] == $row['ID_Number']){echo(round( $ave[$p],2));} }  //echo(round($array2[$counter],2)); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style42">Position : </span>&nbsp; <?php  for($p=0; $p < $num_pos; $p++){if ($id[$p] == $row['ID_Number']){echo $pos[$p];} }?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style42">Out of : </span> &nbsp; <?php echo $num_pos; ?> &nbsp;&nbsp;  </TD>
<tr><td><hr color="#990000" size="1"></td></tr>
</TR>
<?php 
//$previousId = $row['ID_Number'];

 ?>

</table>

<!--<table width="696" border="1" cellpadding="0" cellspacing="0"  style="border-bottom-width:medium ">-->
<table width="696" border="0">
<tr>
<td width="137" class="style40" ><strong><font size="2">SUBJECT</font></strong></td>
<td width="31"><span class="style44"><font size="2">1CA</font></span> </td>
<td width="32" class="style40"><strong><font size="2">2CA</font></strong></td>
<td width="32" class="style40" ><strong><font size="2">EXS</font></strong></td>
<td width="32" class="style40" ><strong><font size="2">TOT</font></strong></td> 
<td width="31" class="style40" ><strong><font size="2">SAVG</font></strong></td>
<td width="31" class="style40" ><strong><font size="2"> POS</font></strong></td>
<td width="33" class="style44" ><font size="2">GRD</font></td> 
<td width="60" class="style40" ><strong><font size="2"> REMARK</font></strong></td>
<td width="100" class="style40" ><strong><font size="2">&nbsp;&nbsp;COMMENT</font></strong></td>  
</tr>
</table>



 <?php
 
 $previousId = $row['ID_Number'];
 $counter =  $counter + 1;
}
?>
<?php
//$counter =  $counter + 1;
?>
<!--<table  width="696" border="1" style="border-collapse:collapse ">-->
 <table width="696" border="1" cellpadding="0" cellspacing="0"  style="border-bottom-width:medium ">
<tr>
<td width="140" ><font size="2">&nbsp; <?php echo $row['Subjects']; ?> </font></td>
<td width="33"><font size="2">&nbsp; <?php echo $row['First']; ?> </font> </td>
<td width="33"><font size="2">&nbsp; <?php echo $row['Second']; ?> </font></td>
<td width="33" ><font size="2">&nbsp; <?php echo $row['Exams']; ?>  </font></td>
<td width="33" ><font size="2" <?php if ($grade =="F"){ ?> color="#FF0000" <?php } ?>>&nbsp;<?php echo $total;  ?> </font> </td>
<td width="33"><font size="2">&nbsp;<?php for($s=0; $s < $num_class_average_s; $s++){if ($class_subj_id[$s] == $row['Subj_ID']){echo round($array_class_average1[$s],2);} }   ?> </font>  </td>
<td width="33" ><font size="2"> 
<?php 
for($s=0; $s < $num_pos; $s++){
if ($array_class_id1p[$s] == $row['ID_Number'] && $array_class_subj1p[$s] == $row['Subj_ID']){
echo $array_class_average1p[$s];
}else if ($array_class_id2p[$s] == $row['ID_Number'] && $array_class_subj2p[$s] == $row['Subj_ID']){
echo $array_class_average2p[$s];
}else if ($array_class_id3p[$s] == $row['ID_Number'] && $array_class_subj3p[$s] == $row['Subj_ID']){
echo $array_class_average3p[$s];
}else if ($array_class_id4p[$s] == $row['ID_Number'] && $array_class_subj4p[$s] == $row['Subj_ID']){
echo $array_class_average4p[$s];
}else if ($array_class_id5p[$s] == $row['ID_Number'] && $array_class_subj5p[$s] == $row['Subj_ID']){
echo $array_class_average5p[$s];
}else if ($array_class_id6p[$s] == $row['ID_Number'] && $array_class_subj6p[$s] == $row['Subj_ID']){
echo $array_class_average6p[$s];
}else if ($array_class_id7p[$s] == $row['ID_Number'] && $array_class_subj7p[$s] == $row['Subj_ID']){
echo $array_class_average7p[$s];
}else if ($array_class_id8p[$s] == $row['ID_Number'] && $array_class_subj8p[$s] == $row['Subj_ID']){
echo $array_class_average8p[$s];
}else if ($array_class_id9p[$s] == $row['ID_Number'] && $array_class_subj9p[$s] == $row['Subj_ID']){
echo $array_class_average9p[$s];
}else if ($array_class_id10p[$s] == $row['ID_Number'] && $array_class_subj10p[$s] == $row['Subj_ID']){
echo $array_class_average10p[$s];
}else if ($array_class_id11p[$s] == $row['ID_Number'] && $array_class_subj11p[$s] == $row['Subj_ID']){
echo $array_class_average11p[$s];
}else if ($array_class_id12p[$s] == $row['ID_Number'] && $array_class_subj12p[$s] == $row['Subj_ID']){
echo $array_class_average12p[$s];
}else if ($array_class_id13p[$s] == $row['ID_Number'] && $array_class_subj13p[$s] == $row['Subj_ID']){
echo $array_class_average13p[$s];
}else if ($array_class_id14p[$s] == $row['ID_Number'] && $array_class_subj14p[$s] == $row['Subj_ID']){
echo $array_class_average14p[$s];
}else if ($array_class_id15p[$s] == $row['ID_Number'] && $array_class_subj15p[$s] == $row['Subj_ID']){
echo $array_class_average15p[$s];
}

} 



?>  
</font></td> 
<td width="33" ><font size="2" <?php if ($grade =="F"){ ?> color="#FF0000" <?php } ?>>&nbsp; <?php echo $grade; ?> </font></td> 
<td width="70" ><font size="2" <?php if ($grade =="F"){ ?> color="#FF0000" <?php } ?>>&nbsp;<?php echo $remark; ?>  </font></td> 
<td width="100" ><font size="1"> <?php echo $row['Comment'];  ?> </font></td> 
</tr>



<?php
$no_subj = $no_subj - 1;
if($no_subj == 0){

?>

<table width="100%">
<tr>
<td width="100" ><font size="2"> 
  <?php 
  if($class == "JSS1"){
  echo'<center> <span class="style45 style42">GRADE: (0-39 Fail=F), (40-49 Pass=P),(50-59 Good=C),(60-69 V.Good=B),(70-100 Excellent=A) </span> </center>';
  }else if($class == "JSS2" || $class == "JSS3"){
  echo'<center> <span class="style45 style42">GRADE: (0-44 Fail=F), (45-49 Pass=P),(50-59 Good=C),(60-69 V.Good=B),(70-100 Excellent=A) </span> </center>';
  }else{
  echo'<center> <span class="style45 style42">GRADE: (0-49 Fail=F), (50-59 Good=C),(60-69 V.Good=B),(70-100 Excellent=A) </span> </center>';
  }
  ?>
  </font> 
 </td> 
 </tr>
 </table>
 
 <hr color="#990000" size="1">
 <table width="100%" border="0">
<tr>
<td width="" ><strong><font size="1">&nbsp; First Term Average : <?php  if($num_average1 > 0){for($p=0; $p < $num_average1; $p++){if ($id_average1[$p] == $row['ID_Number']){echo(round( $average_1[$p],2)); $s_average_1=$average_1[$p];} }}else{echo ("0"); $s_average_1=0;} ?></font></strong></td> 
<td width="" ><strong><font size="1">&nbsp; Second Term Average : <?php if($num_average2 > 0){ for($p=0; $p < $num_average2; $p++){if ($id_average2[$p] == $row['ID_Number']){echo(round( $average_2[$p],2)); $s_average_2=$average_2[$p];} }}else{echo ("0"); $s_average_2=0;} ?> </font></strong></td> 
<td width="" ><strong><font size="1">&nbsp; Third Term Average : <?php if($num_average3 > 0){ for($p=0; $p < $num_average3; $p++){if ($id_average3[$p] == $row['ID_Number']){echo(round( $average_3[$p],2)); $s_average_3=$average_3[$p];} }}else{echo ("0"); $s_average_3=0;} ?> </font></strong></td>
<td width="" ><strong><font size="1">&nbsp; Cumulative Average :

<!--<table border="0.5">
<tr>
<td width="125" ><strong><font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php // if($num_average1 > 0){for($p=0; $p < $num_average1; $p++){if ($id_average1[$p] == $row['ID_Number']){echo(round( $average_1[$p],2)); $s_average_1=$average_1[$p];} }}else{echo ("0"); $s_average_1=0;} ?></font></strong></td> 
<td width="125" ><strong><font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php // if($num_average2 > 0){ for($p=0; $p < $num_average2; $p++){if ($id_average2[$p] == $row['ID_Number']){echo(round( $average_2[$p],2)); $s_average_2=$average_3[$p];} }}else{echo ("0"); $s_average_2=0;} ?> </font></strong></td> 
<td width="125" ><strong><font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php // if($num_average3 > 0){ for($p=0; $p < $num_average3; $p++){if ($id_average3[$p] == $row['ID_Number']){echo(round( $average_3[$p],2)); $s_average_3=$average_3[$p];} }}else{echo ("0"); $s_average_3=0;} ?> </font></strong></td>
<td width="125" ><strong><font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--> 
<?php 
if($s_average_1 !=0 && $s_average_2 == 0 && $s_average_3 == 0 ){
$d =1;
}else if($s_average_1 ==0 && $s_average_2 != 0 && $s_average_3 == 0){
$d=1;
}else if($s_average_1 ==0 && $s_average_2 == 0 && $s_average_3 != 0){
$d=1;
}else if($s_average_1 !=0 && $s_average_2 != 0 && $s_average_3 == 0){
$d=2;
}else if($s_average_1 !=0 && $s_average_2 == 0 && $s_average_3 != 0){ 
$d=2;
}else if($s_average_1 ==0 && $s_average_2 != 0 && $s_average_3 != 0){
$d=2;
}else{
$d=3;
}
$t_average = ($s_average_1 + $s_average_2 + $s_average_3)/$d;
echo round($t_average,2);
 ?> 
 </font></strong></td>
 </tr>
</table>
 <!--
</tr>
</table>
<tr>
  <td>&nbsp;</td>
</tr>-->
 

<table width="568" height="167" border="1" cellpadding="0" cellspacing="0">
<td width="181" class="style42 style40"><strong>Character Development</strong></td>
<td width="80" class="style42 style40"><strong>Ratings(A-E)</strong></td>
<td width="121" class="style46">Practical Skill Grade</td>
<td width="80" class="style42 style40"><strong>Ratings(5-1)</strong></td>
<td width="79" class="style46">Signature</td>
<tr><td>&nbsp;Attendance </td><td>&nbsp; <?php  $character_id = $row['ID_Number']; for($z=0; $z < $num_character; $z++){if( $character_id == $id_character1[$z]){echo $attendance1[$z];}}?> </td>
<td>&nbsp;Music </td><td>&nbsp; <?php  $character_id = $row['ID_Number']; for($z=0; $z < $num_character; $z++){if( $character_id == $id_character1[$z]){echo $music1[$z];}} ?> </td><td> </td>
</tr>
<tr><td>&nbsp;Attentivenes </td><td>&nbsp; <?php  $character_id = $row['ID_Number']; for($z=0; $z < $num_character; $z++){if( $character_id == $id_character1[$z]){echo $attentiveness1[$z];}}?> </td>
<td>&nbsp;Drama </td><td>&nbsp; <?php  $character_id = $row['ID_Number']; for($z=0; $z < $num_character; $z++){if( $character_id == $id_character1[$z]){echo $drama1[$z];}}?>  </td><td> </td>
</tr>
<tr><td>&nbsp;Punctuality </td><td>&nbsp; <?php  $character_id = $row['ID_Number']; for($z=0; $z < $num_character; $z++){if( $character_id == $id_character1[$z]){echo $punctuality1[$z];}}?> </td>
<td>&nbsp;Hand Writing</td><td>&nbsp; <?php  $character_id = $row['ID_Number']; for($z=0; $z < $num_character; $z++){if( $character_id == $id_character1[$z]){echo $hand_writing1[$z];}}?>   </td><td></td>
</tr>
<tr><td>&nbsp;Politeness </td><td>&nbsp; <?php  $character_id = $row['ID_Number']; for($z=0; $z < $num_character; $z++){if( $character_id == $id_character1[$z]){echo $politeness1[$z];}}?> </td>
<td>&nbsp;Clubs </td><td>&nbsp;  <?php  $character_id = $row['ID_Number']; for($z=0; $z < $num_character; $z++){if( $character_id == $id_character1[$z]){echo $clubs1[$z];}}?> </td><td></td>
</tr>
<tr><td>&nbsp;Neatnesss</td><td>&nbsp; <?php  $character_id = $row['ID_Number']; for($z=0; $z < $num_character; $z++){if( $character_id == $id_character1[$z]){echo $neatness1[$z];}}?>  </td>
<td>&nbsp;Craft</td><td>&nbsp; <?php  $character_id = $row['ID_Number']; for($z=0; $z < $num_character; $z++){if( $character_id == $id_character1[$z]){echo $crafts1[$z];}}?> </td><td></td>
</tr>
<tr><td>&nbsp;Self Control</td><td>&nbsp; <?php  $character_id = $row['ID_Number']; for($z=0; $z < $num_character; $z++){if( $character_id == $id_character1[$z]){echo $self_control1[$z];}}?> </td>
<td>&nbsp;Hobbies</td><td>&nbsp; <?php  $character_id = $row['ID_Number']; for($z=0; $z < $num_character; $z++){if( $character_id == $id_character1[$z]){echo $hobbies1[$z];}}?> </td><td></td>
</tr>
<tr><td>&nbsp;Relationship with others</td><td>&nbsp;  <?php  $character_id = $row['ID_Number']; for($z=0; $z < $num_character; $z++){if( $character_id == $id_character1[$z]){echo $relationship1[$z];}}?> </td>
<td>&nbsp;Sports</td><td>&nbsp; <?php  $character_id = $row['ID_Number']; for($z=0; $z < $num_character; $z++){if( $character_id == $id_character1[$z]){echo $sports1[$z];}}?> </td><td></td>
</tr>
<tr><td>&nbsp;Sense of Responsibility</td><td>&nbsp; <?php  $character_id = $row['ID_Number']; for($z=0; $z < $num_character; $z++){if( $character_id == $id_character1[$z]){echo $responsibility1[$z];}}?></td>
<td>&nbsp;</td><td>&nbsp; <?php  //$character_id = $row['ID_Number']; for($z=0; $z < $num_character; $z++){if( $character_id == $id_character1[$z]){echo $attendance1[$z];}}?> </td><td></td>
</tr>
<tr><td>&nbsp;Initiative</td><td>&nbsp; <?php  $character_id = $row['ID_Number']; for($z=0; $z < $num_character; $z++){if( $character_id == $id_character1[$z]){echo $initiative1[$z];}}?>  </td>
<td>&nbsp;</td><td>&nbsp;</td><td></td>
</tr>
<tr><td>&nbsp;Perseverance</td><td>&nbsp; <?php  $character_id = $row['ID_Number']; for($z=0; $z < $num_character; $z++){if( $character_id == $id_character1[$z]){echo $perseverance1[$z];}}?> </td>
<td>&nbsp;</td><td>&nbsp;</td><td></td>
</tr>
<tr><td>&nbsp;Honesty</td><td>&nbsp; <?php  $character_id = $row['ID_Number']; for($z=0; $z < $num_character; $z++){if( $character_id == $id_character1[$z]){echo $honesty1[$z];}}?> </td
><td>&nbsp;</td><td>&nbsp;</td><td></td>
</tr>
</table>
</br>

<table width="685" height="102" border="1" cellpadding="0" cellspacing="0">
<tr><td width="250"> <div align="center" class="style42 style40"><strong>Form Master's Remark and Signature</strong></div></td><td width="122" class="style46">Next Term Begins</td>
<td width="156" class="style42 style40"><strong>Outstanding School Fees</strong></td>
<td width="139" class="style46">Next Term School Fees</td>
<tr><td> <?php  $character_id = $row['ID_Number']; for($z=0; $z < $num_character; $z++){if( $character_id == $id_character1[$z]){echo $form_master_remark[$z];}}?> </td> <td><center> <?php echo $nextTerm; ?> </center> </td><td><center> <?php for($b=0; $b<$num_out_standing_fees; $b++){if($out_standing_fees_id[$b] == $row['ID_Number']){ echo $out_standing_fees_amount[$b];}}?> </center></td><td><center><?php echo $fees; ?></center></td></tr>
</table>
<div align="left"><br>
    <span class="style49"><span class="style54">Promoted To</span>&nbsp;&nbsp;</span>&nbsp; <?php  for($i=0; $i<$num_promotion; $i++){if($promotion_id[$i] == $row['ID_Number'] && $promotion_comment[$i] == "promoted"){echo $promotion_class[$i];}  } ?>  <span class="style49">&nbsp;
	
	</span><span class="style49">&nbsp;</span> <span class="style49"><span class="style42">To Repeat</span>&nbsp;&nbsp;</span>&nbsp; <?php  for($i=0; $i<$num_promotion; $i++){if($promotion_id[$i] == $row['ID_Number'] && $promotion_comment[$i] == "Not Promoted"){echo $promotion_class[$i];}  } ?>  <span class="style49">&nbsp;&nbsp;<span class="style42">To Withdraw&nbsp;</span>&nbsp;&nbsp;</span>___________________________________________________<span class="style49"><br><BR>
Reason For Advice</span>______________________________________________________________________________________<span class="style52"><br><BR>
<span class="style40">Principal's Comment</span></span>___________________________________________________________________________________</div>
 
 <?php
 //Seprate result
 for($p=0; $p < $num_pos; $p++){
 if ($id[$p] == $row['ID_Number']){
 $no_sub = $ns[$p];
 }}
 if($no_sub == 16 ){
// echo'</br>';
 }else if($no_sub == 15){
//echo'</br>';
 }else if($no_sub == 14){
//echo'</br>';
 }else  if($no_sub == 13){
 //echo'</br>';
  
 }else  if($no_sub == 12){
 echo'</br>';
  
 }else  if($no_sub == 11){
 echo'</br>';
 
 }else  if($no_sub == 10){
 echo'</br>';
  echo'</br>';
  
 }else  if($no_sub == 9){
 echo'</br>';
  echo'</br>';
  
 }else  if($no_sub == 8){
 echo'</br>';
  echo'</br>';
  echo'</br>';
  
 }else  if($no_sub == 7){
 echo'</br>';
  echo'</br>';
  echo'</br>';
  echo'</br>';
}else  if($no_sub == 6){
 echo'</br>';
  echo'</br>';
  echo'</br>';
  echo'</br>';
  echo'</br>';
}else  if($no_sub == 5){
 echo'</br>';
  echo'</br>';
  echo'</br>';
  echo'</br>';
   echo'</br>';
    echo'</br>';
}else  if($no_sub == 4){
 echo'</br>';
  echo'</br>';
  echo'</br>';
  echo'</br>';
   echo'</br>';
    echo'</br>';
	 echo'</br>';
}else  if($no_sub == 3){
 echo'</br>';
  echo'</br>';
  echo'</br>';
  echo'</br>';
   echo'</br>';
    echo'</br>';
	 echo'</br>';
	  echo'</br>';
}else  if($no_sub == 2){
 echo'</br>';
  echo'</br>';
  echo'</br>';
  echo'</br>';
   echo'</br>';
    echo'</br>';
	 echo'</br>';
	  echo'</br>';
	   echo'</br>';
}else  if($no_sub == 1){
 echo'</br>';
  echo'</br>';
  echo'</br>';
  echo'</br>';
   echo'</br>';
    echo'</br>';
	 echo'</br>';
	  echo'</br>';
	   echo'</br>';
	    echo'</br>';
		 
}
 
 
 
 //} 
 //}
 
 ?>

 
<?php
}
?>



<?php
$num_rows = $num_rows - 1;
if($num_rows == 0){

echo '<a href="print_result.php"> <input type="button"  value="Print This Page" onClick="window.print()"  /> </a>';
}

}


?>


 </center>  
</div><!-- end wrapper --> 
<?php
}else{
echo'<a href="print_result.php"><font color="#CC3300" size="+1"><b> No Student In This Class, Click Here To Go Back</b></font> </a>';
} 
?>                             
</body>
</html>