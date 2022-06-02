<?php
	include('header.php');

?>
<?php 
	$t_id = $_SESSION['t_id'] ;
	$fe_id = protect($_GET['id'] );
?>
<div class="container fluid">
	<div class="row">
		<br><br><br><br><br><br><br><br>
	</div>
        
   
	
	<div>
		<h3 class="sub-header">Message :</h3>
		<h4>The Normal Examiners Yet To Set The Questions for
		<?php
      
      		$query = $db->query("select * from subject inner join finale_exam on subject.sub_id=finale_exam.sub_id where fe_id='$fe_id'");
      		$rows = $query->fetch_assoc();
      		echo $rows['sub_name'];
    	?><br><br>
    	Come Back Later
    	</h4>


	</div>
	
</div>