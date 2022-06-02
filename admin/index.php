<?php
	include('header.php');
?>
<?php if(is_admin_Loggedin()):?>
<h1 class="page-header">Dashboard</h1>

<?php else:?>
<?php header('Location: signin.php'); //echo "Not Loggedin"; ?>
<?php endif?>
<?php
  include('footer.php');
?>