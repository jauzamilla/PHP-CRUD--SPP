<?php 
 $koneksi = mysqli_connect('localhost', 'root', '', 'db_spp');

 if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

?>