<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link rel="stylesheet" href="cssPag/Rstye.css">
  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
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
    if (isset($_SESSION["user"])){
      header("Location: menu.php");
      header('Location: menu.php');
    }
  	?>

  <div class="signupFrm">
    <form method="POST" class="form" id="frmLogin">
      <h1 class="title">Iniciar sesión</h1>

      <div class="inputContainer">
        <input id="correoL" name="correoL" type="text" class="input" placeholder="a">
        <label for="" class="label">Correo electronico</label>
      </div>

      <div class="inputContainer">
        <input id="passwordL" name="passwordL" type="password" class="input" placeholder="a">
        <label for="" class="label">Constraseña</label>
      </div>

      <input type="submit" class="submitBtn" id="submitBtn" value="Iniciar sesión">
      <p>¿No tienes una cuenta? <a href="registro.php">Registrarme</a></p> 
      <p>Explora nuestros servicios <a href="menu.php">Explorar sitio</a></p>   
    </form>
  </div>

  <script type="text/javascript">

$(document).ready(function() {
    $('#frmLogin').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'logearseAjax.php',
            data: $(this).serialize(),
            success: function(response)
            {
                var jsonData = JSON.parse(response);
 

                if (jsonData.success == "1")
                {
                    location.href = 'menu.php';
                }
                else
                {
                    alert('Usuario y/o contraseña incorrectos');
                }
           }
       });
     });
});


  </script>


  <!-- Bootstrap JS -->
	<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->

</body>
</html>