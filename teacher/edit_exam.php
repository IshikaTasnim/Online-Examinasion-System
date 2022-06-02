<?php
	include('header.php');
?>
<?php if(is_teacher_Loggedin()):?>
<?php  $id= protect($_GET['id']);
if(isset($_GET['id'])){
	$query = $db->query("select * from exam where exam_id='$id'");
                if($query->num_rows>0) {
                  while($row = $query->fetch_assoc()) {
                    $value=$row['exam_name'];
                  }
    }
}
 if(isset($_POST['submit'])){
      $t_id= teacher_info($_SESSION['t_id'],'t_id');
      $sub_id= protect($_POST['sub_id']);
      $exam= protect($_POST['exam']);

      $check = $db->query("SELECT * FROM exam where exam_name='$exam'");
    if(empty($exam) or empty($sub_id)  ) {
      echo error("All fields are required.");
    } 
    else if($check->num_rows>0) {
      echo error(" <b>$exam  </b> was exists.");
    } else {
      $insert = $db->query("update exam set exam_name='$exam',t_id='$t_id',sub_id='$sub_id' where exam_id='$id'");
      if($insert){
        echo success(" <b>$exam  </b> was update successfully.<br><a class ='btn btn-primary' href='exam.php'>OK</a>");
      }
      else{
        echo success("Some problem");
      }
      
    }
 }
?>
   <div class="container fluid">
   	 <h2 align="center">Set New Exam</h2>
   	 	 <form action="" method="POST">
   	 	 	<div class="row">

		   <div class="col-md-6">
				<div class="  input-group input-group-sm">
				  <span class="input-group-addon" id="sizing-addon3">Subject</span>
				  <select class="form-control" id="sub_id" name="sub_id">
              <?php
              $id= teacher_info($_SESSION['t_id'],'t_id');
                $query = $db->query("select * from subject inner join assign_course on assign_course.sub_id=subject.sub_id where assign_course.t_id='$id'");
                if($query->num_rows>0) {
                  while($row = $query->fetch_assoc()) {
                    echo '<option value="'.$row[sub_id].'">'.$row[sub_name].'</option>';
                  }
                } else {
                  echo '<option value="null">No Course to Display</option>';
                }
              ?>
            </select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="  input-group input-group-sm">
				  <span class="input-group-addon" id="sizing-addon3">exam</span>
				  <input type="text" class="form-control" placeholder="exam Name" value="<?php echo $value?>" name="exam" aria-describedby="sizing-addon3">
				</div>
            </div><br>
		   </div>
            <br><input type="submit" name="submit" Value="Update Exam" class="btn btn-primary">
   	 	 </form>
   </div>
   <!--insert -->
<?php else:?>
<?php header('Location: signin.php'); //echo "Not Loggedin"; ?>
<?php endif?>
<?php
	include('footer.php');
?>