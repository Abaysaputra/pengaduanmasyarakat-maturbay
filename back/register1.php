<?php
error_reporting(0);
include "koneksi/koneksi.php";
if (isset($_POST['simpan'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $level = "User";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $Status = "Masyarakat";
    $no_hp = $_POST['no_hp'];
    
            if ($nik == "" || $nama == "" || $level == "" || $Status == ""|| $username == ""|| $password == "") {
                echo "<script>
		confirm('Input Tidak Boleh Kosong');
		location = '../registrasi.php'
		</script>";
            } else {
                $insert = mysqli_query($koneksi, "INSERT INTO tb_pengguna(nik,username,level,password,no_hp,nama,Status) VALUES('$nik','$username','$level','$password','$no_hp','$nama','$Status') ") or die(mysqli_error($koneksi));
                $data = mysqli_fetch_array($insert);

                echo $data;
                echo"<script>
		                confirm('Good! Pengguna Berhasil Ditambahkan');
		                location = '../index.php'
		                </script>";
            }
        }
?>
