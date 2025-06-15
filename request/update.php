<?php
     include "../koneksi.php";
    // Buat kondisi jika tombol data di klik
    if(isset($_POST['update_kelas'])){
       
      // Membuat variable setiap field inputan agar kodingan lebih rapi.
      $id = $_POST['id'];
      $nama_kelas = $_POST['nama_kelas'];
      $prodi = $_POST['prodi'];

      // Membuat Query
      $query = "UPDATE kelas SET nama_kelas = '$nama_kelas', prodi = '$prodi' WHERE id = '$id'";

      $result = mysqli_query($koneksi, $query);

      if($result){
        $sm = "Successfully update";
        header("Location: ../pages/data_kelas.php?success=$sm");
      } else {
        $sm = "Unsuccessfully update";
        header("Location: update_kelas.php?error=$sm");
      }

    }    

  ?>

<?php
     include "../koneksi.php";
    // Buat kondisi jika tombol data di klik
    if(isset($_POST['update_petugas'])){
       
      // Membuat variable setiap field inputan agar kodingan lebih rapi.
      $id = $_POST['id'];
      $nama_petugas = $_POST['nama_petugas'];
      $bagian = $_POST['bagian'];

      // Membuat Query
      $query = "UPDATE petugas SET nama_petugas = '$nama_petugas', bagian = '$bagian' WHERE id = '$id'";

      $result = mysqli_query($koneksi, $query);

      if($result){
        $sm = "Successfully update";
        header("Location: ../pages/data_petugas.php?success=$sm");
      } else {
        $sm = "Unsuccessfully update";
        header("Location: update_petugas.php?error=$sm");
      }

    }    

  ?>

<?php
     include "../koneksi.php";
    // Buat kondisi jika tombol data di klik
    if(isset($_POST['update_siswa'])){
       
      // Membuat variable setiap field inputan agar kodingan lebih rapi.
      $id = $_POST['id'];
      $name = $_POST['name'];
      $nim = $_POST['nim'];
      $id_kelas = $_POST['id_kelas'];
      $notelp = $_POST['notelp'];
      $alamat = $_POST['alamat'];

      $stmt_check_kelas = $koneksi->prepare("SELECT id FROM kelas WHERE id = ?");
      $stmt_check_kelas->bind_param("i", $id_kelas); // Asumsi id bertipe integer
      $stmt_check_kelas->execute();
      $stmt_check_kelas->store_result();

      if ($stmt_check_kelas->num_rows == 0) {
          die("Error: id_kelas tidak valid.  Pastikan memilih kelas yang ada.");
      }
      $stmt_check_kelas->close();


      // Membuat Query
      $query = "UPDATE siswa SET  nim = '$nim', name = '$name', id_kelas = '$id_kelas', notelp = '$notelp', alamat = '$alamat' WHERE id = '$id'";
      // $query = "UPDATE siswa SET (name, nim, id_kelas, notelp, alamat) VALUES('".$name."', '".$nim."', '".$id_kelas."', '".$notelp."', '".$alamat."')";

      $result = mysqli_query($koneksi, $query);

      if($result){
        $sm = "Successfully update";
        header("Location: ../pages/data_siswa.php?success=$sm");
      } else {
        $sm = "Unsuccessfully update";
        header("Location: update_siswa.php?error=$sm");
      }

    }    

  ?>


<?php
     include "../koneksi.php";
    // Buat kondisi jika tombol data di klik
    if(isset($_POST['update_spp'])){
       
      // Membuat variable setiap field inputan agar kodingan lebih rapi.
      $id = $_POST['id'];
      $bulan = $_POST['bulan'];
      $tahun = $_POST['tahun'];
      $nominal = $_POST['nominal'];

      // Membuat Query
      $query = "UPDATE spp SET bulan = '$bulan', tahun = '$tahun', nominal = '$nominal' WHERE id = '$id'";

      $result = mysqli_query($koneksi, $query);

      if($result){
        $sm = "Successfully update";
        header("Location: ../pages/data_spp.php?success=$sm");
      } else {
        $sm = "Unsuccessfully update";
        header("Location: update_spp.php?error=$sm");
      }

    }    

  ?>

  
<?php
     include "../koneksi.php";
    // Buat kondisi jika tombol data di klik
    if(isset($_POST['update_siswa'])){
       
      // Membuat variable setiap field inputan agar kodingan lebih rapi.
      $id = $_POST['id'];
      $nim = $_POST['nim'];
      $name = $_POST['name'];
      $id_kelas = $_POST['id_kelas'];
      $alamat = $_POST['alamat'];
      $notelp = $_POST['notelp'];

      // Membuat Query
      
      $query = "UPDATE siswa SET nim = '$nim', name = '$name', alamat = '$alamat', notelp = '$notelp', id_kelas = '$id_kelass' WHERE id = '$id'";

      $result = mysqli_query($koneksi, $query);
     

      

      if($result){
        $sm = "Successfully update";
        header("Location: ../pages/data_siswa.php?success=$sm");
      } else {
        $sm = "Unsuccessfully update";
        header("Location: update_siswa.php?error=$sm");
      }

    }    

  ?>


  