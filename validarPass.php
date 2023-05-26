<?php
require("datos/classConectionMySQL.php");

//recoger informacion enviada por el metodo POST

class validarRegistro {

    function validarRegistro(){
    
    }

    function validarCorreo($correo){
        if (preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $correo)) {
             return true;
             //return $this->validarNombre($this->nombre);
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
                //return $this->validarContra($this->contra1,$this->contra2);
              } else {
                echo "El nombre introducido no es válido";
                return false;
              }
        }
    }

    function validarContra($contra1,$contra2){
        $tamContra1=strlen($contra1);
        $tamContra2=strlen($contra2);
        if (($tamContra1>=8 && $tamContra1<=30) && ($tamContra2>=8 && $tamContra2<=30)){
            return true;
            //return $this->validarTodo($correoBien,$nombreBien,$contraBien);
        } else {
            echo "La o las contraseñas no son válidas";
            return false;
        }
    }

    function validarTodo($correoBien,$nombreBien,$contraBien){
        if ($correoBien && $nombreBien && $contraBien) {
            return true;
        } else {
            return false;
        }
    }
}


//verificar llegada de informacion

    $correo = $_POST['correoR'];
    $nombre = $_POST['userR'];
    $rol = $_POST['rolR'];
    $contra1 = $_POST['passwordR'];
    $contra2 = $_POST['confirmPassR'];
 
/////////Insertar datos a la BD

////Crear una nueva instancia
	$NewConn = new ConnectionMySQL();

    $validandoInfo = new validarRegistro();
    $nombreBien = $validandoInfo->validarNombre($nombre);
    $correoBien = $validandoInfo->validarCorreo($correo);
    $contraBien = $validandoInfo->validarContra($contra1,$contra2);

    $todoBien = $validandoInfo->validarTodo($correoBien, $nombreBien, $contraBien);
    
    if ($todoBien) {
        //////Realiza la insercionde datos a la BD
        $NewConn->CreateConnection();
	    echo $query = "INSERT INTO usuarios VALUES(null,'$nombre','$contra1','$rol','$correo')";
	    $result=$NewConn->ExecuteQuery($query);
	    if($result){
		    $RowCount = $NewConn->GetCountAffectedRows();
		    if($RowCount>0){
			    echo "Query ejecutado exitosamente";
			    header("Location: index.php");
			    header('Location: index.php');
		    }
	    }else{
		    echo "<h3>Error al ejecutar la consulta</h3>";
	    }
    }
	
	
?>