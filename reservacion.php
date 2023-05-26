<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservacion</title>

    <link rel="stylesheet" href="cssPag/Rstye.css">
    <script src="js/Rscript.js"></script>
    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

    
	<?php 
	session_start();
    	if (isset($_SESSION["user"]) && $_SESSION["rol"]!="admin"){
        $usuario=$_SESSION["user"];
			  include_once "encabezados/logeado.php";
    	} else if (isset($_SESSION["user"]) && $_SESSION["rol"]=="admin") {
        header("Location: menu.php");
      } else {
			  header("Location: index.php");
        header('Location: index.php');
      //include_once "encabezados/noLogeado.php";
    	}
  	?>
    <br><br>
    <div class="signupFrm">
    <form method="POST" action="validarReserva.php" onsubmit="return verificarDatos()" class="form" id="frmReserva" name="frmReserva">

      <h1>Reservaciones</h1>

      <div class="input-group mb-3">
        <label class="input-group-text" for="tipoHabitaciones">tipo de habitación:</label>
        <select class="form-select" id="tipoHabitaciones" name="tipoHabitaciones">
          <option value="Ejecutiva" selected>Ejecutiva $2000</option>
          <option value="Estandar">Estandar $1200</option>
          <option value="Suite">Suite $3000</option>
          </select>
      </div>

      <div class="inputContainer">
        <input maxlength="3" minlength="1" id="adultos" name="adultos" type="number" class="input" placeholder="a" required="[0-9]+">
        <label for="" class="label">Numero de adultos</label>
      </div>
        <div class="inputContainer">
        <input maxlength="3" minlength="1" id="jovenes" name="jovenes" type="number" class="input" placeholder="a" required="[0-9]+">
        <label for="" class="label">Numero de niños (12 o menos)</label>
      </div>

      <div class="inputContainer">
        <input maxlength="3" minlength="1" id="nHabitaciones" name="nHabitaciones" type="number" class="input" placeholder="a" required="[0-9]+">
        <label for="" class="label">Numero de habitaciones</label>
      </div>

      <div class="inputContainer">
        <input id="entrada" name="entrada" type="date" class="input" placeholder="a" required min=<?php $hoy=date("Y-m-d"); echo $hoy;?>>
        <label for="" class="label">entrada</label>
      </div>

      <div class="inputContainer">
        <input id="salida" name="salida" type="date" class="input" placeholder="a" required min=<?php $hoy=date("Y-m-d"); echo $hoy;?>>
        <label for="" class="label">Salida</label>
      </div>

      <div class="inputContainer">
        <input maxlength="30" minlength="1" id="nombre" name="nombre" type="text" class="input" placeholder="a" required="" value="<?php echo $usuario?>" readonly>
        <label for="" class="label">Nombre</label>
      </div>

      <div class="inputContainer">
        <input maxlength="20" minlength="5" id="telefono" name="telefono" type="text" class="input" placeholder="a" required="">
        <label for="" class="label">telefono</label>
      </div>

      <input type="submit" class="submitBtn" value="Enviar" onclick="validarNombre();">
    </form>
    </div>

    <script>

    let nombreBien=false;
    let telefonoBien=false;
    let fechasBien=false;

    function validarNombre(){
      let nombre = document.getElementById('nombre').value;
      let nombreTam = nombre.length;

      const expresionRegularNombreUsuario = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\s]+$/;
      let nombreCorrecto = expresionRegularNombreUsuario.test(nombre);

      if (nombreTam>=1) {

        if (nombreCorrecto) {
          nombreBien = true;
          validarTelefono();     
        } else {
          alert("El nombre no puede tener caracteres especiales");
        }
      } else {

        alert("El nombre no puede quedar vacío");

      }

    }

    function validarTelefono() {
      let telefono = document.getElementById('telefono').value;
      let telefonoTam = telefono.length;

      const expresionRegularTelefono = /^[0-9\s]+$/;
      let telefonoCorrecto = expresionRegularTelefono.test(telefono);

      if (telefonoTam>=1) {

        if (telefonoCorrecto) {
          telefonoBien = true;
          validarFechas();
        } else {
          alert("Escribe un número de télefono correcto");
        }
      } else {
        alert ("El télefono no puede quedar vacío");
      }
    }

    function validarFechas() {
      var entrada = new Date(document.getElementById('entrada').value);
      var salida = new Date(document.getElementById('salida').value);

        if (entrada < salida) {
          fechasBien = true;
          alert('Reserva hecha exitosamente');
          verificarDatos();
        } else {
          alert("La fecha de entrada debe ser antes de la salida");
        }
    }
    
    function verificarDatos() {
      if (nombreBien && telefonoBien  && fechasBien) {
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