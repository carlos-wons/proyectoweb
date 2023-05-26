<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Registro</title>
  <link rel="stylesheet" href="cssPag/Rstye.css">
  <script src="js/Rscript.js"></script>
  <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>


<body >
    <style>
/*vacio por cuestion de mucho contenido*/
    </style>
    

  <?php 
    session_start();
    if (isset($_SESSION["user"]) && $_SESSION["rol"]!="admin"){
      header("Location: menu.php");
      header('Location: menu.php');
    } elseif (isset($_SESSION["user"]) && $_SESSION["rol"]=="admin") {
      include_once "encabezados/logeadoAdmin.php";
      $esAdmin=true;
    } else {
      include_once "encabezados/noLogeado.php";
      $esAdmin=false;
    }
  ?>


  <div class="signupFrm py-5 ">
    <form action="validarPass.php" method="POST" onsubmit="return verificarDatos()" class="form" id="frmRegistro" name="frmRegistro">
      <h1>Registro</h1>

      <div class="inputContainer">
        <input id="correoR" name="correoR" type="text" class="input" placeholder="a">
        <label for="" class="label">Correo electronico</label>
      </div>

      <div class="inputContainer">
        <input id="userR" name="userR" type="text" class="input" placeholder="a">
        <label for="" class="label">Nombre de usuario</label>
      </div>

      <div class="inputContainer">
        <input id="passwordR" name="passwordR" type="password" class="input" placeholder="a">
        <label for="" class="label">Contraseña</label>
      </div>

      <div class="inputContainer">
        <input type="password" id="confirmPassR" name="confirmPassR" class="input" placeholder="a">
        <label for="" class="label">Confirmar Constraseña</label>
      </div>

      <input type="hidden" id="rolR" name="rolR" class="input" placeholder="a"
      value="<?php
        if ($esAdmin) {
          echo "admin";
        } else {
          echo "cliente";
        }
      ?>">

      <input type="submit" class="submitBtn" onclick="validarCorreo();" value="Registrar">
    </form>
  </div>
  <script type="text/javascript">

    let correoBien=false;
    let nombreBien=false;
    let contrasenasBien=false;

    function validarCorreo(){
      const expresionRegularEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      let correo = document.getElementById('correoR').value;
      let estructuraCorreo = expresionRegularEmail.test(correo);
      let correoTam = correo.length;

      if (correoTam>=1) {

        if (estructuraCorreo) {
          correoBien = true;
          validarNombre();
        } else {
          alert("La estructura del correo debe ser ejemplo@dominio.com");
        }
      } else {

        alert("El campo de correo no debe estar vacío");

      }
    }

    function validarNombre(){
      let nombre = document.getElementById('userR').value;
      let nombreTam = nombre.length;

      const expresionRegularNombreUsuario = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\s]+$/;
      let nombreCorrecto = expresionRegularNombreUsuario.test(nombre);

      if (nombreTam>=1) {

        if (nombreCorrecto) {
          nombreBien = true;
          validarPass();     
        } else {
          alert("El nombre solo puede contener letras");
        }
      } else {

        alert("El nombre no puede quedar vacío");

      }

    }
    
    function validarPass() {
      let pass1 = document.getElementById('passwordR').value;
      let pass1Tam = pass1.length;
      let pass2 = document.getElementById('confirmPassR').value;
      let pass2Tam = pass2.length;

      if ((pass1Tam>=8 && pass1Tam<=30) && (pass2Tam>=8 && pass2Tam<=30)) {
        if (pass1 == pass2) {
          //location.href= 'validarPass.php';
          contrasenasBien = true;
          verificarDatos();
        } else {
          alert("Las contraseñas no coinciden");
        }
      } else {
        alert ("El tamaño de las contraseñas debe ser entre 8 y 30 caracteres");
      }
    }
    
    function verificarDatos() {
      if (correoBien && nombreBien && contrasenasBien) {
        alert('Registro hecho correctamente');
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