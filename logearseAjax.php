<?php 
    require("datos/classConectionMySQL.php");

    $correo = $_POST['correoL'];
    $contra = $_POST['passwordL'];

    $NewConn = new ConnectionMySQL();

        //////Realiza la insercionde datos a la BD
        $NewConn->CreateConnection();
	    $query = "SELECT * FROM usuarios where correo='$correo' and contraseña='$contra'";
	    $result=$NewConn->ExecuteQuery($query);
	    if($result){
		    $RowCount = $NewConn->GetCountAffectedRows();
		    if($RowCount>0){
                $row=$NewConn -> GetRows($result);
			    //echo "Query ejecutado exitosamente";
                session_start();
                $_SESSION["id"]=$row[0];
                $_SESSION["user"]=$row[1];
                $_SESSION["rol"]=$row[3];
                echo json_encode (array('success' => 1));
			    //header("Location: menu.php");
			    //header('Location: menu.php');
		    } else {
                echo json_encode (array('success' => 0));
            }
	    }else{
		   // echo "<h3>Error al ejecutar la consulta</h3>";
            echo json_encode (array('success' => 0));
	    }
?>