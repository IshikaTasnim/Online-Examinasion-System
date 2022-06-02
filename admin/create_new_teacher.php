<?php
  include('header.php');
?>
<?php if(is_admin_Loggedin()):?>
<?php
  if (isset($_POST['create'])){
    $t_id = protect($_POST['t_id']);
    $t_name = protect($_POST['t_name']);
    $t_uname = protect($_POST['t_uname']);
    $t_email = protect($_POST['t_email']);
    $password = protect($_POST['password']);
    
     $check = $db->query("SELECT * FROM teacher WHERE t_id='$t_id'");
    if(empty($t_id) or empty($t_name) or empty($t_uname)  or empty($t_email) or empty($password)) {
       echo error("All fields are required.");
        }
    elseif($check->num_rows>0) { echo error("Teacher, <b>$t_name ($t_id) </b> was exists."); }
    else {
      $pass = md5($password);
      $insert = $db->query("insert into teacher(t_id,t_name,t_uname,t_password,t_email) values('$t_id','$t_name','$t_uname','$password','$t_email')");
      if($insert ){
         echo success("Teacher, <b>$t_name ($t_id) </b> was added successfully.");
      }
      else
        echo success("Teacher, <b>$t_name ($t_id) </b> was not added .");
     
    }
  }

?>

<div class="panel-heading">
  <h1 class="page-title" align="center">Create New Teacher</h1>
</div>
<div class="panel-body">
  <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
    <div class="form-group">
      <label for="s_id" class="col-sm-4 control-label">Teacher ID</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="t_id" name="t_id" placeholder="Teacher Id">
      </div>
    </div>

    <div class="form-group">
      <label for="s_name" class="col-sm-4 control-label">Teacher Name</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="t_name" name="t_name" placeholder="Student Name">
      </div>
    </div>
    <div class="form-group">
      <label for="s_name" class="col-sm-4 control-label">User Name</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="t_uname" name="t_uname" placeholder="Teacher User Name">
      </div>
    </div><div class="form-group">
      <label for="s_email" class="col-sm-4 control-label">Email</label>
      <div class="col-sm-5">
        <input type="email" class="form-control" id="t_email" name="t_email" placeholder="Email">
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