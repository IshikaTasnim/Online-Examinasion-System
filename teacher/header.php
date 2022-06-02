<?php
  ob_start();
  session_start();
  include('../includes/connect.php');
  include('../includes/function.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Teacher Panel</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../assets/js/ie-emulation-modes-warning.js"></script>
    <link href="../assets/css/carousel.css" rel="stylesheet">
    <link href="../assets/css/signin.css" rel="stylesheet">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
     <style >
      body{
        background-image: url("../assets/img/banner-bg.jpg");
        height: 100vh;
        -webkit-background-size: cover;
        background-size: cover;
        background-position: center;
        opacity: .9;
        background-attachment: fixed;
      }
      tr{
        background-color: #f9f9f9
      }
    </style>
  </head>
  

  <body>

    <!-- Fixed navbar -->
    <div class="">
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="signin.php">Teacher Panel</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class=""><a href="../index.php">Home</a></li>
            <?php if(is_teacher_Loggedin()):?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Online Exam Set<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="exam.php">Set Exam</a></li>
                <li><a href="set_question.php">Set Question</a></li>
              </ul>
            </li>
            <li><a href="set_finale_question.php">Set Finale Question</a></li>
            <li><a href="question_list.php">Question List</a></li>
            <?php else:?>
          
            <?php endif?>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php if(is_teacher_Loggedin()):?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo teacher_info($_SESSION['t_id'],'t_name'); ?> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li class=""><a href="logout.php">Logout <span class="sr-only">(current)</span></a></li>
                <li></li>
              </ul>
            </li>
            <?php else:?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="signin.php">Teacher login</a></li>
                <li><a href="../student/signin.php">Student Login</a></li>
                <li><a href="../admin/signin.php">Admin Login</a></li>
               
              </ul>
            </li>
            <?php endif?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container-fluid">
      <div class="row">
        
        <div class="col-sm-12 main">