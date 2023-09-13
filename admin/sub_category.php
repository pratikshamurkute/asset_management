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
                <h1>Sub Category</h1>
            </div>
            <div class="col-sm-2">
     
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-sm">
                 Add Sub Category
                </button>
                    <div class="modal fade" id="modal-sm">
                        <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Add Sub Category</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <form id="quickForm" method="post">
                                <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Category</label>
                                    <?php
                                        //Include database configuration file
                                        include('include/config.php');
                                        
                                        //Get all country data
                                        $query = "SELECT * FROM category  ORDER BY category_name ASC";
                                        $run_query = mysqli_query($con, $query);
                                        //Count total number of rows
                                        $count = mysqli_num_rows($run_query);
                                        
                                    ?>
                                    
                                    <select class="form-control select2bs4" name="category_id" style="width: 100%;">
                                        <option selected="selected">Select Country</option>
                                        <?php
                                            if($count > 0){
                                                while($row = mysqli_fetch_array($run_query)){
                                                    $category_id=$row['category_id'];
                                                    $category_name=$row['category_name'];
                                                    echo "<option value='$category_id'>$category_name</option>";
                                                }
                                            }else{
                                                echo '<option value="">Country not available</option>';
                                            }
                                        ?>

                                    </select> 
                                
                                </div>
                               
                                <div class="form-group">
                                    <label for="exampleInputEmail1">sub_category</label>
                                    <input type="text" name="sub_categ_name" class="form-control" id="exampleInputEmail1" >
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
                $view=mysqli_query($con, "SELECT a.*, b.* FROM category a, sub_category b WHERE a.category_id=b.category_id") or die(mysqli_error($con));
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
                        <th>Category Id</th>
                        <th>Category Name</th>
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
                        <td><?php echo $data['sub_categ_name']; ?></td>
                        <td>
                        <a href="sub_category.php?id=<?php echo $data['sub_categ_id']; ?>"  onclick="return confirm('Are you sure! want to delete?')" type="submit" class="btn btn-danger">Delete</a>
                        <a href="subcategory_update.php?id=<?php echo $data['sub_categ_id']; ?>"  type="submit" class="btn btn-success">Edit</a>

                           <!-- <a href=""> <div class="btn btn-danger">Delete</div></a> -->
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
    extract($_POST);

    $result = mysqli_query($con,"SELECT * FROM sub_category WHERE sub_categ_name = '".$sub_categ_name."' ")or die(mysqli_error($con));

    if(mysqli_num_rows($result)>0) {
        echo "<script type='text/javascript'>;";
        echo "alert('Data Already Exist .. Enter Different Subcategory');";
        echo "</script>";
        }
        else{
        $sql=mysqli_query($con,"INSERT INTO sub_category (category_id, sub_categ_name) VALUES ('".$category_id."','".$sub_categ_name."')");

        if($sql){
            echo "<script type='text/javascript'>;";
            echo "alert('Data Inserted Successfully');";
            echo "window.location='sub_category.php';";
            echo "</script>";
        }else{
            echo "<script type='text/javascript'>;";
            echo "window.location='sub_category.php';";
            echo "</script>";
        }
    }
}
 ?>
<!-- delete -->
<?php

if(isset($_GET['id'])){
  
    $dlt = mysqli_query($con,"DELETE FROM `sub_sub_category` WHERE `sub_category_id`='".$_GET['id']."'")or die (mysqli_error($con));

if ($dlt) {
    echo "<script>";
    echo "window.location.href = 'sub_category.php';";
    echo '</script>';
} else {
    echo "<script>;";
    echo "window.location.href = 'sub_category.php';";
    echo "</script>";
}

  }

?>
