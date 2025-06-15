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

                <a href="../index.php">
                    <span class="material-symbols-sharp">home </span>
                    <h3>Dashbord</h3>
                </a>
                <a href="data_kelas.php">
                    <span class="material-symbols-sharp">person_outline </span>
                    <h3>Data Kelas</h3>
                </a>
                <a href="data_siswa.php">
                    <span class="material-symbols-sharp">table_view </span>
                    <h3>Data Mahasiswa</h3>
                </a>
                <a href="data_petugas.php">
                    <span class="material-symbols-sharp">groups </span>
                    <h3>Data Petugas</h3>

                </a>
                <a href="data_spp.php" class="active">
                    <span class="material-symbols-sharp">receipt_long </span>
                    <h3>Data SPP</h3>
                </a>
                <a href="pembayaran.php">
                    <span class="material-symbols-sharp">shopping_cart </span>
                    <h3>Entri Pembayaran</h3>
                </a>
                <a href="laporan.php">
                    <span class="material-symbols-sharp">report_gmailerrorred </span>
                    <h3>Cetak Pembayaran</h3>
                </a>
            </div>
        </aside>
        <!-- end sidebar -->

        <!-- start main -->
        <main>
            <div style="height: 30px;"></div>
            <h2>Tambah SPP</h2>
            <div class="wrapper">

                <form action="../request/create.php" method="POST" class="kirim">
                    <div style="height: 30px;"></div>

                    <?php if (isset($_GET['error'])) { ?>
                        <p class="error">

                            <?= htmlspecialchars($_GET['error']) ?>
                        </p>
                    <?php } ?>

                    <?php if (isset($_GET['success'])) { ?>
                        <p class="success">
                            <?= htmlspecialchars($_GET['success']) ?>
                        </p>
                    <?php } ?>
                    <div class="input-box">
                        <input type="text" placeholder="Bulan" name="bulan" required>
                    </div>
                    <div class="input-box">
                        <input type="text" placeholder="Tahun" name="tahun" required>
                    </div>
                    <div class="input-box">
                        <input type="text" placeholder="Nominal" name="nominal" required>
                    </div>
                    <div style="height: 15px;"></div>
                    <button type="submit" class="btn" name="daftar_spp">Kirim</button>
                    <div style="height: 15px;"></div>

                </form>


            </div>


            <div class="recent_order">
                <h2>Data SPP</h2>
                <table>
                    <?php
                    $no = 1;
                    $query = "SELECT * FROM spp";
                    $result = mysqli_query($koneksi, $query)
                    ?>
                    <thead>
                        <tr>

                            <th>No</th>
                            <th>Bulan</th>
                            <th>Tahun</th>
                            <th>Nominal</th>
                            <th>Nominal</th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($result as $data) {
                            echo "
                                <tr>
                                    <td>" . $no++ . "</td>
                                    <td>" . $data["bulan"] . "</td>
                                    <td>" . $data["tahun"] . "</td>    
                                    <td>" . $data["nominal"] . "</td>    
                                    <td><a href='../request/update_spp.php?id=" . $data["id"] . "' class='warning' type='button' >Update</a></td>     
                                    <td><a href='../request/delete_spp.php?id=" . $data["id"] . "' type='button' class='danger' onlick='return confirm('Yakin ingin menghapus data?')'>Delete</a></td>                           
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


        </div>
    </div>
    </div>
    <!-- end right main -->


    <script src="../script.js"></script>
</body>

</html>