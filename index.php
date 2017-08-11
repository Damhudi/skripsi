<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>
    <link rel="icon" type="image" href="images/iot-ico.ico">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
     <link href="css/flat-ui.css" rel="stylesheet"> 
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="datatables/media/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/logo-nav.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- <style type="text/css" media="screen">
        .content-section-a {
            background-color: #f8f8f8;
            font-family: 'Roboto', sans-serif;
        }

        .content-section-b {
            border-top: 1px solid #e7e7e7;
            border-bottom: 1px solid #e7e7e7;
            font-family: 'Roboto', sans-serif;
        } 


    </style> -->

    <style type="text/css">
        .navbar-inverse {
            background-color: #34495e !important;
        }

        .navbar-nav > li > a,.navbar-inverse .navbar-nav>li>a {
            font-size: 16px !important;
            padding: 15px 21px !important;
            line-height: 23px !important;
            font-weight: 700 !important;
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
     //nilai asap asli dalam satuan celsius

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

    <!-- 
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

            <table class="table table-depan"><br><br><br>
                <tr align="center">
                    <div class="zoom">
                    <td><div class="zoom"><a href="m_asap.php"><img src="images/asap.png" width="250px" height="250px"></a></div></td>
                    <td><div class="zoom"><a href="m_gambar.php"><img src="images/gambar.png" width="250x" height="250x"></a></div></td>
                    <td><div class="zoom"><a href="m_tabel.php"><img src="images/cct.png" width="250x" height="250x"></a></div></td>
                    </div>
                </tr>
                <tr align="center">
                    <td><h3>Monitoring Asap</h3></td>
                    <td><h3>Monitoring Gambar</h3></td>
                    <td><h3>Monitoring Tabel Asap</h3></td></p>
                </tr>
                </table>
                             
            </div>
        </div>
    </div>
     -->


<div class="content-section-a" style="margin-top: -16px;">

        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                <a href="m_asap.php" title="" style="color: #34495e;">
                    <div class="clearfix"></div>
                   
                        <img class="img-responsive center-block" src="images/asap.png" width="190x">
                
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <h2 class="section-heading">Monitoring Asap</h2>
                    <p>Menampilkan keterangan Kadar asap saat ini dan juga
                    berisi konten grafik kadar asap dengan pilihan rentan waktu.</p>
                </div>
                </a>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

    <div class="content-section-b">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                <a href="m_gambar.php" title="" style="color: #34495e; text-decoration: none;">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Monitoring Gambar</h2>
                    <p>Menampilkan seluruh gambar yang telah di upload sesuai
                    dengan rentan waktu yang telah disesuaikan.</p>
                </div>
                <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                    <img class="img-responsive center-block" src="images/gambar.png" width="190x">
                    <p></p>
                </div>
                </a>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-b -->

    <div class="content-section-a" style="padding: 20px 0 20px 30px">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-sm-6">
                <a href="m_tabel.php" title="" style="color: #34495e;">
                    <div class="clearfix"></div>
                    <img class="img-responsive center-block" src="images/management.png" width="150x">
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6" style="padding-left: 0;">
                     <h2 class="section-heading">Monitoring Tabel Asap</h2>
                     <p>Menampilkan data kadar asap berupa tabel dengan link pada tabel waktu
                     untuk melihat gambar kerjadian bila asap terdeteksi dan ada 2 tabel untuk kadar
                     kadar asap rata-rata dan kadar asap tertinggi dengan rentan waktu 15 menit.</p>
                </div>
                </a>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

  
  </script>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- <script src="js/flat-ui.min.js"></script> -->

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
