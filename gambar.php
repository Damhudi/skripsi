<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Galeri Kejadian</title>
    <link rel="icon" type="image" href="images/iot-ico.ico">

    <!-- Bootstrap Core CSS -->
    <link href="css/flat-ui.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="datatables/media/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link rel="stylesheet" href="gallery-grid.css">

    <!-- Custom CSS -->
    <link href="css/logo-nav.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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

<?php

//koneksi ke database
include "dbconnect.php";
include "lastsmoke.php";
include "alarm.php";

    //query untuk mendapatkan value asap terakhir
    $query = mysql_query("SELECT waktu, asap FROM sensor_asap ORDER BY waktu DESC LIMIT 1");
    $result = mysql_fetch_array($query);

    //memindahkan data yang sudah diambil dari database ke variable lain

    //mengubah format waktu dan tanggal
    $datetime = strtotime($result['waktu']);
    $lasttime = date('H:i',$datetime);
    $lastdate = date('d/M/Y',$datetime);

    

?>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                    <img src="images/iot-icon.png" width="50px" height="50px" alt="">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
        
            <div class="collapse navbar-collapse tengah" id="bs-example-navbar-collapse-1">
       
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.php"><i class="fa fa-home"></i> Home</a>
                    </li>
                    <li>
                        <a href="m_asap.php"><i class="fa fa-cloud"></i> Smoke</a>
                    </li>
                    <li>
                        <a href="m_gambar.php"><i class="fa fa-clone"></i> Gallery</a>
                    </li>
                    <li>
                        <a href="m_tabel.php"><i class="fa fa-bars"></i> Data Tabel</a>
                    </li>
                </ul>
                </div>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav> 
<div class="tab-content col-md-12" style="padding-right:0;">
    <div class="container">
    <h1 class="text-center">Gambar 5 Jam Sebelum Kejadian</h1>
    <br>
        <div class="row">

            
          <tbody>
            <?php 

                if(!isset($_GET['time'])){
                    header("location:m_tabel.php");
                }

                $time = $_GET['time'];
                $hour9 = strtotime($time);
                $hour9 = $hour9 - (5*60*60);
                $hour9 = date('Y-m-d H:i:s',$hour9);
                // echo $hour9;

                $connect = mysqli_connect('localhost','root','','dbasap');

                // $query = "SELECT * FROM gambar WHERE waktu >= '$hour9' AND waktu <= '$time'";
                $query = "SELECT * FROM gambar WHERE waktu BETWEEN '$hour9' AND '$time' ORDER BY waktu DESC";
                // echo $query;
                $sql = mysqli_query($connect,$query);

                while ($data = mysqli_fetch_array($sql,MYSQLI_ASSOC)) { 


            ?>

                <div class="col-sm-3">
                    <img class="img img-thumbnail" src="<?php echo $data['file'];?>">
                    <center><h5><?php echo date('d-m-Y H:i', strtotime($data['waktu']));?></h5></center>
                </div>

            <?php } ?>
            </tbody> 

    <!-- Bootstrap Core JavaScript -->
    <script src="js/flat-ui.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/highcharts.js"></script>
    <script src="js/exporting.js"></script>
    <script src="js/jquery.js"></script>
    <script type="text/javascript" charset="utf8" src="datatables/media/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="datatables/media/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready( function () {
          $('#table_id').DataTable();
    } );
    </script>

    

</body>

</html>
