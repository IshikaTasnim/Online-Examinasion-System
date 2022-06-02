<?php 
include'header.php';
if(is_student_Loggedin()):
echo'<h1 style="padding-left:10%" class="well">';
$id=student_info($_SESSION['s_id'],'s_id');
$query = $db->query("SELECT * FROM student where s_id='$id'");
                if($query->num_rows>0) {
                  while($row = $query->fetch_assoc()) {
                  	echo 'Full Name:'.$row['s_name'].'<br><br>Username:'.$row['s_uname'].'<br><br>Email:'.$row['s_email'].'<br><br>ID:'.$row['s_id'].'';
                  }
          }
echo "<h1>";
?>


<?php else:?>
<?php header('Location: signin.php'); //echo "Not Loggedin"; ?>
<?php endif?>
<?php
include'footer.php';
?>