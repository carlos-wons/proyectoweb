<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contacto</title>
    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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

      <form method="POST" action="validarCont.php" onsubmit="return verificarDatos()">
      <div class="container">
        <h1>Contacto</h1>
    
      <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre">
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su email">
      </div>
      <div class="form-group">
        <label for="mensaje">Mensaje:</label>
        <textarea class="form-control" id="mensaje" name="mensaje" rows="5" placeholder="Escriba su mensaje"></textarea>
      </div>
        <input type="submit" class="btn btn-primary" value="Enviar" onclick="validarNombre();">
      </div>

      <script>

      let nombreBien=false;
      let correoBien=false;

      function validarNombre(){
        let nombre = document.getElementById('nombre').value;
        let nombreTam = nombre.length;

        const expresionRegularNombreUsuario = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\s]+$/;
        let nombreCorrecto = expresionRegularNombreUsuario.test(nombre);

      if (nombreTam>=1) {

        if (nombreCorrecto) {
          nombreBien = true;
          validarCorreo();     
        } else {
          alert("El nombre solo puede contener letras");
        }
      } else {
        alert("El nombre no puede quedar vacío");
      }

    }

    function validarCorreo(){
      const expresionRegularEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      let correo = document.getElementById('email').value;
      let estructuraCorreo = expresionRegularEmail.test(correo);
      let correoTam = correo.length;

      if (correoTam>=1) {

        if (estructuraCorreo) {
          correoBien = true;
          alert('Petición enviada correcatamente');
          verificarDatos();
        } else {
          alert("La estructura del correo debe ser ejemplo@dominio.com");
        }
      } else {
        alert("El campo de correo no debe estar vacío");
      }
    }

    function verificarDatos() {
      if (correoBien && nombreBien) {
        return true;
      } else {
        return false;
      }
    }

      </script>
  
        <!-- Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
</body>
</html>
