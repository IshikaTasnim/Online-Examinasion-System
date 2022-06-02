<?php
  include('header.php');
  if(isset($_GET['action'])) {
  $action = protect($_GET['action']);
}
?>
<?php if(is_admin_Loggedin()):?>

<?php
  if (isset($_POST['create'])){
    $t_id = protect($_POST['t_id']);
    $sub_id = protect($_POST['sub_id']);    
   
     $check = $db->query("SELECT * FROM assign_course where  sub_id='$sub_id'");
    if(empty($t_id) &&empty($sub_id)  ) {
      echo error("All fields are required.");
    } 
    else if($check->num_rows>0) {
      echo error(" <b>This subject</b> was alrady assign .");
    } else {
      $insert = $db->query("INSERT assign_course (t_id,sub_id) VALUES ('$t_id','$sub_id')");
      echo success(" <b>Subject  </b> was assign successfully.");
    }
  }

  else if(isset($_GET['action']) and $action == 'delete') { 
  $id = protect($_GET['id']);
  $query = $db->query("delete FROM assign_course WHERE id='$id'");
?>

<?php }?>

<div class="container fluid">
  <div class="panel-heading">
    <h1 class="page-title" align="center">Assign Course For Teacher</h1>
  </div>
  <div class="panel-body">
    <form class="form-horizontal" action="" method="post">
      <div class="row">

            <div class="form-group col-sm-6">
              <label for="credit" class=" control-label">Teacher</label>
                  <select class="form-control" id="t_id" name="t_id">
                <?php
                  $query = $db->query("SELECT * FROM teacher ORDER BY t_id");
                  if($query->num_rows>0) {
                    while($row = $query->fetch_assoc()) {
                      echo '<option value="'.$row[t_id].'">'.$row[t_name].'</option>';
                    }
                  } else {
                    echo '<option value="null">No Course to Display</option>';
                  }
                ?>
              </select>
            </div>

            <div class="form-group col-sm-6">
              <label for="prerequ_2" class=" control-label">Subject Name</label>
              <select class="form-control" id="sub_id" name="sub_id">
                <?php
                  $query = $db->query("SELECT * FROM subject ORDER BY sub_id");
                  if($query->num_rows>0) {
                    while($row = $query->fetch_assoc()) {
                      echo '<option value="'.$row[sub_id].'">'.$row[sub_name].'</option>';
                    }
                  } else {
                    echo '<option value="null">No Course to Display</option>';
                  }
                ?>
              </select>
              
            </div><br>
           
         <input type="submit"  name="create" class="col-sm-2 btn btn-primary " value="Assign">
      </div>
    </form>
  </div>

  <div>
    <h1>All Course Assign List</h1>
    <table class="table" align="center">
       <tr>
         <th>Sl</th>
         <th>Teacher</th>
         <th>Subject</th>
         <th>Action</th>
       </tr>
       <?php
       $i=1;
            $query = $db->query("SELECT * FROM teacher,assign_course inner join subject on assign_course.sub_id=subject.sub_id WHERE teacher.t_id=assign_course.t_id ");
            if($query->num_rows>0) {
              $msg="Are you sure to delete this id?";
              while($row = $query->fetch_assoc()) {
                echo'<tr><td>'.$i.'</td><td>'.$row['t_name'].'</td><td>'.$row['sub_name'].'</td><td><a onclick="return confirm()" href="course_assign.php?action=delete&id='.$row['id'].'">Delete</a></td></tr>';
              $i++;}
            } else {
              echo '<option value="null>No course assign to display</option>';
            }
          ?>
    </table>
  </div>
</div>

<?php else:?>
<?php header('Location: signin.php');?>
<?php endif?>
<?php
  include('footer.php');
?>