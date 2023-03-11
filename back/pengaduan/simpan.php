<?php
error_reporting(0);
include "../koneksi/koneksi.php";
if (isset($_POST['simpan'])) {
    $id_pengguna = $_POST['id_pengguna'];
    $pengaduan = $_POST['pengaduan'];
    $status = "Diterima";
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
            if($id_pengguna == "" || $pengaduan == "" || $tgl_pengaduan == "" || $nama_file == ""){
        echo "<script>
		confirm('Input Tidak Boleh Kosong');
		location = 'pengisian.php'
		</script>";
            }else{
            $insert = mysqli_query($koneksi, "INSERT INTO tb_pengaduan(id_pengguna,pengaduan,tgl_pengaduan,gambar,status) VALUES('$id_pengguna','$pengaduan','$tgl_pengaduan','$nama_file','$status') ") or die(mysqli_error($koneksi));
            echo "<script>
            alert('Good! Data Pengaduan Berhasil Ditambahkan');
            location = '../../view/user/datapengaduanuser.php'
            </script>
            ";
            }

        }
    }
}
?>