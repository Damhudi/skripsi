<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Monitoring Tabel</title>
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
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav> 

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="well well-sm" align="center"><h2>Tabel Kadar Asap</h2></div>

            <div class="tab-content col-md-13" style="padding-right:0;">
                <div role="tabpanel" class="tab-pane fade in active col-md-12 well" id="vtab1">
                    <?php include 'tbl_asap.php'; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
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
