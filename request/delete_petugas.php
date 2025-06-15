<?php 
  include "../koneksi.php";

  $id = $_GET['id'];
  $query = "DELETE FROM petugas WHERE id = $id";
  // $cek = $koneksi->query("SELECT * FROM petugas WHERE id = $id");
  $result = mysqli_query($koneksi, $query);
  if($result){
	$sm = "Successfully delete";
	header("Location: ../pages/data_petugas.php?error=$sm");
  }else {
 
	$sm = "Unsuccessfully delete";
	header("Location: ../pages/data_petugas.php?error=$sm"). mysqli_error($koneksi);
  }

//   if ($koneksi->query($sql)) {
//     echo "<script>alert('Data berhasil dihapus!'); window.location.href='index.php';</script>";
// } else {
//     echo "<script>alert('Data tidak bisa dihapus!');</script>";
// }


  // $cek = $koneksi->query("SELECT * FROM petugas WHERE id = $id");
  // if ($cek->num_rows > 0) {
  //   $sm = "Unsuccessfully delete";
  //   header("Location: ../pages/data_petugas.php?error=$sm");
  // } else {
  //   $query = "DELETE FROM petugas WHERE id = $id";
  //   $result = mysqli_query($koneksi, $query);
      
  //     if ($result) {
  //       $sm = "Successfully delete";
  //       header("Location: ../pages/data_petugas.php?success=$sm");
  //     } else {
  //         echo "<script>alert('Data tidak bisa dihapus!');</script>";
  //     }
  // }

 ?>