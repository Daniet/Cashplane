<?php
session_start();
?>
 
<?php


 $host_db = "localhost";
 $user_db = "andmarod_hackt";
 $pass_db = "hackathon";
 $db_name = "andmarod_hackathon";
 $tbl_name = "usuarios";
  

 
$tbl_name = "usuarios";
 
$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);
 
if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}
 
$username = $_POST['username'];
$password = $_POST['password'];


  
$sql = "SELECT * FROM $tbl_name WHERE usuario = '$username'";
 
$result = $conexion->query($sql);
 
 
if ($result->num_rows > 0) {     
 }
 $row = $result->fetch_array(MYSQLI_ASSOC);
 //if (password_verify($password, $row['password'])) { 
  if ($row['password'] == $password){
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    $nombre_comp = $row['nombres']." ".$row['apellido1']." ".$row['apellido2'];
    $_SESSION['nomapell'] = $nombre_comp;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (60 * 60);
    
    
    //$link = $_GET['actual_link'];
    
    echo "<script type=text/javascript>
    
    var link  = 'http://".$_GET['link_actual']."';
    
    if ( link =='http://'){
    setTimeout (location.href ='http://www.andmarod.com/hackathon',0);
	}else{
	
	
	setTimeout (location.href ='http://".$_GET['link_actual']."',0);
	}
	//alert('".$_SESSION['nomapell'] ."');
	
	
	</script>";

 
    echo "Bienvenido! " . $_SESSION['username'];
    //echo "Bienvenido! " . $link;
    echo "<br><br><a href=panel-control.php>Panel de Control</a>";
    //echo "<script>alert('".$link."');</script>;
    echo "<br><br><a href='http://".$_GET['link_actual']."'>ir a pagina anterior</a>";
    
    //echo "<script type=text/javascript>setTimeout (location.href ='".$_GET['actual_link']."',0);</script>";
 
 } else { 
   echo "Username o Password estan incorrectos.";
 
   echo "<br><a href='login.php'>Volver a Intentarlo</a>";
 }
 mysqli_close($conexion);
 ?>
