<?php
ob_start();
session_start();
include '../../back/koneksi/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/balas.css">
    <title>Pengisian</title>
</head>

<body>
    <div class="bingkai">
        <div class="header">
            <h2>Halaman Respon</h2>
            <form action="../../back/pengaduan/respon.php" method="post" class="tambah" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name="id_pengaduan" value="<?php echo $_GET["id"]; ?>" />
                    <textarea class="isi" id="pengaduan" name="respon" placeholder="Isi Respon/balasan"></textarea>
                </div>
                <a href="../../view/admin/datapengaduanadmin.php">Kembali</a>
                <button onclick="return confirm('Inputan Sudah Sesuai?')" type="submit" class="simpan" name="simpan">Simpan</button>
                <button type="reset" class="reset">Reset</button>
            </form>
        </div>
    </div>
</body>

</html>
<?php


?>