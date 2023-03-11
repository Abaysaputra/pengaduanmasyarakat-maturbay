<head>
    <link rel="stylesheet" href="../../assets/css/respon.css">

</head>

<body>
    <div class="container">

        <div class="messaging">
            <div class="inbox_msg">
                <div class="">
                    <div class="">
                        <?php
                        error_reporting(0);
                        // $id_petugas = $_SESSION['data']['id_petugas'];
                        session_start();
                        $id = $_SESSION['id_pengguna'];
                        $level = $_SESSION['level'];
                        include "../../back/koneksi/koneksi.php";
                        $id_pengaduan = $_GET['id_pengaduan'];
                        $sql = "select tb_respon.respon,tb_pengaduan.id_pengguna,tb_respon.date,tb_respon.nik from tb_respon inner join tb_pengaduan on tb_pengaduan.id_pengaduan=tb_respon.id_pengaduan  where tb_respon.id_pengaduan = '$id_pengaduan'   ";
                        $exe = mysqli_query($koneksi, $sql);
                        foreach ($exe as $r) {

                            $respon = $r['respon'];
                            $id_pengguna = $r['id_pengguna'];
                            $nik = $r['nik'];
                            $date = $r['date'];

                            //nama masyarakat

                            $sqlmasyarakat = "select * from tb_respon inner join tb_pengguna on tb_pengguna.nik = tb_respon.nik where tb_respon.nik = '$nik'  ";
                            $exemasyarakat = mysqli_query($koneksi, $sqlmasyarakat);
                            $m = mysqli_fetch_array($exemasyarakat);
                            $nama_masyarakat = $m['nama'];

                            // nama peugas    
                            $sqlpetugas = "select * from tb_respon inner join tb_pengguna on tb_pengguna.id_pengguna = tb_respon.id_pengguna where tb_respon.id_pengguna = '$id'";
                            $exepetugas = mysqli_query($koneksi, $sqlpetugas);
                            $p = mysqli_fetch_array($exepetugas);
                            $nama_petugas = $p['nama'];



                            if ($nik != "") {
                                echo '<div class="incoming_msg">
                            <div class="received_msg">
                                <div class="received_withd_msg">
                                <h3 class="h3">' . $nama_masyarakat . '</h3>
                                    <p>' . $respon . '</p>
                                    <span class="time_date">' . $date . '</span>
                                </div>
                            </div>
                        </div>';
                            } 
                            else {
                                echo '<div class="outgoing_msg">
                            <div class="sent_msg">
                             <h3 class="h3">' . $nama_petugas . '</h3>
                                 <p>' . $respon . '</p>
                                <span class="time_date">' . $date . '</span>
                            </div>
                        </div>';
                            }
                        }
                        ?>
                    </div>

                </div>
            </div>

        </div>

        <button class="open-button" onclick="openForm()">Chat</button>

        <div class="chat-popup" id="myForm">

            <form action="" method="POST" class=" form-container">
                <h1>Chat</h1>

                <!-- <label for="msg"><b>Message</b></label> -->
                <textarea placeholder="Ketik pesan..." name="respon" id="rsp" required></textarea>
                <input type="hidden" name="id_pengguna" value="<?php echo $id ?>">
                <input type="hidden" name="id_pengaduan" value="<?php echo $id_pengaduan ?>">


                <button type="submit" class="btn" name="simpan">Kirim</button>
                <button type="button" class="btn cancel" onclick="closeForm()">Tutup</button>
                <a class="kembali" href="infoadmin.php?id=<?php echo $id_pengaduan; ?>">Kembali</a>
            </form>
        </div>

        <script>
            function openForm() {
                document.getElementById("myForm").style.display = "block";
                document.getElementById("rsp").value = "";

            }

            function closeForm() {
                document.getElementById("myForm").style.display = "none";
            }
        </script>
        <?php

        if (isset($_POST['simpan'])) {
            $respon = $_POST['respon'];
            $id = $_POST['id_pengguna'];
            $id_pengaduan = $_POST['id_pengaduan'];
            $date = date("Y-m-d H:i:s");
            // echo $id;
            $sql = "insert into tb_respon (respon,id_pengaduan,id_pengguna,date) VALUES ('$respon','$id_pengaduan','$id','$date')";
            $exe = mysqli_query($koneksi, $sql);
        ?>
            <script>
                history.go(-1)
            </script>

        <?php }; ?>
        <script>
            window.onload =
                loadPage = () => {
                    setTimeout(() => {
                        console.log("ok")
                        document.getElementById("rsp").value = "";
                    }, 1000);
                }
        </script>
</body>