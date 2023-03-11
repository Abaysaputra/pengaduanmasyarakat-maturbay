<?php
// error_reporting(0);
include "koneksi/koneksi.php";
if (isset($_POST['simpan'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $level = "User";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $Status = "Masyarakat";
    $no_hp = $_POST['no_hp'];
    $tgl_lahir = $_POST['tgl_lahir'];


            if ($nik == "" || $nama == "" || $level == "" || $Status == ""|| $username == ""|| $password == ""|| $tgl_lahir == ""){
                echo "<script>
		confirm('Input Tidak Boleh Kosong');
		location = '../registrasi.php'
		</script>";
            }else if(! is_numeric($nik)){
                echo "<script>
                     alert('Nik harus nomer');
                       window.location.href = '../registrasi'
                   </script>";
            } else {
                    $ambil = mysqli_query($koneksi, "select * from tb_pengguna where nik='$nik'");
                    $ketemu = mysqli_num_rows($ambil);
                    $data = mysqli_fetch_assoc($ambil);
                if($ketemu == 1){
                    echo "<script>
                     alert('Nik tidak boleh sama');
                       window.location.href = '../index.php'
                   </script>";
                }else{
                      $insert = $koneksi->query("INSERT INTO tb_pengguna(nik,username,level,password,no_hp,tgl_lahir,nama,Status) VALUES ('$nik','$username','$level','$password','$no_hp','$tgl_lahir','$nama','$Status')") or die(mysqli_error($koneksi));
                        echo "<script>
                        alert('Good! Pengguna Berhasil Ditambahkan');
                        window.location.href = '../index.php'
                        </script>";  
                }
              
                }
            }
?>
