<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "Tienes que iniciar sesion primero";
  	header('location: index.html');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: index.html");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<!--<div class="header">Perfil del usuario</div>-->

<body>
<button type="button" class="btn btn-primary"id="Vuelta"><a href="index.html">Inicio</button>

<div class="content"  id="usuario">
    <!-- Información del usuario conectado -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Usuario: <strong><?php echo $_SESSION['username']; ?></strong></p>
		<p><a href="">Ajustes</a></p>
    	<p> <a href="/index.html?logout='1'" style="color: red;">Cerrar sesion</a> </p>
    <?php endif ?>
</div>
</body>
</html>