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

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-10">
                <h1>Category</h1>
            </div>
            <div class="col-sm-2">
     
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-sm">
                 Add Category
                </button>
                    <div class="modal fade" id="modal-sm">
                        <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Add Category</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <form id="quickForm" method="post">
                                <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Category</label>
                                    <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" >
                                </div>
                               
                                </div>                 
                                <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" name="save_form" class="btn btn-primary">Save </button>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
      <!-- /.modal -->

     

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
                $view=mysqli_query($con, "select * from category") or die(mysqli_error($con));
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
                        <th>Category</th>
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
                        <td><?php echo $data['category_name']; ?></td>
                        <td>
                        <a href="category.php?id=<?php echo $data['category_id']; ?>"  onclick="return confirm('Are you sure! want to delete?')" type="submit" class="btn btn-danger">Delete</a>
                        <a href="category_update.php?id=<?php echo $data['category_id']; ?>"  type="submit" class="btn btn-success">Edit</a>

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
 include "include/config.php";

 if(isset($_POST['save_form'])){
    $category_name = $_POST["category_name"];
    $sql=mysqli_query($con,"INSERT INTO category (category_name) VALUES ('".$category_name."')");

    if($sql){
        echo "<script type='text/javascript'>;";
        echo "alert('Data Inserted Successfully');";
        echo "window.location='category.php';";
        echo "</script>";
    }else{
        echo "<script type='text/javascript'>;";
        echo "window.location='category.php';";
        echo "</script>";
    }
 }
 ?>
<!-- delete -->
<?php

if(isset($_GET['id'])){
  
    $dlt = mysqli_query($con,"DELETE FROM `category` WHERE `category_id`='".$_GET['id']."'")or die (mysqli_error($con));
   $result =($dlt);

if ($result) {
    echo "<script>";
    echo "window.location.href = 'category.php';";
    echo '</script>';
} else {
    echo "<script>;";
    echo "window.location.href = 'category.php';";
    echo "</script>";
}

  }

?>
