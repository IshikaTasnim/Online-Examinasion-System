<?php
  include('header.php');
  if(isset($_GET['action'])) {
  $action = protect($_GET['action']);
}
?>
<?php if(is_admin_Loggedin()):?>
 
<?php
  if (isset($_POST['create'])){
    $t_id_n1 = protect($_POST['t_id_n1']);
    $t_id_n2 = protect($_POST['t_id_n2']);
    $t_id_h = protect($_POST['t_id_h']);
    $sub_id = protect($_POST['sub_id']);    
   
     $check = $db->query("SELECT * FROM finale_exam where  sub_id='$sub_id'");
    if(empty($sub_id) &&empty($t_id_n1) &&empty($t_id_n2) &&empty($t_id_h) ) {
      echo error("All fields are required.");
    } 
    else if($check->num_rows>0) {
      echo error(" <b>This subject</b> was alrady assign .");
    } else {
      $insert = $db->query("INSERT finale_exam (t_id,sub_id,status) VALUES ('$t_id_n1','$sub_id','normal')");
      $insert = $db->query("INSERT finale_exam (t_id,sub_id,status) VALUES ('$t_id_n2','$sub_id','normal')");
      $insert = $db->query("INSERT finale_exam (t_id,sub_id,status) VALUES ('$t_id_h','$sub_id','head')");
      echo success(" <b>Subject  </b> was assign successfully.");
    }
  }

  else if(isset($_GET['action']) and $action == 'delete') { 
  $id = protect($_GET['id']);
  $query = $db->query("delete FROM finale_exam WHERE id='$id'");
?>

<?php }?>

<div class="container fluid">
  <div class="panel-heading">
    <h1 class="page-title" align="center">Set Final Examineer</h1>
  </div>


  <div class="panel-body">
    <form class="form-horizontal" action="" method="post">
      <div class="row">
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
          </div>
          <div class="form-group col-sm-6">
            <br><br><br><br>
          </div>
           
          <div class="form-group col-sm-6">
            <label for="credit" class=" control-label">Normal Examiner 1</label>
            <select class="form-control" id="t_id" name="t_id_n1">
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
            <label for="credit" class=" control-label">Normal Examiner 2</label>
            <select class="form-control" id="t_id" name="t_id_n2">
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
            <label for="credit" class=" control-label">Head Examiner</label>
            <select class="form-control" id="t_id" name="t_id_h">
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
            <br><br><br><br>
          </div>
          
          <input type="submit"  name="create" class="col-sm-2 btn btn-primary " value="Assign">
      </div>     
    </form>
  </div>
</div>

<?php else:?>
<?php header('Location: signin.php');?>
<?php endif?>
<?php
  include('footer.php');
?>