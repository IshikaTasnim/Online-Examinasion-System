<?php
  include('header.php');
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

 
  <form action="" method="POST" class="form-signin" enctype="multipart/form-data">
    <h2 class="form-signin-heading">Please Sign Up</h2>
    <input type="text" class="form-control" id="s_id" name="s_id" placeholder="Student Id">
    <input type="text" class="form-control" id="s_name" name="s_name" placeholder="Student Name">
    <input type="text" class="form-control" id="s_uname" name="s_uname" placeholder="Student User Name">
    <input type="email" class="form-control" id="s_email" name="s_email" placeholder="Email">
    <select class="form-control" id="sem" name="sem">
      <option value="">Select Semester</option>
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
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    <button type="submit" id="create" name="create" class="btn btn-primary btn-block">Create</button><br>
  </form>






