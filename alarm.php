<?php

include "dbconnect.php";
include "lastsmoke.php";

$query = mysql_query("SELECT waktu, asap FROM sensor_asap ORDER BY waktu DESC LIMIT 1");
$result = mysql_fetch_array($query);

?>

<audio id="soundBeep" preload="auto">
    <source src="Sound/Alarm.mp3"></source>
    <!-- <source src="beep.ogg"></source> -->
  </audio>

  <script type="text/javascript">
    var soundBeep = $("#soundBeep")[0];
    var lastsmoke = <?php echo $lastsmoke;?>;
    $( document ).ready(function() {
        if(lastsmoke>=25){
          soundBeep.play();
        }else{
          soundBeep.pause();
        }

        setTimeout(function(){
           window.location.reload(1);
        }, 30000);
        
    });
  
  </script>

