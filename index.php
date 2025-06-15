<?php
include "koneksi.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPP</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="style.css">
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

                <a href="#" class="active">
                    <span class="material-symbols-sharp">home </span>
                    <h3>Dashbord</h3>
                </a>
                <a href="./pages/data_kelas.php">
                    <span class="material-symbols-sharp">person_outline </span>
                    <h3>Data Kelas</h3>
                </a>
                <a href="./pages/data_siswa.php">
                    <span class="material-symbols-sharp">table_view </span>
                    <h3>Data Mahasiswa</h3>
                </a>
                <a href="./pages/data_petugas.php">
                    <span class="material-symbols-sharp">groups </span>
                    <h3>Data Petugas</h3>

                </a>
                <a href="./pages/data_spp.php">
                    <span class="material-symbols-sharp">receipt_long </span>
                    <h3>Data SPP</h3>
                </a>
                <a href="./pages/pembayaran.php">
                    <span class="material-symbols-sharp">shopping_cart </span>
                    <h3>Entri Pembayaran</h3>
                </a>
                <a href="./pages/laporan.php">
                    <span class="material-symbols-sharp">report_gmailerrorred </span>
                    <h3>Cetak Pembayaran</h3>
                </a>
            </div>
        </aside>
        <!-- end sidebar -->

        <!-- start main -->
        <main>
            <h1>Dashbord</h1>
            <?php
                $count_siswa = "SELECT COUNT(*) AS total FROM siswa";
                $count_result = $koneksi->query($count_siswa);
                $count_row = $count_result->fetch_assoc();
                $total_data_siswa = $count_row['total'];

                $count_petugas = "SELECT COUNT(*) AS total FROM petugas";
                $count_result = $koneksi->query($count_petugas);
                $count_row = $count_result->fetch_assoc();
                $total_data_petugas = $count_row['total'];

                $count_kelas = "SELECT COUNT(*) AS total FROM kelas";
                $count_result = $koneksi->query($count_kelas);
                $count_row = $count_result->fetch_assoc();
                $total_data_kelas = $count_row['total'];

                $count_pembayaran = "SELECT COUNT(*) AS total FROM pembayaran";
                $count_result = $koneksi->query($count_pembayaran);
                $count_row = $count_result->fetch_assoc();
                $total_data_pembayaran = $count_row['total'];
                ?>
            <div class="insights">
                <div class="sales">
                    <span class="material-symbols-sharp">account_circle</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Data Siswa</h3>
                            <h1><?= $total_data_siswa ?></h1>
                        </div>
                    </div>
                </div>
                <div class="income">
                    <span class="material-symbols-sharp">table_view</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Data Kelas</h3>
                            <h1><?= $total_data_kelas ?></h1>
                        </div>
                    </div>
                </div>
                <div class="expenses">
                    <span class="material-symbols-sharp">groups</span>
                    <div class="middle">

                        <div class="left">
                            <h3>Total Data Petugas</h3>
                            <h1><?= $total_data_petugas ?></h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="recent_order">
                <h2>Data Pembayaran</h2>
                <?php
                $no =1;
                $query = "SELECT pembayaran.id AS id,
                                 pembayaran.created_at AS created_at,
                                 siswa.nim AS nim ,
                                 siswa.name AS name,
                                 petugas.nama_petugas AS nama_petugas,
                                 spp.nominal AS nominal
                                                           
                            FROM pembayaran
                            JOIN siswa ON pembayaran.id_siswa = siswa.id
                            JOIN petugas ON pembayaran.id_petugas = petugas.id
                            JOIN spp ON pembayaran.id_spp = spp.id" ;
                $result = mysqli_query($koneksi, $query)
                ?>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nim</th>
                            <th>Nama</th>
                            <th>Nama Petugas</th>
                            <th>Nominal</th>
                            <th>Waktu Pembayaran</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($result as $data){
                                echo"
                                    <tr>
                                        <td>".$no++."</td>
                                        <td>".$data["nim"]."</td>
                                        <td>".$data["name"]."</td>    
                                        <td>".$data["nama_petugas"]."</td>     
                                        <td>".$data["nominal"]."</td>                           
                                        <td>".$data["created_at"]."</td>                           
                                        <td  class='warning' >Lunas</td>                                                    
                                    </tr>
                                ";
                            }
                        ?>
                        
                    </tbody>
                </table>

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

            <div class="sales-analytics">
                <?php
                $count_pembayaran = "SELECT COUNT(*) AS total FROM pembayaran";
                $count_result = $koneksi->query($count_pembayaran);
                $count_row = $count_result->fetch_assoc();
                $total_data_pembayaran = $count_row['total'];
                ?>
                

                <div class="item onlion">
                    <div class="icon">
                        <span class="material-symbols-sharp">shopping_cart</span>
                    </div>
                    <div class="right_text">
                        <div class="info">
                            <h3>Total Pembayaran</h3>
                        </div>
                        <h2><?= $total_data_pembayaran ?></h2>
                    </div>
                </div>


            </div>
        </div>
    </div>
    </div>
    <!-- end right main -->


    <script src="script.js"></script>
</body>

</html>