<?php
include '../../back/koneksi/koneksi.php';
session_start();
if (!isset($_SESSION['username'])) {
?>
    <script language="JavaScript">
        alert('Anda Harus Login  Terlebih Dahulu!!');
        document.location = '../index.php';
    </script>
<?php
}
if ($_SESSION['level'] == "Admin") {
?>
    <script language="JavaScript">
        alert('Anda Tidak Mempunyai Akses Dihalaman Ini!!');
        document.location = '../admin/dashboardadmin.php';
    </script>
<?php
};
include 'header.php';
$id_pengguna = $_SESSION['id_pengguna'];
?>

                        <div class="topbar-divider d-none d-sm-block"></div>
                        <?php
        include "../../back/koneksi/koneksi.php";
        //kondisi jika parameter pencarian kosong
  
            $SqlQuery = mysqli_query($koneksi, "SELECT * FROM tb_pengguna where tb_pengguna.id_pengguna =$id_pengguna");
       

        foreach ($SqlQuery as $row ) {
        ?>
                       
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Admin</h6>
                                </div>
                                <!-- Card Body -->
                 

            <div class="content">





<div>
    <div class="jumbotron d-flex">
        <div class="content w-auto rounded-1 p-5 min-vh-50">
            <img src="../../assets/img/Admin.png" alt="image" width="150px">
            <br><br><br><br>
            <!-- <div class="log d-flex mt-5">
                <img src="../../assets/img/matur2.png" alt="image" class="logo" width="40px">
                <p class="">Matur Bay</p>
            </div> -->
        </div>
        <div class="text p-4">
        </div>
<form>
  <fieldset disabled>
    <legend>Profil Kamu</legend>
    <div class="mb-3">
        <label for="disabledTextInput" class="form-label text-dark fw-bold fs-2" >NIK</label>
        <input type="text" id="disabledTextInput" class="form-control" placeholder="<?php echo $row['nik']; ?>">
        <label for="disabledTextInput" class="form-label text-dark fw-bold fs-2" >Nama</label>
        <input type="text" id="disabledTextInput" class="form-control" placeholder=" <?php echo $row['nama']; ?>">
        <label for="disabledTextInput" class="form-label text-dark fw-bold fs-2" >Nomer Hp</label>
        <input type="text" id="disabledTextInput" class="form-control" placeholder="<?php echo $row['no_hp']; ?>">
        <label for="disabledTextInput" class="form-label text-dark fw-bold fs-2" >Level</label>
        <input type="text" id="disabledTextInput" class="form-control" placeholder="<?php echo $row['level']; ?>">
        <label for="disabledTextInput" class="form-label text-dark fw-bold fs-2" >Status</label>
        <input type="text" id="disabledTextInput" class="form-control" placeholder="<?php echo $row['Status']; ?>">
    </div>
  </fieldset>
</form>
            
        
    </div>
    <br>
</div>
<!-- <div class="corner2"></div> -->


<?php
        }
            ?>
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
<?php include 'footer.php'; ?>