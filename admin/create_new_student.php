<?php
  include('header.php');
?>
<?php if(is_admin_Loggedin()):?>
<?php
  if (isset($_POST['create'])){
    $s_id = protect($_POST['s_id']);
    $s_name = protect($_POST['s_name']);
    $s_uname = protect($_POST['s_uname']);
    $s_email = protect($_POST['s_email']);
    $sem = protect($_POST['sem']);
    $password = protect($_POST['password']);
    
     $check = $db->query("SELECT * FROM student WHERE s_id='$s_id'");
    if(empty($s_id) or empty($s_name) or empty($s_uname) or empty($sem) or empty($s_email) or empty($password)) {
       echo error("All fields are required.");
        }
    elseif($check->num_rows>0) { echo error("Student, <b>$s_name ($s_id) </b> was exists."); }
    else {
      $pass = md5($password);
      $insert = $db->query("insert into student(s_id,s_name,s_uname,s_password,s_email,sem_id) values('$s_id','$s_name','$s_uname','$password','$s_email','$sem')");
      if($insert ){
         echo success("Student, <b>$s_name ($s_id) </b> was added successfully.");
      }
      else
        echo success("Student, <b>$s_name ($s_id) </b> was not added .");
     
    }
  }

?>

<div class="panel-heading">
  <h1 class="page-title" align="center">Create New Student</h1>
</div>
<div class="panel-body">
  <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
    <div class="form-group">
      <label for="s_id" class="col-sm-4 control-label">Student ID</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="s_id" name="s_id" placeholder="Student Id">
      </div>
    </div>

    <div class="form-group">
      <label for="s_name" class="col-sm-4 control-label">Student Name</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="s_name" name="s_name" placeholder="Student Name">
      </div>
    </div>
    <div class="form-group">
      <label for="s_name" class="col-sm-4 control-label">Student User Name</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="s_uname" name="s_uname" placeholder="Student User Name">
      </div>
    </div><div class="form-group">
      <label for="s_email" class="col-sm-4 control-label">Email</label>
      <div class="col-sm-5">
        <input type="email" class="form-control" id="s_email" name="s_email" placeholder="Email">
      </div>
    </div>
    <div class="form-group">
      <label for="password" class="col-sm-4 control-label">Semester</label>
      <div class="col-sm-5">
        <select class="form-control" id="sem" name="sem">
              <?php
                $query = $db->query("SELECT * FROM semester ORDER BY sem_id");
                if($query->num_rows>0) {
                  while($row = $query->fetch_assoc()) {
                    echo '<option value="'.$row[sem_id].'">'.$row[sem_name].'</option>';
                  }
                } else {
                  echo '<option value="null">No Course to Display</option>';
                }
              ?>
            </select>
      </div>
    </div>
    <div class="form-group">
      <label for="password" class="col-sm-4 control-label">Password</label>
      <div class="col-sm-5">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-4 col-sm-5">
        <button type="submit" id="create" name="create" class="btn btn-primary btn-block">Create</button>
      </div>
    </div>
  </form>
</div>

<?php else:?>
<?php header('Location: signin.php');?>
<?php endif?>
<?php
  include('footer.php');
?>