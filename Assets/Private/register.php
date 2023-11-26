<?php

include 'connection.php';

if($_POST){
    // Se recibe la información del formulario
    $primerNombre = mysqli_real_escape_string($connect, $_POST['primerNombre']);
    $segundoNombre = mysqli_real_escape_string($connect, $_POST['segundoNombre']);
    $primerApellido = mysqli_real_escape_string($connect, $_POST['primerApellido']);
    $segundoApellido = mysqli_real_escape_string($connect, $_POST['segundoApellido']);
    $numeroIdentificacion = mysqli_real_escape_string($connect, $_POST['numeroIdentificacion']);
    $correoElectronico = mysqli_real_escape_string($connect, $_POST['correoElectronico']);
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
    $rolUsuario = mysqli_real_escape_string($connect, $_POST['rolUsuario']);


    // Se arma la consulta de registro en la tabla usuario
    $registro = "INSERT INTO usuario (primerNombre, segundoNombre, primerApellido, segundoApellido, numeroIdentificacion, correoElectronico, contrasena, rolUsuario)
    VALUES ('$primerNombre', '$segundoNombre', '$primerApellido', '$segundoApellido', '$numeroIdentificacion', '$correoElectronico', '$contrasena', '$rolUsuario')";


    // Se envía la consulta a la base de datos

    $insertUsuario = mysqli_query($connect, $registro);

    // Comprobación de consulta

    if ($insertUsuario) {

        // Se verifica el rol y se inserta en la tabla correspondiente dependiendo del mismo
        if ($rolUsuario == 1) {

            $registroArrendador = "INSERT INTO arrendador (idArrendador) VALUES ($numeroIdentificacion)";

            mysqli_query($connect, $registroArrendador);

        } elseif ($rolUsuario == 2) {

            $registroArrendatario = "INSERT INTO arrendatario (idArrendatario) VALUES ($numeroIdentificacion)";

            mysqli_query($connect, $registroArrendatario);

        }

        // Se inicia la sesión y se envía la variable de registro exitoso

        session_start();
        $_SESSION['registro_exitoso'] = true;
        header('Location: ../../');
        exit();

    } else {

        header('Location: ../../');
        session_start();
        $_SESSION['registro_fallido'] = true;
        exit();
    }
}
?>
