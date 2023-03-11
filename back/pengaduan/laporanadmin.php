<?php 
session_start();
if(isset($_SESSION['level'])){
    include '../../back/koneksi/koneksi.php';
    $awal = $_GET['awal'];
    $akhir = $_GET['akhir'];
    $id_pengguna = $_GET['id_pengguna'];
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Laporan Pengaduan</title>
     <style>
         body{
            font-family: arial;
         }
         table{
            border-collapse: collapse;
         }
     </style>
 </head>
 <body onload="window.print()">
    <h3>SMK Negeri Purwosari <b><br>LAPORAN PENGADUAN</b></h3>

     <br>
     <br>
     <table border="1" cellspacing="" cellpadding="4" width="100%">
         <tr>
            <th>NO</th>
            <th>id pengguna</th>
            <th>NIK</th>
            <th>NAMA MASYARAKAT</th>
            <th>PENGADUAN</th>
            <th>TANGGAL</th>
            <th>STATUS</th>
         </tr>
         <?php 
        	  $SqlQuery = mysqli_query($koneksi,"SELECT tb_pengguna.*, tb_pengaduan.*
FROM tb_pengguna
INNER JOIN tb_pengaduan ON tb_pengaduan.id_pengguna = tb_pengguna.id_pengguna
WHERE tb_pengaduan.id_pengguna=$id_pengguna AND tgl_pengaduan BETWEEN '$awal' AND '$akhir'
ORDER BY tb_pengaduan.id_pengaduan;");
              $i=1;
              $total = 0;
			while ($row = mysqli_fetch_array($SqlQuery)) {
          ?>
        <tr>
            <td align="center"><?= $i ?></td>
            <td align="center"><?= $row ['id_pengguna']?></td>
            <td align="center"><?= $row['nik'] ?></td>
            <td align="center"><?= $row['nama'] ?></td>
            <td align=""><?= $row['pengaduan'] ?></td>
            <td align=""><?= $row['tgl_pengaduan'] ?></td>
            <td align=""><?= $row['status'] ?></td>
        </tr>
		<?php $i++; ?>
        <?php

}
?>
<table width="100%">
    <tr>
        <td></td>
        <td width="200px">
            <br>
            <p>Purwosari, <?= date('d/m/y') ?> <br>
            Operator, </p>
            <br>
            <br>
            <br>
            <p>_____________________</p>
            
        </td>
    </tr>
</table>
     </table>
 </body>
 </html>
<?php 

} else {
    header("location:log.php");
}
    ?>
