<?php
	include('header.php');
?>
<?php if(is_teacher_Loggedin()):?>
	<h1 align="center">Add Exam</h1>

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
	<div class="col-md-2">
		<input type="submit" name="search" value="Search" class="btn btn-primary">
	</div>
  </div>
  <!--end search-->
  <?php
   if(isset($_POST['search'])){
   	   $id=$_POST['sub_id'];
   	?>
    <div class="well">
    	<h4>Select Chapter</h4>
    	<?php
                $query = $db->query("select * from subject inner join chapter on chapter.sub_id=subject.sub_id where subject.sub_id='$id'");
                if($query->num_rows>0) {
                  while($row = $query->fetch_assoc()) {
                    echo'<input type="checkbox" name="chapter[]" value="'.$row['ch_id'].'"><b> '.$row['ch_name'].'</b><br>';
                  }
                } else {
                  echo '<option value="null">No Chapter to Display</option>';
                }
              ?>

       <div class="  input-group input-group-sm">
				  <span class="input-group-addon" id="sizing-addon3">Exam Name</span>
				  <input type="text" class="form-control" placeholder="exam Name" name="exam" aria-describedby="sizing-addon3">
	    </div>
	    <br>
	    <div class="row">
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
	   <input type="submit" name="submit" class=" btn btn-primary" value="Add Exam">
	    </div>
    </div>
</form>
<?php

   }
  ?>
  <!--end show chapter-->
<?php else:?>
<?php header('Location: signin.php'); //echo "Not Loggedin"; ?>
<?php endif?>
<?php
	include('footer.php');
?>