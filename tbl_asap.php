<?php

//koneksi ke database
include "dbconnect.php";
include "alarm.php";

    //query untuk mendapatkan value asap terakhir
    $query = mysql_query("SELECT waktu, asap FROM sensor_asap ORDER BY waktu DESC LIMIT 1");
    $result = mysql_fetch_array($query);

    //memindahkan data yang sudah diambil dari database ke variable lain
   
?>

<!DOCTYPE html>
<html>
<head>
	<title>Data Asap</title>

	<!-- Bootstrap Core CSS -->
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="css/font-awesome.css" rel="stylesheet">
	<link href="datatables/media/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">

<!-- jQuery -->

	<style type="text/css">
	    .navbar-inverse {
	        background-color: #34495e !important;
	    }

	    .navbar-nav > li > a {
	        font-size: 16px;
	        padding: 15px 21px;
	        line-height: 23px;
	        font-weight: 700;
	    }
	</style>


</head>

<body>
		<table id="table_id" class="display table table-striped table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Waktu</th>
					<th>Asap rata-rata (ppm)</th>
					<th>Asap tertinggi (ppm)</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$result = mysql_query("SELECT *, avg(asap) as avg_asap, max(asap) as max_asap, ROUND(UNIX_TIMESTAMP(waktu)/(15 * 60)) AS timekey FROM sensor_asap GROUP BY timekey DESC ORDER BY waktu DESC");

				$no = 1;
				while ($row = mysql_fetch_array($result)) { ?>
					
				
					<tr>
						<td><?php echo $no++; ?></td>
						<td>
							<?php if($row['max_asap']>=25){ ?>
								<a href="gambar.php?time=<?php echo $row['waktu'];?>"><?php echo $row['waktu']; ?></a>
							<?php }else{ ?>
								<?php echo $row['waktu'];?>
							<?php } ?>
						</td>
						<td>
							<?php 
								$lastsmoke = $row['asap'];

								if($lastsmoke > 30){
									echo "<font color='#ff0000'>". $row['asap']."</font> ppm";
								}elseif ($lastsmoke >= 25) {
								  echo "<font color='black'>". $row['asap'] ."</font> ppm";
							}
								else {
								  echo "<font color='green'>". $row['asap'] ."</font> ppm";
								}
?>
						</td>
						<td>
							<?php 
									$maxsmoke = $row['max_asap'];

									if($maxsmoke > 30){
										echo "<font color='#ff0000'>". $row['max_asap']."</font> ppm";
									}elseif ($maxsmoke >= 25) {
									  echo "<font color='black'>". $row['max_asap'] ."</font> ppm";
								}
									else {
									  echo "<font color='green'>". $row['max_asap'] ."</font> ppm";
									}
							?>
							<!-- <?php echo $row['max_asap'];?> ppm -->
						</td>
					</tr>

				<?php } ?>
			</tbody>
		</table>

		
 	<!-- <audio id="soundBeep" preload="auto">
        <source src="Sound/Beep.mp3"></source>
        <source src="beep.ogg"></source>
    </audio> -->

    

<!-- Bootstrap Core JavaScript -->
<script src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf8" src="datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="datatables/media/js/dataTables.bootstrap.min.js"></script>
<?php include "alarm.php"; include "lastsmoke.php";?>
<!-- <script type="text/javascript">
        var soundBeep = $("#soundBeep")[0];
        var lastsmoke = <?php echo $lastsmoke;?>;
        $( document ).ready(function() {
            if(lastsmoke>30){
              soundBeep.play();
            }else{
              soundBeep.pause();
            }

            setTimeout(function(){
               window.location.reload(1);
            }, 60000);
            
        });
     </script> -->

<script type="text/javascript">
	$(document).ready( function () {
   	 $('#table_id').DataTable();
} );
</script>


</body>
</html>