<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="assets/css/registrasi.css">
</head>

<body>
    <div class="bgc">
        <div class="corner1"></div>
        <div class="title">
            <h1>Silahkan Isi Data Registrasi</h1>
            <form action="back/register.php" method="post">
                <br>
                <!-- <h2>NIK</h2> -->
                <!--  oninput="if((this.value.length) > 4) { this.value = this.value.substring(0, 4); } -->
                <input type="text" oninput="if((this.value.length) > 16) { this.value = this.value.substring(0, 16); }" placeholder="NIK -max 16 digit-" name='nik' autocomplete="off"  required>
                <!-- <h2>Nama</h2> -->
                <input type="text" placeholder="Nama" name='nama' autocomplete="off" required>
                <!-- <h2>No.Handphone</h2> -->
                <input type="text" maxlength="13" placeholder="No.Handphone -max 13 digit-" name="no_hp" autocomplete="off" required>
                <!-- <h2>Username</h2> -->
                <label for="floatingInput">Tangal Lahir</label>
                <input type="date" name="tgl_lahir" placeholder="dd-mm-yyyy">

                <input type="username" placeholder="Username" name="username" autocomplete="off" required>
                <!-- <h2>Password</h2> -->
                <input type="password" placeholder="Password" id="showpw" name="password" autocomplete="off" required>
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
                <br>
                <br>
                <a href="index.php"><-Kembali</a>
                <button class="submit" onclick="return confirm('Anda Yakin Ingin Simpan?')" type="submit" name="simpan">Simpan</button>
                <button type="reset" onclick="location.href='back/registrasi.php'" class="reset">Reset</button>
            </form>
        </div>
        <div class="corner2"></div>
    </div>
</body>

</html>