<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis reservaciones</title>
    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!--Importaciones datatables-->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
</head>
<body>
    <?php
        session_start(); 
        if (isset($_SESSION["user"]) && $_SESSION["rol"]=="admin"){
          include_once "encabezados/logeadoAdmin.php";
        } else if (isset($_SESSION["user"]) && $_SESSION["rol"]!="admin") {
            header("Location: menu.php");
        } else {
            header("Location: index.php");
        }
    ?>
    <div class="container">
    <h1 class="py-4">Usuarios</h1>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Rol</th>
            <th>Actualizar datos</th>
            <th>Eliminar Usuario</th>
        </tr>
    </thead>
    <tbody>
        <?php
            require("datos/classConectionMySQL.php");

            $NewConn = new ConnectionMySQL();
        
            $NewConn->CreateConnection();
            $idUsuario=$_SESSION["id"];
            $query = "Select * from usuarios";
            $result = $NewConn->ExecuteQuery($query);
            if($result){
                while($row=$NewConn -> GetRows($result)){
                    echo "<tr>
                        <td>".$row[0]."</td>
                        <td>".$row[1]."</td>
                        <td>".$row[3]."</td>
                        <td><a href='updateUsuario.php?id=$row[0]'>Actualizar</a></td>
                        <td><a href='eliminarUsuario.php?id=$row[0]'>Eliminar</a></td>
                    </tr>";
                }
                $NewConn -> SetFreeResult($result);
            } else {
                echo "<h1>Error al conectar a la base de datos, o el registro no existe</h1>";
            }
        ?>
        </tbody>
    </table>
    

    <!-- Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->

    <!--Importaciones datatables-->
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script> -->
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );


    </script>
    </div>

</body>
</html>