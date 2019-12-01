<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
<script async src="//www.google-analytics.com/analytics.js"></script>
	
	<script src="../libs/Chart.min.js"></script>
	<script src="../libs/utils.js"></script>
</head>

<body>

</body>




<div id="marquee" style="background:#FF0000;color:white;font-family:Arial, Helvetica, sans-serif;font-weight:bold"><marquee>EFECTIVO DISPONIBLE EN CAJEROS: $10000000		EFECTIVO DISPONIBLE EN SUCURSALES: $20000000                EFECTIVO DISPONIBLE EN CENTROS DE EFECTIVO: $20000000</marquee></div>

<div style="position:absolute;top:10%;left:5%;height:40%;width:40%;font-family:Arial, Helvetica, sans-serif" id="semaforo_cajero">
<p style="width:100%;text-align:center;font-weight:bold;font-size:medium">ESTADO ACTUAL DE CAJEROS</p>
<img style="width:40%;height:90%" src="../imagenes/semarofo.png"/></div>
<p style="position:absolute;top:22%;left:12%;text-align:center;font-weight:bold;font-size:medium;color:white;font-family:Arial, Helvetica, sans-serif">15%</p>
<p style="position:absolute;top:33%;left:12%;text-align:center;font-weight:bold;font-size:medium;font-family:Arial, Helvetica, sans-serif">30%</p>
<p style="position:absolute;top:43%;left:12%;text-align:center;font-weight:bold;font-size:medium;color:white;font-family:Arial, Helvetica, sans-serif">60%</p>

<p style="position:absolute;top:22%;left:20%;text-align:center;font-weight:bold;font-size:medium;font-family:Arial, Helvetica, sans-serif">$ 100000</p>
<p style="position:absolute;top:33%;left:20%;text-align:center;font-weight:bold;font-size:medium;font-family:Arial, Helvetica, sans-serif">$ 200000</p>
<p style="position:absolute;top:43%;left:20%;text-align:center;font-weight:bold;font-size:medium;font-family:Arial, Helvetica, sans-serif">$ 300000</p>

<div id="oficinas">
<p style="width:100%;text-align:center;font-weight:bold;font-size:medium">OFICINAS</p>



<div style="position:absolute;top:10%;left:50%;height:40%;width:60%;font-family:Arial, Helvetica, sans-serif" id="centros_efectivo">
<p style="width:100%;text-align:center;font-weight:bold;font-size:medium">CENTROS DE EFECTIVO</p>
<div id="container" style="width: 75%;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
		<canvas id="canvas" style="display: block; width: 1013px; height: 506px;" width="1013" height="506" class="chartjs-render-monitor"></canvas>
	</div>
	<script>
		var MONTHS = ['	'];
		var color = Chart.helpers.color;
		var horizontalBarChartData = {
			labels: [''],
			datasets: [{
				label: 'CENTRO DE EFECTIVO 1',
				backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
				borderColor: window.chartColors.red,
				borderWidth: 1,
				data: [
					24000000000,
					
				]
			}, {
				label: 'CENTRO DE EFECTIVO 2',
				backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
				borderColor: window.chartColors.blue,
				data: [
					30000000000,
					
				]
			},
			{
				label: 'CENTRO DE EFECTIVO 3',
				backgroundColor: color(window.chartColors.green).alpha(0.5).rgbString(),
				borderColor: window.chartColors.green,
				data: [
					18000000000,
				]
			}]

		};

		window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
			window.myHorizontalBar = new Chart(ctx, {
				type: 'horizontalBar',
				data: horizontalBarChartData,
				options: {
					// Elements options apply to all of the options unless overridden in a dataset
					// In this case, we are setting the border of each horizontal bar to be 2px wide
					elements: {
						rectangle: {
							borderWidth: 2,
						}
					},
					responsive: true,
					legend: {
						position: 'right',
					},
					title: {
						display: true,
						text: 'APROVISIONAMIENTRO CENTROS DE EFECTIVO'
					}
				}
			});

		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			var zero = Math.random() < 0.2 ? true : false;
			horizontalBarChartData.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return zero ? 0.0 : randomScalingFactor();
				});

			});
			window.myHorizontalBar.update();
		});

		var colorNames = Object.keys(window.chartColors);

		document.getElementById('addDataset').addEventListener('click', function() {
			var colorName = colorNames[horizontalBarChartData.datasets.length % colorNames.length];
			var dsColor = window.chartColors[colorName];
			var newDataset = {
				label: 'Dataset ' + (horizontalBarChartData.datasets.length + 1),
				backgroundColor: color(dsColor).alpha(0.5).rgbString(),
				borderColor: dsColor,
				data: []
			};

			for (var index = 0; index < horizontalBarChartData.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());
			}

			horizontalBarChartData.datasets.push(newDataset);
			window.myHorizontalBar.update();
		});

		document.getElementById('addData').addEventListener('click', function() {
			if (horizontalBarChartData.datasets.length > 0) {
				var month = MONTHS[horizontalBarChartData.labels.length % MONTHS.length];
				horizontalBarChartData.labels.push(month);

				for (var index = 0; index < horizontalBarChartData.datasets.length; ++index) {
					horizontalBarChartData.datasets[index].data.push(randomScalingFactor());
				}

				window.myHorizontalBar.update();
			}
		});

		document.getElementById('removeDataset').addEventListener('click', function() {
			horizontalBarChartData.datasets.pop();
			window.myHorizontalBar.update();
		});

		document.getElementById('removeData').addEventListener('click', function() {
			horizontalBarChartData.labels.splice(-1, 1); // remove the label first

			horizontalBarChartData.datasets.forEach(function(dataset) {
				dataset.data.pop();
			});

			window.myHorizontalBar.update();
		});
	</script>
	
	</div>


</div>

<div></div>

<div></div>



</html>
