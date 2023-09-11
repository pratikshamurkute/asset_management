<!DOCTYPE html>
<html>
 <head>
 <meta charset="utf-8">
 <title>Registration</title>
 <link rel="stylesheet" href="style2.css" />
  </head>
  <body>
  <?php
  include "include/config.php";

  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

 if (isset($_REQUEST['admin_name'])){

     $admin_name = stripslashes($_REQUEST['admin_name']);
     $admin_name = mysqli_real_escape_string($con,$admin_name); 

     $password = stripslashes($_REQUEST['password']);
     $password = mysqli_real_escape_string($con,$password);

     $query = "INSERT into `admin_login` (admin_name, password) 
     VALUES ('$admin_name', '".md5($password)."')";

     $result = mysqli_query($con,$query);

    if($result){
        echo "<div class='form'>
       <h3>You are registered successfully.</h3>
       <br/>Click here to <a href='login.php'>Login</a></div>";
        }
     }else{
  ?>
 <div class="form">
   <h1>Registration</h1>
   <form name="registration" action="" method="post">

   <input type="text" name="admin_name" placeholder="Username" required />
   <input type="password" name="password" placeholder="Password" required />
   <input type="submit" name="submit" value="Register" />
 </form>
  </div>
 <?php } ?>
</body>
</html>

<?php
  include "include/config.php";

if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


// if is pressed submit button ( Register )
if (isset($_POST['submit']))
{

    $admin_name = stripslashes($_POST['admin_name']);
    $admin_name = mysqli_real_escape_string($con, $admin_name); 

    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($con, $password);

    // check if username already exists
    $q = mysqli_query($con, "SELECT admin_name FROM admin_login WHERE admin_name = '$admin_name'");
    $user_exists = mysqli_num_rows($q);

    // if number of rows is grateater that 0 it's mean that username exists
    if ($user_exists > 0)
    {
        echo "Username in use, please select another one.";
    }
    else
    {
        // if username don't exists
        $query = "INSERT into `admin_login` (admin_name, password) 
        VALUES ('$admin_name', '".md5($password)."')";
   
        $result = mysqli_query($con,$query);

        if($result)
        {
          echo "<div class='form'>
                  <h3>You are registered successfully.</h3>
                  <br/>Click here to <a href='login.php'>Login</a>
                </div>";
        } 
    }


}

?>

<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <title>Registration</title>
      <link rel="stylesheet" href="style2.css" />
  </head>
  <body>

  <div class="form">
   <h1>Registration</h1>
   <form name="registration" action="" method="post">

   <input type="text" name="admin_name" placeholder="Username" required />
   <input type="password" name="password" placeholder="Password" required />
   <input type="submit" name="submit" value="Register" />
 </form>
  </div>
  </div>

</body>
</html>