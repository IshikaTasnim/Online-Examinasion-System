<?php
	include('header.php');
?>
<style type="text/css">
  label{
    font-size : 15px;
  }
:required {box-shadow:0 0 6px black;}


</style>
<?php if(is_teacher_Loggedin()):?>
  <?php
    $t_id = $_SESSION['t_id'] ;
    $fe_id= protect($_GET['fe_id']);
    $check = $db->query("select * from finale_question inner join finale_exam on finale_question.fe_id=finale_exam.fe_id where finale_exam.t_id = '$t_id'");
      if($check->num_rows>0){

          header("Location: message.php?id=".$fe_id);
      }
    $i = 0 ;
    if(isset($_POST['submit'])){

      for ($i = 0; $i < 7; ++$i) {
        $fquestion[] = protect($_POST['fquestion'][$i]);
        if(empty($fquestion[$i])){
          $bool = true ;
          break ;
        }
      }
      if($bool == true){
          echo error("All question fields are required");
      }else{
      
        for ($i = 0; $i < 7; ++$i) {
          $insert = $db->query("insert into finale_question (fq_name,fe_id) values('$fquestion[$i]','$fe_id')");
        }
        header("Location: message.php?id=".$fe_id);
      }
    }
  ?>
  <div class="container fluid">
    <div class="panel-heading">
        <h1 class="sub-header" align="center">Set Final Question</h1>
    </div>
    <?php
      $query = $db->query("select * from subject inner join finale_exam on subject.sub_id=finale_exam.sub_id where fe_id='$fe_id'");
      $rows = $query->fetch_assoc();
      echo '<h3>'.$rows['sub_name'].'</h3>'
    ?>
    <h2></h2>
    <form action="" method="POST">
      <div class="form-group shadow-textarea">
        <label for="fquestion[]">Question 1:</label>
        <textarea required class="form-control" rows="5" id="fquestion[]" name="fquestion[]"></textarea>
      </div>
      <div class="form-group">
        <label for="fquestion[]">Question 2:</label>
        <textarea required class="form-control" rows="5" id="fquestion[]" name="fquestion[]"></textarea>
      </div>
      <div class="form-group">
        <label for="fquestion[]">Question 3:</label>
        <textarea required class="form-control" rows="5" id="fquestion[]" name="fquestion[]"></textarea>
      </div>
      <div class="form-group">
        <label for="fquestion[]">Question 4:</label>
        <textarea required class="form-control" rows="5" id="fquestion[]" name="fquestion[]"></textarea>
      </div>
      <div class="form-group">
        <label for="fquestion[]">Question 5:</label>
        <textarea required class="form-control" rows="5" id="fquestion[]" name="fquestion[]"></textarea>
      </div>
      <div class="form-group">
        <label for="fquestion[]">Question 6:</label>
        <textarea required class="form-control" rows="5" id="fquestion[]" name="fquestion[]"></textarea>
      </div>
      <div class="form-group">
        <label for="fquestion[]">Question 7:</label>
        <textarea required class="form-control" rows="5" id="fquestion[]" name="fquestion[]"></textarea>
      </div>
      <div>
        <br><input type="submit" name="submit" Value="Set Final Question" class="btn btn-primary">
      </div>
    </form>
  </div>  
<?php else:?>
<?php header('Location: signin.php'); //echo "Not Loggedin"; ?>
<?php endif?>
<?php
	include('footer.php');
?>