<?php
include '../../back/koneksi/koneksi.php';
session_start();
$id_pengguna = $_SESSION['id_pengguna'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respon</title>
    <link rel="stylesheet" href="../../assets/css/responuser.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/jquery.dataTables.css" />
</head>

<body>
    <div class="bingkai">
        <div class="badan">
            <div class="sidebar">
                <h2>Pengaduan Masyarakat</h2>
                <form class="home" method="" action="../user/dashboarduser.php">
                    <button type="submit">Dashboard</button>
                </form>
                <form class="datapengaduan" method="" action="../user/datapengaduanuser.php">
                    <button type="submit">Data Pengaduan</button>
                </form>
                <form class="datapengguna" method="" action="../user/datapenggunauser.php">
                    <button type="submit">Data Pengguna</button>
                </form>
               
                <form class="logout" method="post" action="../../logout.php">
                    <button onclick="return confirm('Anda Yakin Ingin Log Out?')" type="submit">
                        <-- Log Out</button>
                </form>
            </div>
            <div class="title">
                <img src="../../assets/img/User.png" style="width:50px">
                <h4>User</h4>
            </div>
            <div class="text">
                <h1>Data Respon</h1>
                <!-- <input type="text" id="KataKunci" name="KataKunci" placeholder="Cari data respon..." required="" value="" autocomplete="off" <?php if (isset($_GET['KataKunci']))  echo $_GET['KataKunci']; ?>">
                    <button class="cari" type="submit">Cari</button>
                    <button class="reset" onclick="location.href='responuser.php'" type="button">Reset</button> -->
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
                    </thead>

                    <tbody align="center">
                        <?php
                        include "../../back/koneksi/koneksi.php";

                        $page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;

                        $kolomCari = (isset($_GET['Kolom'])) ? $_GET['Kolom'] : "";

                        $kolomKataKunci = (isset($_GET['KataKunci'])) ? $_GET['KataKunci'] : "";

                        // Jumlah data per halaman
                        $limit = 5;

                        $limitStart = ($page - 1) * $limit;

                        //kondisi jika parameter pencarian kosong
                        if ($kolomCari == "" && $kolomKataKunci == "") {
                            $SqlQuery = mysqli_query($koneksi, "SELECT * FROM tb_pengaduan INNER JOIN tb_pengguna ON tb_pengaduan.id_pengguna = tb_pengguna.id_pengguna where tb_pengguna.id_pengguna =$id_pengguna and respon IS NOT NULL LIMIT " . $limitStart . "," . $limit);
                        } else {
                            //kondisi jika parameter kolom pencarian diisi
                            $SqlQuery = mysqli_query($koneksi, "SELECT * FROM tb_pengaduan INNER JOIN tb_pengguna ON tb_pengaduan.id_pengguna = tb_pengguna.id_pengguna WHERE nama and tb_pengguna.id_pengguna =$id_pengguna and respon IS NOT NULL LIKE '%$kolomKataKunci%' LIMIT " . $limitStart . "," . $limit);
                        }

                        $no = $limitStart + 1;

                        while ($row = mysqli_fetch_array($SqlQuery)) {
                        ?>
                            <tr align="center">
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