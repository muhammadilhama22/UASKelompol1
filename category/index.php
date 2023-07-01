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
                  <table id="about" class="table table-striped table-bordered dt-responsive nowrap" style="width: 100%">
                    <thead>
                      <tr>
                        <th style="width:3%">#</th>
                        <th>Gambar</th>
                        <th>Nama Kategori</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include '../../koneksi.php';
                      $query = mysqli_query($koneksi, "SELECT * From tb_kategori ORDER BY id DESC");
                      $no = 1;
                      while ($result = mysqli_fetch_array($query)) {
                      ?>
                        <tr>
                          <td class="text-center" style="width:3%"><?= $no++; ?></td>
                          <td class="text-center">
                            <img alt="Avatar" style="object-fit: cover;" class="table-avatar rounded-circle img-bordered " src="uploads/<?= $result['gambar']; ?>" width="100px" height="100px">
                          </td>
                          <td><?= $result['nama_kategori'] ?></td>
                          <td class="project-actions text-right">
                            <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal<?= $result['id']; ?>" data-whatever="@mdo" href="#exampleModal<?= $result['id']; ?>">
                              <i class="fas fa-eye">
                              </i>
                              View
                            </a>
                            <a class="btn btn-success btn-sm" href="edit.php?id=<?= $result['id']; ?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                            </a>
                            <a class="btn btn-danger btn-sm" href="proses_hapus.php?id=<?= $result['id']; ?>">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                            </a>
                          </td>
                        </tr>
                        <div class="modal fade" id="exampleModal<?= $result['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content bg-primary ">
                              <div class="modal-header ">
                                <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action="proses_edit.php" method="POST" enctype="multipart/form-data"">
                                <div class=" card-body d-flex flex-column justify-content-center align-items-center">
                                  <img src="uploads/<?= $result['gambar']; ?>" style="object-fit: cover;" alt="" class="rounded-circle" width="200px" height="200px">
                                  <h3><?= $result['nama_kategori']; ?></h3>

                              </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      <?php }

                      ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th style="width:3%">#</th>
                        <th>Gambar</th>
                        <th>Nama Kategori</th>
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
  <script>
    $(document).ready(function() {
      $("#about").DataTable({
        responsive: true
      });
    });
  </script>
</body>

</html>