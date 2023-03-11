<?php
ob_start();
session_start();
include '../koneksi/koneksi.php';
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
            <form action="simpan.php" method="post" class="tambah" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name = "id_pengguna" value="<?php echo $_SESSION['id_pengguna'] ?>">
                    <textarea class="isi" id="pengaduan" name="pengaduan" placeholder="Isi Pengaduan Disini"></textarea>
                    <input type="file" class="img" name="gambar" id="img" placeholder="Pilih Gambar"></input>
                    <span><small>Upload Gambar</small></span>
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


?>