<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Sumago</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php include "include/header.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
          <?php
                include "include/config.php";
                $view = mysqli_query($con, "select count(*) as count from items");
                $row= mysqli_fetch_array($view);
                extract($row);
              ?>
            <!-- small box -->
            <div class="small-box bg-info">
              
              <div class="inner">
             
                <h3><?php echo $count; ?></h3>

                <p>New Item Orders</p>
              </div>
              <a href="items.php">
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              </a>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
            
          </div>
          
          <!-- ./col -->
          <div class="col-lg-3 col-6">
          <?php
              include "include/config.php"; 
              $view=mysqli_query($con, "SELECT
              (SELECT COUNT(*) FROM items WHERE MONTH(warranty_date) = MONTH(CURDATE() + INTERVAL 1 MONTH)) AS count,
              COUNT(*) AS current_month_count FROM items WHERE
              warranty_date BETWEEN CURDATE() AND CURDATE() + INTERVAL 1 MONTH") or die(mysqli_error($con));
              $row= mysqli_fetch_array($view);
              extract($row);
          ?>
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $count; ?></h3>

                <p>Next Month Expiry of Items</p>
              </div>
              <a href="report.php">
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              </a>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <?php
              include "include/config.php";
              $view = mysqli_query($con, "select count(*) as count from register_users");
              $row= mysqli_fetch_array($view);
              extract($row);   
            ?>
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $count; ?></h3>

                <p>User Registrations</p>
              </div>
              <a href="user_details.php">
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              </a>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
          <?php
              include "include/config.php"; 
              $view = mysqli_query($con, "select count(*) as count from vender");
              $row= mysqli_fetch_array($view);
              extract($row);
          ?>
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $count; ?></h3>

                <p>Vender</p>
              </div>
              <a href="vender.php">
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              </a>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
       
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <?php include "include/footer.php"; ?>