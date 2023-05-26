<?php
//require_once("datos/datos.php");
require("datos/classConectionMySQL.php");
$tipohabitaciones = $_POST['tipoHabitaciones'];
$numerohabitaciones = $_POST['nHabitaciones'];
$entrada = $_POST['entrada'];
$salida = $_POST['salida'];
$nombreCliente = $_POST['nombre'];
$telefono = $_POST['telefono'];
$vigencia = "vigente";
$id = $_POST['id'];
$adultos = $_POST['adultos'];
$jovenes = $_POST['jovenes'];

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


// Creamos una nueva instancia
$NewConn = new ConnectionMySQL();
// Creamos una nueva conexion
$NewConn->CreateConnection();
///Realiza la insecion de datos a la base de datos
echo $query="UPDATE reservacion SET tipohabitaciones = '$tipohabitaciones',numerohabitaciones = $numerohabitaciones,
entrada='$entrada', salida='$salida', nombreCliente='$nombreCliente', telefono='$telefono',
adultos='$adultos', jovenes='$jovenes', costoTotal='$costoTotal', status='$vigencia' WHERE id = $id";
$result=$NewConn->ExecuteQuery($query);
    if($result){
        $RowCount =  $NewConn->GetCountAffectedRows();
        if($RowCount > 0){
            echo "Query ejecutado exitosamente<br/>";
			header("Location: misReservaciones.php");
			header('Location: misReservaciones.php');
        }
    }else{
        echo "<h3>Error al ejecutar la consulta</h3>";
    }
?>