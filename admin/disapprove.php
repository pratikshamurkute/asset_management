<?php
include "include/config.php";

// $page=$_GET['page'];
          
         
          $disapprove = mysqli_query($con,"update register_users set status = 'Disapproved' where reg_id ='".$_GET['user_id']."' ")or die(mysqli_error($con));

$back="javascript:history.back()";
  if($disapprove)

          {

            echo '<script type="text/javascript">';
            echo "alert('User Disapproved');";
             echo 'window.location.href = "'.$back.'";';
             
            echo "</script>";

          }
         else
         {
            echo '<script type="text/javascript">';
            echo "alert('User Not Disapprove');";
            echo 'window.location.href = "'.$back.'"';
            echo "</script>";
             
          }

 ?>