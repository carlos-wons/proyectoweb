<?php
// Simulación de la base de datos de reservas existentes

$suites=20;
$estandar=20;
$ejecutiva=20;

// Obtener las fechas enviadas desde el cliente
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];


require("datos/classConectionMySQL.php");

            $NewConn = new ConnectionMySQL();
        
            $NewConn->CreateConnection();
            $query = "Select * from reservacion";
            $result = $NewConn->ExecuteQuery($query);
            if($result){
                while($row=$NewConn -> GetRows($result)){
                    if (($startDate >= $row[3] && $startDate <= $row[4]) ||
                        ($endDate >= $row[3] && $endDate <= $row[4]) ||
                        ($startDate <= $row[3] && $endDate >= $row[4])) {
                        // La habitación está ocupada en el rango de fechas
                        if ($row[1] == 'Ejecutiva') {
                            $ejecutiva = $ejecutiva - $row[2];
                        } else if ($row[1] == 'Suite') {
                            $suites = $suites - $row[2];
                        } else if ($row[1] == 'Estandar') {
                            $estandar = $estandar - $row[2];
                        }
                    continue;
                    }
                }
                $NewConn -> SetFreeResult($result);
            } else {
                echo "<h1>Error al conectar a la base de datos, o el registro no existe</h1>";
            }
/*$reservations = array(
  array('room_id' => 1, 'start_date' => '2023-05-23', 'end_date' => '2023-05-25'),
  array('room_id' => 2, 'start_date' => '2023-05-24', 'end_date' => '2023-05-26'),
  array('room_id' => 3, 'start_date' => '2023-05-25', 'end_date' => '2023-05-27')
);*/



// Comprobar la disponibilidad de habitaciones


// Devolver la lista de habitaciones disponibles como respuesta
if ($suites > 0 || $estandar > 0 || $ejecutiva > 0) {
  echo 'Habitaciones disponibles <br> suites: ' .max($suites, 0). '<br> estandar: '.max($estandar, 0). '<br> ejecutiva: ' .max($ejecutiva, 0). '';
} else {
  echo 'No hay habitaciones disponibles para el rango de fechas seleccionado.';
}
?>
