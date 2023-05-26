<?php
    require("datos/classConectionMySQL.php");
    //////////
    
    echo $id= $_GET['id'];
    
    
    // Creamos una nueva instancia
    $NewConn = new ConnectionMySQL();
    
    // Creamos una nueva conexion
    $NewConn->CreateConnection();
    
    ///Consulta a la base de datos
    $query = "DELETE FROM reservacion WHERE id = $id";
    $result = $NewConn -> ExecuteQuery($query);
    
    if ($result){
        $RowCount = $NewConn -> GetCountAffectedRows();
        if($RowCount > 0){
            echo "Registro eliminado correctamente";
            header("Location: todasReservaciones.php");
            header('Location: todasReservaciones.php');		
        }
    }
    else {
        echo "<h1>No se pudo eliminar el registro</h1>";
    
    }
?>