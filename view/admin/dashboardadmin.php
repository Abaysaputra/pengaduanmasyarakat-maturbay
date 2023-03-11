<?php
include '../../back/koneksi/koneksi.php';
session_start();

if (!isset($_SESSION['username'])) {
?>
    <script language="JavaScript">
        alert('Anda Harus Login  Terlebih Dahulu!!');
        document.location = '../../index.php';
    </script>
<?php
}
if ($_SESSION['level'] == "User") {
?>
    <script language="JavaScript">
        alert('Anda Tidak Mempunyai Akses Dihalaman Ini!!');
        document.location = '../admin/dashboarduser.php';
    </script>
<?php
};
$sql = "SELECT * From tb_pengaduan";
$sql2 = "SELECT * FROM tb_pengguna";
$sql3 = "SELECT * FROM tb_pengaduan";
$result = mysqli_query($koneksi, $sql);
$result2 = mysqli_query($koneksi, $sql2);
$result3 = mysqli_query($koneksi, $sql3);
$rowDataPengaduan = mysqli_num_rows($result);
$rowDataPengguna = mysqli_num_rows($result2);
$rowDataRespon = mysqli_num_rows($result3);

include 'header.php';
?>

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Data Pengaduan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $rowDataPengaduan ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Data Pengguna</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $rowDataPengguna ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Persebaran</h6>
                                
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area" style="min-height:45vh;">
                                    <div style="width: 345px;margin: 0px auto; ">
                                        <canvas id="myChart"></canvas>
                                    </div>
                                    <script>
                                		var ctx = document.getElementById("myChart").getContext('2d');
                                		var myChart = new Chart(ctx, {
                                			type: 'pie',
                                			data: {
                                				labels: ["Diterima","Diproses","Selesai"],
                                				datasets: [{
                                					label: '',
                                					data: [
                                                    <?php 
                                					 $sql = "SELECT * From tb_pengaduan where status = 'Diterima'";
                                                     $result = mysqli_query($koneksi, $sql);                    
                                                     $rowDataPengaduan = mysqli_num_rows($result);
                                                     
                                                         echo  $rowDataPengaduan ;
                                                      
                                					?>, 
                                					<?php 
                                					 $sql1 = "SELECT * From tb_pengaduan where status = 'Diproses'";
                                                     $result1 = mysqli_query($koneksi, $sql1);                    
                                                     $rowDataPengaduan1 = mysqli_num_rows($result1);
                                                     
                                                         echo  $rowDataPengaduan1 ;
                                                      
                                					?>, 
                                					<?php 
                                					 $sql2 = "SELECT * From tb_pengaduan where status = 'Selesai'";
                                                     $result2= mysqli_query($koneksi, $sql2);                    
                                                     $rowDataPengaduan2 = mysqli_num_rows($result2);
                                                     
                                                         echo  $rowDataPengaduan2 ;
                                                      
                                					?>
                                					
                                					],
                                					backgroundColor: [
                                					'rgba(255, 99, 132, 1)',
                                					'rgba(54, 162, 235, 1)',
                                					'rgba(255, 206, 86, 1)'
                                					],
                                					borderColor: [
                                					'rgba(255,99,132,1)',
                                					'rgba(54, 162, 235, 1)',
                                					'rgba(255, 206, 86, 1)'
                                					],
                                					borderWidth: 1
                                				}]
                                			},
                                			options: {
                                				scales: {
                                					yAxes: [{
                                						ticks: {
                                							beginAtZero:true
                                						}
                                					}]
                                				}
                                			}
                                		});
                                	</script>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Prosedur Pengajuan Aduan</h6>
                                </div>
                                 <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 20rem;"
                                            src="../../assets/img/5127314.jpg" alt="img">
                                    </div>
                                    <p>
                                        <ul class="list-group list-group-flush">
                                              <li class="list-group-item">Masyarkat Registrasi</li>
                                              <li class="list-group-item">Memilih menu data pengaduan</li>
                                              <li class="list-group-item">Ajukan Pengaduan</li>
                                              <li class="list-group-item">Tulis Pengaduan</li>
                                              <li class="list-group-item">Respon</li>
                                        </ul>
                                    </p>
                                  <!--   <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                                        unDraw &rarr;</a> -->
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Pengenalan</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 20rem;"
                                            src="../../assets/img/bgm.jpg" alt="img">
                                    </div>
                                    <p>Temukan pengalaman mengutarakan pendapat dengan bebas.
                                        Ayoo
                                            
                                            Ajukan Pengaduan dengan bebas di Matur Bay</p>
                                </div>
                            </div>

                            

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php include 'footer.php';?>