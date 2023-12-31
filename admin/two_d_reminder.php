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
                <h1>Warranty Expiry Details</h1>
            </div>
            <div class="col-sm-2">
     
                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                 Add Items
                </button>
                    <div class="modal fade" id="modal-default">
                        <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Add Items</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <form id="quickForm" method="post">
                                <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Item Name</label>
                                    <input type="text" name="item_name" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Category</label>
                                    <select class="form-control select2bs4" name="category_id" style="width: 100%;">
                                            <option selected="selected">Select Category</option>
                                            <?php
                                                // include "include/config.php";
                                                // $view = mysqli_query($con,"select * from category") or die (mysqli_error($con));
                                                // while ($row = mysqli_fetch_array($view)) {
                                                // extract($row);
                                            ?>
                                            <option value="<?php //echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></option>
                                            <?php //} ?>
                                        </select> 
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sub Category</label>
                                    <select class="form-control select2bs4" name="sub_categ_id" style="width: 100%;">
                                            <option selected="selected">Select Sub Category</option>
                                            <?php
                                                // include "include/config.php";
                                                // $view = mysqli_query($con,"select * from sub_category") or die (mysqli_error($con));
                                                // while ($row = mysqli_fetch_array($view)) {
                                                // extract($row);
                                            ?>
                                            <option value="<?php //echo $row['sub_categ_id']; ?>"><?php echo $row['sub_categ_name']; ?></option>
                                            <?php //} ?>
                                        </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Price</label>
                                    <input type="text" name="item_price" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Servicing Date</label>
                                    <input type="date" name="servicing_date" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Warranty Date</label>
                                    <input type="date" name="warranty_date" class="form-control" id="exampleInputEmail1">
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
                        <?php
                            include "include/config.php";
                            $view=mysqli_query($con, "SELECT * FROM items WHERE warranty_date BETWEEN CURDATE() AND CURDATE() + INTERVAL 2 DAY") or die(mysqli_error($con));
                        ?>
                        <div class="card">
                            <!-- <div class="card-header">
                                <h3 class="card-title">DataTable with default features</h3>
                            </div> -->
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <th>Sr.No.</th>
                                        <th>Item Name</th>
                                        <th>Category</th>
                                        <th>Sub-Category</th>
                                        <th>Brand</th>
                                        <th>Specification</th>
                                        <th>Price</th> 
                                        <th>Servicing date</th>
                                        <th>Warranty Date</th>
                                        <!-- <th>Action</th> -->      
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $counter=0;
                                            while ($data = mysqli_fetch_array($view)) {
                                            
                                        ?>
                                        <tr>
                                            <td><?php echo ++$counter; ?></td>
                                            <td><?php echo $data['item_name']; ?></td>
                                            <td><?php echo $data['category_name']; ?></td>
                                            <td><?php echo $data['sub_categ_name']; ?></td>
                                            <td><?php echo $data['item_brand']; ?></td>
                                            <td><?php echo $data['item_specify']; ?></td>
                                            <td>₹ <?php echo $data['item_price']; ?></td>
                                            <td><?php echo $data['servicing_date']; ?></td>
                                            <td><?php echo $data['warranty_date']; ?></td>
                                        
                                            <!-- <td>
                                            <a href="items.php?id=<?php //echo $data['item_id']; ?>"  onclick="return confirm('Are you sure! want to delete?')" type="submit" class="btn btn-danger">Delete</a>
                                            <a href="update_items.php?id=<?php //echo $data['item_id']; ?>"  type="submit" class="btn btn-success">Edit</a>                          
                                            </td>      -->
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
 