<?php
	include('header.php');
?>
<?php if(is_teacher_Loggedin()):?>
<?php 
  $q_id=$_GET['id'];
  $query = $db->query("select * FROM question inner join option on question.q_id=option.q_id where question.q_id='$q_id'");
      if($query->num_rows>0) {
            while($row = $query->fetch_assoc()) {
               $question=$row['q_name'];
              }
       }
 if(isset($_POST['submit'])){
 	 $question=protect($_POST['question']);
 	   $op_a=protect($_POST['op_a']);
 	  $op_b=protect($_POST['op_b']);
 	  $op_c=protect($_POST['op_c']);
      $op_d=protect($_POST['op_d']);
      $ans=protect($_POST['ans']);
     $exam=protect($_POST['exam']);
     $status=0;
     $option;
     $i=0;
     $check = $db->query("SELECT * FROM question where q_name='$question'");
     if($question=="" || $op_a=="" || $op_b=="" || $op_c=="" || $op_d==""){
        echo error("All fields are required.");
     }
       else {
      $insert = $db->query("update  question set q_name='$question',exam_id='$exam' where q_id='$q_id'");
      if($insert){
        $check = $db->query("SELECT * FROM question where q_name='$question' limit 1");
        if($check->num_rows>0) {

           while($row = $check->fetch_assoc()) {
                   $q_id=$row['q_id'];
               }
                 for($i=0;$i<4;$i++){

                   if($i==0&&$ans=='a'){$status=1;}
                   else if($i==1&&$ans=='b'){$status=1;}
                   else if($i==2&&$ans=='c'){$status=1;}
                   else if($i==3&&$ans=='d'){$status=1;}
                   if($i==0){ $o=$op_a;}
                   else if($i==1){ $o=$op_b;}
                   else if($i==2){ $o=$op_c;}
                   else if($i==3){ $o=$op_d;}
                   $update = $db->query("update option set option='$o',status='$status' where q_id='$q_id'");
                    
                    $status=0;
             }
           
           if($update){
           	  echo success(" <b>$question  </b> was update successfully.");
           }
        }
      }
      else{
        echo success("Some problem  .");
      }
      
    }

 }
?>
   <div class="">
   	 <h2 align="center">Update Question</h2>
   	 	 <form action="" method="POST">
   	 	 	<div class="row">
   	 	 	<div class="col-md-12">
	   	 	 	<div class="  input-group input-group-sm">
				  <span class="input-group-addon" id="sizing-addon3">Question</span>
				  <input type="text" class="form-control" placeholder="Question" name="question" value="<?php echo $question?>" aria-describedby="sizing-addon3">
				</div><br>
			</div>
			<?php
			   $query = $db->query("select * FROM option where q_id='$q_id'");
			      if($query->num_rows>0) {
			      	$i=0;
			            while($row = $query->fetch_assoc()) {
			               if($i==0){ $op="op_a"; $name="A";}
		                   else if($i==1){ $op="op_b";$name="B";}
		                   else if($i==2){ $op="op_c";$name="C";}
		                   else if($i==3){ $op="op_d";$name="D";}
			     ?>
			     <div class="col-md-6">
				<div class="  input-group input-group-sm">
				  <span class="input-group-addon" id="sizing-addon3">Option <?php ECHO $name ?></span>
				  <input type="text" value="<?php echo $row['option']?>" class="form-control" placeholder="Option" name="<?php echo $op;?>" aria-describedby="sizing-addon3">
				</div><br>
            </div>
			     <?php
			             $i++; }
			       }
             ?>

		   <div class="col-md-6">
				<div class="  input-group input-group-sm">
				  <span class="input-group-addon" id="sizing-addon3">Correct Answer</span>
				  <select class="form-control" id="ans" name="ans">
				  	<option value="a">A</option>
				  	<option value="b">B</option>
				  	<option value="c">C</option>
				  	<option value="d">D</option>
				  </select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="  input-group input-group-sm">
				  <span class="input-group-addon" id="sizing-addon3">exam</span>
				  <select class="form-control" id="exam" name="exam">
              <?php
              $id= teacher_info($_SESSION['t_id'],'t_id');
                $query = $db->query("select * from exam inner join assign_course on assign_course.sub_id=exam.sub_id where assign_course.t_id='$id'");
                if($query->num_rows>0) {
                  while($row = $query->fetch_assoc()) {
                    echo '<option value="'.$row['exam_id'].'">'.$row['exam_name'].'</option>';
                  }
                } else {
                  echo '<option value="null">No Course to Display</option>';
                }
              ?>
            </select>
				</div>
            </div><br>
		   </div>
            <br><input type="submit" name="submit" Value="Update Question" class="btn btn-primary">
		   </div>
   	 	 </form>
   </div>
<?php else:?>
<?php header('Location: signin.php'); //echo "Not Loggedin"; ?>
<?php endif?>
<?php
	include('footer.php');
?>