<?php
session_start();
include 'connection.php';

if ($_POST) {
    if (isset($_POST['idInmueble'], $_POST['titulo'], $_POST['precio'], $_POST['descripcion'])) {
        $idInmueble = mysqli_real_escape_string($connect, $_POST['idInmueble']);
        $titulo = mysqli_real_escape_string($connect, $_POST['titulo']);
        $precio = mysqli_real_escape_string($connect, $_POST['precio']);
        $descripcion = mysqli_real_escape_string($connect, $_POST['descripcion']);
        $direccion = mysqli_real_escape_string($connect, $_POST['direccion']);
        $imagen = mysqli_real_escape_string($connect, $_POST['imagen']);
        $_SESSION['addedSuccesfully'] = false;

        // Construye la consulta SQL solo con los campos que tienen información
        $updateFields = [];
        if (!empty($titulo)) $updateFields[] = "tituloPublicacion = '$titulo'";
        if (!empty($precio)) $updateFields[] = "valorArriendo = '$precio'";
        if (!empty($descripcion)) $updateFields[] = "descripcion = '$descripcion'";
        if (!empty($direccion)) $updateFields[] = "direccion = '$direccion'";
        if (!empty($imagen)) $updateFields[] = "imagen = '$imagen'";

        // Verifica si hay campos para actualizar
        if (!empty($updateFields)) {
            $updateFieldsString = implode(", ", $updateFields);

            $queryUpdate = "UPDATE inmueble SET $updateFieldsString WHERE idInmueble = $idInmueble";

            $resultUpdate = mysqli_query($connect, $queryUpdate);

            if ($resultUpdate) {
                header('Location: ../../Public/lessor.php');
                $_SESSION['addedSuccesfully'] = true;
            } else {
                // Error al actualizar
                echo "Error al actualizar la información: " . mysqli_error($connect);
            }
        } else {
            // No hay campos para actualizar
            echo "No hay campos para actualizar.";
        }
    } else {
        // No se recibieron todos los datos necesarios
        echo "No se recibieron todos los datos necesarios.";
    }
} else {
    // Acceso no autorizado
    header('Location: ruta_hacia_la_pagina_de_error.php');
}

?>
