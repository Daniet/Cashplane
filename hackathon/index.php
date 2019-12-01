<?php
session_start();

$usuario_completo = $_SESSION['nomapell'];
 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
 
} else {

	$link = $_SERVER[HTTP_HOST] . $_SERVER[REQUEST_URI];
	$escaped_link = htmlspecialchars($link, ENT_QUOTES, 'UTF-8');
	$_POST['link_actual'] = $escaped_link;
	//$_GET['actual_link'] =  'http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]';
	include '/PROGRAMAS/PRSTMARO/LogIn/login.php';
	include '/PROGRAMAS/PRSTMARO/LogIn/checklogin.php';
	
	

	
	echo "<script type=text/javascript>
	setTimeout (location.href ='/PROGRAMAS/PRSTMARO/LogIn/login.php?link_actual=".$_POST['link_actual']."',0);</script>";
 	
exit;
}
 
$now = time();
 
if($now > $_SESSION['expire']) {
session_destroy();
 
echo "Su sesion a terminado,
<a href='/hackathon/LogIn/login.php'>Necesita Hacer Login</a>";
exit;
}



?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>CASH PLANE</title>

<link rel="StyleSheet" href="../hackathon/css/bar_men_prin.css" type="text/css">
	
<script type="text/javascript">


	function llamar_form(ruta){
	
		var ventana = document.getElementById('formularios');
		
		ventana.style.background="white";
		ventana.src = 'http://www.andmarod.com/hackathon/'+ruta+'.php';
		
		
		
		
	
	
	}
	
	function cerrar_sesion(){
	
		document.location.href="http://www.andmarod.com/hackathon/LogIn/logout.php";
	
	}
	function ir_a(formulario){
			var formulario;
		formulario= document.getElementById("formularios");
		formulario.src =formulario;
	
	}



</script>


<style type="text/css">
	
</style>



</head>

<body>

<div><img src="imagenes/logo.jpeg" style="position:absolute;top:10%;left:22%" /></div>

<div style="background-color:#FF0000; font-size:large ;font-family:Arial, Helvetica, sans-serif;text-align:right; color:white"> Usuario: <?php  echo $_SESSION['nomapell']; ?>
</div>

    
  <!-- /////////// Begin Dropdown //////////// -->
  <!--<div style="position:absolute; top:10%;left:2%" class='swanky_wrapper'>
    <input id='Dashboard' name='radio' type='radio'/>
    <label for='Dashboard'>
      <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/dash.png'/>
      <span>Dashboard</span>
      <div class='lil_arrow'></div>
      <div class='bar'></div>
      <div class='swanky_wrapper__content'>
        <ul>
          <li>Tools</li>
          <li>Reports</li>
          <li>Analytics</li>
          <li>Code Blocks</li>
        </ul>
      </div>
    </label>
    <input id='Sales' name='radio' type='radio'/>
    <label for='Sales'>
      <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/del.png'/>
      <span>Sales</span>
      <div class='lil_arrow'></div>
      <div class='bar'></div>
      <div class='swanky_wrapper__content'>
        <ul>
          <li>New Sales</li>
          <li>Expired Sales</li>
          <li>Sales Reports</li>
          <li>Deliveries</li>
        </ul>
      </div>
    </label>
    <input id='Messages' name='radio' type='radio'/>
    <label for='Messages'>
      <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/mess.png'/>
      <span>Messages</span>
      <div class='lil_arrow'></div>
      <div class='bar'></div>
      <div class='swanky_wrapper__content'>
        <ul>
          <li>Inbox</li>
          <li>Outbox</li>
          <li>Sent</li>
          <li>Archived</li>
        </ul>
      </div>
    </label>
    <input id='Users' name='radio' type='radio'/>
    <label for='Users'>
      <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/users.png'/>
      <span>Users</span>
      <div class='lil_arrow'></div>
      <div class='bar'></div>
      <div class='swanky_wrapper__content'>
        <ul>
          <li>New User</li>
          <li>User Groups</li>
          <li>Permissions</li>
          <li>Passwords</li>
        </ul>
      </div>
    </label>
    <input id='Settings' radio='radio' type='radio'/>
    <label for='Settings'>
      <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/set.png'/>
      <span>Settings</span>
      <div class='lil_arrow'></div>
      <div class='swanky_wrapper__content'>
        <ul>
          <li>Databases</li>
          <li>Design</li>
          <li>Change User</li>
          <li>Log Out</li>
        </ul>
      </div>
    </label>
  </div>-->
  <!-- /////////// End Dropdown //////////// -->
