<?php
include '../../back/koneksi/koneksi.php';
session_start();
if (!isset($_SESSION['username'])) {
?>
    <script language="JavaScript">
        alert('Anda Harus Login  Terlebih Dahulu!!');
        document.location = '../../index.php';
    </script>
<?php
}
if ($_SESSION['level'] == "User") {
?>
    <script language="JavaScript">
        alert('Anda Tidak Mempunyai Akses Dihalaman Ini!!');
        document.location = '../user/dashboarduser.php';
    </script>
<?php
};
include 'header.php';
?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Table Pengaduan</h6>
                                    <div class="dropdown no-arrow">
                                       
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                <div style="width: 100%;margin: 0px auto;">
                                <div class="text">
                <!-- <input type="text" id="KataKunci" name="KataKunci" placeholder="Cari data pengaduan..." required="" value="" autocomplete="off" <?php if (isset($_GET['KataKunci']))  echo $_GET['KataKunci']; ?>">
                <button class="cari" type="submit">Cari</button>
                <button class="reset" onclick="location.href='datapengaduanadmin.php'" type="button">Reset</button> -->
            </div>
            <div class="content">
                <table  width="100%" id="tabel" class="table table-striped table table-bordered text-center" cellspacing="0" >
                    <thead>
                        <th>No</th>
                        <th>NIK</th>
                        
                        <!-- <th>Tanggal</th> -->
                        <th>Nama</th>
                        <!-- <th>Gambar</th> -->
                        <!-- <th>Aksi</th> -->
                    </thead>

                    <tbody>
                        <?php
                        include "../../back/koneksi/koneksi.php";

                        $SqlQuery = mysqli_query($koneksi, "SELECT * FROM tb_pengaduan INNER JOIN tb_pengguna ON tb_pengaduan.id_pengguna = tb_pengguna.id_pengguna  GROUP BY tb_pengguna.nama ORDER BY tb_pengaduan.tgl_pengaduan DESC");


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
                                <!-- <td>
                                    <?php echo $row['tgl_pengaduan']; ?>
                                </td> -->
                                <td>
                                    <a class="info btn btn-outline-primary" href="pengaduanadmin.php?id_pengguna=<?php echo $row['id_pengguna'] ?>"> <?php echo $row['nama']; ?></a>

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
    

</div>
       
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?php include 'footer.php';?>