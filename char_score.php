<?php 
include'DB_connection.php';
$department = trim(htmlspecialchars(strtoupper($_GET['departmentid'])));
$class = trim(htmlspecialchars(strtoupper($_GET['classid'])));
$term = trim(htmlspecialchars(strtoupper($_GET['termid'])));
$session = trim(htmlspecialchars(strtoupper($_GET['sessionid'])));
$id_number = trim(htmlspecialchars(strtoupper($_GET['idnumber'])));
//echo $department; echo $class; echo $term; echo $session; echo $id_number;
//$sql1 = mysql_query("Select * From character_assessment Where ID_Number='$id_number' AND Department='$department' AND Class='$class' AND Term='$term' AND session='$session'  ");
// Asign positions
$query = mysql_query("SELECT t1.ID_Number, Average, Total, Num_Subj, (SELECT COUNT(*) FROM final_score_sheet t2 WHERE t2.Average > t1.Average AND t2.Session='$session' AND t2.Class='$class' AND t2.Term='$term' AND t2.Department='$department') +1 AS rank FROM final_score_sheet t1 WHERE t1.Session='$session' AND t1.Class='$class' AND t1.Term='$term' AND t1.Department='$department' ORDER BY rank ");
$num_pos= mysql_num_rows($query);
while ($row1 = mysql_fetch_array($query)){
$pos_id[] = $row1['ID_Number'];
$pos[] = $row1['rank'];
}
for($i=0; $i<$num_pos; $i++){
 if($id_number == $pos_id[$i]){
     $position = $pos[$i];
 }
}



$sql = mysql_query("Select * From final_score_sheet Where final_score_sheet.ID_Number='$id_number' AND final_score_sheet.Department='$department' AND final_score_sheet.Class='$class' AND final_score_sheet.Term='$term' AND final_score_sheet.Session='$session' ");
//$sql = mysql_query("Select ID_Number, Total, Average, Attendance, Attentiveness, Punctuality, Neatness, Politeness, Self_Control, Relationships, Responsibility, Initiative, Perseverance, Honesty, Hand_Writing, Drama, Music, Crafts, Clubs, Hobbies, Sports From final_score_sheet JOIN character_assessment ON final_score_sheet.ID_Number=character_assessment.ID_Number Where final_score_sheet.ID_Number='$id_number' AND final_score_sheet.Department='$department' AND final_score_sheet.Class='$class' AND final_score_sheet.Term='$term' AND final_score_sheet.Session='$session' ");
while($row=mysql_fetch_array($sql)){
  $idnumber = $row['ID_Number'];
  $total = $row['Total']; 
  $average = $row['Average'];
   $attendance = $row['Attendance'];
    $attentiveness = $row['Attentiveness'];
	 $punctuality= $row['Punctuality'];
	  $neatness = $row['Neatness'];
	   $politeness = $row['Politeness'];
	    $self_control = $row['Self_Control'];
		 $relationship = $row['Relationships'];
		  $responsibility = $row['Responsibility'];
		   $initiative = $row['Initiative'];
		    $perseverance = $row['Perseverance'];
			 $honesty = $row['Honesty'];
			  $handwriting = $row['Hand_Writing'];
			   $drama = $row['Drama'];
			    $music = $row['Music'];
				 $crafts = $row['Crafts'];
				  $clubs = $row['Clubs'];
				   $hobbies = $row['Hobbies'];
				   $sports = $row['Sports'];
				    $remark = $row['Remark'];
					 
}
if(empty($idnumber)){
echo"Nill"; echo","; echo"Nill"; echo","; echo"Nill";
}else{
echo "no"; echo","; echo $idnumber; echo","; echo $total; echo","; echo $average; echo","; echo $attendance; echo","; echo($attentiveness); echo","; echo($punctuality); echo","; echo($neatness); echo","; echo($politeness); echo","; echo($self_control); echo","; echo($relationship); echo","; echo($responsibility); echo","; echo($initiative); echo","; echo($perseverance); echo","; echo($honesty); echo","; echo($handwriting); echo","; echo($drama); echo","; echo($music); echo","; echo($crafts); echo","; echo($clubs); echo","; echo($hobbies); echo","; echo($sports); echo","; echo($remark); echo","; echo($position);
}
?>