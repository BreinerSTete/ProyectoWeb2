<?php
include 'connection.php';
require_once 'connection.php';

// Inicio de sesión

if ($_POST) {
    session_start();
    $correo = mysqli_real_escape_string($connect, $_POST["email"]);
    $clave = mysqli_real_escape_string($connect, $_POST["clave"]); 

    $query = "SELECT * FROM Registro WHERE Correo_electronico = '$correo' AND Contrasena = '$clave'";
    $result = mysqli_query($connect, $query);

    if (!$result) {
        die("Error en la consulta: " . mysqli_error($connect));
    }

    $nr = mysqli_num_rows($result);

    if ($nr == 1) {
        header("Location: rentals.php");
    } else {
        $_SESSION["wrongUserData"] = true;
        header('Location: ../index.php');
    }
}
?>