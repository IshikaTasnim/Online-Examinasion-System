<?php
	include('header.php');
	if(isset($_GET['action'])) {
		$action = protect($_GET['action']);
	}
?>
<?php if(is_admin_Loggedin()):?>

<?php if(isset($_GET['action']) and $action == 'edit') {
	$id = protect($_GET['id']);
	if (isset($_POST['save'])){
    $s_id = protect($_POST['s_id']);
    $s_name = protect($_POST['s_name']);
    $s_uname = protect($_POST['s_uname']);
    $s_email = protect($_POST['s_email']);
    $s_sem = protect($_POST['s_sem']);

    $check = $db->query("SELECT * FROM student WHERE s_id='$s_id'");
    if(empty($s_id)  or empty($s_sem) or empty($s_uname) or  empty($s_name) or empty($s_email)) {
	    	echo error("All fields are required.");
	  } elseif($check->num_rows>1) {
	  	echo error("Student, <b>$s_name ($s_id) </b> was exists.");
	  } else {
      $update = $db->query("UPDATE student SET s_id='$s_id', s_name='$s_name', s_uname='$s_uname',  s_email='$s_email' , sem_id='$s_sem' WHERE id='$id'");
      echo success("Student, <b>$s_name ($s_id) </b> was edited successfully.");
    }
  }

	$query = $db->query("SELECT * FROM student WHERE s_id=$id ");
  if ($query->num_rows > 0) {
    $row = $query->fetch_assoc();
  }
?>

  <div class="panel-heading">
    <h1 class="page-title" align="center">Edit Student</h1>
  </div>
  <div class="panel-body">
    <form action="" method="POST" class="form-horizontal">
      <div class="form-group">
        <label for="s_id" class="col-sm-4 control-label">Student ID</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="s_id" name="s_id" placeholder="" value="<?php echo $row['s_id']; ?>">
        </div>
      </div>

      <div class="form-group">
        <label for="s_name" class="col-sm-4 control-label">Student Name</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="s_name" name="s_name" placeholder="Student Name" value="<?php echo $row['s_name']; ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="s_name" class="col-sm-4 control-label">User Name</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="s_uname" name="s_uname" placeholder="Student user Name" value="<?php echo $row['s_uname']; ?>">
        </div>
      </div>
      
      
      <div class="form-group">
        <label for="s_email" class="col-sm-4 control-label">Email</label>
        <div class="col-sm-5">
          <input type="email" class="form-control" id="s_email" name="s_email" placeholder="Email" value="<?php echo $row['s_email']; ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="s_sem" class="col-sm-4 control-label">Semester</label>
        <div class="col-sm-5">
          <select class="form-control" id="s_sem" name="s_sem">
                <?php
                  $query = $db->query("SELECT * FROM semester ORDER BY sem_id");
                  if($query->num_rows>0) {
                    while($row = $query->fetch_assoc()) {
                      echo '<option value="'.$row['sem_id'].'">'.$row['sem_name'].'</option>';
                    }
                  } else {
                    echo '<option value="null">No Course to Display</option>';
                  }
                ?>
              </select>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-4 col-sm-5">
          <button type="submit" id="save" name="save" class="btn btn-primary btn-block">Update</button>
        </div>
      </div>
    </form>
  </div>

<?php } //end edit student info

  else if(isset($_GET['action']) and $action == 'search') {
    if (isset($_POST['type'])) {
      $type = protect($_POST['type']);
    }
    if (isset($_POST['key'])) {
      $key = protect($_POST['key']);
    }
    if ($type == 's_id') {
      $check = $db->query("SELECT * FROM student WHERE s_id ='$key'");
    } else if ($type == 's_name') {
      $check = $db->query("SELECT * FROM student WHERE s_name LIKE '%$key%'");
    } 
     else {
      $check = $db->query("SELECT * FROM student WHERE s_id ='$key'");
    }
  ?>
  <h2 class="sub-header">Result of: <?php echo $key; ?></h2>
  <form  method="post" action="?action=search" >
    <div class="row">
      <div class="col-xs-4">
        <select class="form-control" id="type" name="type">
          <option value="s_id" selected>ID</option>
          <option value="s_name">Name</option>
        </select>
      </div>

      <div class="col-xs-4">
        <input type="text" class="form-control" id="key" name="key">
      </div>

      <div class="col-xs-2">

        <input type="submit" class="btn btn-primary" id="search" name="search" value="Search">
      </div>
    </div>
  </form>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Exam Roll</th>
          <th>Name</th>
          <th>Email</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
          if($check->num_rows>0) {
            $i = 1;
            while($row = $check->fetch_assoc()) {
              echo '<tr><td>'.$i.'</td><td>'.$row['s_id'].'</td><td>'.$row['s_name'].'</td><td>'.$row['s_email'].'</td><td><a href="student_list.php?action=edit&id='.$row['s_id'].'">Edit</a> | <a href="student_details.php?action=details&id='.$row['s_id'].'">Details</a></td></tr>';
              $i++;
            }
          } else {
            echo '<tr><td>No Student to Display</td></tr>';
          }
        ?>
      </tbody>
    </table>
  </div>
<?php }//end search student info

 else { ?>
  <div class="container fluid">
    <div class="panel-heading">
    <h2 class="sub-header" align="center">All Student List</h2>
    <br><br>

    <form  method="post" action="?action=search" >
      <div class="row">
        <div class="col-xs-4">
          <select class="form-control" id="type" name="type">
            <option value="s_id" selected>ID</option>
            <option value="s_name">Name</option>
          </select>
        </div>

        <div class="col-xs-4">
          <input type="text" class="form-control" id="key" name="key">
        </div>

        <div class="col-xs-2">

          <input type="submit" class="btn btn-primary" id="search" name="search" value="Search">

        </div>

      </div>
      <br><br>
    </form>

    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Exam Roll</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $query = $db->query("SELECT * FROM `student`  ");
            $i=1;
            if($query->num_rows>0) {
              while($row = $query->fetch_assoc()) {
                echo '<tr><td>'.$i.'</td><td>'.$row['s_id'].'</td><td>'.$row['s_name'].'</td><td>'.$row['s_email'].'</td><td><a href="student_list.php?action=edit&id='.$row['s_id'].'">Edit</a> | <a href="student_details.php?action=details&id='.$row['s_id'].'">Details</a></td></tr>';
             $i++; }
            } else {
              echo '<tr><td>No Student to Display</td></tr>';
            }
          ?>
        </tbody>
      </table>
    </div>
   </div>
  </div>
<?php } ?>


<?php else:?>
<?php header('Location: signin.php');?>
<?php endif?>
<?php
	include('footer.php');
?>