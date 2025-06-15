<?php
if (isset($_POST['daftar_petugas'])  ){
    include "../koneksi.php";

    $nama_petugas = $_POST['nama_petugas'];
    $bagian = $_POST['bagian'];

    $query = "INSERT INTO petugas (nama_petugas, bagian) VALUES('".$nama_petugas."', '".$bagian."')";

      $result = mysqli_query($koneksi, $query);

    if (empty($nama_petugas) || empty($bagian)) {
        $em = "please fill out all field!";
        header("Location: ../pages/data_petugas.php?error=$em");
    }else{
        $sm = "Successfully created";
        header("Location: ../pages/data_petugas.php?success=$sm");
    }
}
?>

<?php
if (isset($_POST['daftar_kelas'])  ){
    include "../koneksi.php";

    $nama_kelas = $_POST['nama_kelas'];
    $prodi = $_POST['prodi'];

    $query = "INSERT INTO kelas (nama_kelas, prodi) VALUES('".$nama_kelas."', '".$prodi."')";

      $result = mysqli_query($koneksi, $query);

    if (empty($nama_kelas) || empty($prodi)) {
        $em = "please fill out all field!";
        header("Location: ../pages/data_kelas.php?error=$em");
    }else{
        $sm = "Successfully created";
        header("Location: ../pages/data_kelas.php?success=$sm");
    }
}
?>

<?php
if (isset($_POST['daftar_siswa'])  ){
    include "../koneksi.php";

    $name = $_POST['name'];
    $nim = $_POST['nim'];
    $id_kelas = $_POST['id_kelas'];
    $notelp = $_POST['notelp'];
    $alamat = $_POST['alamat'];
    
    $query = "INSERT INTO siswa (name, nim, id_kelas, notelp, alamat) VALUES('".$name."', '".$nim."', '".$id_kelas."', '".$notelp."', '".$alamat."')";

    $result = mysqli_query($koneksi, $query);

    if (empty($name) || empty($nim) || empty($id_kelas) || empty($notelp) || empty($alamat)) {
        $em = "please fill out all field!";
        header("Location: ../pages/data_siswa.php?error=$em");
    }else{
        $sm = "Successfully created";
        header("Location: ../pages/data_siswa.php?success=$sm");
    }
}
?>


<?php
if (isset($_POST['daftar_spp'])  ){
    include "../koneksi.php";

    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];
    $nominal = $_POST['nominal'];

    $query = "INSERT INTO spp (bulan, tahun, nominal) VALUES('".$bulan."', '".$tahun."', '".$nominal."')";

      $result = mysqli_query($koneksi, $query);

    if (empty($bulan) || empty($tahun) || empty($nominal)) {
        $em = "please fill out all field!";
        header("Location: ../pages/data_spp.php?error=$em");
    }else{
        $sm = "Successfully created";
        header("Location: ../pages/data_spp.php?success=$sm");
    }
}
?>

<?php
if (isset($_POST['daftar_pembayaran'])  ){
    include "../koneksi.php";

    $id_siswa = $_POST['id_siswa'];
    $id_petugas = $_POST['id_petugas'];
    $id_spp = $_POST['id_spp'];

    $query = "INSERT INTO pembayaran (id_siswa, id_petugas, id_spp) VALUES('".$id_siswa."', '".$id_petugas."', '".$id_spp."')";

      $result = mysqli_query($koneksi, $query);

    if (empty($id_siswa) || empty($id_petugas) || empty($id_spp)) {
        $em = "please fill out all field!";
        header("Location: ../pages/pembayaran.php?error=$em");
    }else{
        $sm = "Successfully created";
        header("Location: ../pages/pembayaran.php?success=$sm");
    }
}
?>