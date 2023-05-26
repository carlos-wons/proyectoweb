<?php 
    require("datos/classConectionMySQL.php");

    class validarLogin {
        function validarLogin (){

        }

        function validarCorreo($correo){
            if (preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $correo)) {
                echo $correo;
                 return true;
                 //return $this->validarNombre($this->nombre);
              } else {
                echo "El correo no tiene un formato válido";
                return false;
              }
        }

        function validarContra($contra){
            $tamContra=strlen($contra);
            if ($tamContra>=8 && $tamContra<=30){
                return true;
                //return $this->validarTodo($correoBien,$nombreBien,$contraBien);
            } else {
                echo "La o las contraseñas no son válidas";
                return false;
            }
        }

        function validarTodo($correoBien,$contraBien){
            if ($correoBien && $contraBien) {
                return true;
            } else {
                return false;
            }
        }
    }

    $correo = $_POST['correoL'];
    $contra = $_POST['passwordL'];

    $NewConn = new ConnectionMySQL();

    $validarLogin = new validarLogin();
    $correoBien = $validarLogin->validarCorreo($correo);
    $contraBien = $validarLogin->validarContra($contra);

    $todoBien = $validarLogin->validarTodo($correoBien,$contraBien);


    if ($todoBien) {
        //////Realiza la insercionde datos a la BD
        $NewConn->CreateConnection();
	    $query = "SELECT * FROM usuarios where correo='$correo' and contraseña='$contra'";
	    $result=$NewConn->ExecuteQuery($query);
	    if($result){
		    $RowCount = $NewConn->GetCountAffectedRows();
		    if($RowCount>0){
			    echo "Query ejecutado exitosamente";
                session_start();
                $_SESSION["user"]=$correo;
			    header("Location: menu.php");
			    header('Location: menu.php');
		    }
	    }else{
		    echo "<h3>Error al ejecutar la consulta</h3>";
	    }
    }
?>