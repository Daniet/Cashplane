<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<script>

 	var busqueda = document.getElementById('pruebafiltro');
 	var busquedavector = document.getElementById('filvector');
    var busquedagom = document.getElementById('filgom');
    var table = document.getElementById("tuga_table_data_6870").tBodies[0];
    
	buscaTabla = function(){
    	texto = busqueda.value.toLowerCase();
        var r=1;
        while(row = table.rows[r++])      {
        if ( row.cells[3].innerText.toLowerCase().indexOf(texto) !== -1 )
        	row.style.display = null;
        else
        	row.style.display = 'none';
         }
             }    ;

</script>
</head>

<body>


<h2>CAMBIO DE PASSWORD</h2>

<form action="/action_page.php">
  Contraseña Actual<br>
  <input type="password" name="actpsswrd" >
  <br>
  
  Nueva Contraseña:<br>
  <input type="password" name="newpswwrd">
  <br>
  Confirme Contraseña:<br>
  <input type="password" name="confpsswrd" >
  <br><br>
  <input type="submit" value="Actualizar">
</form> 

<p>If you click the "Submit" button, the form-data will be sent to a page called "/action_page.php".</p>




</body>

</html>
