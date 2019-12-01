<?php



$rotulos[] = array();
$rotulos2 ="";
$valores2 ="";
$colores ="";

$valores[]= array();
$contador = 0;
$conn = mysqli_connect('localhost','andmarod_hackt','hackathon','andmarod_hackathon');
mysqli_query($conn, 'SET SQL_BIG_SELECTS=1');
//$query_status_atm = "SELECT A.GOM, CAST(A.DIAS AS SIGNED) DIA, A.Total, B.tiempo FROM `TOTAL_GOM_TV` as A LEFT JOIN (SELECT gom, max(fecha_server), DATEDIFF(CURDATE(),fecha_server)as tiempo from reg_actua_estados where estado_actualiza = '4' group by gom) as B on  A.GOM=B.gom where DESC_ESTADO = 'CERRADO' ORDER BY DIA DESC";
$sql = "SELECT ESTADO, 
CASE 
WHEN ESTADO = 'AMARILLO' THEN 'CAJERO ENTRE 16% Y 50% DE ABASTECIMIENTO' 
WHEN ESTADO = 'VERDE' THEN 'CAJEROS CON SUFICIENTE ABASTECIMIENTO'
WHEN ESTADO = 'ROJO' THEN 'CAJERO CON MENOS DEL 16% DE ABASTECIEMIENTO'
WHEN ESTADO =  'ALERTA' THEN 'CAJEROS SIN DINERO Y POSIBLEMENTE FUERA DE LINEA'
END AS ROTULOS, COUNT(`Cod Cajero`) FROM ESTADO_ACTUAL_CAJERO
GROUP BY ESTADO";

$result= mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result)){ 


	if ($row[0]='AMARILLO'){
		$colores= $colores.'window.chartColors.yellow,';	
	
	}
		if ($row[0]='VERDE'){
		$colores= $colores.'window.chartColors.green,';	
	
	}
		if ($row[0]='ROJO'){
		$colores= $colores.'window.chartColors.red,';	
	
	}
		if ($row[0]='ALERTA'){
		$colores= $colores.'window.chartColors.orange,';	
	
	}


		$rotulos[$contador]= $row[1];
		$valores[$contador] = $row[2];
		$rotulos2 =$rotulos2."'".$row[1]."',";
		$valores2 = $valores2."".$row[2].",";		
		$contador = $contador +1;			

}




 ?>

<!DOCTYPE html>
<!-- saved from url=(0054)https://www.chartjs.org/samples/latest/charts/pie.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Pie Chart</title>
	<script async src="//www.google-analytics.com/analytics.js"></script>
	
	<script src="../libs/Chart.min.js"></script>
	<script src="../libs/utils.js"></script>
<style type="text/css">/* Chart.js */
@keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}</style></head>

<body>
<script src="../libs/Chart.min.js"></script>

	<div id="canvas-holder" style="width:100%"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
		<canvas id="chart-area" style="display: block; width: 540px; height: 270px;" width="540" height="270" class="chartjs-render-monitor"></canvas>
	</div>
	
	<script>
		var randomScalingFactor = function() {
			return Math.round(Math.random() * 100);
		};

		var config = {
			type: 'pie',
			data: {
				datasets: [{
					data: [<? echo $valores2;  ?>
					],
					backgroundColor: [<? echo $colores;  ?>

					],
					label: 'Dataset 1'
				}],
				labels: [<? echo $rotulos2;  ?>
				]
			},
			options: {
				responsive: true
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
			window.myPie = new Chart(ctx, config);
		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});
			});

			window.myPie.update();
		});

		var colorNames = Object.keys(window.chartColors);
		document.getElementById('addDataset').addEventListener('click', function() {
			var newDataset = {
				backgroundColor: [],
				data: [],
				label: 'New dataset ' + config.data.datasets.length,
			};

			for (var index = 0; index < config.data.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());

				var colorName = colorNames[index % colorNames.length];
				var newColor = window.chartColors[colorName];
				newDataset.backgroundColor.push(newColor);
			}

			config.data.datasets.push(newDataset);
			window.myPie.update();
		});

		document.getElementById('removeDataset').addEventListener('click', function() {
			config.data.datasets.splice(0, 1);
			window.myPie.update();
		});
	</script>



</body></html>