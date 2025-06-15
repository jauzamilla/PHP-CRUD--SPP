<?php 
  include "../koneksi.php";

  $id = $_GET['id'];
  $query = "DELETE FROM siswa WHERE id = $id";
  $result = mysqli_query($koneksi, $query);
  if($result){
	$sm = "Successfully delete";
	header("Location: ../pages/data_siswa.php?error=$sm");
  } else {
	$sm = "Unsuccessfully delete";
	header("Location: ../pages/data_siswa.php?error=$sm");
  }

 ?>