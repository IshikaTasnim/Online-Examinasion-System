
<?php 
include'header.php';
if(is_student_Loggedin()):
?>
<div class="container fluid">
  <div class="panel-heading">
    <h2 class="sub-header" align="center">Exam List</h2>
  </div>  
  <br>
	<table class="table">
 		<tr>
 			<th>Sl</th>
 			<th>Question</th>
      <th>Date</th>
 			<th>Course</th>
 		</tr>
 		<?php
              $i=1;
              $id= student_info($_SESSION['s_id'],'s_id');
                $query = $db->query("select * from student ,subject inner join exam on exam.sub_id=subject.sub_id where student.s_id='$id' group by exam.exam_id ORDER BY `exam`.`exam_id` DESC ");
                if($query->num_rows>0) {
                  while($row = $query->fetch_assoc()) {
                    $exam_id=$row['exam_id'];
                   ?>
                <tr>
                    <td><?php echo$i?></td>
                    <td><a href="exam.php?id=<?php echo$row['exam_id']?>"><?php echo$row['exam_name']?></a></td>
                    <td id="demo">
                      
                      
      <?php
      $query1 = $db->query("SELECT * FROM time where exam_id='$exam_id'");
                if($query1->num_rows>0) {
                  while($row1 = $query1->fetch_assoc()) {
               echo $s_date=$row1['date'];
          }}?>
                    </td>
                    <td><?php echo$row['sub_name']?></td>
                </tr>
                <?php
                   $i++;}
                } else {
                  echo '<b >No Exam to Display</b>';
                }
              ?>

 	</table>
</div>

<?php else:?>
<?php header('Location: signin.php'); //echo "Not Loggedin"; ?>
<?php endif?>
