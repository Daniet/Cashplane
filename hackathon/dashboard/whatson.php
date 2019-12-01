<script src="https://code.jquery.com/jquery-3.4.1.min.js" charset="utf-8"></script>
<script type="text/javascript">
	$(document).ready(function(){

		// function watson(idCajero, direccion, fecha, totalMax, montoCajero){
		// 	$.ajax({
		// 		url: 'https://us-south.ml.cloud.ibm.com/v4/deployments/687892c6-1243-42f6-80df-53caceeb571b/predictions',
		// 		headers	: {
		// 			'Content-Type': 'application/json',
		// 			'Authorization': 'Bearer yKPUyIldUCL6Spa5G3-_whCfTkb3W4KFBS_kxmg5GyHs',
		// 			'ML-Instance-ID': 'f37ab0ee-f873-4ced-a323-2b826bf10533'
		// 		},
		// 		dataType: 'json',
		// 		type: 'POST',
		// 		contentType: 'application/json',
		// 		data: JSON.stringify({"input_data": [{"fields": ["Cod Cajero", "Direccion", "Tipo", "Descripción", "fecha", "total_max", "MONTO_CAJERO"], "values": [
		// 			idCajero, direccion, fecha, totalMax, montoCajero
		// 		]}]}),
		// 		processData: false,
		// 		success: function( data, textStatus, jQxhr ){
		// 			console.log(data)
		// 		},
		// 		error: function( jqXhr, textStatus, errorThrown ){
		// 			console.log( errorThrown );
		// 		}
		// 	});
		// }

		function whatson(Cod_Cajero, Direccion, Tipo, Descripcion, fecha, total_max, MONTO_CAJERO) {
			return fetch('flores.jpg',{
				method: 'POST',
				headers: new Headers({
					'Content-Type': 'application/json',
					'Authorization': 'Bearer yKPUyIldUCL6Spa5G3-_whCfTkb3W4KFBS_kxmg5GyHs',
					'ML-Instance-ID': 'f37ab0ee-f873-4ced-a323-2b826bf10533'
				}),
				body: {"input_data": [{
					"fields": ["Cod Cajero", "Direccion", "Tipo", "Descripción", "fecha", "total_max", "MONTO_CAJERO"],
					"values": [Cod_Cajero, Direccion, Tipo, Descripcion, fecha, total_max, MONTO_CAJERO]
				}]},
				mode: 'cors',
				cache: 'default'
			})
		}

		watson(4, 'DIAGONAL 16 No. 104-51 Local 20 Centro Comercial VIVA FONTIBON', '2019-08-08 07:00:00', 8000000, 8000000).then(data => console.log(data)).then(function(res){
			console.log(res)
		})

		fetch('https://httpbin.org/post', {
  method: 'post',
  headers: {
    'Accept': 'application/json, text/plain, */*',
    'Content-Type': 'application/json'
  },
  body: JSON.stringify({a: 7, str: 'Some string: &=&'})
}).then(res=>res.json())
  .then(res => console.log(res));
	})
</script>
