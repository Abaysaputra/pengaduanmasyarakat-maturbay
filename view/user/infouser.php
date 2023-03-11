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
if ($_SESSION['level'] == "Admin") {
?>
    <script language="JavaScript">
        alert('Anda Tidak Mempunyai Akses Dihalaman Ini!!');
        document.location = '../admin/dashboardadmin.php';
    </script>
<?php
};
$id = $_GET['id'];
$sql = mysqli_query($koneksi, "Select * from tb_pengaduan inner join tb_pengguna on tb_pengaduan.id_pengguna = tb_pengguna.id_pengguna where id_pengaduan = $id");
$row = mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
    <link rel="stylesheet" href="../../assets/css/infouser.css">
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"> -->

</head>

<body>
<h3 class="card-title text-center mt-3">Detail Pengaduan</h3>
        <!-- <div class="corner1"></div> -->
        <div class="card m-auto mt-1" style="width: 50rem; height: 85vh;" >
            <div class="card-body d-flex shadow-lg">

                <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                <div class="text w-50">
                    <table action="" class="table table-sm">
                        <label for="">NIK :</label><br>
                        <input type="text" class="ms-3" placeholder="<?php echo $row['nik']; ?>" style="width:60%; height:33px">
                        <br><br>
                        <label for="">Nama :</label><br>
                        <input type="text" class="ms-3" placeholder="<?php echo $rw['nama']; ?>" style="width:60%; height:33px">
                        <br><br>
                        <!-- <label for="">Tgl Pengaduan:</label><br>
                        <input type="text" class="ms-3" placeholder="<?php echo $row['nama']; ?>" style="width:40%; height:33px"> -->
                        <br><br>
                        <label for="">Pengaduan :</label><br>
                        <textarea class="isi" readonly><?php echo $row['pengaduan']; ?></textarea>
                        <a class="back" href="../user/datapengaduanuser.php?id_pengguna=<?php echo $row['id_pengguna'] ?>"><-Kembali</a>
                    </table>
                </div>
                <div class="grid text-center" style="">
                    <label for="">Gambar: </label><br>
                    <a data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <img style="width: 90px;height: 140px; cursor:pointer; " src="../../assets/img/<?php echo $row['gambar']; ?>" /><p class="fs-6 small ms-5 disabled">Click pada gambar untuk memperbesar</p>
                    </a>
                <br>
                
                <!-- button -->
                    

                </div>
                <div class="d-flex mt-auto">
                <a href="respon.php?id_pengaduan=<?php echo $id ?>"><button type="button" class="btn btn-outline-danger">Respon</button></a>
</div>
        <!-- <div class="corner2"></div> -->
    </div>
<!-- Modal -->
<div class="modal fade modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Image</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <img style="width:80%; height:60vh;" src="../../assets/img/<?php echo $row['gambar']; ?>" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> 
<script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> -->
        <!-- <div class="corner2"></div> -->
    </div>
</body>

</html>