
<!-- delete -->
<?php
 include "include/config.php";
if(isset($_GET['id'])){
    
    //$city_id=$_GET['id'];
  
    $dlt = mysqli_query($con,"delete from city where city_id='".$_GET['id']."'") or die (mysqli_error($con));
   //$result =($dlt);

if ($dlt) {
    echo "<script>";
    echo "window.location.href = 'city.php';";
    echo '</script>';
} else {
    echo "<script>;";
    echo "window.location.href = 'city.php';";
    echo "</script>";
}

  }

?>
