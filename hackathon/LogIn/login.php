<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

 

<head>

 <title>Login</title>



<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
 
 
 <style type="text/css">
 
 
 #formulario{
	margin:0; 
	outline-style:none
 }
 .auto-style1 {
	 text-decoration: underline;
 }
 </style>

</head>



<body>
<div style="position:absolute;top:10%; left:20%"><img src="../imagenes/logo.jpeg" style="height:100%;width:100%"/></div>

 
<h1 style="position:relative; left:55%; width:30%; text-align:center;font-family:Arial, Helvetica, sans-serif;border-radius: 15px;color:#FF0000" class="auto-style1">Login</h1>

 
<form id="formulario" border style="box-shadow 2px 2px 5px #000; border-radius: 30px;position:relative; left:55%;width:30%;font-family:Arial, Helvetica, sans-serif; background-color:#FF0000; color:white" action="checklogin.php?link_actual=<?php echo $_GET['link_actual'];?>" method="post" >
<hr /> 
<label style="position:relative; left:10%" >Nombre Usuario:</label><br>
<input style="width:80%;position:relative;border-radius: 15px;font-size:xx-large; left:10%" name="username" type="text" id="username" required>
<br><br>
 
<label style="position:relative; left:10%">Password:</label><br>
<input style="width:80%;position:relative;border-radius: 15px;font-size:xx-large; left:10%" name="password" type="password" id="password" required>
<br><br>
 
<input style="position:relative; border-radius: 15px;font-size:x-large; left:10%" type="submit" name="Submit" value="INGRESAR">
 <hr />
 

</form>
 </body>
</html>
