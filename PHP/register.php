<?php

include 'connection.php';
require_once 'connection.php';

if ($_POST) {
    session_start();
    
    $name1 = mysqli_real_escape_string($connect, $_POST["name1"]);
    $name2 = mysqli_real_escape_string($connect, $_POST["name2"]); 
    $lastname1 = mysqli_real_escape_string($connect, $_POST["lastName1"]);
    $lastname2 = mysqli_real_escape_string($connect, $_POST["lastName2"]); 
    $email = mysqli_real_escape_string($connect, $_POST["email"]);
    $clave = mysqli_real_escape_string($connect, $_POST["clave"]); 
    $role = $_POST["role"];

    
    $insert = "INSERT INTO Registro (Nombre1, Nombre2, Apellido, Apellido2, Correo_electronico, Contrasena)
    VALUES ('$name1', '$name2', '$lastname1', '$lastname2', '$email', '$clave')";

    $result = mysqli_query($connect, $insert);

    if ($result) {
    header('Location: ../index.php');
    $_SESSION['registro_exitoso'] = true;
    } else {
        header('Location: ../index.php');
    echo "Error al registrar: " . mysqli_error($connect);
    }
}
?>