</div>
<!-- / My Footer -->
    
    
    
<div style="position:absolute; top:10%;left:2%" class='swanky_wrapper'>
    <input id='Config' name='radio' type='radio'/>
    <label for='Config'>
      <img src='../PROGRAMAS/PRSTMARO/iconos/set.png'/>
      <span>Parametrizacion</span>
      <div class='lil_arrow'></div>
      <div class='bar'></div>
      <div class='swanky_wrapper__content'>
        <ul>
          <li  onclick="llamar_form('dashboard/cajero')">Cajeros</li>
          <li>Sucursales</li>
          <li>Bancos Externos</li>
          <li>Cajeros Externos</li>
          
        </ul>
      </div>
    </label>
    
    <input id='Clientes' name='radio' type='radio'/>
    <label for='Clientes'>
      <img src='../PROGRAMAS/PRSTMARO/iconos/users.png'/>
      <span>Usuarios</span>
      <div class='lil_arrow'></div>
      <div class='bar'></div>
      <div class='swanky_wrapper__content'>
      
      <ul>
          <li onclick="cerrar_sesion()">Cerrar Sesion</li>
          
        </ul>

        
      </div>
    </label>
    
    
    <input id='Dashboard' name='radio' type='radio'/>
    <label for='Dashboard'>
      <img src='../PROGRAMAS/PRSTMARO/iconos/dash.png'/>
      <span>Dashboard</span>
      <div class='lil_arrow'></div>
      <div class='bar'></div>
      <div class='swanky_wrapper__content'>
        <ul>
          <li onclick="llamar_form('ubicacion_cajeros')">Ubicacion geografica</li>
          <li onclick="llamar_form('dashboard/grafica_general')">Estado General</li>
          <li onclick="llamar_form('dashboard/dashboard')">Dash</li>
          
        </ul>
      </div>
    </label>
    <input id='Messages' name='radio' type='radio'/>
    <label for='Messages'>
      <img src='../PROGRAMAS/PRSTMARO/iconos/mess.png'/>
      <span>Informes</span>
      <div class='lil_arrow'></div>
      <div class='bar'></div>
      <div class='swanky_wrapper__content'>
        <ul>
          <li>Cajeros</li>
          <li>Sucursales</li>
          <li>Centros de efectivo</li>
          <li>Bancos Externos</li>
        </ul>
      </div>
    </label>
    <input id='watson' name='radio' type='radio'/>
    <label for='watson'>
      <img src='../PROGRAMAS/PRSTMARO/iconos/set.png'/>
      <span>Informes Watson</span>
      <div class='lil_arrow'></div>
      <div class='bar'></div>
      <div class='swanky_wrapper__content'>
        <ul>
          <li onclick="">Crear Usuarios</li>
          <li>Persmisos</li>
          <li></li>
          <li onclick="llamar_form('configuracion/cmbpsswrd')">Cambio de Password</li>
        </ul>
      </div>
    </label>
    
    
    
    
  </div>    
  
  
  <div style="position:absolute;top:10%;left:30%;width:65%;height:85%; border-style:none">
  
  	<iframe id="formularios" style="width:100%;height:100%;border-style:none;"  ></iframe>
  
  </div>
    
    
    
    
    
</body>

</html>
