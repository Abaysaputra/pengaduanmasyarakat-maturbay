<?php
include "../koneksi/koneksi.php";
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
        document.location = '../../index.php';
    </script>
<?php
};
$id = $_GET['id'];
$ambilData = mysqli_query($koneksi, "SELECT * FROM tb_pengaduan WHERE id_pengaduan='$id'");
$data = mysqli_fetch_array($ambilData);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/pengisian.css">
    <title>Pengisian</title>
</head>

<body>
    <div class="bingkai">
        <div class="header">
            <h2>Isi Data Pengaduan</h2>
            <form action="" method="post" class="tambah" enctype="multipart/form-data">
                <div class="form-group">
                    <textarea class="isi" id="pengaduan" name="pengaduan" placeholder="<?php echo $data['pengaduan']; ?>"><?php echo htmlspecialchars($data['pengaduan']); ?></textarea>
                    <input type="file" class="img" name="gambar" id="img" placeholder="Pilih Gambar"></input>
                    <!-- <img style="width: 90px;height: 140px; cursor:pointer; " src="../../assets/img/<?php echo $row['gambar']; ?>" /> -->

                </div>
                <a href="../../view/user/datapengaduanuser.php">Kembali</a>
                <button onclick="return confirm('Inputan Sudah Sesuai?')" type="submit" class="simpan" name="simpan">Simpan</button>
                <button type="reset" class="reset">Reset</button>
            </form>
        </div>
    </div>
</body>

</html>
<?php

if (isset($_POST['simpan'])) {
    $pengaduan = $_POST['pengaduan'];
    $tgl_pengaduan = date("Y-m-d");
    $nama_file = $_FILES["gambar"]["name"];
    $ukuran_gambar = $_FILES['gambar']['size'];
    $source = $_FILES["gambar"]["tmp_name"];
    $folder = '../../assets/img/';
    $fileinfo = @getimagesize($_FILES["gambar"]["tmp_name"]);
    //lebar gambar
    $width = $fileinfo[0];
    //tinggi gambar
    $height = $fileinfo[1];
    if ($ukuran_gambar > 80000000) {
?>
        <script language="JavaScript">
            alert('Oops! Ukuran File 80Kb ...');
            document.location = 'tambah.php';
        </script>
    <?php
    } else if ($width > "100000" || $height > "100000") {
    ?>

<?php
    } else {
        if (move_uploaded_file($source, $folder . $nama_file)); {
            if ($pengaduan == "" || $tgl_pengaduan == "" || $nama_file == "") {
                echo "<script>
		confirm('Input Tidak Boleh Kosong');
		location = 'pengisian.php'
		</script>";
            } else {
                $insert = mysqli_query($koneksi, "UPDATE tb_pengaduan SET pengaduan='$pengaduan',tgl_pengaduan='$tgl_pengaduan',gambar='$nama_file' WHERE id_pengaduan='$id'") or die(mysqli_error($koneksi));
                echo "<script>
            alert('Good! Data Pengaduan Berhasil Diedit');
            location = '../../view/user/datapengaduanuser.php'
            </script>
            ";
            }
        }
    }
}
?>
<!-- 
$ambil = mysqli_query($koneksi, "UPDATE tb_pengaduan
SET kode_obat='$kode_obat',nama_obat='$nama_obat',produsen='$produsen',harga='$harga', stok='$stok', jenis_obat='$jenis_obat'
WHERE id='$id'") or die(mysqli_error($koneksi)); -->