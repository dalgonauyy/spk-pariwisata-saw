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
                <li><i class="fa fa-sticky-note"></i><a href="kriteria.php"> Kriteria</a></li>
              </ol>
            </div>
          </div>

          <!--START SCRIPT HITUNG-->

          <script>
            function fungsiku() {
              var a = (document.getElementById("peringkat_param").value).substring(0, 1);
              var b = (document.getElementById("harga_param").value).substring(0, 1);
              var c = (document.getElementById("keamanan_param").value).substring(0, 1);
              var d = (document.getElementById("permainan_param").value).substring(0, 1);
              var e = (document.getElementById("fasilitas_param").value).substring(0, 1);
              var f = (document.getElementById("akses_param").value).substring(0, 1);
              var total = Number(a) + Number(b) + Number(c) + Number(d) + Number(e) + Number(f);
              document.getElementById("peringkat").value = (Number(a) / total).toFixed(2);
              document.getElementById("harga").value = (Number(b) / total).toFixed(2);
              document.getElementById("keamanan").value = (Number(c) / total).toFixed(2);
              document.getElementById("permainan").value = (Number(d) / total).toFixed(2);
              document.getElementById("fasilitas").value = (Number(e) / total).toFixed(2);
              document.getElementById("akses").value = (Number(f) / total).toFixed(2);
            }
          </script>
          <!--END SCRIPT HITUNG-->


          <!--START SCRIPT INSERT-->
          <?php

          include 'koneksi.php';

          if (isset($_POST['submit'])) {
            $peringkat = $_POST['peringkat'];
            $harga = $_POST['harga'];
            $keamanan = $_POST['keamanan'];
            $permainan = $_POST['permainan'];
            $fasilitas = $_POST['fasilitas'];
            $akses = $_POST['akses'];
            if (($peringkat == "") or
              ($harga == "") or
              ($keamanan == "") or
              ($permainan == "") or
              ($fasilitas == "") or
              ($akses == "")
            ) {
              echo "<script>
              alert('Tolong Lengkapi Data yang Ada!');
              </script>";
            } else {
              $sql = "SELECT * FROM saw_kriteria";
              $hasil = $conn->query($sql);
              $rows = $hasil->num_rows;
              if ($rows > 0) {
                echo "<script>
                alert('Hapus Bobot Lama untuk Membuat Bobot Baru');
                </script>";
              } else {
                $sql = "INSERT INTO saw_kriteria(
                  peringkat,harga,keamanan,permainan,fasilitas,akses)
                  values ('" . $peringkat . "',
                  '" . $harga . "',
                  '" . $keamanan . "',
                  '" . $permainan . "',
                  '" . $fasilitas . "',
                  '" . $akses . "')";
                $hasil = $conn->query($sql);
                echo "<script>
                alert('Bobot Berhasil di Inputkan!');
                </script>";
              }
            }
          }
          ?>
          <!-- END SCRIPT INSERT-->


          <!--start inputan-->
          <form class="form-validate form-horizontal" id="register_form" method="post" action="">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label"><b>Kriteria</b></label>
              <div class="col-sm-3">
                <label><b>Bobot</b></label>
              </div>
              <div class="col-sm-2">
                <label><b>Perbaikan Bobot</b></label>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Peringkat & Ulasan</label>
              <div class="col-sm-3">
                <select class="form-control" name="peringkat_param" id="peringkat_param">
                  <option>1. Sangat Rendah</option>
                  <option>2. Rendah</option>
                  <option>3. Cukup</option>
                  <option>4. Tinggi</option>
                  <option>5. Sangat Tinggi</option>
                </select>
              </div>
              <div class="col-sm-1">
                <input type="text" class="form-control" name="peringkat" id="peringkat">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">harga</label>
              <div class="col-sm-3">
                <select class="form-control" name="harga_param" id="harga_param">
                  <option>1. Sangat Rendah</option>
                  <option>2. Rendah</option>
                  <option>3. Cukup</option>
                  <option>4. Tinggi</option>
                  <option>5. Sangat Tinggi</option>
                </select>
              </div>
              <div class="col-sm-1">
                <input type="text" class="form-control" name="harga" id="harga">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Keamanan</label>
              <div class="col-sm-3">
                <select class="form-control" name="keamanan_param" id="keamanan_param">
                  <option>1. Sangat Rendah</option>
                  <option>2. Rendah</option>
                  <option>3. Cukup</option>
                  <option>4. Tinggi</option>
                  <option>5. Sangat Tinggi</option>
                </select>
              </div>
              <div class="col-sm-1">
                <input type="text" class="form-control" name="keamanan" id="keamanan">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Tempat Wisata</label>
              <div class="col-sm-3">
                <select class="form-control" name="permainan_param" id="permainan_param">
                  <option>1. Sangat sedikit</option>
                  <option>2. sedikit</option>
                  <option>3. Cukup</option>
                  <option>4. banyak</option>
                  <option>5. Sangat banyak</option>
                </select>
              </div>
              <div class="col-sm-1">
                <input type="text" class="form-control" name="permainan" id="permainan">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Fasilitas</label>
              <div class="col-sm-3">
                <select class="form-control" name="fasilitas_param" id="fasilitas_param">
                  <option>1. Sangat Rendah</option>
                  <option>2. Rendah</option>
                  <option>3. Cukup</option>
                  <option>4. Tinggi</option>
                  <option>5. Sangat Tinggi</option>
                </select>
              </div>
              <div class="col-sm-1">
                <input type="text" class="form-control" name="fasilitas" id="fasilitas">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">akses</label>
              <div class="col-sm-3">
                <select class="form-control" name="akses_param" id="akses_param">
                  <option>1. Sangat Rendah</option>
                  <option>2. Rendah</option>
                  <option>3. Cukup</option>
                  <option>4. Tinggi</option>
                  <option>5. Sangat Tinggi</option>
                </select>
              </div>
              <div class="col-sm-1">
                <input type="text" class="form-control" name="akses" id="akses">
              </div>
              <div class="col-sm-2">
                <button class="btn btn-outline-success" type="button" id="hitung" onclick="fungsiku()" name="hitung"><i class="fa fa-calculator"></i> Hitung</button>
              </div>
            </div>
            <div class="mb-4">
              <button class="btn btn-outline-primary" type="submit" name="submit"><i class="fa fa-save"></i> Submit</button>
            </div>
          </form>
          <table class="table">
            <thead>
              <tr>
                <th><i class="fa fa-arrow-down"></i> Peringkat & Ulasan</th>
                <th><i class="fa fa-arrow-down"></i> harga</th>
                <th><i class="fa fa-arrow-down"></i> keamanan</th>
                <th><i class="fa fa-arrow-down"></i> Tempat Bermain</th>
                <th><i class="fa fa-arrow-down"></i> Fasilitas</th>
                <th><i class="fa fa-arrow-down"></i> akses</th>
                <th><i class="fa fa-cogs"></i> Aksi</th>
              </tr>
            </thead>
            <?php
            $b = 0;
            $sql = "SELECT * FROM saw_kriteria";
            $hasil = $conn->query($sql);
            $rows = $hasil->num_rows;
            if ($rows > 0) {
              while ($row = $hasil->fetch_row()) {
            ?>
                <tr>
                  <td Align="center"><?= $row[1] ?></td>
                  <td Align="center"><?= $row[2] ?></td>
                  <td Align="center"><?= $row[3] ?></td>
                  <td Align="center"><?= $row[4] ?></td>
                  <td Align="center"><?= $row[5] ?></td>
                  <td Align="center"><?= $row[6] ?></td>
                  <td>
                    <div class="btn-group">
                      <a class="btn btn-danger" href="kriteria_hapus.php?id=<?= $row[0] ?>"><i class="fa fa-close"></i></a>
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