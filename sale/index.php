<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>AdminLTE 3 | DataTables</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css" />
  <!-- Datatable CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap4.min.css" />
</head>
<!-- Theme style -->
<link rel="stylesheet" href="../../../dist/css/adminlte.min.css" />
</head>

<body class="hold-transition sidebar-mini sidebar-collapse">
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

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <?php include 'header.php' ?>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                  </h3>
                  <div class="card-tools">
                    <a href="add.php" type="button" class="btn bg-primary btn-tool">
                      <i class="fas fa-add"></i> Add
                    </a>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="about" class="table table-striped table-bordered dt-responsive no-wrap" style="width: 100%">
                    <thead>
                      <tr>
                        <th style="width:3%">#</th>
                        <th>Nama Costumer</th>
                        <th>Nama Produk</th>
                        <th>Nama Ekspedisi</th>
                        <th>Nama Payment</th>
                        <th>Jumlah Pesan</th>
                        <th>Keuntungan</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include '../../koneksi.php';
                      $no = 1;
                      $query = mysqli_query($koneksi, "SELECT tb_penjualan.*, tb_users.*, tb_produk.*, tb_ekspedisi.*, tb_payment.*
                      FROM tb_penjualan
                      INNER JOIN tb_users
                      ON tb_penjualan.id_user=tb_users.id
                      INNER JOIN tb_produk
                      ON tb_penjualan.id_produk=tb_produk.id
                      INNER JOIN tb_ekspedisi
                      ON tb_penjualan.id_ekspedisi=tb_ekspedisi.id
                      INNER JOIN tb_payment
                      ON tb_penjualan.id_payment=tb_payment.id
                      ");
                      $untung = 0;
                      while (
                        $result = mysqli_fetch_array($query)
                      ) {
                        $untung = ($result['harga_jual'] -  $result['harga_beli']) * ($result['jumlah_pesan'])
                      ?>
                        <tr>
                          <td class="text-center" style="width:3%"><?= $no++; ?></td>
                          <td><?= $result['nama_lengkap'] ?></td>
                          <td><?= $result['nama_produk'] ?></td>
                          <td><?= $result['nama_ekspedisi'] ?></td>
                          <td><?= $result['nama_payment'] ?></td>
                          <td><?= $result['jumlah_pesan'] ?></td>
                          <td>Rp. <?= number_format($untung) ?></td>
                          <td class="project-actions text-right">

                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th style="width:3%">#</th>
                        <th>Nama User</th>
                        <th>Nama Produk</th>
                        <th>Nama Ekspedisi</th>
                        <th>Nama Payment</th>
                        <th>Jumlah Pesan</th>
                        <th>Keuntungan</th>
                        <th></th>
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

    <!-- Footer start -->
    <?php include '../../footer.php' ?>
    <!-- Footer end -->

    <!-- Control Sidebar -->
    <aside class=" control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Datatable JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap4.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../../dist/js/demo.js"></script>
  <!-- Page specific script -->

  <!-- DataTables  & Plugins -->
  <script src="../../../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="../../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="../../../plugins/jszip/jszip.min.js"></script>
  <script src="../../../plugins/pdfmake/pdfmake.min.js"></script>
  <script src="../../../plugins/pdfmake/vfs_fonts.js"></script>
  <script src="../../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="../../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="../../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#about").DataTable({
        responsive: true,
        "buttons": ["copy", "csv", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#about_wrapper .col-md-6:eq(0)');
    });
  </script>
</body>

</html>