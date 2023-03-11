<?php
error_reporting(0);
include "../koneksi/koneksi.php";
if (isset($_POST['simpan'])) {
    $id_pengaduan = $_POST['id_pengaduan'];
    $respon = $_POST['respon'];
        
            if ($id_pengaduan == "" || $respon == "") {
        echo "<script>
		confirm('Input Tidak Boleh Kosong');
		location = '../../view/admin/balas.php';
		</script>";
            } else {
                $insert = mysqli_query($koneksi, "UPDATE tb_pengaduan SET respon='$respon' WHERE id_pengaduan = '$id_pengaduan' ") or die(mysqli_error($koneksi));
                echo "<script>
            alert('Good! Respon Berhasil Ditambahkan');
            location = '../../view/admin/responadmin.php'
            </script>
            ";
            }
        }
