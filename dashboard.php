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
                    <div class="card">
                        <div class="card-header">

                            <h1>Selamat Datang di SPK Pemilihan Wisata</h1>
                        </div>
                        <div class="card-body">
                            <h7>Dengan menggunakan metode SAW, wisatawan dapat memperoleh rekomendasi tempat wisata yang sesuai dengan preferensi mereka berdasarkan berbagai kriteria yang telah ditentukan, seperti biaya, jarak, fasilitas, dan kenyamanan. Hal ini memastikan pemilihan yang lebih tepat dan akurat.
                                
                            </h7>
                            <br>  </br>
                            <h6>Untuk penggunaannya yaitu : </h6>
                            <h6> 1. Pengguna memasukkan alternatif tempat wisata yang ingin di nilai pada bagian alternatif</h6>
                            <h6> 2. Pengguna mengisi penilaian  alternatif menurut kriteria pengguna sesuai dengan prefensi pengguna pada bagian penilaian</h6>
                            <h6> 3. Pengguna dapat menyesuaikan bobot dari kriteria di halaman kriteria atau menggunakan bobot lama yang sudah ditentukan</h6>
                            <h6> 4. Pengguna dapat melihat rangking atau hasil perhitungan di bagian hitung</h6>
                        </div>
                    </div>
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