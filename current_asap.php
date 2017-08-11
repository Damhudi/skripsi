<?php

//koneksi ke database
include "dbconnect.php";
include "alarm.php";
include "lastsmoke.php";

//query untuk mendapatkan value asap terakhir
$query = mysql_query("SELECT waktu, asap FROM sensor_asap ORDER BY waktu DESC LIMIT 1");
$result = mysql_fetch_array($query);

//memindahkan data yang sudah diambil dari database ke variable lain
//$lastsmoke = $result['asap'];      //nilai asap asli dalam satuan celsius

//mengubah format waktu dan tanggal
$datetime = strtotime($result['waktu']);
$lasttime = date('H:i',$datetime);
$lastdate = date('d/M/Y',$datetime);

//if($lastsmoke > 30){
  //$tanda = "Kemungkinan Terjadi Kebakaran";
//}
//elseif ($lastsmoke >= 25) {
  //$tanda = "Ada Yang Merokok";
//}
//else {
  //$tanda = "Aman";
//}

?>

 <div class="row">
      <div>
        <center>
          <h2>Pengukur Asap LAB 209</h2>
          <p style='font-size:4em'><?php echo $lastsmoke; ?> ppm</p>
          <p style='font-size:4em'><?php echo $tanda; ?></p>
          
          <h4 class="info">Update Terakhir : <?php echo $lastdate ." - " . $lasttime . " WIB"; ?></h4>
          
          <br/>
          <hr>

        </center>
      </div>

  </div>

  <!-- <audio id="soundBeep" preload="auto">
    <source src="Sound/Beep.mp3"></source>
    <source src="beep.ogg"></source>
  </audio>

  <script type="text/javascript">
    var soundBeep = $("#soundBeep")[0];
    var lastsmoke = <?php echo $lastsmoke;?>;
    $( document ).ready(function() {
        if(lastsmoke>=30){
          soundBeep.play();
        }else{
          soundBeep.pause();
        }

        setTimeout(function(){
           window.location.reload(1);
        }, 60000);
        
    });
  
  </script> -->

<?php

mysql_close($con);

?>
