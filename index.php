
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Online Exam System</title>

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
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
 <style>

   body {
	background-image: url("assets/img/bg2.jpg");
	height: 100vh;
	-webkit-background-size: cover;
	background-size: cover;
	background-position: center;
	opacity: 0.8;
	background-attachment: fixed;
} 
ul{
list-style-type: none;
}
li {
	float: center;
}

li a {
    color: #0B0917 ;
    padding: 4px 16px;
    text-decoration: none; 

}

/* Change the link color on hover */
li a:hover {
    background-color: #580951;
    color: white;
    border: 5px solid #025647;
}
a{

	background-color: #025647;
	border-radius: 25px;
    border: 5px solid #ffffff;
}
</style>

<body>
<div class="container fluid">
	<div align="center" style="padding-top:3%;font-size:30px">
		<ul>
	        <li><a href="admin/signin.php">Admin Login</a><br><br> 
	        <li><a href="teacher/signin.php">Teacher Login</a><br><br>
			<li><a href="student/signin.php">Student Login</a>
		</ul>
	</div>
</div>

</body>