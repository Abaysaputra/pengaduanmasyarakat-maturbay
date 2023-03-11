<?php

include "../koneksi/koneksi.php";

    $id_pengaduan = $_GET['id'];

    echo $id_pengaduan;
    // if ($id_pengaduan == "" ) {
    //     echo "<script>
	// 	confirm('Input Tidak Boleh Kosong');
	// 	location = '../../view/admin/balas.php';
	// 	</script>";
    // } else {
    //     $insert = mysqli_query($koneksi, "UPDATE tb_pengaduan SET respon WHERE id_pengaduan = '$id_pengaduan' ") ;
    //     echo "<script>
    //         alert('Good! Respon Berhasil Dihapus');
    //         location = '../../view/admin/responadmin.php'
    //         </script>
    //         ";
    // }

