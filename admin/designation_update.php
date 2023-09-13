<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sumago Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
   <!-- SweetAlert2 -->
   <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
 </head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <?php include "include/header.php"; ?>
    <?php
            include "include/config.php";

            if(isset($_GET['id']))
            {
            $var = "select * from designation where designation_id='".$_GET['id']."'";

            $result = mysqli_query($con, $var);
            // $total = mysqli_num_rows($result);
            $row=mysqli_fetch_assoc($result);
            }
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-10">
                        <h1>Update Data</h1>
                    </div>
                    <div class="col-sm-2">
            
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-12">
                <div class="card">
                <!-- <div class="card-header">
                    <h3 class="card-title">DataTable with default features</h3>
                </div> -->
                <!-- /.card-header -->
                <div class="card-body">
                    <form id="quickForm" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Country</label>
                                <input type="text" name="designation_name" value="<?php echo $row['designation_name']; ?>" class="form-control" >
                            </div>
                               
                            </div>                 
                            <div class="modal-footer justify-content-between">
                                <a href="designation.php"><button type="button" class="btn btn-default" data-dismiss="modal">Back</button></a>
                                <button type="submit" name="btn_update" class="btn btn-primary">Save </button>
                            </div>
                    </form>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include "include/footer.php"; ?>
    <?php
// include "config.php";
include "include/config.php";
if(isset($_POST['btn_update'])){
    extract($_POST);

    $result = mysqli_query($con,"SELECT * FROM designation WHERE designation_name = '".$designation_name."' ")or die(mysqli_error($con));

    if(mysqli_num_rows($result)>0) {
        echo "<script type='text/javascript'>;";
        echo "alert('Data Already Exist .. Enter Different Designation');";
        echo "</script>";

        }else{
            $update="update designation set designation_name='$designation_name' where designation_id='".$_GET['id']."'";
            $upd=mysqli_query($con,$update);
            echo $update; 
            // die();
            if ($update) {
            echo "<script>;";
            echo "alert('Data is Updated');";
            echo "window.location.href = 'designation.php';";
            echo "</script>";
            } else {
            echo "<script>;";
            echo "alert('Error')";
            echo "window.location.href = 'designation_update.php';";
            echo "</script>";
            }
    }
}
?>
