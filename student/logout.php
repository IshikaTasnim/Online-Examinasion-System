<?php

ob_start();
session_start();
unset($_SESSION['s_id']);
session_unset();
session_destroy();
header('Location: signin.php');
exit;

?>