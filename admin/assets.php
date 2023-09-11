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
                <h1>Asset Details</h1>
            </div>
            <div class="col-sm-2">
     
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                 Add New Assets
                </button>
                    <div class="modal fade" id="modal-default">
                        <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Add Assets</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <form id="quickForm" method="post">
                                <div class="card-body">
                                <div class="form-group">
                                    <label for="">Assets Name</label>
                                    <input type="text" name="asset_name" class="form-control" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Category</label>
                                    <!-- <input type="text" name="category_name" class="form-control" id=""> -->
                                    <select class="form-control select2bs4" name="category_id" style="width: 100%;">
                                            <option selected="selected">Select Category</option>
                                            <?php
                                                include "include/config.php";
                                                $view = mysqli_query($con,"select * from category") or die (mysqli_error($con));
                                                while ($row = mysqli_fetch_array($view)) {
                                                extract($row);
                                            ?>
                                            <option value="<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></option>
                                            <?php } ?>
                                        </select> 
                                </div>
                                <div class="form-group">
                                    <label for="">Sub Category</label>
                                    <!-- <input type="text" name="sub_categ_name" class="form-control" id=""> -->
                                    <select class="form-control select2bs4" name="sub_categ_id" style="width: 100%;">
                                            <option selected="selected">Select Sub Category</option>
                                            <?php
                                                include "include/config.php";
                                                $view = mysqli_query($con,"select * from sub_category") or die (mysqli_error($con));
                                                while ($row = mysqli_fetch_array($view)) {
                                                extract($row);
                                            ?>
                                            <option value="<?php echo $row['sub_categ_id']; ?>"><?php echo $row['sub_categ_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Asset Brand</label>
                                    <input type="text" name="asset_brand" class="form-control" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Specification</label>
                                    <textarea type="text" name="asset_specify" class="form-control" id=""></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Price</label>
                                    <input type="text" name="asset_price" class="form-control" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Purchase Date</label>
                                    <input type="date" name="purchase_date" class="form-control" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Warranty Date</label>
                                    <input type="date" name="warranty_date" class="form-control" id="">
                                </div>
                                
                                <!-- <div class="form-group">
                                    <label for="">Photo</label>
                                    <input type="text" name="ven_website" class="form-control" id="">
                                </div> -->
                                <!-- <div class="form-group">
                                    <label for="">Date</label>
                                    <input type="date" name="date" class="form-control" id="">
                                </div> -->
                                </div>                 
                                <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" name="submit" class="btn btn-primary">Save </button>
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
                $view=mysqli_query($con, "select * from asset_details") or die(mysqli_error($con));
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
                        <th>Asset Name</th>
                        <th>Category</th>
                        <th>Sub-Category</th>
                        <th>Brand</th>
                        <th>Specification</th>
                        <th>Price</th>
                        <!-- <th>Photo</th> -->
                        <th>Purchase date</th>
                        <th>Warranty Date</th>
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
                        <td><?php echo $data['asset_name']; ?></td>
                        <td><?php echo $data['category_name']; ?></td>
                        <td><?php echo $data['sub_categ_name']; ?></td>
                        <td><?php echo $data['asset_brand']; ?></td>
                        <td><?php echo $data['asset_specify']; ?></td>
                        <td>₹ <?php echo $data['asset_price']; ?></td>
                        <td><?php echo $data['purchase_date']; ?></td>
                        <td><?php echo $data['warranty_date']; ?></td>
                       
                        <td>
                        <a href="assets.php?id=<?php echo $data['asset_id']; ?>"  onclick="return confirm('Are you sure! want to delete?')" type="submit" class="btn btn-danger">Delete</a>
                        <a href="asset_update.php?id=<?php echo $data['asset_id']; ?>"  type="submit" class="btn btn-success">Edit</a>                          
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
 require "include/config.php";

 if(isset($_POST['submit'])){
    extract($_POST);
    // $country = $_POST["country"];
    $insert=mysqli_query($con,"insert into asset_details(asset_name, category_name, sub_categ_name, asset_brand, asset_specify, asset_price, purchase_date, warranty_date) values
     ('$asset_name', '$category_name', '$sub_categ_name','$asset_brand','$asset_specify', '$asset_price', '$purchase_date', '$warranty_date')")or die(mysqli_error($con));

    if($insert){                                                                                                                                     
        echo "<script type='text/javascript'>;";
        echo "alert('Data Inserted Successfully');";
        echo "window.location.href='assets.php';";
        echo "</script>";
    }else{
        echo "<script type='text/javascript'>;";
        echo "window.location.href='assets.php';";
        echo "</script>";
    }
 }
 ?>
<!-- delete -->
<?php
  if(isset($_GET['id'])){
  
    $dlt = mysqli_query($con,"DELETE FROM asset_details WHERE asset_id='".$_GET['id']."'")or die (mysqli_error($con));

if ($dlt) {
    echo "<script>";
    echo "window.location.href = 'assets.php';";
    echo '</script>';
} else {
    echo "<script>;";
    echo "window.location.href = 'assets.php';";
    echo "</script>";
}

  }
?>
