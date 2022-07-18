<?php
session_start();
include 'connect.php';
if (!isset($_SESSION['islogin'])) {
  header('location:index.php');
}
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tirta Purbalingga</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex" method="POST">
          <?php
          $sql_nama = mysqli_query($dbcon, "select nama from t_admin where id_admin = '$_SESSION[id_admin]'");
          $result = mysqli_fetch_array($sql_nama);
          ?>
          <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= $result['nama'] ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="produk.php" class="nav-link">
                <i class="nav-icon fas fa-dolly-flatbed"></i>
                <p>
                  Produk
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="berita.php" class="nav-link">
                <i class="nav-icon fas fa-newspaper"></i>
                <p>
                  Berita
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="penghargaan.php" class="nav-link">
                <i class="nav-icon fas fa-trophy"></i>
                <p>
                  Penghargaan
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="testimoni.php" class="nav-link active">
                <i class="nav-icon far fa-smile"></i>
                <p>
                  Testimoni
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="sosial-media.php" class="nav-link">
                <i class="nav-icon fas fa-hashtag"></i>
                <p>
                  Sosial Media
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="admin.php" class="nav-link">
                <i class="nav-icon fas fa-user-tie"></i>
                <p>
                  Admin
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="logout.php" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Testimoni Konsumen</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Testimoni</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <a href="testimoni_add_ui.php">
                    <button type="button" class="btn btn-primary"><i class="fa fa-add"></i>
                      Tambah
                    </button>
                  </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Avatar</th>
                        <th>Rating</th>
                        <th>Narasumber</th>
                        <th>Testimoni</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $result = mysqli_query($dbcon, "select * from t_testimoni order by rating desc");
                      $no = 1;
                      foreach ($result as $result) { ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td>
                            <img src="../assets/<?= $result["narasumber_foto"]; ?>" alt=""></td>
                          <td>
                            <?php
                            if ($result['rating'] == 5) {
                              for ($i = 1; $i <= 5; $i++) {
                                echo '<img src="./assets/iconStarSingleActive.svg" alt="">';
                              }
                            } elseif ($result['rating'] == 4) {
                              for ($i = 1; $i <= 4; $i++) {
                                echo '<img src="./assets/iconStarSingleActive.svg" alt="">';
                              }
                              echo '<img src="./assets/iconStarSinglePasive.svg" alt="">';
                            } elseif ($result['rating'] == 3) {
                              for ($i = 1; $i <= 3; $i++) {
                                echo '<img src="./assets/iconStarSingleActive.svg" alt="">';
                              }
                              for ($i = 1; $i <= 2; $i++) {
                                echo '<img src="./assets/iconStarSinglePasive.svg" alt="">';
                              }
                            } elseif ($result['rating'] == 2) {
                              for ($i = 1; $i <= 2; $i++) {
                                echo '<img src="./assets/iconStarSingleActive.svg" alt="">';
                              }
                              for ($i = 1; $i <= 3; $i++) {
                                echo '<img src="./assets/iconStarSinglePasive.svg" alt="">';
                              }
                            } else {
                              echo '<img src="./assets/iconStarSingleActive.svg" alt="">';
                              for ($i = 1; $i <= 4; $i++) {
                                echo '<img src="./assets/iconStarSinglePasive.svg" alt="">';
                              }
                            }
                            ?>
                          </td>
                          <td><?= $result['narasumber']; ?></td>
                          <td><?= $result['testimoni']; ?></td>
                          <td>
                            <div class="btn-group btn-group-sm">
                              <a href="testimoni_edit_ui.php?id_testimoni=<?php echo $result['id_testimoni'] ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                              <a onclick="return confirm('Anda Yakin?')" href="action_delete_testimoni.php?id_testimoni=<?php echo $result['id_testimoni'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </div>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Avatar</th>
                        <th>Rating</th>
                        <th>Narasumber</th>
                        <th>Testimoni</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
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

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        Anything you want
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
</body>

</html>