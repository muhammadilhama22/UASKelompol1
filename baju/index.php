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
  <link rel="stylesheet" href="../../../../plugins/fontawesome-free/css/all.min.css" />
  <!-- Datatable CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap4.min.css" />
</head>
<!-- Theme style -->
<link rel="stylesheet" href="../../../../dist/css/adminlte.min.css" />
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
                  <table id="about" class="table table-striped table-bordered dt-responsive nowrap" style="width: 100% ; overflow:hidden">
                    <thead>
                      <tr>
                        <th style="width:3%">#</th>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Deskripsi</th>
                        <th>Stok</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Diskon</th>
                        <th>Nama Merek</th>
                        <th>Nama Kategori</th>
                        <th>Nama Warna</th>
                        <th>Nama Ukuran</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include '../../../koneksi.php';
                      $no = 1;
                      $query = mysqli_query($koneksi, "SELECT tb_produk.*, tb_merek.nama_merek, tb_kategori.nama_kategori, tb_warna.nama_warna, tb_ukuran_a.nama_ukuran FROM tb_produk INNER JOIN tb_kategori ON tb_produk.id_kategori = tb_kategori.id INNER JOIN tb_merek ON tb_produk.id_merek = tb_merek.id INNER JOIN tb_warna ON tb_produk.id_warna = tb_warna.id INNER JOIN tb_ukuran_a ON tb_produk.id_ukuran = tb_ukuran_a.id WHERE tb_kategori.nama_kategori = 'Baju' ORDER BY id DESC;
                      ");
                      while (
                        $result =
                        mysqli_fetch_array($query)
                      ) {
                      ?>
                        <tr>
                          <td class="text-center" style="width:3%"><?= $no++; ?></td>
                          <td class="text-center">
                            <img alt="Avatar" class="table-avatar rounded-circle img-bordered " style="object-fit: cover;" src="uploads/<?= $result['gambar']; ?>" width="50px" height="50px">
                          </td>
                          <td><?= $result['nama_produk'] ?></td>
                          <td><?= substr($result['deskripsi'], 0, 70) . '...' ?></td>
                          <td><?= $result['stok'] ?></td>
                          <td>Rp. <?= number_format($result['harga_beli']) ?></td>
                          <td>Rp. <?= number_format($result['harga_jual']) ?></td>
                          <td>Rp. <?= number_format($result['diskon']) ?></td>
                          <td><?= $result['nama_merek'] ?></td>
                          <td><?= $result['nama_kategori'] ?></td>
                          <td><?= $result['nama_warna'] ?></td>
                          <td><?= $result['nama_ukuran'] ?></td>
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
                                <div class=" card-body">
                                  <div class="form-group">
                                    <input type="hidden" name="id" value="<?= $id ?>">
                                  </div>
                                  <center><img src="uploads/<?= $result['gambar']; ?>" style="object-fit: cover;" alt="" class="rounded-circle" width="200px" height="200px"></center>
                                  <div class="form-group">
                                    <label for="nama_produk">Nama produk</label>
                                    <input disabled type="text" name="nama_produk" id="nama_produk" class="form-control" value="<?= $result['nama_produk']; ?>" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="deskripsi">deskripsi</label>
                                    <textarea disabled id="deskripsi" name="deskripsi" class="form-control" rows="4" required><?= $result['deskripsi']; ?></textarea>
                                  </div>
                                  <div class="form-group">
                                    <label for="stok">stok</label>
                                    <input disabled type="text" name="stok" id="stok" class="form-control" value="<?= $result['stok']; ?>" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="harga_beli">Harga beli</label>
                                    <div class="input-group">
                                      <div class="custom-file">
                                        <span class="input-group-text">Rp. </span>
                                        <input disabled type="text" name="harga_beli" id="harga_beli" class="form-control" value="<?= $result['harga_beli']; ?>" required>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="harga_jual">Harga jual</label>
                                    <div class="input-group">
                                      <div class="custom-file">
                                        <span class="input-group-text">Rp. </span>
                                        <input disabled type="text" name="harga_jual" id="harga_jual" class="form-control" value="<?= $result['harga_jual']; ?>" required>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="diskon">diskon</label>
                                    <div class="input-group">
                                      <div class="custom-file">
                                        <span class="input-group-text">Rp. </span>
                                        <input disabled type="text" name="diskon" id="diskon" class="form-control" value="<?= $result['diskon']; ?>" required>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="nama_merek">Nama merek</label>
                                    <select id="nama_merek" name="nama_merek" class="form-control custom-select">
                                      <option selected disabled><?= $result['nama_merek']; ?></option>
                                    </select>
                                  </div>

                                  <div class="form-group">
                                    <label for="nama_kategori">Nama kategori</label>
                                    <select id="nama_kategori" name="nama_kategori" class="form-control custom-select">
                                      <option selected disabled><?= $result['nama_kategori']; ?></option>
                                    </select>
                                  </div>

                                  <div class="form-group">
                                    <label for="nama_warna">Nama warna</label>
                                    <select id="nama_warna" name="nama_warna" class="form-control custom-select">
                                      <option selected disabled><?= $result['nama_warna']; ?></option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="nama_ukuran">Nama ukuran</label>
                                    <select id="nama_ukuran" name="nama_ukuran" class="form-control custom-select">
                                      <option selected disabled><?= $result['nama_ukuran']; ?></option>
                                    </select>
                                  </div>
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
                        <th>Nama Produk</th>
                        <th>Deskripsi</th>
                        <th>Stok</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Diskon</th>
                        <th>Nama Merek</th>
                        <th>Nama Kategori</th>
                        <th>Nama Warna</th>
                        <th>Nama Ukuran</th>
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
  <script src="../../../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Datatable JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap4.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../../../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../../../dist/js/demo.js"></script>
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