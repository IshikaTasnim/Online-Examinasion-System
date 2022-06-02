<?php
  include('header.php');
?>
<?php if(is_admin_Loggedin()):?>
  <div class="container fluid">
  	<h1 class="sub-header" align="center">All Teacher List </h1>
    <br><br>
  	 <table class="table">
  	 	 <tr>
  	 	 	<th>Sl</th>
  	 	 	<th>ID</th>
  	 	 	<th>Name</th>
  	 	 	<th>Email</th>
  	 	 	<th>Action</th>
  	 	 </tr>
  	 	  <?php
        $query = $db->query("SELECT * FROM `teacher`  ");
        $i=1;
        if($query->num_rows>0) {
          while($row = $query->fetch_assoc()) {
            echo '<tr><td>'.$i.'</td><td>'.$row['t_id'].'</td><td>'.$row['t_name'].'</td><td>'.$row['t_email'].'</td><td><a href="?action=edit&id='.$row['t_id'].'">Edit</a> | <a href="?action=details&id='.$row['t_id'].'">Details</a></td></tr>';
         $i++; }
        } else {
          echo '<tr><td>No Student to Display</td></tr>';
        }
      ?>
  	 </table>
  </div>
<?php else:?>
<?php header('Location: signin.php');?>
<?php endif?>
<?php
  include('footer.php');
?>