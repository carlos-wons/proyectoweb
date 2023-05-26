<?php
require("datos/classConectionMySQL.php");

//recoger informacion enviada por el metodo POST

class validarReservacion {

    function validarReservacion(){

    }

    function validarNombre($nombreCliente){
        $tamNombre = strlen($nombreCliente);
        if ($tamNombre>=1) {
            if (preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]+$/", $nombreCliente)) {
                return true;
                //return $this->validarContra($this->contra1,$this->contra2);
              } else {
                echo "El nombre introducido no es válido";
                return false;
              }
        }
    }

    function validarTelefono($telefono){
        $tamtelefono = strlen($telefono);
        if ($tamtelefono>=1) {
            if (preg_match("/^[0-9 ]+$/", $telefono)) {
                return true;
              } else {
                echo "El telefono introducido no es válido";
                return false;
              }
        }
    }

    function validarfechas($entrada, $salida) {
        $tamEntrada = strlen($entrada);
        $tamSalida = strlen($salida);
        if ($tamEntrada>=1 && $tamSalida>=1) {
            if (strtotime($entrada) < strtotime($salida)) {
                return true;
              } else {
                echo "La fecha de entrada debe ser antes de la salida";
                return false;
              }
        }
    }

    function validarTodo($nombreBien,$telefonoBien,$fechasBien){
        if ($nombreBien && $telefonoBien && $fechasBien) {
            return true;
        } else {
            return false;
        }
    }
}

//verificar llegada de informacion

    $tipohabitaciones = $_POST['tipoHabitaciones'];
    $numerohabitaciones = $_POST['nHabitaciones'];
    $entrada = $_POST['entrada'];
    $salida = $_POST['salida'];
    $nombreCliente = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $adultos = $_POST['adultos'];
    $jovenes = $_POST['jovenes'];
    $vigencia = "vigente";

    $diff = date_diff(date_create($entrada), date_create($salida));
    $numDias = $diff->days;

        $costoTotal = 0;
        // Asignar costos por tipo de habitación
        switch ($tipohabitaciones) {
            case 'Ejecutiva':
                $costoTotal = 2000 * $numerohabitaciones * $numDias;
                break;
            case 'Estandar':
                $costoTotal = 1200 * $numerohabitaciones * $numDias;
                break;
            case 'Suite':
                $costoTotal = 3000 * $numerohabitaciones * $numDias;
                break;
            default:
                echo "Tipo de habitación inválido.";
                break;
        }
    
 
/////////Insertar datos a la BD
    echo "<h1> Número de pagaré: ".$nombreCliente." a pagar el: ".$telefono."</h1>";
    echo "Prueba:". $costoTotal;
////Crear una nueva instancia
	$NewConn = new ConnectionMySQL();

    $validandoInfo = new validarReservacion();
    $nombreBien = $validandoInfo->validarNombre($nombreCliente);
    $telefonoBien = $validandoInfo->validarTelefono($telefono);
    $fechasBien = $validandoInfo->validarfechas($entrada, $salida);

    $todoBien = $validandoInfo->validarTodo($nombreBien, $telefonoBien, $fechasBien);
    

    if ($todoBien) {
        //////Realiza la insercionde datos a la BD
        $NewConn->CreateConnection();
        session_start();
        $idUsuario=$_SESSION["id"];
	    echo $query = "INSERT INTO reservacion VALUES(null,'$tipohabitaciones',$numerohabitaciones,
                        '$entrada','$salida','$nombreCliente','$telefono',$idUsuario,$adultos,
                        $jovenes,$costoTotal, '$vigencia')";
	    $result=$NewConn->ExecuteQuery($query);
	    if($result){
		    $RowCount = $NewConn->GetCountAffectedRows();
		    if($RowCount>0){
			    echo "Query ejecutado exitosamente";
			    header("Location: reservacion.php");
			    header('Location: reservacion.php');
		    }
	    }else{
		    echo "<h3>Error al ejecutar la consulta</h3>";
	    }
    }
	
	
?>