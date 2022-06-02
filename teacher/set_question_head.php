<?php
	include('header.php');
?>

<?php if(is_teacher_Loggedin()):?>
<?php
    $t_id = $_SESSION['t_id'] ;
    $fe_id= protect($_GET['fe_id']);
    $i = 0 ;
      $check = $db->query("select * from finale_question inner join finale_exam on finale_question.fe_id = finale_exam.fe_id where sub_id = (select sub_id from finale_exam where fe_id = '$fe_id')");
      if($check->num_rows!=14){
        header("Location: message2.php?id=".$fe_id);
      }

      $check =$db->query("select * from finale_question where fqc_id = '$fe_id'");
      if($check->num_rows>0){
        header("Location: finale_question.php?id=".$fe_id);
      }
      

    if(isset($_POST['submit'])){
      $count = count($_POST['fquestion']);
      echo "You have selected following ".$count." option(s): <br/>";
      if($count ==  7 ){
        foreach($_POST['fquestion'] as $value){
          echo $value."<br>";
          $update = $db->query("UPDATE finale_question SET fqc_id = '$fe_id' WHERE fq_id = '$value'");
         
        }
        echo success("Questions was set successfully");
        header("Location: finale_question.php?id=".$fe_id);
      }else
        echo error("Exact 7 quuestion need to be selected") ;
      
    }

?>
<style type="text/css">
  label {
    margin-top: 1em;
    background-color: #f9f9f9;
    margin-bottom: 1em;
    margin-right: 1em;
    margin-left: 1em;
    padding: 1em;
    width: 100%;
    -webkit-box-shadow: 0px 0px 10px 0px #ccc;
    -moz-box-shadow: 0px 0px 10px 0px #ccc;
    -o-box-shadow: 0px 0px 10px 0px #ccc;
    -ms-box-shadow: 0px 0px 10px 0px #ccc;
    box-shadow: 0px 0px 10px 0px black;
}
.input_but {
    margin left: 20em  

}
</style>


<div class="container fluid">
  <div class="panel-heading">
    <h1 class="sub-header" align="center">Set Final Question</h1>
  </div>
  <?php
    $query = $db->query("select * from subject inner join finale_exam on subject.sub_id=finale_exam.sub_id where fe_id='$fe_id'");
    $rows = $query->fetch_assoc();
    echo '<h3>&nbsp&nbsp'.$rows['sub_name'].'</h3>'
  ?>
  <h4>&nbsp&nbsp&nbspChoose any of 7 questions out of 14 questions :</h4>

  <form action="" method="POST">
    <?php
      $i = 1 ;
      $query = $db->query("select * from finale_question inner join finale_exam on finale_question.fe_id = finale_exam.fe_id where sub_id = (select sub_id from finale_exam where fe_id = '$fe_id')");
      while($rows = $query->fetch_assoc()){
        echo '  <div class="custom-control custom-checkbox">
                  <label>
                    <input type="checkbox" name="fquestion[]" value ="'.$rows['fq_id'].'"> 
                    <h4>Qestion'.$i.'</h4>
                    <p>'.$rows['fq_name'].'</p>
                  </label>
            </div>
           ';
           $i++;
      };
      
    ?>
    <div class="input_but">
      &nbsp&nbsp
      <input type="submit" name="submit" Value="Set Final Question" class="btn btn-primary">
    </div>
</form>
  
</div>
 
   
<?php else:?>
<?php header('Location: signin.php'); //echo "Not Loggedin"; ?>
<?php endif?>
<?php
	include('footer.php');
?>

