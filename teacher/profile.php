<?php
	include('header.php');
?>
<?php if(is_teacher_Loggedin()):
echo'<h1 style="padding-left:10%" class="well">';
$id=teacher_info($_SESSION['t_id'],'t_id');
$query = $db->query("SELECT * FROM teacher where t_id='$id'");
                if($query->num_rows>0) {
                  while($row = $query->fetch_assoc()) {
                  	echo 'Full Name:'.$row['t_name'].'<br><br>Username:'.$row['t_uname'].'<br><br>Email:'.$row['t_email'].'<br><br>ID:'.$row['t_id'].'';
                  }
          }
echo "<h1>";
?>


<?php else:?>
<?php header('Location: signin.php'); //echo "Not Loggedin"; ?>
<?php endif?>
<?php
	include('footer.php');
?>