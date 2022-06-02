<?php
	include('header.php');
?>
<?php if(is_teacher_Loggedin()):?>
<?php 
 if(isset($_POST['submit'])){
      $sub_id= protect($_POST['sub_id']);
      $chapter= protect($_POST['chapter']);

      $check = $db->query("SELECT * FROM chapter where ch_name='$chapter'");
    if(empty($chapter) or empty($sub_id)  ) {
      echo error("All fields are required.");
    } 
    else if($check->num_rows>0) {
      echo error(" <b>$chapter  </b> was exists.");
    } else {
      $insert = $db->query("INSERT chapter (ch_name,sub_id) VALUES ('$chapter','$sub_id')");
      echo success(" <b>$chapter  </b> was added successfully.");
    }
 }
?>
   <div class="">
   	 <h2 align="center">Set New Chapter</h2>
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
				  <span class="input-group-addon" id="sizing-addon3">Chapter</span>
				  <input type="text" class="form-control" placeholder="Chapter Name" name="chapter" aria-describedby="sizing-addon3">
				</div>
            </div><br>
		   </div>
            <br><input type="submit" name="submit" Value="Add Chapter" class="btn btn-primary">
   	 	 </form>
   </div>
   <table class="table">
     <tr>
        <th>Sl</th>
        <th>Chapter name</th>
        <th>Subject</th>
        <th>Action</th>
     </tr>
     <?php
              $i=1;
              $id= teacher_info($_SESSION['t_id'],'t_id');
                $query = $db->query("select * from assign_course ,subject inner join chapter on subject.sub_id=chapter.sub_id where assign_course.t_id='$id' limit 15");
                if($query->num_rows>0) {
                  while($row = $query->fetch_assoc()) {
                    $i++;
                  }
                } else {
                  echo '<b >No Exam to Display</b>';
                }
              ?>
   </table>
<?php else:?>
<?php header('Location: signin.php'); //echo "Not Loggedin"; ?>
<?php endif?>
<?php
	include('footer.php');
?>