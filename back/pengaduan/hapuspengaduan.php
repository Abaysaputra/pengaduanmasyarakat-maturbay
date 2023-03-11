<?php
include "../koneksi/koneksi.php";
$id = $_GET['id'];
$sql = "DELETE FROM tb_pengaduan where id_pengaduan='$id'";
$execute = mysqli_query($koneksi, $sql);
?>
<script type="text/javascript">
    alert('Good! Menghapus Data pengaduan Berhasil');
    window.location = history.go(-1);
</script>