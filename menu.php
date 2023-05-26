<!DOCTYPE html>
<html>
<head>
	<title>Hotel?? .....</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>


	<?php
	session_start(); 
    if (isset($_SESSION["user"]) && $_SESSION["rol"]!="admin"){
      include_once "encabezados/logeado.php";
    } else if (isset($_SESSION["user"]) && $_SESSION["rol"]=="admin") {
		include_once "encabezados/logeadoAdmin.php";
    } else {
      include_once "encabezados/noLogeado.php";
    }
	?>


      <!-- Carrusel -->
    <section>
    <header>
        <section>
        <div id="Carrusel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item ">
                <img src="imgs/slide01.jpg" class="d-block w-100" alt="...">
				<div class="carousel-caption d-none d-md-block">
					<h3>impresionantes vistas y servicio de primer nivel.</h3>
					<p>Todo en un solo lugar.</p>

					<a class="nav-link" href="reservacion.php">

						<button type="button" class="btn btn-primary btn-lg">Reserva ya</button></a>
				</div>
              </div>
              <div class="carousel-item active">
                <img src="imgs/slide02.jpg" class="d-block w-100" alt="...">
				<div class="carousel-caption d-none d-md-block">

					<a class="nav-link" href="reservacion.php">

					<button type="button" class="btn btn-primary btn-lg">Reserva ya</button></a>
				</div>
              </div>
              <div class="carousel-item">
                <img src="imgs/slide03.jpg" class="d-block w-100" alt="...">
				<div class="carousel-caption d-none d-md-block">
					<h3>Disfruta de nuestras instalaciones</h3>
					<p>Déjate llevar por la comodidad y la tranquilidad en nuestro hotel,
						donde cada detalle ha sido diseñado para hacerte sentir como en casa.</p>

						<a class="nav-link" href="reservacion.php">

					<button type="button" class="btn btn-primary btn-lg">Reserva ya</button></a>
				</div>
              </div>
            </div>
			<a class="carousel-control-prev" href="#Carrusel" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#Carrusel" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
        </div>
        </section>
    </header>

	<!-- Acerca de -->
	<div class="about-section-box bg-info text-white">
		<div class="container py-5">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12">
					<img src="imgs/presentacion.jpg" alt="" class="img-fluid">
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 text-center">
					<div class="inner-column">
						<h1>Bienvenido a <span>El hotel</span></h1>
						<h4>¿Por qué El hotel?</h4>
						<p>Bienvenido a nuestro hotel, un oasis de confort y elegancia donde nuestros huéspedes disfrutan de una experiencia única y memorable. Ubicado en [coloca la ubicación], nuestro hotel ofrece una amplia gama de servicios y comodidades para garantizar que cada huésped se sienta como en casa. </p>
						<p>Desde nuestras impresionantes habitaciones y suites, hasta nuestra variedad de opciones gastronómicas y nuestro servicio de primer nivel, nuestro hotel es el lugar perfecto para disfrutar de unas vacaciones o viaje de negocios. Descubre la verdadera esencia del descanso y la relajación en nuestro hotel, donde la calidad y la atención al detalle son nuestra prioridad número uno. ¡Ven a descubrir lo que hace que nuestro hotel sea especial y crea recuerdos inolvidables que durarán toda la vida! </p>

						<a class="btn btn-outline-light" href="reservacion.php">Reserva</a>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Acerca de fin -->

	<!-- Presentacion -->
	<div class="jumbotron jumbotron-fluid ">
		<div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>Bienvenido al hotel de tus sueños</h1>
				    <p>Nosotros ofremos los mejores servicios de la ciudad.</p>
                    <p>Precios accesibles.</p>
                    <p>Cancela cuando quieras.</p>   
                </div>
                <div class="col-md-6">
                    <img src="imgs/imagen2.jpg" alt="" class="img-fluid">
                </div>
            </div>                  
		</div>
	</div>

	<!-- Servicios -->
	<section id="servicios">
		<div class="container">
			<h2 >Nuestros servicios</h2>
			<div class="row">
				<div class="col-md-4">
					<h3>Piscinas</h3>
					<p>Nuestro hotel cuenta con una piscina cubierta para nuestras huéspedes.</p>
					<img src="imgs/servicios1.jpg" alt="" class="img-fluid">
				</div>
				<div class="col-md-4">
					<h3>Spa</h3>
					<p>Concientase con un lujoso tratamiento de spa incluido.</p>
					<img src="imgs/servicios2.jpg" alt="" class="img-fluid">
				</div>
				<div class="col-md-4">
					<h3>Restaurante</h3>
					<p>Disfrute de una excelente cena en nuestro restaurante en el lugar.</p>
					<img src="imgs/servicios3.jpg" alt="" class="img-fluid">
				</div>
			</div>
		</div>
		<br><br>
	</section>

	<!-- pie -->
	<footer class="py-5 bg-light">
		<div class="container">
			<p>Copyright © 2023 
				<a href="#">El hotel</a>
			</p>
		</div>
	</footer>

	<!-- Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->

</body>
</html>
