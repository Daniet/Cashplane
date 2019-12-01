<?php



$color_circulo[]=array();

$tipo_icono[]=array();
$cajero[]=array();
$direccion[]=array();
$tipo[]=array();
$porcentaje[]=array();
$color[]=array();
$posicion[]=array();

$contador;



$conn = mysqli_connect('localhost','andmarod_hackat','hackathon','andmarod_hackathon');
mysqli_query($conn, 'SET SQL_BIG_SELECTS=1');
//$sql = "SELECT A.GOM, CAST(A.DIAS AS SIGNED) DIA, A.Total, B.tiempo FROM `TOTAL_GOM_TV` as A LEFT JOIN (SELECT gom, max(fecha_server), DATEDIFF(CURDATE(),fecha_server)as tiempo from reg_actua_estados where estado_actualiza = '4' group by gom) as B on  A.GOM=B.gom where DESC_ESTADO = 'CERRADO' ORDER BY DIA DESC";
$sql = "SELECT * FROM ESTADO_ACTUAL_CAJERO";

$result = mysqli_query($conn,$sql);

$contador=1;


while($row = mysqli_fetch_array($result)){

$cajero[$contador]= $row[1];
$direccion[$contador]=$row[2];
$posicion[$contador]=$row[9];
$porcentaje[$contador]=$row[7];
$estado[$contador]=$row[8];



if ($row[8]=='ALERTA'){
	$color[$contador]='blue';
	$tipo_icono[$contador] = 'alerta';
}
if ($row[12]=='VERDE'){
	$color[$contador]='green';
	$tipo_icono[$contador] = 'okay';

}
if ($row[12]=='AMARILLO'){
	$color[$contador]='yellow';
	$_icono[$contador] = 'peligro';

}
if ($row[12]=='ROJO'){
	$color[$contador]='red';
	$tipo_icono[$contador] = 'alarma';

}


if ($posicion[$contador]==''){
	$posicion[$contador]='1 ,1';
}



$contador=$contador + 1;

}		
		
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

  <head>
  
  <script type="text/javascript">
  setTimeout ("document.location = 'http://www.andmarod.com/hackathon/ubicacion_cajeros.php'",10000);

  
  </script>
  
  
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"> </script>

    <title>Actividades_emergencias</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body {
        margin: 0;
        padding: 0;
        height: 100%;
        width: 100%;
      }
      #map {
        height: 400px;
        width: 100%;
      }
      #legend {
        font-family: Arial, sans-serif;
        background: #fff;
        padding: 10px;
        margin: 10px;
        border: 3px solid #000;
      }
      #legend h3 {
        margin-top: 0;
      }
      #legend img {
        vertical-align: middle;
      }
      
      #info-box {
        background-color: white;
        border: 1px solid black;
        bottom: 30px;
        height: 20px;
        padding: 10px;
       }
    </style>
  </head>
  <body>
    <div id="map" style="height:100%"></div>
    <div id="legend" s><h3>Legend</h3></div>
    <div id="info-box" style="position:absolute;top:50%;left:10%">?</div>
    
    <script>
      var map;
	  
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14.5,
          center: new google.maps.LatLng(4.711768, -74.049718),
          mapTypeId: 'roadmap'
        });
        
       

        var iconBase = '../hackathon/imagenes/';
        var icons = {
          alarma: {
            name: 'Cajero sin dinero	',
			//icon:'file:///C:/Users/ANDMAROD/Desktop/imagenes%20para%20sisp/firmas/transformador_50_50.png'
            icon: iconBase + 'alarma.png'
			
          },
		  alerta: {
            name: 'Cajero < 16% $',
			//icon:'file:///C:/Users/ANDMAROD/Desktop/imagenes%20para%20sisp/firmas/transformador_50_50.png'
            icon: iconBase + 'alerta.png'
			
          },
          ok: {
            name: 'Cajero con buen suministro',
			//icon:'file:///C:/Users/ANDMAROD/Desktop/imagenes%20para%20sisp/firmas/transformador_50_50.png'
            icon: iconBase + 'okay.png'
			
          },
          peligro: {
            name: 'cajero > 16% y < 50%',
			//icon:'file:///C:/Users/ANDMAROD/Desktop/imagenes%20para%20sisp/firmas/transformador_50_50.png'
            icon: iconBase + 'peligro.png'
			
          },
		  
		  
		  
		  
        };
        
        
        

        var features = [
        
        
        
        
        
        
        
        
        
        <?
       
        
         for ($i = 1; $i < $contador; $i++) {
    		
    		
    		echo "{
    		position: new google.maps.LatLng(".$posicion[$i]."),
    		type: '".$tipo_icono[$i]."',
    		cajero:'".$cajero[$i]."',
    		direccion:'".$direccion[$i]."',
    		posicion:'".$posicion[$i]."',
    		observacion:'observacion de prueba',
    		color:'".$color[$i]."'},
    		";
			
			
			};
        
        ?>
        
        
       
		
        ];
        
        
        
        //crear poligono de bogota
		
        // Create markers.
      
            
        
        
        
        
        
        
        
        features.forEach(function(feature) {
          var marker = new google.maps.Marker({
            position: feature.position,
            icon: icons[feature.type].icon,
            map: map
          });
          
          
          
          
          
		  var cityCircle = new google.maps.Circle({
			letra:'a',//feature.letter,
            strokeColor: feature.color,
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: feature.color,
            fillOpacity: 0.35,
            map: map,
			letras: feature.letra ,
            center: feature.position,
            radius: 30,
            texto2:'ojo',
            description:'prueba',
            properties:{
                        texto:'prueba',
}
          });
          
          google.maps.event.addListener(cityCircle, 'click', function(ev) {
          
          
         var infoWindow = new google.maps.InfoWindow({
        content: "<div>"+ev.letra+"</div>",
        
        maxWidth: 500
    	});
          
            infoWindow.setPosition(ev.latLng);
            infoWindow.open(map);
        });
		  
          
          
          
          
          
        });
        
        

        var legend = document.getElementById('legend');
        for (var key in icons) {
          var type = icons[key];
          var name = type.name;
          var icon = type.icon;
          var div = document.createElement('div');
          div.innerHTML = '<img src="' + icon + '" style="height:35px">' + name;
          legend.appendChild(div);
        }

        map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(legend);
        
         // Set mouseover event for each feature.
		 
       
      }
    </script>
	<script async defer
	    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDi5pCkgcBIVBHVuIbNwwqyMyYBrbCr6Ro&callback=initMap">

    </script>
  </body>

</html>
