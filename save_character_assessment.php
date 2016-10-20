<?php
 include'DB_connection.php';
 $idnumber = trim(htmlspecialchars(strtoupper($_POST['idnumberid'])));
 $class = trim(htmlspecialchars(strtoupper($_POST['classid'])));
 $term = trim(htmlspecialchars(strtoupper($_POST['termid'])));
 $session = trim(htmlspecialchars(strtoupper($_POST['sessionid'])));
 $department = trim(htmlspecialchars(strtoupper($_POST['departmentid'])));
 $attendance = trim(htmlspecialchars(strtoupper($_POST['attendanceid'])));
 $attentiveness =trim(htmlspecialchars(strtoupper($_POST['attentivenessid'])));
 $punctuality = trim(htmlspecialchars(strtoupper($_POST['punctualityid'])));
 $neatness = trim(htmlspecialchars(strtoupper($_POST['neatnessid'])));
 $politeness = trim(htmlspecialchars(strtoupper($_POST['politenessid'])));
 $self_control = trim(htmlspecialchars(strtoupper($_POST['self_controlid'])));
 $relationship = trim(htmlspecialchars(strtoupper($_POST['relationshipid'])));
 $responsibility = trim(htmlspecialchars(strtoupper($_POST['responsibilityid'])));
 $initiative = trim(htmlspecialchars(strtoupper($_POST['initiativeid'])));
 $perseverance = trim(htmlspecialchars(strtoupper($_POST['perseveranceid'])));
 $honesty = trim(htmlspecialchars(strtoupper($_POST['honestyid'])));
 $handwriting = trim(htmlspecialchars(strtoupper($_POST['handwritingid'])));
 $drama = trim(htmlspecialchars(strtoupper($_POST['dramaid'])));
 $music = trim(htmlspecialchars(strtoupper($_POST['musicid'])));
 $crafts = trim(htmlspecialchars(strtoupper($_POST['craftsid'])));
 $clubs = trim(htmlspecialchars(strtoupper($_POST['clubsid'])));
 $hobbies = trim(htmlspecialchars(strtoupper($_POST['hobbiesid'])));
 $sports = trim(htmlspecialchars(strtoupper($_POST['sportsid'])));
 $remark = trim(htmlspecialchars(strtoupper($_POST['remarkid'])));
 //echo($idnumber); echo($class); echo($term); echo($session); echo($department); echo($attendance); echo($attentiveness); echo($punctuality); echo($neatness);
 //echo($politeness); echo($self_control); echo($relationship); echo($responsibility); echo($initiative); echo($perseverance); echo($honesty); echo($handwriting);
//echo($drama); echo($music); echo($crafts); echo($clubs); echo($hobbies); echo($sports); echo($remark);
// $sql = mysql_query("Insert into character_assessment (Attendance, Attentiveness, Punctuality, Neatness, Politeness, Self_Control, Relationships, Responsibility, Initiative, Perseverance, Honesty, Hand_Writing, Drama, Music, Crafts, Clubs, Hobbies, Sports, ID_Number, Department, Session, Term, Class, Remark) VALUES ('$attendance', '$attentiveness', '$punctuality', '$neatness', '$politeness', '$self_control', '$relationship', '$responsibility', '$initiative', '$perseverance', '$honesty', '$handwriting', '$drama', '$music', '$crafts', '$clubs', '$hobbies', '$sports', '$idnumber', '$department', '$session', '$term', '$class', '$remark')");                                                                                                                                                          
$verify = mysql_query("Select * From final_score_sheet Where ID_Number='$idnumber' AND Department='$department' AND Class='$class' AND Term='$term' AND Session='$session' ");
$num_row = mysql_num_rows($verify);
if($num_row > 0){
  $update = mysql_query("Update final_score_sheet Set Attendance='$attendance', Attentiveness='$attentiveness', Punctuality='$punctuality', Neatness='$neatness', Politeness='$politeness', Self_Control='$self_control', Relationships='$relationship', Responsibility='$responsibility', Initiative='$initiative', Perseverance='$perseverance', Honesty='$honesty', Hand_Writing='$handwriting', Drama='$drama', Music='$music', Crafts='$crafts', Clubs='$clubs', Hobbies='$hobbies', Sports='$sports', Remark='$remark' Where ID_Number='$idnumber' AND Department='$department' AND Class='$class' AND Term='$term' AND Session='$session'");
 echo "Student Character Assessment Record Updated Successfully";
}else{
$sql = mysql_query("Insert into final_score_sheet (Attendance, Attentiveness, Punctuality, Neatness, Politeness, Self_Control, Relationships, Responsibility, Initiative, Perseverance, Honesty, Hand_Writing, Drama, Music, Crafts, Clubs, Hobbies, Sports, ID_Number, Department, Session, Term, Class, Remark) VALUES ('$attendance', '$attentiveness', '$punctuality', '$neatness', '$politeness', '$self_control', '$relationship', '$responsibility', '$initiative', '$perseverance', '$honesty', '$handwriting',  '$drama', '$music', '$crafts', '$clubs', '$hobbies', '$sports', '$idnumber', '$department', '$session', '$term', '$class', '$remark')");
 echo "Student Character Assessment Record Inserted Successfully";
}
?>