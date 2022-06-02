<?php
	include('header.php');
?>
<?php if(is_teacher_Loggedin()):?>
<?php 
 if(isset($_GET['id'])){
  $id= protect($_GET['id']);
  $delete = $db->query("delete from exam where exam_id='$id'");
  if($delete){
        echo success("Delete thid exam successfully.");
      }
 }
 //delete 
 else if(isset($_POST['submit'])){
      $t_id= teacher_info($_SESSION['t_id'],'t_id');
      $sub_id= protect($_POST['sub_id']);
      $exam= protect($_POST['exam']);
      $s_date=$_POST['s_date'];
      $s_time=$_POST['s_time'];
      $e_time=$_POST['e_time'];

      $check = $db->query("SELECT * FROM exam where exam_name='$exam'");
    if(empty($exam) or empty($sub_id)  ) {
      echo error("All fields are required.");
    } 
    else if($check->num_rows>0) {
      echo error(" <b>$exam  </b> was exists.");
    } else {
      $insert = $db->query("insert into exam (exam_name,t_id,sub_id)values('$exam','$t_id','$sub_id')");
      if($insert){
        $query = $db->query("SELECT * FROM exam where exam_name='$exam'");
                if($query->num_rows>0) {
                  while($row = $query->fetch_assoc()) {
                    $e_id=$row['exam_id'];
                  }
                }
      $insert = $db->query("insert into time (exam_id,date,s_time,e_time)values('$e_id','$s_date','$s_time','$e_time')");   
        echo success(" <b>$exam  </b> was added successfully.");
      }
      else{
        echo success("Some problem  .");
      }
      
    }
 }
?>
  <div class="container fluid">
   	 <div class="panel-heading">
    <h2 class="page-title" align="center">Set New Exam</h2>
  </div>
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
				  <span class="input-group-addon" id="sizing-addon3">Exam</span>
				  <input type="text" class="form-control" placeholder="Exam Name" name="exam" aria-describedby="sizing-addon3">
				</div><br>
        </div>
        <div class="col-md-4">
        <div class="  input-group input-group-sm">
          <span class="input-group-addon" id="sizing-addon3">Date</span>
          <input type="date" class="form-control"  name="s_date" aria-describedby="sizing-addon3">
        </div>
     </div>
     <div class="col-md-4">
        <div class="  input-group input-group-sm">
          <span class="input-group-addon" id="sizing-addon3">Start Time</span>
          <input type="time" class="form-control" name="s_time" aria-describedby="sizing-addon3">
        </div>
     </div>
     
     <div class="col-md-4">
        <div class="  input-group input-group-sm">
          <span class="input-group-addon" id="sizing-addon3">End Time</span>
          <input type="time" class="form-control" name="e_time" aria-describedby="sizing-addon3">
        </div><br>
     </div>
		   </div>
            <br><input type="submit" name="submit" Value="Add exam" class="btn btn-primary">
   	 	 </form>
   </div>
   <!--insert -->
   <div class="container fluid">
      <h2 align="center">Exam List</h2>
      <table class="table">
         <tr>
           <th>Sl</th>
           <th>Exam Name</th>
           <th>Subject</th>
           <th>Action</th>
         </tr>
         <?php
              $i=1;
              $id= teacher_info($_SESSION['t_id'],'t_id');
                $query = $db->query("select * from exam inner join subject on subject.sub_id=exam.sub_id where exam.t_id='$id'");
                if($query->num_rows>0) {
                  while($row = $query->fetch_assoc()) {
                    echo '<tr><td>'.$i.'</td><td>'.$row['exam_name'].'</td><td>'.$row['sub_name'].'</td><td><a href="edit_exam.php?id='.$row['exam_id'].'">Edit</a> | <a href="exam.php?id='.$row['exam_id'].'">Delete</a></td></tr>';
                    $i++;
                  }
                } else {
                  echo '<b >No Exam to Display</b>';
                }
              ?>
      </table>
   </div>

<?php else:?>
<?php header('Location: signin.php'); //echo "Not Loggedin"; ?>
<?php endif?>
<?php
	include('footer.php');
?>