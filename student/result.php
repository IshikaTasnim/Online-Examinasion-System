<?php 
include'header.php';
if(is_student_Loggedin()):
	$s_id=student_info($_SESSION['s_id'],'s_id');

?>

<div class="container fluid" >
  <div class="panel-heading">
    <h1 class="sub-header" align="center">Your Result</h1>
  </div>
  <br>
  <table class="table">
     <tr>
     	<th>Sl</th>
     	<th>Exam Name</th>
     	<th>Marks</th>
     </tr>
     <?php
     $i=1;
     $query = $db->query("SELECT * FROM exam inner join result on exam.exam_id=result.exam_id where result.s_id='$s_id'  ORDER BY `result`.`id` DESC");
                if($query->num_rows>0) {
                  while($row = $query->fetch_assoc()) {
                  	echo'<tr><td>'.$i.'</td><td>'.$row['exam_name'].'</td><td>'.$row['point'].'</td></tr>';
                  	$i++;
                  }
              }
     ?>

  </table>
</div>
<?php else:?>
<?php header('Location: signin.php'); //echo "Not Loggedin"; ?>
<?php endif?>
