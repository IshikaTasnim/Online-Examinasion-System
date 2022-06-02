<?php
	include('header.php');
?>
<?php if(is_teacher_Loggedin()):?>
<?php 
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
      
    else if($check->num_rows>0) {
      echo error(" <b>$question  </b> was exists.");
    } else {
      $insert = $db->query("insert into question (q_name,exam_id)values('$question','$exam')");
      if($insert){
        $check = $db->query("SELECT * FROM question where q_name='$question' limit 1");
        if($check->num_rows>0) {
           while($row = $check->fetch_assoc()) {
                   $q_id=$row['q_id'];
               }
                 while($i<4){
                   if($i==0&&$ans=='a'){$status=1;}
                   else if($i==1&&$ans=='b'){$status=1;}
                   else if($i==2&&$ans=='c'){$status=1;}
                   else if($i==3&&$ans=='d'){$status=1;}
                   if($i==0){ $option=$op_a;}
                   else if($i==1){ $option=$op_b;}
                   else if($i==2){ $option=$op_c;}
                   else if($i==3){ $option=$op_d;}
                   $insert = $db->query("insert into option (option,q_id,status)values('$option','$q_id','$status')");
                    $i++ ;
                    $status=0;
             }
           
           if($insert){
           	  echo success(" <b>$question  </b> was added successfully.");
           }
        }
      }
      else{
        echo success("Some problem  .");
      }
      
    }

 }
?>
   <div class="container fluid">
   	 <h2 align="center">Set New Question</h2>
   	 	 <form action="" method="POST">
   	 	 	<div class="row">
          <div class="col-md-6">
            <div class="  input-group input-group-sm">
              <span class="input-group-addon" id="sizing-addon3">exam</span>
              <select class="form-control" id="exam" name="exam">
                  <?php
                  $id= teacher_info($_SESSION['t_id'],'t_id');
                    $query = $db->query("select * from exam inner join assign_course on assign_course.sub_id=exam.sub_id where assign_course.t_id='$id'");
                    if($query->num_rows>0) {
                      while($row = $query->fetch_assoc()) {
                        echo '<option value="'.$row[exam_id].'">'.$row[exam_name].'</option>';
                      }
                    } else {
                      echo '<option value="null">No Course to Display</option>';
                    }
                  ?>
                </select>
            </div><br>
          </div>
          <div class="col-md-6">
            <br><br>
          </div>
          
   	 	 	<div class="col-md-12">
	   	 	 	<div class="  input-group input-group-sm">
  				  <span class="input-group-addon" id="sizing-addon3">Question</span>
  				  <input type="text" class="form-control" placeholder="Question" name="question" aria-describedby="sizing-addon3">
				  </div><br>
        </div>
			 <div class="col-md-6">
				<div class="  input-group input-group-sm">
				  <span class="input-group-addon" id="sizing-addon3">Option A</span>
				  <input type="text" class="form-control" placeholder="Question A" name="op_a" aria-describedby="sizing-addon3">
				</div>
			</div>
			<div class="col-md-6">
				<div class="  input-group input-group-sm">
				  <span class="input-group-addon" id="sizing-addon3">Option B</span>
				  <input type="text" class="form-control" placeholder="Option B" name="op_b" aria-describedby="sizing-addon3">
				</div><br>
            </div>
            
			 <div class="col-md-6">
				<div class="  input-group input-group-sm">
				  <span class="input-group-addon" id="sizing-addon3">Option C</span>
				  <input type="text" class="form-control" placeholder="Option C" name="op_c" aria-describedby="sizing-addon3">
				</div>
			</div>
			<div class="col-md-6">
				<div class="  input-group input-group-sm">
				  <span class="input-group-addon" id="sizing-addon3">Option D</span>
				  <input type="text" class="form-control" placeholder="Option D" name="op_d" aria-describedby="sizing-addon3">
				</div><br>
            </div>

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
      <br>
		   </div>
            <br><input type="submit" name="submit" Value="Add Question" class="btn btn-primary">
		   </div>
   	 	 </form>
   </div>
<?php else:?>
<?php header('Location: signin.php'); //echo "Not Loggedin"; ?>
<?php endif?>
<?php
  include('footer.php');
?>