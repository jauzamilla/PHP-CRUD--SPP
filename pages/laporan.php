<?php
include "../koneksi.php"
?>

<!doctype html>
<html>

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />

   <title>Laporan pembayaran SPP</title>

</head>

<body>

   <style>
      .page-break {
         page-break-after: always;
      }

      .text-center {
         text-align: center;
      }

      .text-header {
         font-size: 1.1rem;
      }

      .size2 {
         font-size: 1.4rem;
      }

      .border-bottom {
         border-bottom: 1px black solid;
      }

      .border {
         border: 2px block solid;
      }

      .border-top {
         border-top: 1px black solid;
      }

      .float-right {
         float: right;
      }

      .mt-4 {
         margin-top: 4px;
      }

      .mx-1 {
         margin: 1rem 0 1rem 0;
      }

      .mr-1 {
         margin-right: 1rem;
      }

      .mt-1 {
         margin-top: 1rem;
      }

      ml-2 {
         margin-left: 2rem;
      }

      .ml-min-5 {
         margin-left: -5px;
      }

      .text-uppercase {
         font: uppercase;
      }

      .d1 {
         font-size: 2rem;
      }

      .img {
         position: absolute;
      }

      .link {
         font-style: underline;
      }

      .text-desc {
         font-size: 14px;
      }

      .text-bold {
         font-style: bold;
      }

      .underline {
         text-decoration: underline;
      }

      table {
         font-family: Arial, Helvetica, sans-serif;
         color: #666;
         text-shadow: 1px 1px 0px #fff;
         background: #eaebec;
         border: #ccc 1px solid;
      }

      table th {
         padding: 10px 15px;
         border-left: 1px solid #e0e0e0;
         border-bottom: 1px solid #e0e0e0;
         background: #ededed;
      }

      table tr {
         text-align: center;
         padding-left: 20px;
      }

      table td {
         padding: 10px 15px;
         border-top: 1px solid #ffffff;
         border-bottom: 1px solid #e0e0e0;
         border-left: 1px solid #e0e0e0;
         background: #fafafa;
         background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
         background: -moz-linear-gradient(top, #fbfbfb, #fafafa);
      }

      .table-center {
         margin-left: auto;
         margin-right: auto;
      }

      .mb-1 {
         margin-bottom: 1rem;
      }
      button{
         padding: 5px 15px;
         border-radius: 10px;
         background-color: white;
      }

      .btn{
         align-items: center;
         margin-left: 700px;
         margin-bottom: 10px;
      }

      @media print {
         button {
            display: none;
            /* Tombol print tidak muncul saat cetak */
         }

         table {
            width: 100%;
            border-collapse: collapse;
         }

         th,
         td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
         }
      }
   </style>

   <!-- header -->

   <div>
      <!-- /header -->

      <hr class="border">

      <!-- content -->

      <div class="size2 text-center mb-1">LAPORAN PEMBAYARAN SPP</div>
      <div class="btn"><button onclick="window.print()"> <span class="material-symbols-sharp" style="color: var(--clr-dark); ">print</span></button></div>
      

      <table class="table-center mb-1">
         <?php
         $no = 1;
         $query = "SELECT pembayaran.id AS id,
                        pembayaran.created_at AS created_at,
                        siswa.nim AS nim ,
                        siswa.name AS name,
                        petugas.nama_petugas AS nama_petugas,
                        spp.nominal AS nominal
                                                
                FROM pembayaran
                JOIN siswa ON pembayaran.id_siswa = siswa.id
                JOIN petugas ON pembayaran.id_petugas = petugas.id
                JOIN spp ON pembayaran.id_spp = spp.id";
         $result = mysqli_query($koneksi, $query)
         ?>
         <thead>
            <tr>

               <th>No</th>
               <th>Nim</th>
               <th>Nama</th>
               <th>Nama Petugas</th>
               <th>Nominal</th>
               <th>Tanggal Pembayaran</th>
               <th>Keterangan</th>
               <th></th>

            </tr>
         </thead>
         <tbody>
            <?php
            foreach ($result as $data) {
               echo "
            <tr>
                <td>" . $no++ . "</td>
                <td>" . $data["nim"] . "</td>
                <td>" . $data["name"] . "</td>    
                <td>" . $data["nama_petugas"] . "</td>     
                <td>" . $data["nominal"] . "</td>                           
                <td>" . $data["created_at"] . "</td>                           
                <td  class='warning' >LUNAS</td>                                                    
            </tr>
        ";
            }
            ?>


         </tbody>


      </table>
      <!-- /content -->

</body>

</html>