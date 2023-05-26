<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Disponibilidad</title>
  <link rel="stylesheet" href="cssPag/Rstye.css">
  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
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

    <!-- <div class="container py-4"> -->
        <div class="signupFrm">
        <div class="form" id="frmDisponible">
          <h1 class="titulo">Disponibilidad Habitaciones</h1>

          <div class="inputContainer">
            <input id="startDate" name="startDate" type="date" class="input">
            <label for="" class="label">Fecha de entrada</label>
          </div>

          <div class="inputContainer">
            <input id="endDate" name="endDate" type="date" class="input">
            <label for="" class="label">Fecha de salida</label>
          </div>

          <button id="checkAvailability" class="submitBtn">Verificar disponibilidad</button>
          <div id="result"></div>   
        </div>
      </div>
    <!-- </div> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
  $('#checkAvailability').click(function(e) {
    e.preventDefault();
    var startDate = $('#startDate').val();
    var endDate = $('#endDate').val();

    if (startDate !== '' && endDate !== '') {
      // Realizar una solicitud AJAX al servidor para obtener la disponibilidad de habitaciones
      $.ajax({
        url: 'disponibilidad.php',
        type: 'POST',
        data: {
          startDate: startDate,
          endDate: endDate
        },
        success: function(response) {
          $('#result').html(response);
        }
      });
    } else {
      alert('Por favor, seleccione las fechas de inicio y finalización.');
    }
  });
});

  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
</body>
</html>