<?php
include '../../back/koneksi/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Respon</title>
    <link rel="stylesheet" href="../../assets/css/responadmin.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/jquery.dataTables.css" />
</head>

<body>
    <div class="bingkai">
        <div class="badan">
            <div class="sidebar">
                <h2>Pengaduan Masyarakat</h2>
                <form class="home" method="" action="../admin/dashboardadmin.php">
                    <button type="submit">Dashboard</button>
                </form>
                <form class="datapengaduan" method="" action="../admin/datapengaduanadmin.php">
                    <button type="submit">Data Pengaduan</button>
                </form>
                <form class="datapengguna" method="" action="../admin/datapenggunaadmin.php">
                    <button type="submit">Data Pengguna</button>
                </form>
                <form class="respon" method="" action="../admin/responadmin.php">
                    <button type="submit">Data Respon</button>
                </form>
                <form class="logout" method="post" action="../../logout.php">
                    <button onclick="return confirm('Anda Yakin Ingin Log Out?')" type="submit">
                        <-- Log Out</button>
                </form>
            </div>
            <div class="title">
                <img src="../../assets/img/Admin.png" style="width:50px">
                <h4>Admin</h4>
            </div>
            <div class="text">
                <h1>Data Respon</h1>
                <!-- <input type="text" id="KataKunci" name="KataKunci" placeholder="Cari data respon..." required="" value="" autocomplete="off" <?php if (isset($_GET['KataKunci']))  echo $_GET['KataKunci']; ?>">
                <button class="cari" type="submit">Cari</button>
                <button class="reset" onclick="location.href='../admin/responadmin.php'" type="button">Reset</button> -->
            </div>
            <div class="content">
                <table width="100%" align="center" id="tabel" cellspacing="0" cellpadding="10">
                    <thead>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Pengaduan</th>
                        <th>Tanggal</th>
                        <th>Gambar</th>
                        <th>Respon</th>
                        <th>Aksi</th>
                    </thead>

                    <tbody align="center">
                        <?php
                        include "../../back/koneksi/koneksi.php";

                        $SqlQuery = mysqli_query($koneksi, "SELECT * FROM tb_pengaduan INNER JOIN tb_pengguna ON tb_pengaduan.id_pengguna = tb_pengguna.id_pengguna WHERE respon IS NOT NULL ");


                        $no =  1;

                        while ($row = mysqli_fetch_array($SqlQuery)) {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $no++ ?>
                                </td>
                                <td>
                                    <?php echo $row['nik']; ?>
                                </td>
                                <td>
                                    <?php echo $row['nama']; ?>
                                </td>
                                <td>
                                    <?php echo $row['pengaduan']; ?>
                                </td>
                                <td>
                                    <?php echo $row['tgl_pengaduan']; ?>
                                </td>
                                <td>
                                    <img style="widht: 35px;height: 55px;" src="../../assets/img/<?php echo $row['gambar']; ?>" />
                                </td>
                                <td>
                                    <?php echo $row['respon']; ?>
                                </td>
                                <td>
                                    $id = <?php echo $row['id_pengaduan']; ?>;
                                    <a href="../../back/pengaduan/hapusrespon.php" onclick="console.log($id)">Hapus
                                </td>
                            </tr>
                        <?php

                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <script src="../../assets/js/jquery-3.6.0.js"></script>
    <!-- <script src=".../assets/js/jquery.dataTables.min.js"></script>
 -->
    <script src="../../assets/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#tabel').DataTable();
        });
    </script>
</body>

</html>