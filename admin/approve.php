<?php
include "include/config.php";

// $page=$_GET['page'];
          
$approve = mysqli_query($con,"update register_users set status = 'Approved' where reg_id ='".$_GET['user_id']."' ")or die(mysqli_error($con));

$back="javascript:history.back()";
  if($approve)

          {

            echo '<script type="text/javascript">';
            echo "alert('User Approved');";
             echo 'window.location.href = "'.$back.'";';
             
            echo "</script>";

          }
         else
         {
            echo '<script type="text/javascript">';
            echo "alert('User Not Approve');";
            echo 'window.location.href = "'.$back.'"';
            echo "</script>";
             
          }

 ?>