<?php
	include('header.php');
?>

<?php if(is_teacher_Loggedin()):?>
<div class="container fluid">
  <div class="panel-heading">
    <h1 class="sub-header" align="center">Set Finale Question</h1>
  </div>
  <h2 align="center">Normal Examiner</h2>
  <table class="table">
    <tr>
      <th>Sl</th>
      <th>Subject</th>
      <th>Action</th>
    </tr>
    <?php
      $i=1;
      $id= teacher_info($_SESSION['t_id'],'t_id');
        $query = $db->query("select * from subject inner join finale_exam on subject.sub_id = finale_exam.sub_id where t_id='$id' and status='normal'");
        if($query->num_rows>0) {
          while($row = $query->fetch_assoc()) {
            echo '<tr><td>'.$i.'</td><td>'.$row['sub_name'].'</td><td><a href="set_question_normal.php?fe_id='.$row['fe_id'].'">Set</a></td></tr>';
            $i++;
          }
        } else {
          echo '<tr><b >No Exam to Display</b></tr>';
        }
    ?>
  </table>
  <br>
  <h2 align="center">Head Examiner</h2>
  <table class="table">
    <tr>
      <th>Sl</th>
      <th>Subject</th>
      <th>Action</th>
    </tr>
    <?php
      $i=1;
      $id= teacher_info($_SESSION['t_id'],'t_id');
        $query = $db->query("select * from subject inner join finale_exam on subject.sub_id = finale_exam.sub_id where t_id='$id' and status='head'");
        if($query->num_rows>0) {
          while($row = $query->fetch_assoc()) {
            echo '<tr><td>'.$i.'</td><td>'.$row['sub_name'].'</td><td><a href="set_question_head.php?fe_id='.$row['fe_id'].'">Set</a></td></tr>';
            $i++;
          }
        } else {
          echo '<tr><b >No Exam to Display</b></tr>';
        }
    ?>
  </table>
</div><!--list -->
<?php else:?>
<?php header('Location: signin.php'); //echo "Not Loggedin"; ?>
<?php endif?>
<?php
	include('footer.php');
?>