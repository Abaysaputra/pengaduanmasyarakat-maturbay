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

                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                         <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Data Table Pengguna</h6>
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
                                    <table width="100%" id="tabel" class="table table-striped table table-bordered text-center" cellspacing="0" >
                                        <thead>
                                        <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>No.Handphone</th>
                                            <th>Level</th>
                                            <th>Status</th>
                                        </thead>

                                        <tbody align="center">
                                            <?php
                                            include "../../back/koneksi/koneksi.php"; 
                                            $SqlQuery = mysqli_query($koneksi, "SELECT * FROM tb_pengguna ");
                                            
                                                $no = 1;

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
                                                            <?php echo $row['no_hp']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['level']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['Status']; ?>
                                                        </td>
                                                    <?php
                                                }
                                                    ?>
                                        </tbody>

                                    </table>
                                </div>
    </div>
    <script src="../../assets/js/jquery-3.6.0.js"></script>
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