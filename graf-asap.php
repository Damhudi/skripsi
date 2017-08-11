<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
	var chart;
			$(document).ready(function() {
				var options = {
					chart: {
						renderTo: 'container',
						defaultSeriesType: 'line',
						
					},
					title: {
						text: 'Grafik Data Tabel Asap',
						
					},
					subtitle: {
						text: 'Lokasi : LAB 206 Fakultas Teknik, Universitas Darma Persada',
						
					},
					xAxis: {
						type: 'datetime',
						
					},
					yAxis: {
						title: {
							text: 'Kadar Asap'
						},
						plotLines: [{
							value: 0,
							width: 1,
							color: '#808080'
						}]
					},
					series: [{
						name: 'Pengukur Asap'
					}]
				}
				// Load data asynchronously using jQuery. On success, add the data
				// to the options and initiate the chart.
				// This data is obtained by exporting a GA custom report to TSV.
				// http://api.jquery.com/jQuery.get/
				jQuery.get('getdata.php?page=asap', null, function(tsv) {
					var lines = [];
					traffic = [];
					try {
						// split the data return into lines and parse them
						tsv = tsv.split(/\n/g);
						jQuery.each(tsv, function(i, line) {
							line = line.split(/\t/);
							date = Date.parse(line[0] +' UTC');
							traffic.push([
								date,
								parseFloat(line[1].replace(',', ''), 10)
							]);
						});
					} catch (e) {  }
					options.series[0].data = traffic;
					chart = new Highcharts.Chart(options);
				});
			});
</script>
</head>
<body>

<div id="container" style="width: 100%; height: 400px; margin: 0 auto"></div>

<script src="js/highcharts.js"></script>
    <script src="js/exporting.js"></script>

</body>
</html>