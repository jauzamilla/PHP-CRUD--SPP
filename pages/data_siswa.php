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
                <a href="data_siswa.php"  class="active">
                    <span class="material-symbols-sharp">table_view </span>
                    <h3>Data Mahasiswa</h3>
                </a>
                <a href="data_petugas.php">
                    <span class="material-symbols-sharp">groups </span>
                    <h3>Data Petugas</h3>

                </a>
                <a href="data_spp.php">
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
        <h2>Tambah Mahasiswa</h2>
        <div class="wrapper">
        
        <?php
                $sql = "SELECT id, nama_kelas , prodi FROM kelas";
                $result = $koneksi->query($sql);
                ?>

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
                        <input type="text" placeholder="Nama" name="name" required>
                    </div>
                    <div class="input-box">
                        <input type="text" placeholder="Nim" name="nim" required>

                    </div>
                    <div class="cars">
                        <select name="id_kelas" id="cars" required>
                            <option value="">--Pilih Kelas--</option>
                            <?php
                            // Generate opsi dropdown dari hasil query
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='{$row['id']}'>{$row['nama_kelas']}-{$row['prodi']}</option>";
                                }
                            } else {
                                echo "<option value=''>Tidak ada kategori</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="input-box">
                        <input type="text" placeholder="No Telephone" name="notelp" required>
                    </div>
                    <div class="input-box">
                        <input type="text" placeholder="Alamat" name="alamat" required>
                    </div> 
                    <div style="height: 15px;"></div>
                    <button type="submit" class="btn" name="daftar_siswa"><h4>Kirim</h4></button>
                    <div style="height: 30px;"></div>
                </form>
               
            </div>
            

            <div class="recent_order">
                <h2>Data Mahasiswa</h2>
                <?php
                $no = 1;
                $query = "SELECT siswa.id AS id,
                                 siswa.nim AS nim ,
                                 siswa.name AS name,
                                 siswa.notelp AS notelp,
                                 siswa.alamat AS alamat,
                                 kelas.nama_kelas AS nama_kelas,
                                 kelas.prodi AS prodi   
                FROM siswa
                JOIN kelas ON siswa.id_kelas = kelas.id" ;
                
                $result = mysqli_query($koneksi, $query)
                ?>
                <table>
                    <thead>
                        <tr>

                            <th>No</th>
                            <th>Nim</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Prodi</th>
                            <th>No Telephone</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>

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
                                    <td>".$data["nama_kelas"]."</td>
                                    <td>".$data["prodi"]."</td>
                                    <td>".$data["notelp"]."</td>    
                                    <td>".$data["alamat"]."</td>    

                                    <td><a href='../request/update_siswa.php?id=".$data["id"]."' type='button' class='warning'>Update</a></td>   
                                    <td><a href='../request/delete_siswa.php?id=".$data["id"]."' type='button' class='danger' onlick='return confirm('Yakin ingin menghapus data?')'>Delete</a></td>                                
                                </tr>
                            ";
                        }
                        ?>
                        
                    </tbody>
                </table>
                <div style="margin-bottom: 30px;"></div>
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