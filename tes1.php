<?php
ob_start();
session_start();
include 'back/koneksi/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content=Login Page, initial-scale=1.0>
    <title>Login Page</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="shortcut icon" href="assets/img/matur2.png" type="image/png">
</head>

<body>
    <div class="bg">
        <div class="corner1"></div>
        <div class="box-login">
            <h1>Login Disini</h1>
            <form action="" method="POST">
                <input type="text" name="username" placeholder="Username" autocomplete="off"><br>
                <input type="password" name="password" id="showpw" placeholder="Password" autocomplete="off">
                <input type="checkbox" onclick="myFunction()">Tampilkan Password<br>
                <script>
                    function myFunction() {
                        let x = document.getElementById("showpw");
                        if (x.type === "password") {
                            x.type = "text";
                        } else {
                            x.type = "password";
                        }
                    }
                </script>
                <input class="submit" type="submit" name="login" value="Login">
                <a href="registrasi.php">
                    Registrasi</a>
            </form>
        </div>
        <!-- <div class="corner2"></div> -->
    </div>
</body>

</html>

<?php
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $ambil = mysqli_query($koneksi, "select * from tb_pengguna where username='$username' and password='$password'");
    $ketemu = mysqli_num_rows($ambil);
    $data = mysqli_fetch_assoc($ambil);
    $tgl = strtotime($data['tgl_lahir']);
    $batasTgl = strtotime('-17 years');
    if ($ketemu > 0 && $tgl < $batasTgl) {
        if ($data['level'] == "Admin") {
            // buat session login dan username
            $_SESSION['username'] = $username;
            $_SESSION['level'] = "admin";
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['nik'] = $data['nik'];
            $_SESSION['id_pengguna'] = $data['id_pengguna'];
            // alihkan ke halaman dashboard admin
            header("location:view/admin/dashboardadmin.php");
        } else if ($data['level'] == "User") {
            // buat session login dan username
            $_SESSION['username'] = $username;
            $_SESSION['level'] = "User";
            $_SESSION['nik'] = $data['nik'];
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['id_pengguna'] = $data['id_pengguna'];

            header("location:view/user/dashboarduser.php");
        }
    } else if ($tgl > $batasTgl) {
        ?>
    <script type="text/javascript">
        alert("Umur tidak cukup");
    </script>
        <?php
    } else {
?>
    <script type="text/javascript">
        alert("Username dan Password Anda Salah");
    </script>
<?php
    }
}
?>

<!-- back/registrasi -->

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
        // Validasi Numeric
            // }else if(! is_numeric($nik)){
            //     echo "<script>
            //          alert('Nik harus nomer');
            //            window.location.href = '../registrasi.php'
            //        </script>";
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
