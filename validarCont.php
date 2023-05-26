<?php
require("datos/classConectionMySQL.php");

class validarContactanos {

	function validarContactanos(){
    
    }

    function validarCorreo($email){
        if (preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
             return true;
          } else {
            echo "El correo no tiene un formato válido";
            return false;
          }
    }

    function validarNombre($nombre){
        $tamNombre = strlen($nombre);
        if ($tamNombre>=1) {
            if (preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]+$/", $nombre)) {
                return true;
              } else {
                echo "El nombre introducido no es válido";
                return false;
              }
        }
    }

    function validarTodo($correoBien,$nombreBien){
        if ($correoBien && $nombreBien) {
            return true;
        } else {
            return false;
        }
    }
}

//recoger informacion enviada por el metodo POST
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];

//verificar llegada de informacion

echo "<h1> Número de pagaré: ".$nombre." a pagar el: ".$email."</h1>";
 
/////////Insertar datos a la BD

////Crear una nueva instancia
	$NewConn = new ConnectionMySQL();

	$validandoInfo = new validarContactanos();
    $nombreBien = $validandoInfo->validarNombre($nombre);
    $correoBien = $validandoInfo->validarCorreo($email);

    $todoBien = $validandoInfo->validarTodo($correoBien, $nombreBien);
    
	if ($todoBien) {
		/////creamos la conexion a utilizar
		$NewConn->CreateConnection();
		//////Realiza la insercionde datos a la BD
		echo $query = "INSERT INTO contactanos VALUES(null,'$nombre','$email','$mensaje')";
		$result=$NewConn->ExecuteQuery($query);
		if($result){
			$RowCount = $NewConn->GetCountAffectedRows();
			if($RowCount>0){
				echo "Query ejecutado exitosamente";
			    header("Location: contactanos.php");
			    header('Location: contactanos.php');
			}
		}else{
			echo "<h3>Error al ejecutar la consulta</h3>";
		}	
	}
?>