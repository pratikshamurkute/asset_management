<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Admin Login </title>
<style>
    html {
    height: 100%;
  }
  body {
    margin:0;
    padding:0;
    font-family: sans-serif;
    background: linear-gradient(#acb6c7, #28333f);
  }
  
  .login-box {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 400px;
    padding: 40px;
    transform: translate(-50%, -50%);
    background: rgba(136, 107, 107, 0.5);
    box-sizing: border-box;
    box-shadow: 0 15px 25px rgba(0,0,0,.6);
    border-radius: 10px;
  }
  
  .login-box h2 {
    margin: 0 0 30px;
    padding: 0;
    color: #0c0b0b;
    text-align: center;
  }
  
  .login-box .user-box {
    position: relative;
  }
  
  .login-box .user-box input {
    width: 100%;
    padding: 10px 0;
    font-size: 16px;
    color: #0e0d0d;
    margin-bottom: 30px;
    border: none;
    border-bottom: 1px solid #131212;
    outline: none;
    background: transparent;
  }
  .login-box .user-box label {
    position: absolute;
    top:0;
    left: 0;
    padding: 10px 0;
    font-size: 20px;
    color: #0a0a0a;
    pointer-events: none;
    transition: .5s;
  }
  
  .login-box .user-box input:focus ~ label,
  .login-box .user-box input:valid ~ label {
    top: -20px;
    left: 0;
    color: #f11414;
    font-size: 16px;
  }
  
  .login-box form button {
    position: relative;
    display: inline-block;
    padding: 10px 20px;
    color: #0a0a0a;
    background-color: #A9A9A9;
    
    font-size: 16px;
    text-decoration: none;
    text-transform: uppercase;
    overflow: hidden;
    transition: .5s;
    margin-top: 40px;
    letter-spacing: 4px
  }
  
  .login-box button:hover {
    background-color:#c48580;
    /* color: #000d0d; */
    border-radius: 50px;
   
               
  }
  
  .login-box button span {
    position: absolute;
    display: block;
  }
  
  .login-box button span:nth-child(1) {
    top: 0;
    left: -100%;
    width: 100%;
    height: 2px;
    background: linear-gradient(90deg, transparent, #0a0a0a);
    animation: btn-anim1 1s linear infinite;
  }
  
  @keyframes btn-anim1 {
    0% {
      left: -100%;
    }
    50%,100% {
      left: 100%;
    }
  }
  
  .login-box button span:nth-child(2) {
    top: -100%;
    right: 0;
    width: 2px;
    height: 100%;
    background: linear-gradient(180deg, transparent, #0a0a0a);
    animation: btn-anim2 1s linear infinite;
    animation-delay: .25s
  }
  
  @keyframes btn-anim2 {
    0% {
      top: -100%;
    }
    50%,100% {
      top: 100%;
    }
  }
  
  .login-box button span:nth-child(3) {
    bottom: 0;
    right: -100%;
    width: 100%;
    height: 2px;
    background: linear-gradient(270deg, transparent, #0a0a0a);
    animation: btn-anim3 1s linear infinite;
    animation-delay: .5s
  }
  
  @keyframes btn-anim3 {
    0% {
      right: -100%;
    }
    50%,100% {
      right: 100%;
    }
  }
  
  .login-box button span:nth-child(4) {
    bottom: -100%;
    left: 0;
    width: 2px;
    height: 100%;
    background: linear-gradient(360deg, transparent, #0a0a0a);
    animation: btn-anim4 1s linear infinite;
    animation-delay: .75s
  }
  
  @keyframes btn-anim4 {
    0% {
      bottom: -100%;
    }
    50%,100% {
      bottom: 100%;
    }
  }
</style>
</head>
<body>
<!-- partial:index.partial.html -->
<div class="login-box">
  <h2>Login</h2>
  <form method="post" enctype="multipart/form-data">
    <div class="user-box">
      <input type="email" name="email" required="">
      <label>Email</label>
    </div>
    <div class="user-box">
      <input type="password" name="password" required="">
      <label>Password</label>
    </div>
    <button type="submit" name="login">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      Submit
</button>
<a href="register_user.php">Create New User</a>
  </form>
</div>
<!-- partial -->
  
</body>
</html>

<?php 
  include "include/config.php";

  if(isset($_POST['login']))
  {
	extract($_POST);

	$email=mysqli_real_escape_string($con,$_POST['email']);
	$password=mysqli_real_escape_string($con,$_POST['password']);

	$log=mysqli_query($con,"select * from register_users where email='$email' and password='$password'") or die(mysqli_error($con));
 
	if(mysqli_num_rows($log)>0)
	{       
      $fetch=mysqli_fetch_array($log);

        if($fetch['status']=='Disapproved')
        {
          echo "<script>";
          echo "alert('Account Not Approve By Admin ');";
          echo "window.location.href='index.php';";
          echo "</script>";
        }
          elseif($fetch['status']=='Approved')
          {
          
            $_SESSION['email']=$fetch['email'];
            $_SESSION['password']=$fetch['password'];
            
            
            echo "<script>;";
            echo "alert('Login Successful...!!');";
            echo "window.location.href='dashboard.php';";
            echo "</script>;";
          }
          else{
            echo "<script>";
            echo "alert('Account Not Activated By Admin');";
            echo "window.location.href='index.php';";
            echo "</script>";
          }
        }else
        {
            echo "<script>";
            echo "alert('Email Or Password Wrong.');";
            echo "</script>";
            
        }
       

    }
?>