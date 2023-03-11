<?php
ob_start();
session_start();
include "back/koneksi/koneksi.php"
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login Pengaduan Masyarakat</title>
    <link rel="stylesheet" type="text/css" href="asset/index.css">
</head>

<body style="background-image:url(BG.png)">
    <div class="bingkai">
        <h1>Silahkan Masuk</h1>
        <form class="login" action="" method="POST">
            <input class="username" autocomplete="off" type="text" name="username" class="" placeholder="Username" required>
            <input class="password" type="password" placeholder="Password" id="showpw" name="password" required>
            <br><br>
            <input type="checkbox" onclick="myFunction()">Tampilkan Password</input>

            <script>
                function myFunction(){
                    let x = documment.getElementById("showpw");
                    if (x.type == "password"){
                        x.type === "text";
                    }else{
                        x.type === "password";
                    }
                }
            </script>
            <button class="masuk" type="submit" name="masuk">Masuk</button>
        </form>
    </div>
</body>

</html>
<?php
if (isset($_POST['masuk'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $ambil = mysqli_query($koneksi, "select * from user where username='$username' and password='$password'");
    $ketemu = mysqli_num_rows($ambil);
    $data = mysqli_fetch_assoc($ambil);
    $tgl = strtotime($data['tgl_lahir']);
    $batasTgl = strtotime("2004-01-01");
    var_dump($tgl); 
//     if ($ketemu > 0 ) {
//         if ($data['level'] == "Admin") {
//             $_SESSION['username'] = $username;
//             $_SESSION['level'] = "admin";
//             $_SESSION['nama'] = $data['nama'];
//             $_SESSION['id_user'] = $data['id_user'];
//             // alihkan ke halaman dashboard admin
//             header("location:view/dashboardadmin.php");
//         } else if ($data['level'] == "User") {
//             $_SESSION['username'] = $username;
//             $_SESSION['level'] = "User";
//             $_SESSION['nama'] = $data['nama'];
//             $_SESSION['id_user'] = $data['id_user'];
//             header("location:dashboard.php");
//         }
//     }
// ?>
//     <script type="text/javascript">
//         alert("Username dan Password Anda Salah");
//     </script>
// <?php
}
?>