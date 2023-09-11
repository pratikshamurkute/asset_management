<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sumago Assets</title>

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
                <h1>User Details</h1>
            </div>
            <div class="col-sm-2">
                <!-- model start -->
<!--      
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-sm">
                 Add Users
                </button>
                    <div class="modal fade" id="modal-sm">
                        <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Add Users</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <form id="quickForm" method="post">
                                <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">User Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Designation</label>
                                    <input type="text" name="designation" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">User Email</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="text" name="password" class="form-control" id="exampleInputEmail1">
                                </div> -->
                                <!-- <div class="form-group">
                                    <label for="exampleInputEmail1">Photo</label>
                                    <input type="text" name="country" class="form-control" id="exampleInputEmail1">
                                </div> -->
                                <!-- <div class="form-group">
                                    <label for="exampleInputEmail1">Date</label>
                                    <input type="date" name="date" class="form-control" id="exampleInputEmail1">
                                </div>
                                </div>                 
                                <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" name="save_form" class="btn btn-primary">Save </button>
                                </div>
                            </form>
                        </div> -->
                        <!-- /.modal-content -->
                        <!-- </div> -->
                        <!-- /.modal-dialog -->
                    <!-- </div> -->
      <!-- /.modal end -->

     

            <!-- <a href="con_form.php"><button type="button" class="btn btn-block btn-primary">Add City</button></a> -->
            </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-12">
                <?php
                 include "include/config.php";
                $view=mysqli_query($con, "select * from register_users ") or die(mysqli_error($con));
                ?>
                <div class="card">
                <!-- <div class="card-header">
                    <h3 class="card-title">DataTable with default features</h3>
                </div> -->
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Sr.No.</th>
                        <th>Admin Name</th>
                        <th>Designation</th>
                        <th>Email</th>
                        <!-- <th>Password</th> -->
                        <!-- <th>Photo</th> -->
                        <th>Date</th>
                        <th>Action</th>
                       
                    </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $counter=0;
                        while ($data = mysqli_fetch_array($view)) {
                            
                            ?>
                    <tr>
                        <td><?php echo ++$counter; ?></td>
                        <td><?php echo $data['name']; ?></td>
                        <td><?php echo $data['designation']; ?></td>
                        <td><?php echo $data['email']; ?></td>
                        <!-- <td><?php //echo $data['password']; ?></td> -->
                        <!-- <td><?php //echo $data['photo']; ?></td> -->
                        <td><?php echo $data['date']; ?></td>
                        <td>
                        <a href="approve.php?user_id=<?php echo $data['reg_id']; ?>" class="btn btn-block btn-outline-primary btn-sm">Approve</a><br> 
				        <a href="disapprove.php?user_id=<?php echo $data['reg_id']; ?>" class="btn btn-block btn-outline-info btn-sm">Disapproved</a><br> 

                        <a href="user_details.php?id=<?php echo $data['reg_id']; ?>"  onclick="return confirm('Are you sure! want to delete?')" type="submit" class="btn btn-danger">Delete</a>
                        <a href="user_update.php?id=<?php echo $data['reg_id']; ?>"  type="submit" class="btn btn-success">Edit</a>
                       </td>     
                    </tr>  
                    <?php }?>
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
 <?php
//  include "include/config.php";

//  if(isset($_POST['save_form'])){
//     extract($_POST);
//     // $country = $_POST["country"];
//     $sql=mysqli_query($con,"insert into register_users (name,designation,email,password,date) values ('$name','$designation','$email','$password','$date')");

//     if($sql){
//         echo "<script type='text/javascript'>;";
//         echo "alert('Data Inserted Successfully');";
//         echo "window.location.href='user_details.php';";
//         echo "</script>";
//     }else{
//         echo "<script type='text/javascript'>;";
//         echo "window.location.href='user_details.php';";
//         echo "</script>";
//     }
//  }
 ?>
<!-- delete -->
<?php

if(isset($_GET['id'])){
    // $admin_id=$_GET['id'];
  
    $dlt = mysqli_query($con,"DELETE FROM `register_users` WHERE reg_id='".$_GET['id']."'")or die (mysqli_error($con));

if ($dlt) {
    echo "<script>";
    echo "window.location.href = 'user_details.php';";
    echo '</script>';
} else {
    echo "<script>;";
    echo "window.location.href = 'user_details.php';";
    echo "</script>";
}

  }

?>
