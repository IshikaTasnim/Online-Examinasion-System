<?php
function protect($string) {
	$protection = htmlspecialchars(trim($string), ENT_QUOTES);
	return $protection;
}
function error($text) {
	return '<div class="alert alert-danger"><i class="fa fa-times"></i> '.$text.'</div>';
}
function student_info($s_id,$value) {
	global $db;
	$query = $db->query("SELECT * FROM student WHERE s_id='$s_id'");
	$row = $query->fetch_assoc();
	return $row[$value];
}
function teacher_info($t_id,$value) {
	global $db;
	$query = $db->query("SELECT * FROM teacher WHERE t_id='$t_id'");
	$row = $query->fetch_assoc();
	return $row[$value];
}
function is_student_Loggedin(){
	//session_start();
	// Check, if email session is NOT set then this page will jump to login page
	if (isset($_SESSION['s_id'])) {
			return true;
		} else {
		return false;
		/*session_destroy();
		header('Location: signin.php');
		exit;*/
	}
}
function success($text) {
	return '<div class="alert alert-success"><i class="fa fa-check"></i> '.$text.'</div>';
}
function alert_div_message($message,$class='info'){
print '<div class="alert alert-'.$class.'" role="alert">'.$message.'</div>';

}
function is_teacher_Loggedin(){
	//session_start();
	// Check, if username session is NOT set then this page will jump to login page
	if (isset($_SESSION['t_id'])) {
			return true;
	} else {
		return false;
		/*session_destroy();
		header('Location: teacher/signin.php');
		exit;*/
	}
}

function is_admin_Loggedin(){
	//session_start();
	// Check, if username session is NOT set then this page will jump to login page
	if (isset($_SESSION['admin_id']) and isset($_SESSION['admin_username'])) {
			return true;
	} else {
		return false;
		/*session_destroy();
		header('Location: admin/signin.php');
		exit;*/
	}
}
?>