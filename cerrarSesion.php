<?php
    session_start();
    session_destroy();
    echo"<script type='text/javascript'>
        alert('la sesion se ha cerrado correctamente');
    </script>";
    header("Location: index.php");
    header('Location: index.php');
?>