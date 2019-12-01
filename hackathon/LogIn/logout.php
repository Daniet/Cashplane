<?php
 
session_start();
unset ($SESSION['username']);
unset ($SESSION['nomapell']);
session_destroy();
 
header('Location: http://www.andmarod.com/hackathon/LogIn/login.php');
?>
