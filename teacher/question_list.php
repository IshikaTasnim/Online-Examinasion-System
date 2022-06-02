<?php
	include('header.php');
?>
<?php if(is_teacher_Loggedin()):?>
<div class="container fluid">
  <form method="POST" action="">
    
 	<div class="panel-heading">
    <h1 class="sub-header" align="center">All Question List</h1>
  </div>
  <br><br>
 	<div class="row">
       <div class="col-md-6">
				<div class="  input-group input-group-sm">
				  <span class="input-group-addon" id="sizing-addon3">Option</span>
				  <select class="form-control" id="sub_id" name="sub_id">
				  	<option value="">Course</option>
              <?php
              $id= teacher_info($_SESSION['t_id'],'t_id');
                $query = $db->query("select * from subject inner join assign_course on assign_course.sub_id=subject.sub_id where assign_course.t_id='$id'");
                if($query->num_rows>0) {
                  while($row = $query->fetch_assoc()) {
                    echo '<option value="'.$row['sub_id'].'">'.$row['sub_name'].'</option>';
                  }
                } else {
                  echo '<option value="null">No Course to Display</option>';
                }
              ?>
				  </select>
				</div>
		</div>
		<div class="col-md-6">
				  <input type="submit" class="form-control btn btn-primary" placeholder="Input" name="submit" value="Search" aria-describedby="sizing-addon3">
		</div>
 	</div><!-- end search-->
 	<br>
   </form>
  <?php
    if(isset($_POST['submit'])){
     $sub_id=$_POST['sub_id'];
    
  ?>
 	<table class="table">
 		<tr>
 			<th>Sl</th>
 			<th>Question</th>
 			<th>Action</th>
 		</tr>
 		<?php
              $i=1;
                $query = $db->query("select * from question inner join exam on question.exam_id=exam.exam_id where exam.sub_id='$sub_id'");
                if($query->num_rows>0) {
                  while($row = $query->fetch_assoc()) {
                    echo '<tr><td>'.$i.'</td><td>'.$row['q_name'].'</td><td><a href="edit_question.php?id='.$row['q_id'].'">Edit</a> | <a href="question_list.php?id='.$row['q_id'].'">Delete</a></td></tr>';
                    $i++;
                  }
                } else {
                  echo '<b >No Exam to Display</b>';
                }
              ?>
  <?php }?>
  </table>
</div><!--list -->
<?php else:?>
<?php header('Location: signin.php'); //echo "Not Loggedin"; ?>
<?php endif?>
<?php
	include('footer.php');
?>