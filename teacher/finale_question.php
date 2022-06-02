<?php
	include('header.php');
?>
<?php 
	$t_id = $_SESSION['t_id'] ;
	$fe_id = protect($_GET['id'] );
?>
<style type="text/css">
	.w3ls-about-grid {
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
	


</style>
<div class="container fluid">
	<div class="panel-heading">
	    <h1 class="sub-header" align="center">Final Question</h1>
	</div>
	<h3>
		&nbsp&nbsp 
		<?php
      
      		$query = $db->query("select * from subject inner join finale_exam on subject.sub_id=finale_exam.sub_id where fe_id='$fe_id'");
      		$rows = $query->fetch_assoc();
      		echo $rows['sub_name'];
    	?>
	</h3>
	<!--<h5>&nbsp&nbsp&nbsp&nbspHere are the question :</h5>-->
	<br>
	<?php
		$i = 1 ;
		$query = $db->query("select * from finale_question where fqc_id='$fe_id'");
		while($rows = $query->fetch_assoc()){
			echo '  <div class="w3ls-about-grid">
					<h4>Qestion'.$i.'</h4>
					<p>'.$rows['fq_name'].'</p>
					</div>
				 ';
				 $i++;
		};
		
	?>

</div>