<!DOCTYPE html>
<html>
<head>
	<title>HASIL PEROLEHAN SUARA PEMILIHAN KETUA OSIS</title>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<!-- <meta http-equiv="refresh" content="5" /> -->
</head>
<body>
	<style type="text/css">
	body{
		font-family: "Roboto", sans-serif;
	}
	</style>


	<center>
		<h2>HASIL PEROLEHAN SUARA PEMILIHAN KETUA OSIS</h2>
	</center>
	<hr>
	
	<?php 
	include "../../back/koneksi/koneksi.php";
	?>

	<div style="width: 400px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>

	<br>
	<br>


	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'polarArea',
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
</body>
</html>