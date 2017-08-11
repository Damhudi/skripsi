<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Monitoring Ruangan</title>
    <link rel="icon" type="image" href="images/iot-ico.ico">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/logo-nav.css" rel="stylesheet">

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
                        <a href="m_streaming.php"><i class="fa fa-video-camera"></i> Streaming</a>
                    </li>
                </ul>
                </div>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav> 

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="well well-sm" align="center"><h2>Monitoring Ruangan</h2></div>
                <div class="col-md-12 well">
                    <p align="center"><img class="thumbnail" src="http://192.168.137.112:8080/?action=stream"></p>
                        <center>
                            <button class='btnsearchbi' style='width:10em; font-size:14px; height:2.1em' type='button' onclick="javascript:window.open('get_capture.php','blank','location=no', 'width=710')">Capture</button>
                        </center>
                </div>
        </div>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
