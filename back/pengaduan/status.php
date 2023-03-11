<?php
// error_reporting(0);
include "../koneksi/koneksi.php";
if (isset($_POST['simpan'])) {
   
    $status = $_POST['status'];
    $id = $_POST['id'];
        
            if ($status == ""  ) {
        echo "<script>
		confirm('Status Tidak Boleh Kosong');
		location = '../../view/admin/infoadmin.php?id=$id'
		</script>";
            } else {
                $insert = mysqli_query($koneksi, "UPDATE tb_pengaduan SET status='$status' WHERE id_pengaduan='$id'") or die(mysqli_error($koneksi));
                echo "<script>
            alert('Good! Status Berhasil Dirubah');
             location = '../../view/admin/infoadmin.php?id=$id'
            </script>
            ";
            }
        }
