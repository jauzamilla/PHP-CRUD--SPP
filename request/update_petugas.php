<?php
include "../koneksi.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPP</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="container">
        <aside>
            <!-- start top -->
            <div class="top">
                <div class="logo">
                    <h3 style="color: var(--clr-black);">Pembayaran SPP</h3>
                </div>
                <div class="close" id="close_btn">
                    <span class="material-symbols-sharp">
                        close
                    </span>
                </div>
            </div>
            <!-- end top -->

            <!-- start sidebar -->
            <div class="sidebar">

                <a href="#">
                    <span class="material-symbols-sharp">home </span>
                    <h3>Dashbord</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-sharp">person_outline </span>
                    <h3>Data Kelas</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-sharp">table_view </span>
                    <h3>Data Mahasiswa</h3>
                </a>
                <a href="#" class="active">
                    <span class="material-symbols-sharp">groups </span>
                    <h3>Data Petugas</h3>

                </a>
                <a href="#">
                    <span class="material-symbols-sharp">receipt_long </span>
                    <h3>Data SPP</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-sharp">shopping_cart </span>
                    <h3>Entri Pembayaran</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-sharp">report_gmailerrorred </span>
                    <h3>Cetak Pembayaran</h3>
                </a>
            </div>
        </aside>
        <!-- end sidebar -->

        <!-- start main -->
        <main>
            <div style="height: 30px;"></div>
            <h2>Update Petugas</h2>
            <div class="wrapper">

                <?php

                // Ambil data dari patameter url browser
                $id = $_GET['id'];

                // Query ambil data dari param jika ada.
                $query = "SELECT * FROM petugas WHERE id = $id";
                // Hasil Query
                $result = mysqli_query($koneksi, $query);
                foreach ($result as $data) {
                ?>

                    <form action="update.php" method="POST" class="kirim">
                    <div style="height: 30px;"></div>
                        <input type="hidden" value="<?= $data['id'] ?>" name="id">
                        <div class="input-box">
                            <input type="text" placeholder="Nama Petugas" value="<?= $data['nama_petugas'] ?>" name="nama_petugas" required>
                        </div>
                        <div class="input-box">
                            <input type="text" placeholder="Bagian" value="<?= $data['bagian'] ?>" name="bagian" required>
                        </div>
                        <div style="height: 15px;"></div>
                        <button type="submit" class="btn" name="update_petugas">Kirim</button>
                        <div style="height: 15px;"></div>
                    </form>

                <?php } ?>

            </div>




        </main>
        <!-- end main -->


        <!-- start right main  -->

        <div class="right">

            <div class="top">
                <button id="menu_bar">
                    <span class="material-symbols-sharp">menu</span>
                </button>

                <div class="theme-toggler">
                    <span class="material-symbols-sharp active">light_mode</span>
                    <span class="material-symbols-sharp">dark_mode</span>
                </div>
                <div class="profile">
                    <div class="info">
                        <p><b>Babar</b></p>
                        <p>Admin</p>
                        <small class="text-muted"></small>
                    </div>
                    <div>
                        <div class="icon">
                            <span class="material-symbols-sharp">account_circle</span>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    </div>
    <!-- end right main -->


    <script src="../script.js"></script>
</body>

</html>