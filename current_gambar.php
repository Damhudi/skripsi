<?php

//koneksi ke database
include "dbconnect.php";

//query untuk mendapatkan value temperatur terakhir
$query = mysql_query("SELECT waktu, nama FROM gambar ORDER BY waktu DESC LIMIT 1");
$result = mysql_fetch_array($query);

//memindahkan data yang sudah diambil dari database ke variable lain
$lastlemb = $result['nama'];      //nilai temperatur asli dalam satuan celsius

//mengubah format waktu dan tanggal
$datetime = strtotime($result['waktu']);
$lasttime = date('H:i',$datetime);
$lastdate = date('d/M/Y',$datetime);

?>

 <div class="row">
      <div>
        <center>
          <h2>Gambar</h2>
          <p style='font-size:6em'><?php echo $lastlemb; ?> Cd</p>
          
          <h4 class="info">Update Terakhir : <?php echo $lastdate ." - " . $lasttime . " WIB"; ?></h4>
          
          <br/>
          <hr>

        </center>
      </div>

  </div>

<?php

mysql_close($con);

?>
