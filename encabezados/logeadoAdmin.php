<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <!-- <link rel="stylesheet" href="cssPag/Rstye.css"> -->
  <script src="js/Rscript.js"></script>
  <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<!-- Custom CSS -->
	<!-- <link rel="stylesheet" href="css/style.css"> -->
</head>
<body>
      <!-- Menu Navbar -->
	<nav class="navbar navbar-expand-md navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand" href="menu.php">El hotel</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColapsada">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarColapsada">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="menu.php">Inicio</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Usuarios
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="verUsuarios.php">Ver usuarios</a>
						<a class="dropdown-item" href="registro.php">Agregar empleado</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Reservaciones
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<!-- <a class="dropdown-item" href="reservacion.php">Hacer reservación</a> -->
						<a class="dropdown-item" href="todasReservaciones.php">Ver todas las reservaciones</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="verOpiniones.php">Ver opiniones de los usuarios</a>
					</li>
                    <li class="nav-item">
						<a class="nav-link btn btn-outline-secondary" href="cerrarSesion.php">Cerrar sesión</a>
					</li>
				</ul>
			</div>
		</div>
		<?php
	            session_start(); 
                if (isset($_SESSION["user"])){
                    echo "<font color=\"white\">Bienvenido ".$_SESSION["user"]."</font>";
                } else {
                    include_once "encabezados/noLogeado.php";
                }
  	            ?>
	</nav>
	<!-- Fin del Navbar -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>