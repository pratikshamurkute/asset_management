<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | DataTables</title>

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

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-10">
                <h1>Country</h1>
            </div>
            <div class="col-sm-2">
     
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-sm">
                 Add State
                </button>
                    <div class="modal fade" id="modal-sm">
                        <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Add State</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <form id="quickForm" method="POST">
                                <div class="card-body">       
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Country</label>
                                    <select class="form-control select2bs4" name="cou_id" style="width: 100%;">
                                        <option selected="selected">Select Country</option>
                                        <?php
                                            include "include/config.php";
                                            $view = mysqli_query($con,"select * from country") or die (mysqli_error($con));
                                            while ($row = mysqli_fetch_array($view)) {
                                            extract($row);
                                        ?>
                                        <option value="<?php echo $row['cou_id']; ?>"><?php echo $row['country']; ?></option>
                                        <?php } ?>
                                    </select> 
                                </div>
                                <div class="form-group">
                                    <label >State</label>
                                    <input type="text" name="states" class="form-control"  placeholder="Enter Country">
                                </div>
                                </div>                 
                                <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" name="btn_submit" class="btn btn-primary">Save </button>
                                
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                        <!-- insert data  -->
                        <?php
                            include "include/config.php";

                            if(isset($_POST['btn_submit'])){
                                extract($_POST);

                                $result = mysqli_query($con,"SELECT * FROM states WHERE states = '".$states."' ")or die(mysqli_error($con));

                                if(mysqli_num_rows($result)>0) {
                                    echo "<script type='text/javascript'>;";
                                    echo "alert('Data Already Exist .. Enter Different States');";
                                    echo "</script>";
                                }
                                else{
                                $insert = mysqli_query($con,"INSERT INTO states (cou_id, states) VALUES ('$cou_id', '$states')") or die (mysqli_error($con));
                            
                                if($insert)
                                {
                                    echo "<script type='text/javascript'>;";
                                    echo "alert('Data Inserted Successfully');";
                                    echo "window.location='state.php';";
                                    echo "</script>";
                                }
                                else
                                {
                                    echo "<script type='text/javascript'>;";
                                    echo "window.location='state.php';";
                                    echo "</script>";
                                }
                            }
                        }
                         ?>
                    </div>
      <!-- /.modal -->    

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
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <th>Sr.No.</th>
                            <th>Country</th>
                            <th>State Name</th> 
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                                include "include/config.php";
                                $view = mysqli_query($con, "SELECT a.*, b.* FROM country a, states b WHERE a.cou_id=b.cou_id") or die(mysqli_error($con));
                                
                                $counter = 0;     
                                while ($data = mysqli_fetch_array($view)){ 
                                extract($data);
                            ?>
                                <tr>
                                    <td><?php echo ++$counter; ?></td>
                                    <td><?php echo $data['country']; ?></td>
                                    <td><?php echo $data['states']; ?></td>
                                    <td>
                                          <a href="state.php?id=<?php echo $data['id']; ?>"  onclick="return confirm('Are you sure! want to delete?')" type="submit" class="btn btn-danger">Delete</a>

                                         <a href="state_update.php?id=<?php echo $data['id']; ?>"  type="submit" class="btn btn-success">Edit</a>

                                                
                                    </td>
                                </tr>  
                            <?php } ?>
                        </tbody>
                    </table>
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

<!-- delete -->
 <?php

if(isset($_GET['id'])){
    $id=$_GET['id'];
  
    $dlt = mysqli_query($con,"DELETE FROM `states` WHERE `id`='$id'")or die (mysqli_error($con));
   $result =($dlt);

if ($result) {
    echo "<script>";
    echo "window.location.href = 'state.php';";
    echo '</script>';
} else {
    echo "<script>;";
    echo "window.location.href = 'state.php';";
    echo "</script>";
}

  }

?>
