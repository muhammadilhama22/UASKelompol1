<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Melokal | About</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../../../../plugins/fontawesome-free/css/all.min.css" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../../../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" />
    <!-- iCheck -->
    <link rel="stylesheet" href="../../../../plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
    <!-- JQVMap -->
    <link rel="stylesheet" href="../../../../plugins/jqvmap/jqvmap.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../../dist/css/adminlte.min.css" />
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../../../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css" />
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../../../../plugins/daterangepicker/daterangepicker.css" />
    <!-- summernote -->
    <link rel="stylesheet" href="../../../../plugins/summernote/summernote-bs4.min.css" />
</head>

<body class="hold-transition sidebar-mini sidebar-collapse">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Preloader start-->
        <?php include 'preloader.php' ?>
        <!-- Preloader end-->

        <!-- Navbar start-->
        <?php include 'navbar.php' ?>
        <!-- Navbar end-->

        <!-- Sidebar start-->
        <?php include 'sidebar.php' ?>
        <!-- Sidebar end-->

        <!-- Content start-->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <?php include 'header.php' ?>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row d-flex flex-column justify-content-center align-items-center">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Add</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>

                                <form action="proses_simpan.php" method="POST" enctype="multipart/form-data">
                                <div class=" card-body">
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="<?= $result['id']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Pilih Gambar</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="gambar" class="custom-file-input" required>
                                                <label class="custom-file-label">Choose Picture</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_lengkap">nama_lengkap</label>
                                        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">username</label>
                                        <input type="text" name="username" id="username" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="no_telp">no_telp</label>
                                        <input type="text" name="no_telp" id="no_telp" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat">alamat</label>
                                        <input type="text" name="alamat" id="alamat" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="col_password">password</label>
                                        <input type="password" name="col_password" id="col_password" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" name="col_status" value="customer" required>
                                    </div>

                                    <div class=" col-md-12 mb-3 py-3">
                                        <a href="index.php" class="btn btn-secondary">Cancel</a>
                                        <input type="submit" value="Save Changes" class="btn btn-primary float-right">
                                    </div>
                            </div>
                            </form>

                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                </div>
        </div>
        <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- Content end-->

    <!-- Footer start -->
    <?php include '../../footer.php' ?>
    <!-- Footer end -->


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../../../plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../../../../plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge("uibutton", $.ui.button);
    </script>
    <!-- Bootstrap 4 -->
    <script src="../../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="../../../../plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="../../../../plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="../../../../plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="../../../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../../../../plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../../../../plugins/moment/moment.min.js"></script>
    <script src="../../../../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../../../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="../../../../plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../../../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../../../dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../../../dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../../../../dist/js/pages/dashboard.js"></script>
</body>

</html>