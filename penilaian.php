<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit;
}
?>
<!doctype html>
<html lang="en">

<?php
include 'components/head.php';
?>

<body>

  <div class="wrapper d-flex align-items-stretch">
    <?php
    include 'components/sidebar.php';
    ?>

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5">

      <?php
      include 'components/navbar.php';
      ?>

      <section id="main-content">
        <section class="wrapper">
          <!--overview start-->
          <div class="row">
            <div class="col-lg-12">
              <ol class="breadcrumb">
                <li><i class="fa fa-list-ol"></i><a href="penilaian.php"> Penilaian</a></li>
              </ol>
            </div>
          </div>

          <!--START SCRIPT INSERT-->
          <?php

          include 'koneksi.php';

          if (isset($_POST['submit'])) {
            $nama = $_POST['nama'];
            $peringkat = $_POST['peringkat'];
            $harga = substr($_POST['harga'], 1, 1);
            $keamanan = substr($_POST['keamanan'], 1, 1);
            $permainan = substr($_POST['permainan'], 1, 1);
            $fasilitas = substr($_POST['fasilitas'], 1, 1);
            $akses = substr($_POST['akses'], 1, 1);
            if ($peringkat == "" || $harga == "" || $keamanan == "" || $permainan == "" || $fasilitas == "" || $peringkat == "") {
              echo "<script>
              alert('Tolong Lengkapi Data yang Ada!');
              </script>";
            } else {
              $sql = "SELECT*FROM saw_penilaian WHERE nama='$nama'";
              $hasil = $conn->query($sql);
              $rows = $hasil->num_rows;
              if ($rows > 0) {
                $row = $hasil->fetch_row();
                echo "<script>
                alert('Aplikasi $nama sudah ada!');
                </script>";
              } else {
                //insert name
                $sql = "INSERT INTO saw_penilaian(
                nama,peringkat,harga,keamanan,permainan,fasilitas,akses)
                values ('" . $nama . "',
                '" . $peringkat . "',
                '" . $harga . "',
                '" . $keamanan . "',
                '" . $permainan . "',
                '" . $fasilitas . "',
                '" . $akses . "')";
                $hasil = $conn->query($sql);
                echo "<script>
                alert('Penilaian Berhasil di Tambahkan!');
                </script>";
              }
            }
          }
          ?>
          <!-- END SCRIPT INSERT-->

          <!--start inputan-->
          <form method="POST" action="">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Alternatif</label>
              <div class="col-sm-4">
                <select class="form-control" name="nama">
                  <?php
                  //load nama
                  $sql = "SELECT * FROM saw_wisata";
                  $hasil = $conn->query($sql);
                  $rows = $hasil->num_rows;
                  if ($rows > 0) {
                    while ($row = mysqli_fetch_array($hasil)) :; {
                      } ?> <option><?php echo $row[0]; ?></option>
                  <?php endwhile;
                  } ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Peringkat & Ulasan</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="peringkat" id="peringkat">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">harga</label>
              <div class="col-sm-4">
                <select class=" form-control" name="harga">
                  <option>(1) Sangat murah</option>
                  <option>(2) murah</option>
                  <option>(3) Sedang</option>
                  <option>(4) mahal</option>
                  <option>(5) Sangat mahal</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">keamanan</label>
              <div class="col-sm-4">
                <select class=" form-control" name="keamanan">
                  <option>(1) Sangat rendah</option>
                  <option>(2) rendah</option>
                  <option>(3) Sedang</option>
                  <option>(4) tinggi</option>
                  <option>(5) Sangat tinggi</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Tempat bermain</label>
              <div class="col-sm-4">
                <select class=" form-control" name="permainan">
                  <option>(1) Sangat Sedikit</option>
                  <option>(2) Sedikit</option>
                  <option>(3) Sedang</option>
                  <option>(4) Banyak</option>
                  <option>(5) Sangat Banyak</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">fasilitas</label>
              <div class="col-sm-4">
                <select class=" form-control" name="fasilitas">
                  <option>(1) Sangat Buruk</option>
                  <option>(2) Buruk</option>
                  <option>(3) Sedang</option>
                  <option>(4) Baik</option>
                  <option>(5) Sangat Baik</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">akses</label>
              <div class="col-sm-4">
                <select class=" form-control" name="akses">
                  <option>(1) Sangat sulit</option>
                  <option>(2) sulit</option>
                  <option>(3) Sedang</option>
                  <option>(4) mudah</option>
                  <option>(5) Sangat mudah</option>
                </select>
              </div>
            </div>
            <div class="mb-4">
              <button type="submit" name="submit" class="btn btn-outline-primary"><i class="fa fa-save"></i> Submit</button>
            </div>
          </form>
          <table class="table">
            <thead>
              <tr>
                <th><i class="fa fa-arrow-down"></i> No</th>
                <th><i class="fa fa-arrow-down"></i> Alternatif</th>
                <th><i class="fa fa-arrow-down"></i> Peringkat & Ulasan</th>
                <th><i class="fa fa-arrow-down"></i> Harga</th>
                <th><i class="fa fa-arrow-down"></i> Keamanan</th>
                <th><i class="fa fa-arrow-down"></i> Tempat Bermain</th>
                <th><i class="fa fa-arrow-down"></i> Fasilitas</th>
                <th><i class="fa fa-arrow-down"></i> Akses</th>
                <th><i class="fa fa-cogs"></i> Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $b = 0;
              $sql = "SELECT*FROM saw_penilaian ORDER BY nama ASC";
              $hasil = $conn->query($sql);
              $rows = $hasil->num_rows;
              if ($rows > 0) {
                while ($row = $hasil->fetch_row()) {
              ?>
                  <tr>
                    <td align="center"><?php echo $b = $b + 1; ?></td>
                    <td><?= $row[0] ?></td>
                    <td align="center"><?= $row[1] ?></td>
                    <td align="center"><?= $row[2] ?></td>
                    <td align="center"><?= $row[3] ?></td>
                    <td align="center"><?= $row[4] ?></td>
                    <td align="center"><?= $row[5] ?></td>
                    <td align="center"><?= $row[6] ?></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-danger" href="penilaian_hapus.php?nama=<?= $row[0] ?>">
                          <i class="fa fa-close"></i></a>
                      </div>
                    </td>
                  </tr>
              <?php }
              } else {
                echo "<tr>
                    <td>Data Tidak Ada</td>
                <tr>";
              } ?>
            </tbody>
          </table>
        </section>
      </section>
    </div>
  </div>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>