<?php 
  
  include('header.php');
ob_start();


  if(!isset($_SESSION['s_id'])){
    if (isset($_POST['login'])) {
      $username = protect($_POST['email']);
      $password = protect($_POST['password']);
      $pass = $password;
      $query = $db->query("SELECT * FROM student WHERE s_email = '$username' and s_password = '$pass' ");
      if ($query->num_rows > 0) {
        while($row = $query->fetch_assoc()) {
          //session_start();
          $_SESSION['s_id'] = $row['s_id'];
          header('Location: index.php');
          exit;
        }
      } else {
        alert_div_message('Your Username or password is incorrect or Your Account is not activated.','danger');
      }
    }
  } else {
    header('Location: index.php');
  }
  //login end 



    if(isset($_POST['submit'])){
    $name=$_POST['firstName'];
    $email=$_POST['lastName'];
    $pass=$_POST['email'];
    $age=$_POST['password'];
    $phone=$_POST['phonenumber'];
    
    $sql="insert into signup(firstname,lastname,email,password,phonenumber) values('$name','$email','$pass','$age','$phone')";
    
    $insertquery=mysqli_query($conn,$sql);

    if($insertquery)
    {
        echo '<script>alert("Registration Completed Successfully !!!")</script>';

    }

  }
?>


<form class="form-signin" method="POST" action="">
  <!-- EMAIL -->
  <h2 class="form-signin-heading">Please sign in</h2>
  <input type="email" name="email" class="form-control" id="InputEmail1" placeholder="Email" required autofocus>
  <!-- PASSWORD -->
  <input type="password" name="password" class="form-control" id="InputPassword" placeholder="Password" required>
  <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Submit</button>
</form>

<div>
  <div style="border-bottom: 5px solid rgb(40,96, 144); margin: 10px auto; width: 110px;"></div>
    <div style="margin: 0px auto 5px; width: fit-content; display: flex; align-items: baseline;background-color: #f9f9f9;">
      <a href="signup.php" style="cursor: pointer; margin-left: 5px;">No account yet? Sign up&nbsp</a>
    </div>
</div>