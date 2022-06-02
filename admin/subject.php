<?php
  include('header.php');
  if(isset($_GET['action'])) {
  $action = protect($_GET['action']);
}
?>
<?php if(is_admin_Loggedin()):?>
<?php
  if (isset($_POST['create'])){
    $subject = protect($_POST['subject']);
    $sem = protect($_POST['sem_id']);    
   
     $check = $db->query("SELECT * FROM subject where sub_name='$subject'");
    if(empty($subject) &&empty($sem)  ) {
      echo error("All fields are required.");
    } 
    else if($check->num_rows>0) {
      echo error(" <b>$subject  </b> was exists.");
    } else {
      $insert = $db->query("INSERT subject (sub_name,sem_id) VALUES ('$subject','$sem')");
      echo success(" <b>$subject  </b> was added successfully.");
    }
  }
   if (isset($_POST['update'])){
    $sem_id = protect($_POST['sem_id']);
    $subject = protect($_POST['subject']);   
    $id = protect($_POST['id']);  
   
    $semester=$semester.'-'.$year;
     $check = $db->query("SELECT * FROM subject where sub_name='$subject'");
    if(empty($year)  ) {
      echo error("All fields are required.");
    } 
    else if($check->num_rows>0) {
      echo error(" <b>$semester  </b> was exists.");
    } else {
      $insert = $db->query("update semester set semester='$semester' where id='$id");
      echo success(" <b>$semester  </b> was Update successfully.");
    }
  }
  else if(isset($_GET['action']) and $action == 'delete') { 
  $id = protect($_GET['id']);
  $query = $db->query("delete FROM subject WHERE sub_id='$id'");
?>


<?php }
 if(isset($_GET['action']) and $action == 'edit') {
  echo $id = protect($_GET['id']);

?>
<div class="panel-body">
  <form class="form-horizontal" action="" method="post">
    <input type="text" name="id" value="<?php $id;?>">
    <div class="row">

          <div class="form-group col-sm-6">
            <label for="credit" class=" control-label">Semester</label>
                <select class="form-control" i name="semester">
                  <option value="Fall" >Fall</option>
                  <option value="Spring" >Spring</option>
                  <option value="Summer">Summer</option>
                </select>
          </div>

          <div class="form-group col-sm-6">
            <label for="prerequ_2" class=" control-label">Year</label>
            
                <input type="number"class="form-control" name="year" value=""/>
            
          </div><br>
         
       <input type="submit"  name="update" class="col-sm-2 btn btn-primary " value="Update">
    </div>
  </form>
</div>
<?php
  }
?>
<div class="container fluid">
<div class="panel-heading">
  <h1 class="page-title" align="center">Create New Subject</h1>
</div>
<div class="panel-body">
  <form class="form-horizontal" action="" method="post">
    <div class="row">

          <div class="form-group col-sm-6">
            <label for="credit" class=" control-label">Semester</label>
                <select class="form-control" id="sem_id" name="sem_id">
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

          <div class="form-group col-sm-6">
            <label for="prerequ_2" class=" control-label">Subject Name</label>
            
                <input type="text"class="form-control" name="subject"/>
            
          </div><br>
         
       <input type="submit"  name="create" class="col-sm-2 btn btn-primary " value="Create">
    </div>
  </form>
</div>

<div>
  <h1>All Subject List</h1>
  <table class="table" align="center">
     <tr>
       <th>Sl</th>
       <th>Subject</th>
       <th>Action</th>
     </tr>
     <?php
     $i=1;
          $query = $db->query("SELECT * FROM subject ORDER BY `sub_id` DESC");
          if($query->num_rows>0) {
            $msg="Are you sure to delete this id?";
            while($row = $query->fetch_assoc()) {
              echo'<tr><td>'.$i.'</td><td>'.$row['sub_name'].'</td><td><a onclick="return confirm()" href="subject.php?action=delete&id='.$row['sub_id'].'">Delete</a></td></tr>';
            $i++;}
          } else {
            echo '<option value="null>No Semester to Display</option>';
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