<?php
//require_once("datos/datos.php");
require("datos/classConectionMySQL.php");
$id = $_POST['id'];
$correo = $_POST['correoR'];
$nombre = $_POST['userR'];
$rol = $_POST['rolR'];
$contra1 = $_POST['passwordR'];
$contra2 = $_POST['confirmPassR'];


// Creamos una nueva instancia
$NewConn = new ConnectionMySQL();
// Creamos una nueva conexion
$NewConn->CreateConnection();
///Realiza la insecion de datos a la base de datos
echo $query="UPDATE usuarios SET usuario='$nombre', contraseña='$contra1', rol='$rol', correo='$correo' WHERE id = $id";
$result=$NewConn->ExecuteQuery($query);
    if($result){
        $RowCount =  $NewConn->GetCountAffectedRows();
        if($RowCount > 0){
            echo "Query ejecutado exitosamente<br/>";
			header("Location: verUsuarios.php");
			header('Location: verUsuarios.php');
        }
    }else{
        echo "<h3>Error al ejecutar la consulta</h3>";
    }
?>