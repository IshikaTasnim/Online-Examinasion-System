<?php 
include'header.php';
if(is_student_Loggedin()):
?>
<h1 align="center" id="demo"></h1>
<?php 
  if(isset($_GET['id'])){
     $id=$_GET['id'];
  }
    $query = $db->query("SELECT * FROM time where exam_id=$id");
                if($query->num_rows>0) {
                  while($row1 = $query->fetch_assoc()) {
                $s_date=$row1['date'];
                $s_time=$row1['s_time'];
                $e_time=$row1['e_time'];
              }}?>
<div id="display" style="display: none">
<div id="time" style=""></div>
<?php
   $id=$_GET['id'];
   $color="";
   $s_id=student_info($_SESSION['s_id'],'s_id');
   $check = $db->query("SELECT * FROM result where exam_id='$id' and s_id='$s_id'");
 if(isset($_POST['submit'])){
    $value=$_POST['value'];
    $exam=$_POST['exam'];
   $a=0;
   $point=0;
   for($a=1;$a<$value;$a++){
         $point=$point+$_POST[$a];
   }
    $point;
    $a--;
    $i=1;
   
   $insert = $db->query("insert into result (s_id,exam_id,point)values('$s_id','$exam','$point')");
   echo'<div class="container"><h2>Total point <b>'.$a.'</b> you got <b>'.$point.'</b></h2><br></div>';
   echo'<h4 align="center">Result</h4>';
   echo'<table class="table"><tr><th>Position</th><th>Student Name</th><th>Marks</th></tr>';
        	$query = $db->query("SELECT * FROM student inner join result on student.s_id=result.s_id where result.exam_id='$id'  ORDER BY `result`.`point` DESC");
                if($query->num_rows>0) {
                  while($row = $query->fetch_assoc()) {
                  if($row['s_id']==$s_id) $color="#AFD1F3";
                  else $color="";
                  echo '<tr style="background:'.$color.'"><td>'.$i.'</td ><td>'.$row['s_name'].'</td><td>'.$row['point'].'</td></tr>';
                  $i++;
                  }
              } 
        	echo'</table>';
}
else if($check->num_rows>0) {
	$i=1;
        	echo' <div class="panel-heading">
                  <h2 class="sub-header" align="center">You already complete this exam</h2>
                </div> ';
          echo'<h4 align="center">Result</h4>';
        	echo'<div class="container fluid"><table class="table"><tr><th>Position</th><th>Student Name</th><th>Marks</th></tr>
              </div>';
        	$query = $db->query("SELECT * FROM student inner join result on student.s_id=result.s_id where result.exam_id='$id'  ORDER BY `result`.`point` DESC");
                if($query->num_rows>0) {
                  while($row = $query->fetch_assoc()) {
                  	if($row['s_id']==$s_id) $color="#AFD1F3";
                  else $color="";
                  echo '<tr style="background:'.$color.'"><td>'.$i.'</td><td>'.$row['s_name'].'</td><td>'.$row['point'].'</td></tr>';
                  $i++;
                  }
              } 
        	echo'</table>';

        	}//complete exam and result
else {
?>

	<form action="" method="POST">
	<?php
        $i=1;
                $query = $db->query("SELECT * FROM `question` where exam_id='$id' ");
                if($query->num_rows>0) {
                  while($row = $query->fetch_assoc()) {
                    echo '<div class="well"><p><b>'.$i.'.</b> '.$row['q_name'].'</p>';
                   $q_id=$row['q_id'];
	                $query2 = $db->query("SELECT * FROM `option` where option.q_id='$q_id' ");
	                if($query2->num_rows>0) {
	                  while($row = $query2->fetch_assoc()) {
	                    echo '<div style="margin-left:3%">';
	                    echo'<label class="container"><input class="input" type="radio" name='.$i.' value='.$row['status'].'><span class="checkmark">'.$row['option'].'</span></label>';
	                    echo'</div>';
	                  }

	                } 
	                else {
	                  echo '<b >No Option to Display</b>';
	                }


                    echo'</div>';
                    $i++;
                  }
                  echo'<input type="text" style="display:none" name="value" Value='.$i.'><input type="text" style="display:none" name="exam" Value='.$id.'>';
                } 
                else {
                  echo '<b >No Question to Display</b>';
                }
              ?>
         <input type="submit" name="submit" Value="Submit" class="btn btn-primary">
  </form>
<?php }?>
</div>
<?php else:?>
<?php header('Location: signin.php'); //echo "Not Loggedin"; ?>
<?php endif?>

<script>
// Set the date we're counting down to
var countDownDate = new Date("<?php echo$s_date; ?> <?php echo$s_time?> ").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML =" <br> <p> Exam Will Be Start After </p><br> "+days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById('display').style.display = 'block';
        document.getElementById('demo').style.display = 'none';
    }
}, 1000);

var countDownDate2 = new Date("<?php echo$s_date; ?> <?php echo$e_time?> ").getTime();

// Update the count down every 1 second
var x2 = setInterval(function() {

    // Get todays date and time
    var now2 = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance2 = countDownDate2 - now2;
    
    // Time calculations for days, hours, minutes and seconds
    var days2 = Math.floor(distance2 / (1000 * 60 * 60 * 24));
    var hours2 = Math.floor((distance2 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes2 = Math.floor((distance2 % (1000 * 60 * 60)) / (1000 * 60));
    var seconds2 = Math.floor((distance2 % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("time").innerHTML = "<br><br>  Time End  "+ hours2 + "h "
    + minutes2 + "m " + seconds2 + "s ";
    
    // If the count down is over, write some text 
    if (distance2 < 0) {
      document.getElementById('time').style.display = 'none';
        clearInterval(x2);
        var btn = document.querySelector("[name='submit']");
        btn.click();

    }
}, 1000);
</script>