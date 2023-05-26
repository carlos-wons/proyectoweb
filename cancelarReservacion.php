<?php
    require("datos/classConectionMySQL.php");
    //////////
    
    $id= $_GET['id'];
    
    
    // Creamos una nueva instancia
    $NewConn = new ConnectionMySQL();
    
    // Creamos una nueva conexion
    $NewConn->CreateConnection();
    
    ///Consulta a la base de datos
    $query = "UPDATE reservacion SET status = 'cancelado' WHERE id=$id";
    $result = $NewConn -> ExecuteQuery($query);
    
    if ($result){
        $RowCount = $NewConn -> GetCountAffectedRows();
        if($RowCount > 0){
            echo "Status actualizado correctamente";
            header("Location: misReservaciones.php");
            header('Location: misReservaciones.php');		
        }
    }
    else {
        echo "<h1>No se pudo eliminar el registro</h1>";
    
    }
?>