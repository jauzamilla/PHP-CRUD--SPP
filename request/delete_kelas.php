<?php 
  include "../koneksi.php";

  $id = $_GET['id'];
  $query = "DELETE FROM kelas WHERE id = $id";
  $result = mysqli_query($koneksi, $query);
  if($result){
	$sm = "Successfully delete";
	header("Location: ../pages/data_kelas.php?error=$sm");
  } else {
	$sm = "Unsuccessfully delete";
	header("Location: ../pages/data_kelas.php?error=$sm");
  }

 ?>
