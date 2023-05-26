<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Página web habitaciones</title>
    <link rel="stylesheet" href="Habitacion/css/estilos2.css">
    
</head>

<body>

<?php
	session_start(); 
    if (isset($_SESSION["user"]) && $_SESSION["rol"]!="admin"){
      include_once "encabezados/logeado.php";
    } else if (isset($_SESSION["user"]) && $_SESSION["rol"]=="admin") {
      header("Location: menu.php");
    } else {
      include_once "encabezados/noLogeado.php";
    }
  	?>

    <header>
        
        <section class="textos-header">
            <h1>Habitacion Suite</h1>
            <h2>La habitacion ideal</h2>
            <a class="nav-link" href="reservacion.php">
            <button type="button" class="btn btn-primary btn-lg">Reserva ya</button></a>
        </section>
        <div class="wave" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none"
                style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C150.00,150.00 349.20,-50.00 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                    style="stroke: none; fill: #fff;"></path>
            </svg></div>
    </header>
    <main>
        <section class="contenedor sobre-nosotros">
            <h2 class="titulo">Nuestra habitacion</h2>
            <div class="contenedor-sobre-nosotros">
                <img src="Habitacion/img/servicios.png" alt="" class="imagen-about-us">
                <div class="contenido-textos">
                    <h3><span>1</span>BENEFICIOS DENTRO DEL HOTEL</h3>
                    <p>1. Exclusivos descuentos en los servicios dentro del Hotel, como restaurantes, spa y más.<br/> 
                        2. Check-in preferencial<br/>
                        3. Servicio exclusivo de precontacto previo a su llegada para gestionar transportación, 
                        reservaciones a nuestros parques, restaurantes en los hoteles, eventos especiales y otras experiencias vacacionales <br/>
                    </p>
                    <h3><span>2</span>NORMAS DEL HOTEL</h3>
                    <p>1. Hotel se reserva el derecho de permanencia de sus huéspedes, 
                        clientes o pasajeros, quienes deben respetar las normas 
                        contenidas en el presente reglamento.<br/>
                        2. El cliente tiene la obligación ineludible de registrarse al momento de su 
                        llegada al hotel y de registrar su salida terminada su reserva, respetando
                        3. los horarios de check-in y check-out expuestos en la política de reserva.<br/>
                         El cliente que el día de su salida desocupe su habitación después de las 12:00 
                         horas, sin previo aviso y sin justificar su retraso, 
                         deberá pagar un día adicional a la duración de su reserva. <br/>
                    </p>
                </div>
            </div>
        </section>
        <section class="portafolio">
            <div class="contenedor">
                <h1 class="titulo">Suite</h1>
                <div class="galeria-port">
                    <div class="imagen-port">
                        <img src="Habitacion/img/img1a.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="Habitacion/img/icono1.png" alt="">
                            <p>Nuestro excelente servicio</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="Habitacion/img/img2a.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="Habitacion/img/icono1.png" alt="">
                            <p>Nuestro excelente servicio</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="Habitacion/img/img3a.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="Habitacion/img/icono1.png" alt="">
                            <p>Nuestro excelente servicio</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="Habitacion/img/img8a.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="Habitacion/img/icono1.png" alt="">
                            <p>Nuestro excelente servicio</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="Habitacion/img/img4a.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="Habitacion/img/icono1.png" alt="">
                            <p>Nuestro excelente servicio</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="Habitacion/img/img5a.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="Habitacion/img/icono1.png" alt="">
                            <p>Nuestro excelente servicio</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="Habitacion/img/img6a.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="Habitacion/img/icono1.png" alt="">
                            <p>Nuestro excelente servicio</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="Habitacion/img/img7a.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="Habitacion/img/icono1.png" alt="">
                            <p>Nuestro excelente servicio</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="clientes contenedor">
            <h2 class="titulo">Que dicen nuestros clientes</h2>
            <div class="cards">
                <div class="card">
                    <img src="Habitacion/img/face1.jpeg" alt="">
                    <div class="contenido-texto-card">
                        <h4>Grandi Eduardo ☆☆☆☆☆</h4>
                        <p>Tuvimos una muy agradable recepción y las habitaciones nos gustaron mucho. Esta muy bien ubicado</p>
                    </div>
                </div>
                <div class="card">
                    <img src="Habitacion/img/face2.jfif" alt="">
                    <div class="contenido-texto-card">
                        <h4>Marin Javier ☆☆☆☆☆</h4>
                        <p>Muy agradable, silencioso para un buen descanso, buena ubicacion.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="about-services">
            <div class="contenedor">
                <h2 class="titulo">Habitacion Estandar</h2>
                <div class="servicio-cont">
                    <div class="servicio-ind">
                        <img src="Habitacion/img/HOTEL.jpg" alt="">
                        <h3>Hotel</h3>
                        <p>Nuestra primera categoría de habitaciones (14 metros cuadrados) 
                           tienen vistas a la calle o al patio interior con flores. Cada habitación 
                           Clásica está diseñada de manera exclusiva con diferentes combinaciones de colores y tejidos de calidad. 
                           Perfecto para estancia corta, el habitación Clásica dispone de una cama doble de 160 x 200 o dos camas individuales de 80 x 200.</p>
                    </div>
                    <div class="servicio-ind">
                        <img src="Habitacion/img/il.jpg" alt="">
                        <h3>Caracteristicas</h3>
                        <p>El Hotel  dispone de habitaciones espaciosas para acoger a personas con movilidad reducida. (Sujeto a disponibilidad, consulte por favor).</p>
                    </div>
                    <div class="servicio-ind">
                        <img src="Habitacion/img/img1.jpg" alt="">
                        <h3>Capacidad máxima</h3>
                        <p>2 persona. HABITACIONES COMUNICADAS disponibles bajo pedido</p>
                    </div>
                </div>
            </div>
        </section>
    
    </main>
    <footer>
        <div class="contenedor-footer">
            <div class="content-foo">
                <h4>Phone</h4>
                <p>8296312</p>
            </div>
            <div class="content-foo">
                <h4>Email</h4>
                <p>8296312</p>
            </div>
            <div class="content-foo">
                <h4>Location</h4>
                <p>8296312</p>
            </div>
        </div>
        <h2 class="titulo-final">&copy; EquipoHotel | Victor Hugo Suarez Nambo</h2>
    </footer>
</body>

</html>