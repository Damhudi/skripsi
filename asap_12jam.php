	<script type="text/javascript">
	var chart;
			$(document).ready(function() {
				var options = {
					chart: {
						renderTo: '12jam',
						defaultSeriesType: 'line',
						
					},
					title: {
						text: 'Rata - rata Asap Selama 12 Jam Terakhir',
						
					},
					subtitle: {
						text: 'Lokasi : LAB 206 Fakultas Teknik, Universitas Darma Persada',
						
					},
					xAxis: {
						type: 'datetime',
						
					},
					yAxis: {
						title: {
							text: 'Asap (ppm)'
						},
						plotLines: [{
							value: 0,
							width: 1,
							color: '#808080'
						}]
					},
					series: [{
						name: 'Asap'
					}]
				}
				// Load data asynchronously using jQuery. On success, add the data
				// to the options and initiate the chart.
				// This data is obtained by exporting a GA custom report to TSV.
				// http://api.jquery.com/jQuery.get/
				jQuery.get('getdata.php?page=asap12jam', null, function(tsv) {
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

<div id="12jam" style="width: 823px; height: 400px;"></div>